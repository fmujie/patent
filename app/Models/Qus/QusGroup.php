<?php

namespace App\Models\Qus;

use Illuminate\Database\Eloquent\Model;

class QusGroup extends Model
{
    protected $table = 'qus_group';
    protected $guarded = ['id'];

    /**
     * 一对多关联 一个题组表对应多个题目
     *
     * @return void
     */
    public function quss()
    {
        return $this->hasMany('App\Models\Qus\Quss', 'bel_qus_gpid', 'id');
    }

    /**
     * 一对一关联 一个题组对应一个部门
     *
     * @return void
     */
    public function belDep()
    {
        return $this->hasOne('App\Models\MiniPro\Department', 'id', 'bel_depart');
    }
}
