<?php

namespace App\Models\EngPro;

use Illuminate\Database\Eloquent\Model;

class DataImgModel extends Model
{
    protected $table = 'data_img';
    protected $guarded = ['id'];

    /**
     * 一对一关联 一张图片对应于一条data
     *
     * @return void
     */
     public function qusGroup()
     {
         return $this->hasOne('App\Models\EngPro\DataModel', 'id', 'data_id');
     }
}
