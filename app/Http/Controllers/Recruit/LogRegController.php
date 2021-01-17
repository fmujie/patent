<?php

namespace App\Http\Controllers\Recruit;

use Alert;
use Illuminate\Http\Request;
use App\Models\Recruit\RecruitModel;
use App\Http\Controllers\Controller;
use App\Models\MiniPro\Department;
use App\Models\Qus\QusGroup;
use App\Http\Controllers\Recruit\ExamController;

class LogRegController extends Controller
{
    public function logView()
    {
        return view('Recruit.LogReg.login');
    }

    public function login(Request $request)
    {
        $name = $request->input('username');
        $nb = $request->input('pass');
        $currentStudent = RecruitModel::where('name', $name)->where('nb', $nb)->first();
        if (!$currentStudent) {
            toast("请检查输入的用户名或学号是否正确",'info')
            ->autoClose(2500)
            ->position('top')->timerProgressBar();
            return redirect()->back();
        }
        // 届次=年级+2
        $period = '20' . (substr($nb, 0, 2) + 2);
        $reportFDep = $currentStudent->part_1;
        $reportSDep = $currentStudent->part_2;
        // dd($reportFDep);
        $depName1 = Department::where('id', $reportFDep)->first();
        if($depName1) {
            $depName1 = $depName1->department;
        }
        $qusGpData = QusGroup::where('bel_depart', $depName1)->where('bel_period', $period)->first();
        if (!$qusGpData) {
            toast("题组尚未设置",'info')
            ->autoClose(2500)
            ->position('top')->timerProgressBar();
            return redirect()->back();
        }
        $gpId = $qusGpData->id;
        $exam = new ExamController();
        return $exam->index($gpId, $currentStudent, $period, $depName1);
    }
}
