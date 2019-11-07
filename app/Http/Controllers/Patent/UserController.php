<?php

namespace App\Http\Controllers\Patent;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function search_view()
    {
        return view('search');
    }

    public function search_data(Request $Request)
    {
        $input = $Request->all();
        // dump($input);
        $selectCon = $Request->input('transData');
        dump($selectCon);
        $sql = 'select * from patent where ' . $selectCon;
        // dd($sql);
        $sqls = 'select * from patent where ';
        $datas = DB::select($sql);
        // dd($datas);
        return view('data_show', ['datas' => $datas]);
    }

    public function pdfDld($patentNum)
    {
        $patentNum = 'CN110124140A';
        $Common = 1;
        $postUrl = 'http://www2.drugfuture.com/cnpat/verify.aspx?op_num=' . $patentNum . '&' . $Common;
        return redirect($postUrl);
    }
}
