<?php

namespace App\Http\Controllers\Recruit;

use Alert;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Recruit\UserLmt;
use Illuminate\Support\Facades\DB;
use App\Models\ExcelExport\Recruit;
use App\Models\Recruit\RecruitModel;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    protected $orderList = ['1', '2', '3', '4', '5', '6', '7', '8'];

    public function index()
    {
        $datas = RecruitModel::query()->select('id', 'name', 'college', 'class', 
                                                'part_1', 'part_2', 'introduction')
                                                ->paginate(6);
        return view('Recruit.Personal.Search', ['datas' => $datas]);
    }

    public function srchOrSort(Request $request)
    {
        $srchkey = request('srchkey');
        $sortkey = request('sortkey');
        if (!$srchkey && !$sortkey) {
            Alert::error('查询/排序关键词缺失，请重试')->autoClose(2500);
            return redirect()->back();
        }
        if ($srchkey) {
            $curDatas = $this->srchBykey($srchkey);
        } else {
            $curDatas = $this->sortByIntent($sortkey);
            $curGrade = substr(Carbon::now()->toDateString(), 2, 2) - 2;
        }

        return view('Recruit.Personal.Search', [
            'datas' => $curDatas,
            'grade' => isset($curGrade) ? $curGrade : null,
        ]);
    }

    public function sortByIntent($sortkey)
    {
        array_splice($this->orderList, $sortkey - 1, 1);
        array_unshift($this->orderList, (string)$sortkey);
        
        $curDatas = RecruitModel::query()->select('id', 'name', 'college', 'class', 
                                        'part_1', 'part_2', 'introduction')
                                ->where('part_1', $sortkey)
                                ->orWhere('part_2', $sortkey)
                                ->orderby(DB::raw('FIND_IN_SET(part_1, "' . implode(",", $this->orderList) . '"' . ")"))
                                ->paginate(6);
        
        return $curDatas;
    }

    private function srchBykey($srchkey)
    {
        if (iconv_strlen($srchkey, 'UTF-8') == 11 && is_numeric($srchkey)) {
            $curDatas = RecruitModel::query()
                                    ->select('id', 'name', 'college', 'class', 
                                            'part_1', 'part_2', 'introduction')
                                    ->where('nb', $srchkey)
                                    ->paginate(6);
        } else {
            $curDatas = RecruitModel::query()
                                    ->select('id', 'name', 'college', 'class', 
                                    'part_1', 'part_2', 'introduction')
                                    ->where('name', $srchkey)
                                    ->orWhere('name', 'like', '%' . $srchkey . '%')
                                    ->paginate(6);
        }

        return $curDatas;
    }
}
