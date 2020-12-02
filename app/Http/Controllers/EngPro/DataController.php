<?php

namespace App\Http\Controllers\EngPro;


use Alert;
use Pinyin;
use QrCode;
use Validator;
use Jenssegers\Agent\Agent;
use Illuminate\Http\Request;
use wapmorgan\Mp3Info\Mp3Info;
use App\Models\EngPro\DataModel;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\DataRequest;
use App\Models\EngPro\DataImgModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class DataController extends Controller
{

    public function addInforView()
    {
        return view('EngPro.add_infor');
    }

    public function addData(Request $request)
    {
        $rules = [
            'abbre' => 'required|min:3|unique:data',
            'intro' => 'required|max:1024',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $ret = $validator->errors();
            $checkAbbreRes = $ret->get('abbre');
            
            Alert::warning('提交格式有误', $checkAbbreRes[0])->autoClose(2500);
            return view('EngPro.add_infor');
        }

        $lan = $_POST['optradio'];
        $abbre = $request->abbre;
        $intro = $request->intro;
        $pyStrRes = implode("_", Pinyin::convert($abbre));

        if ($request->hasFile('audioFile')) {
            $audioFile = $request->file('audioFile');
        }

        $audio_path = $this->uploadFile($audioFile);
        if (!$audio_path) {
            Alert::error('音频文件上传失败');
            return view('EngPro/add_infor');
        }

        $imgFilesArr = [];
        if ($request->hasFile('imgFile')) {
            $imgFiles = $request->file('imgFile');
            foreach ($imgFiles as $key => $imgFile) {
                $img_path = $this->uploadFile($imgFile);
                if (!$img_path) {
                    Alert::error('图片文件上传失败');
                    return view('EngPro/add_infor');
                }
                array_push($imgFilesArr, $img_path);
            }
        }

        $qr_path = $this->genQR($pyStrRes);
        $page_address = '/' .$pyStrRes;

        $trans = $request->trans;
        $res = DB::table('data')->insert(
            [
                'abbre' => $abbre, 'lan' => $lan, 'intro' => $intro,
                'trans' => $trans, 'audio_path' => $audio_path, 'qr_path' => $qr_path,
                'page_address' => $page_address, 'created_at' => date("Y-m-d G:i:s")
            ]
        );

        if ($res) {
            $currentDataId = DB::connection()->getPdo()->lastInsertId();
            if(!empty($imgFilesArr)) 
            {
                foreach($imgFilesArr as $key => $img_path) {
                    $imgInsertRes = DataImgModel::create([
                        'data_id' => $currentDataId,
                        'img_path' => $img_path
                    ]);;
                    if ($imgInsertRes) {
                        toast('提交成功','success')
                        ->autoClose(2500)
                        ->position('top')->timerProgressBar();
                    } else {
                        DataModel::delete($currentDataId);
                        Alert::error('提交失败', 'Submission Failed');
                    }
                }
            } else {
                toast('提交成功','success')
                ->autoClose(2500)
                ->position('top')->timerProgressBar();
            }
        } else {
            Alert::error('提交失败', 'Submission Failed');
        }

        return view('EngPro/add_infor');
    }

    public function showInfor()
    {
        $dataModel = new DataModel();
        $datas = $dataModel->orderBy('created_at', 'DESC')->paginate(6);
        if (!$datas->count()) {
            Alert::info("Didn't find any information");
        }
        return view('EngPro.show_infor', ['datas' => $datas]);
    }

    public function showPage($page_address)
    {
        $agent = new Agent();
        if(!$agent->isMobile()) {
            Alert::error('Please use mobile device to access');
            return redirect()->back();
        }
        $strRes = '/' . $page_address;

        $dataModel = new DataModel();
        $data = $dataModel->where('page_address', $strRes)->first();
        $crtdt = $data->created_at->toDateTimeString();
        $imgs = $data->imgs;
        $imgsArr = [];
        foreach ($imgs as $key => $value) {
            array_push($imgsArr, $value->img_path);
        }

        if (!$data) {
            return abort(404);
        }

        $audio_path = $data->audio_path;
        $fileName = public_path(substr($audio_path, 1));
        $audio = new Mp3Info($fileName);

        $durationTime = $audio->duration;
        if ($page_address == 'dian_ge_ya') {
            $durationTime = $durationTime - 3.5; 
        }
        $abbre = $data->abbre;
        $intro = $data->intro;
        $trans = $data->trans;
        $lan = $data->lan;
        if (!$trans) {
            $trans = '暂无释义';
        }
        toast('Click the play button to start','info')
        ->hideCloseButton()->autoClose(2000)
        ->position('top')->timerProgressBar()->width('400px');
        return view('EngPro.show_page', [
            'abbre' => $abbre,
            'intro' => $intro,
            'audio_path' => $audio_path,
            'duration_time' => $durationTime,
            'trans' => $trans,
            'lan' => $lan,
            'imgsArr' => $imgsArr,
            'crtdt' => $crtdt,
            'video_path' => null
        ]);
    }

    /**
     * 文件上传
     */
     public function uploadFile($file)
     {
         // $this->upload如果成功就返回文件名不成功返回false
         $fileName = $this->upload($file);
         if ($fileName){
             return $fileName;
         }
         return '上传失败';
     }
 
     /**
      * 验证文件是否合法
      */
      public function upload($file, $disk='public') {
         // 1.是否上传成功
         if (! $file->isValid()) {
            return false;
         }
         // 2.是否符合文件类型 getClientOriginalExtension 获得文件后缀名
         $fileExtension = $file->getClientOriginalExtension();
         if(! in_array($fileExtension, ['wav', 'mp3', 'm4a', 'jpg', 'png', 'webp'])) {
             return false;
         }
         // 3.判断大小是否符合 2M
         $tmpFile = $file->getRealPath();
         if (filesize($tmpFile) >= 2048000) {
             return false;
         }
         // 4.是否是通过http请求表单提交的文件
         if (! is_uploaded_file($tmpFile)) {
             return false;
         }
         // 5.每天一个文件夹,分开存储, 生成一个随机文件名
         $fileName = date('Y_m_d').'/'.md5(time()) .mt_rand(0,9999).'.'. $fileExtension;
         if (Storage::disk($disk)->put($fileName, file_get_contents($tmpFile)) ){
             return Storage::url($fileName);
         }
     }

     public function genQR($pyStrRes) {
        $urlStr = env('APP_URL') . '/engpro' . '/' . $pyStrRes;
        $qrCP = 'qrcodes/' . $pyStrRes . md5(mt_rand(0, 999)) . '.png';

        QrCode::format('png')->errorCorrection('H')
        ->size(400)->merge('/public/qrcodes/logo1.png', .3)
        ->generate($urlStr, public_path($qrCP));

        return $qrCP;
    }
}
