<?php

namespace App\Models\Recruit;

use Illuminate\Database\Eloquent\Model;

class RecruitModel extends Model
{
    protected $table = 'recruit';
    protected $guarded = ['id'];

    /**
     * 一对一关联 一个编号对应一个部门
     *
     * @return void
     */
     public function belFDep()
     {
         return $this->hasOne('App\Models\MiniPro\Department', 'id', 'part_1');
     }

    /**
     * 一对一关联 一个编号对应一个部门
     *
     * @return void
     */
     public function belSDep()
     {
         return $this->hasOne('App\Models\MiniPro\Department', 'id', 'part_2');
     }

    /**
     * 一对一关联 一个编号对应一个学院
     *
     * @return void
     */
     public function belCol()
     {
         return $this->hasOne('App\Models\MiniPro\College', 'id', 'college');
     }
}
