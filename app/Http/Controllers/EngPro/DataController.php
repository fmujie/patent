<?php

namespace App\Http\Controllers\EngPro;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EngPro\DataModel;
use Illuminate\Support\Facades\DB;
use Validator;
use Alert;
use App\Http\Requests\DataRequest;
use QrCode;
use Pinyin;
use Illuminate\Support\Facades\Storage;
use wapmorgan\Mp3Info\Mp3Info;

class DataController extends Controller
{

    public function addInforView()
    {
        return view('EngPro/add_infor');
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
            
            Alert::warning($checkAbbreRes[0], '提交格式有误');
            return view('EngPro/add_infor');
        }

        $abbre = $request->abbre;
        $intro = $request->intro;
        $pyStrRes = implode("_", Pinyin::convert($abbre));

        if ($request->hasFile('audioFile')) {
            $file = $request->file('audioFile');
        }
        
        $audio_path = $this->uploadFile($file);
        $qr_path = $this->genQR($pyStrRes);
        $page_address = '/' .$pyStrRes;

        $res = DB::table('data')->insert(
            [
                'abbre' => $abbre, 'intro' => $intro,
                'audio_path' => $audio_path, 'qr_path' => $qr_path,
                'page_address' => $page_address, 'created_at' => date("Y-m-d G:i:s")
            ]
        );

        if ($res) {
            Alert::success('提交成功', 'Submitted successfully');
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
        return view('EngPro/show_infor', ['datas' => $datas]);
    }

    public function showPage($page_address)
    {
        $strRes = '/' . $page_address;

        $dataModel = new DataModel();
        $data = $dataModel->where('page_address', $strRes)->first();

        if (!$data) {
            return abort(404);
        }

        $audio_path = $data->audio_path;
        $fileName = public_path(substr($audio_path, 1));
        $audio = new Mp3Info($fileName);

        $durationTime = $audio->duration;
        $abbre = $data->abbre;
        $intro = $data->intro;

        return view('EngPro/show_page', [
            'abbre' => $abbre,
            'intro' => $intro,
            'audio_path' => $audio_path,
            'duration_time' => $durationTime
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
         if(! in_array($fileExtension, ['wav', 'mp3', 'm4a'])) {
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
        ->size(200)->merge('/public/qrcodes/logo.png', .3)
        ->generate($urlStr, public_path($qrCP));

        return $qrCP;
    }
}
