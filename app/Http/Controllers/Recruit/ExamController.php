<?php

namespace App\Http\Controllers\Recruit;

use Alert;
use App\Models\Qus\Quss;
use App\Models\Qus\QusSel;
use App\Models\Qus\UserAns;
use Illuminate\Http\Request;
use App\Models\Qus\QusGroup;
use App\Models\Recruit\UserLmt;
use App\Models\MiniPro\Department;
use Illuminate\Support\Facades\DB;
use App\Models\Recruit\RecruitModel;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    /**
     * 转到答题界面
     *
     * @param [type] $gpId
     * @param [type] $currentStu
     * @param [type] $period
     * @param [type] $depName1
     * @return void
     */
    public function index($gpId, $currentStu, $period, $depName)
    {
        toast($depName . "——笔试卷", 'info')
            ->autoClose(2500)
            ->position('top')->timerProgressBar()->width('400px');
        $qusGpDt = QusGroup::find($gpId);
        $dvsnQusDt = $qusGpDt->quss->groupBy('qus_type')->toArray();
        $sgSelDt = array_key_exists('sg_sel', $dvsnQusDt) ? $dvsnQusDt['sg_sel'] : [];
        $mtSelDt = array_key_exists('mt_sel', $dvsnQusDt) ? $dvsnQusDt['mt_sel'] : [];
        $sgSelQusArr = $this->splitPushArr($sgSelDt);
        $mtSelQusArr = $this->splitPushArr($mtSelDt);
        $gpFilDt = array_key_exists('gp_fil', $dvsnQusDt) ? $dvsnQusDt['gp_fil'] : null;
        $skTchDt = array_key_exists('sk_tch', $dvsnQusDt) ? $dvsnQusDt['sk_tch'] : null;
        foreach ($gpFilDt as $key => $value) {
            $gpFilArr = explode('____', $value['qus_content']);
            $gpFilDt[$key]['gpFtPtn'] = $gpFilArr[0];
            $gpFilDt[$key]['gpEdPtn'] = $gpFilArr[1];
        }
        return view('Recruit.ShowQus.PenExam', [
            'sgSelDt' => $sgSelQusArr,
            'mtSelDt' => $mtSelQusArr,
            'gpFilDt' => $gpFilDt,
            'skTchDt' => $skTchDt,
            'userId'  => $currentStu->id,
            'userName' => $currentStu->name,
            'userPeriod' => $period,
            'department' => $depName,
            'gpId' => $gpId,
        ]);
    }

    /**
     * 答题数据入库
     *
     * @param Request $request
     * @return void
     */
    public function submitEm(Request $request)
    {
        $gpId = $request->input('gpId');
        $userId = $request->input('userId');
        $sgSelAns = $request->input('sgSel');
        $qusGpDt = QusGroup::find($gpId);
        $dvsnQusDt = $qusGpDt->quss->groupBy('qus_type')->toArray();
        // 核心coding   运用多层foreach将用户答题情况入库
        foreach ($dvsnQusDt as $key => $value) {
            switch ($key) {
                case 'sg_sel': foreach ($value as $k => $v) {
                    UserAns::create([
                        'user_id' => $userId,
                        'qus_id' => $v['id'],
                        'ans_content' => substr($request->input('sgSel' . $v['id']), 3),
                    ]);
                };
                break;
                case 'mt_sel': foreach ($value as $k => $v) {
                    $tempArr = [];
                    foreach ($request->input('mtSel' . $v['id']) as $kk => $vv) {
                        array_push($tempArr, substr($vv, 3));
                    }
                    $ansStr = implode('|', $tempArr);
                    UserAns::create([
                        'user_id' => $userId,
                        'qus_id' => $v['id'],
                        'ans_content' => $ansStr,
                    ]);
                };
                break;
                case 'gp_fil': foreach ($value as $k => $v) {
                    UserAns::create([
                        'user_id' => $userId,
                        'qus_id' => $v['id'],
                        'ans_content' => $request->input('gpFil' . $v['id']),
                    ]);
                };
                break;
                default: foreach ($value as $k => $v) {
                    UserAns::create([
                        'user_id' => $userId,
                        'qus_id' => $v['id'],
                        'ans_content' => $request->input('skTch' . $v['id']),
                    ]);
                };
                break;
            }
        }
        // 交卷1 or 卷2
        if (!UserLmt::where('user_id', $userId)->first()) {
            UserLmt::create([
                'user_id' => $userId,
                'part1_access' => 1,
            ]);
        } else {
            UserLmt::where('user_id', $userId)->update(['part2_access' => 1]);
        }
        toast("交卷成功",'success')
            ->autoClose(2500)
            ->position('top')->timerProgressBar()->width('400px');
        return redirect()->to('recruit/logview');
    }

    /**
     * 查询数据分割推入对应数组
     *
     * @param array $data
     * @return void
     */
    private function splitPushArr($data = [])
    {
        $returnSelQusArr = [];
        foreach ($data as $key => $value) {
            $qusDt = Quss::find($value['id']);
            $qusSelDts = $qusDt->qusSel;
            $qusSelArr = [];
            foreach ($qusSelDts as $ke => $val) {
                array_push($qusSelArr,[
                    'qus_selid' => $val->id,
                    'qus_selct' => $val->sel_content
                ]);
            }
            array_push($returnSelQusArr, [
                'qus_id' => $value['id'],
                'qus_type' => $value['qus_type'],
                'qus_content' => $value['qus_content'],
                'qus_sel' => $qusSelArr ? $qusSelArr : null,
            ]);
        }
        return $returnSelQusArr;
    }
}
