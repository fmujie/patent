<?php

namespace App\Http\Controllers\Recruit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PerInforController extends Controller
{
    public function index($rUserId = null)
    {
        // dd($rUserId);
        return view('Recruit.Personal.PerInfor');
    }
}
