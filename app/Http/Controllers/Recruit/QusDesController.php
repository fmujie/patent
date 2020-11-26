<?php

namespace App\Http\Controllers\Recruit;

use Alert;
use App\Models\Qus\Quss;
use App\Models\Qus\QusSel;
use Illuminate\Http\Request;
use App\Models\Qus\QusGroup;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class QusDesController extends Controller
{
    // 题目填充模板
    protected $qusCt = [
        'sg_sel' => '单项选择题题目内容示例',
        'mt_sel' => '多项选择题题目内容示例',
        'gp_fil' => '填空题____题目内容示例',
        'sk_tch' => '简答题题目内容示例'
    ];
    // 单选选项
    protected $selCt = [
        'sg_sel' => '3单选选项',
        'mt_sel' => '4多选选项'
    ];
    // 对应类型 0 => 单选 1 => 多选 2 => 填空 3 => 简答（下标对应）
    protected $corArr = ['sg_sel', 'mt_sel', 'gp_fil', 'sk_tch'];
    // 对应数组
    protected $correspondArr = [
        'sg_sel' => 'pre_single',
        'mt_sel' => 'pre_multiple',
        'gp_fil' => 'pre_gapfil',
        'sk_tch' => 'pre_sketch'
    ];

    /**
     * 转到题组设计视图
     *
     * @return void
     */
    public function index()
    {
        return view('Recruit.PenQus.design');
    }

    /**
     * 转到查看总体题组视图
     *
     * @return void
     */
    public function viewGp()
    {
        $QusGpModel = new QusGroup();
        $QusGpDts = $QusGpModel->orderBy('id', 'DESC')->paginate(6);
        if (!$QusGpDts->count()) {
            toast("Didn't find any information",'info')
            ->autoClose(2500)
            ->position('top')->timerProgressBar();
        }
        return view('Recruit.PenQus.show_infor', ['datas' => $QusGpDts]);
    }

    /**
     * 查看某一题组的详细题目内容
     *
     * @param [type] $qusGpId
     * @return void
     */
    public function viewOGpInfo($qusGpId = null)
    {
        $qusGpDt = QusGroup::find($qusGpId);
        if (!$qusGpId || !$qusGpDt) {
            Alert::error('题组参数不正确，请重试')->autoClose(2500);
            return redirect()->back();
        }
        $allQuss = [];
        foreach ($qusGpDt->quss->groupBy('qus_type') as $key => $value) {
            foreach ($value as $ke => $va) {
                array_push($allQuss, $va);
            }
        }
        // dd($allQuss);
        // $qusArr = [];
        $selQusArr = [];
        $gpSkQusArr = [];
        foreach ($allQuss as $key => $value) {
            $qusDt = Quss::find($value->id);
            $qusSelDts = $qusDt->qusSel;
            // dd($qusDt);
            $qusSelArr = [];
            foreach ($qusSelDts as $k => $v) {
                array_push($qusSelArr,[
                    'qus_selid' => $v->id,
                    'qus_selct' => $v->sel_content
                ]);
            }
            if (array_key_exists($value->qus_type, $this->selCt)) {
                array_push($selQusArr, [
                    'qus_id' => $value->id,
                    'qus_type' => $value->qus_type,
                    'qus_content' => $value->qus_content,
                    'qus_sel' => $qusSelArr ? $qusSelArr : null,
                ]);
            } else {
                array_push($gpSkQusArr, [
                    'qus_id' => $value->id,
                    'qus_type' => $value->qus_type,
                    'qus_content' => $value->qus_content,
                    'qus_sel' => $qusSelArr ? $qusSelArr : null,
                ]);
            }
        }
        $selCount = count($selQusArr);
        $gpSkCount = count($gpSkQusArr);
        return view('Recruit.PenQus.show_one', [
            'selDatas' => $selQusArr,
            'gpSkDatas' => $gpSkQusArr,
            'selCount' => $selCount,
            'gpSkCount' => $gpSkCount,
            'qusGpId' => $qusGpId
        ]);

    }

    /**
     * 设置题目模板
     *
     * @param Request $request
     * @return void
     */
    public function dsTplt(Request $request)
    {
        $qusGpData = QusGroup::create($request->all());
        if (!$qusGpData) {
            Alert::error('题组模板配置失败')->autoClose(2500);
            $this->index();
        }
        $qusGpId = $qusGpData->id;
        $qusN = [];
        array_push($qusN, $request->pre_single, $request->pre_multiple,
            $request->pre_gapfil, $request->pre_sketch
        );
        foreach ($qusN as $key => $value) {
            for ($i=0; $i < $value; $i++) {
                $curtData = Quss::create([
                    'bel_qus_gpid' => $qusGpId,
                    'qus_type' => $this->corArr[$key],
                    'qus_content' => $this->qusCt[$this->corArr[$key]] . (string)($i + 1)
                ]);
                if ($curtData) {
                    if ($key == 0 || $key == 1) {
                        $arContent = $this->selCt[$this->corArr[$key]];
                        $selNum = (int)substr($arContent, 0, 1);
                        for ($j = 0; $j < $selNum; $j++) {
                            QusSel::create([
                                'bel_qusid' => $curtData->id,
                                'sel_content' => $arContent . (string)($j + 1)
                            ]);
                        }
                    }
                }
            }
        }
        toast('题组模板配置成功','success')
        ->autoClose(2500)
        ->position('top')->timerProgressBar();
        return redirect()->back();
    }

    /**
     * 更新题目内容
     *
     * @param Request $request
     * @param [type] $qusId
     * @return void
     */
    public function updateQus(Request $request, $qusId = null)
    {
        if (!$qusId) {
            Alert::error('缺少题干定位参数')->autoClose(2500);
        } else {
            $curtQusEl = Quss::find($qusId);
            $upRet = $curtQusEl->update([
                'qus_content' => $request->qusCt,
            ]);
            if (!$upRet) {
                Alert::error('题目内容更新失败，请重试')->autoClose(2500);
            } else {
                toast('题目内容更新成功','success')
                ->autoClose(2500)
                ->position('top')->timerProgressBar();
            }
            if (array_key_exists($curtQusEl->qus_type, $this->selCt)) {
                $selCDt = $curtQusEl->qusSel;
                foreach ($selCDt as $key => $value) {
                    $str = 'qusSelC' . $value->id;
                    $input = $request->all();
                    $cret = QusSel::find($value->id)->update([
                        'sel_content' => $input["$str"],
                    ]);
                    // if ($cret) {
                    //     Alert::success('题干同选项内容更新成功');
                    // }
                }
            }
        }
        return redirect()->back();
    }

    /**
     * 添加模板题目
     *
     * @param Request $request
     * @param [type] $qusGpId
     * @return void
     */
    public function addQus(Request $request, $qusGpId = null)
    {
        if (!$qusGpId) {
            Alert::error('缺少题组定位参数')->autoClose(2500);
        } else {
            $qusType = $request->qusType;
            $qusNum = $request->qusNum;
            $qusInfor = [];
            array_push($qusInfor, [
                'bel_qus_gpid' => $qusGpId,
                'qus_type' => $qusType,
                'qus_content' => "额外添加：".$this->qusCt["$qusType"]
            ]);
            for ($i = 1; $i <= $qusNum; $i++) { 
                $insertRet = Quss::create($qusInfor[0]);
                if (!$insertRet) {
                    Alert::error("题目 >= $i 增添失败，请重试")->autoClose(2500);
                    return redirect()->back();
                } else {
                    if (array_key_exists($qusType, $this->selCt)) {
                        $arContent = $this->selCt["$qusType"];
                        $selNum = (int)substr($arContent, 0, 1);
                        for ($j = 0; $j < $selNum; $j++) {
                            $qusSelRet = QusSel::create([
                                'bel_qusid' => $insertRet->id,
                                'sel_content' => $arContent . (string)($j + 1)
                            ]);
                            if (!$qusSelRet) {
                                Alert::error("选项配置失败")->autoClose(2500);
                                return redirect()->back();
                            }
                        }
                    }
                }
            }
            $columName = $this->correspondArr["$qusType"];
            $qusGpcDt = QusGroup::find($qusGpId);
            $preNum = $qusGpcDt->toArray()["$columName"];
            $currentNum = $preNum + $request->qusNum;
            $updateRet = $qusGpcDt->update([
                "$columName" => $currentNum
            ]);
            if (!$updateRet) {
                Alert::error("题组预设更新失败，请联系管理员手动更新")->autoClose(2500);
                return redirect()->back();
            }
            toast('题目模板增添成功','success')
            ->autoClose(2500)
            ->position('top')->timerProgressBar();
            return redirect()->back();
        }
    }

    /**
     * 删除题目
     *
     * @param [type] $qusId
     * @return void
     */
    public function deleteQus($qusId = null)
    {
        $qusDt = Quss::find($qusId);
        $qusType = $qusDt->qus_type;
        if (!$qusId || !$qusDt) {
            Alert::error('题目参数不正确，请重试')->autoClose(2500);
        } else {
            $deRet = $qusDt->delete();
            if (!$deRet) {
                Alert::error('题目删除失败，请重试')->autoClose(2500);
            } else {
                $qusGpDt = $qusDt->qusGroup;
                $columName = $this->correspondArr["$qusDt->qus_type"];
                $preNum = $qusGpDt->toArray()["$columName"];
                $currentNum = $preNum - 1;
                $updateRet = $qusGpDt->update([
                    "$columName" => $currentNum
                ]);
                if (!$updateRet) {
                    Alert::error('题组信息更新失败，请联系管理员手动更新')->autoClose(2500);
                } else {
                    toast('题目删除成功','success')
                    ->autoClose(2500)
                    ->position('top')->timerProgressBar();   
                }
            }
        }
        return redirect()->back();
    }
}
