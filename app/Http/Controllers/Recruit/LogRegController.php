<?php

namespace App\Http\Controllers\Recruit;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LogRegController extends Controller
{
    public function index()
    {
        return view('Recruit.LogReg.login');
    }
}
