<?php

namespace App\Models\EngPro;

use Illuminate\Database\Eloquent\Model;

class DataModel extends Model
{
    protected $table = 'data';
    protected $guarded = ['id'];

    /**
     * 一对多关联 一条data可对应多张图片
     *
     * @return void
     */
     public function imgs()
     {
         return $this->hasMany('App\Models\EngPro\DataImgModel', 'data_id', 'id');
     }
}
