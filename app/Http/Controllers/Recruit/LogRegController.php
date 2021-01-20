<?php

namespace App\Http\Controllers\Recruit;

use Alert;
use Illuminate\Http\Request;
use App\Models\Qus\QusGroup;
use App\Models\Recruit\UserLmt;
use App\Models\MiniPro\Department;
use App\Models\Recruit\RecruitModel;
use App\Http\Controllers\Controller;
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
            toast("请检查输入的用户名或学号是否正确", 'info')
            ->autoClose(2500)
            ->position('top')->timerProgressBar()->width('400px');
            return redirect()->back();
        }
        $userId = $currentStudent->id;
        // 届次=年级+2
        $period = '20' . (substr($nb, 0, 2) + 2);
        $reportFDep = $currentStudent->part_1;
        $reportSDep = $currentStudent->part_2;
        $depDt = Department::where('id', $reportFDep)->first();
        if($depDt) {
            $depName = $depDt->department;
        }
        // 默认第一意向部门答卷
        $depId = $reportFDep;
        // 检查有无第二意向部门，若存在则第二次答题开放，且题组为第二意向部门(且第二意向部门还允许答卷)
        if (UserLmt::where('user_id', $userId)->first()) {
            if (UserLmt::where('user_id', $userId)->first()->part2_access == 0 && ($reportSDep != 0)) {
                $dep2Dt = Department::where('id', $reportSDep)->first(); 
                $depId = $dep2Dt->id;
                $depName = $dep2Dt->department;
            } else {
                toast("意向部门均已答卷", 'warning')
                ->autoClose(2500)
                ->position('top')->timerProgressBar()->width('400px');
                return redirect()->back();
            }
        }
        $qusGpData = QusGroup::where('bel_depart', $depId)->where('bel_period', $period)->first();
        if (!$qusGpData) {
            toast("题组尚未设置", 'info')
            ->autoClose(2500)
            ->position('top')->timerProgressBar()->width('400px');
            return redirect()->back();
        } else if ($qusGpData->status != 2) {
            toast("题组作答尚未开放", 'info')
            ->autoClose(2500)
            ->position('top')->timerProgressBar()->width('400px');
            return redirect()->back();
        }
        $gpId = $qusGpData->id;
        $exam = new ExamController();
        return $exam->index($gpId, $currentStudent, $period, $depName);
    }
}
