<?php

namespace App\Http\Controllers\Sundries;

use Alert;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class InviteController extends Controller
{
    protected $user_data = '';

    public function inviteView($type = 0) {
        $this->userData($type);
        return view("sundries.invite", ['user_data' => $this->user_data, 'type' => $type]);
    }

    public function inviteData(Request $request) {
        $rules = [
            'user_name' => 'required|min:2',
            'user_email' => 'required|email|unique:invite',
        ];
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            $ret = $validator->errors();
            $checkEmailRes = $ret->get('user_email');
            
            Alert::warning($checkEmailRes[0], '提交格式有误');
            return view('sundries.invite', ['user_data' => '']);
        }

        Alert::success('Success Message', 'Optional Title');
        $user_name = $request->user_name;
        $user_email = $request->user_email;
        
        $res = DB::table('invite')->insert(
            ['user_name' => $user_name, 'user_email' => $user_email, 'created_at' => date("Y-m-d G:i:s")]
        );

        if ($res) {
            Alert::success('提交成功', 'Submitted successfully');
        } else {
            Alert::error('提交失败', 'Submission Failed');
        }
        return view('sundries.invite');
    }

    public function userData($type) {
        $nameList = ['Jing', 'Ma', 'Gao', 'Xiao', 'Fmu', 'Zhang', 'Wang', 'Tang'];
        $genderList = ['Mr.', 'Miss'];
        $user_name = $nameList[$type];
        $gender = '';

        if ($type >= 0 || $type <=4) {
            $gender = $genderList[0];
        } elseif ($type >= 5 || $type <=7) {
            $gender = $genderList[1];
        } else {
            $gender = 'Shemale.';
        }
        $this->user_data = $gender . $user_name;
    }
}