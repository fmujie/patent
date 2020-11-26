<?php

namespace App\Http\Controllers\Recruit;

use Alert;
use App\Models\Qus\Quss;
use App\Models\Qus\QusSel;
use Illuminate\Http\Request;
use App\Models\Qus\QusGroup;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class ExamController extends Controller
{
    public function index()
    {
        $id = 32;
        $qusGpDt = QusGroup::find($id);
        $dvsnQusDt = $qusGpDt->quss->groupBy('qus_type')->toArray();
        $sgSelDt = array_key_exists('sg_sel', $dvsnQusDt) ? $dvsnQusDt['sg_sel'] : [];
        $mtSelDt = array_key_exists('mt_sel', $dvsnQusDt) ? $dvsnQusDt['mt_sel'] : [];
        $sgSelQusArr = $this->splitPushArr($sgSelDt);
        $mtSelQusArr = $this->splitPushArr($mtSelDt);
        // dd($sgSelQusArr, $mtSelQusArr);
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
        ]);
    }

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
