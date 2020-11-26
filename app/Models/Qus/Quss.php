<?php

namespace App\Models\Qus;

use Illuminate\Database\Eloquent\Model;

class Quss extends Model
{
    protected $table = 'quss';
    protected $guarded = ['id'];

    /**
     * 一对一关联 一个题目对应于一个题组
     *
     * @return void
     */
    public function qusGroup()
    {
        return $this->hasOne('App\Models\Qus\QusGroup', 'id', 'bel_qus_gpid');
    }

    /**
     * 一对多 一个选择题对应多个选项
     *
     * @return void
     */
    public function qusSel()
    {
        return $this->hasMany('App\Models\Qus\QusSel', 'bel_qusid', 'id');
    }

    /**
     * 关联删除
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();
        static::deleting(function($quss){
            $quss->qusSel()->delete();
        });
    }
}
