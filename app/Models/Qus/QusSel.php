<?php

namespace App\Models\Qus;

use Illuminate\Database\Eloquent\Model;

class QusSel extends Model
{
    protected $table = 'qus_sel';
    protected $guarded = ['id'];

    /**
     * 一对一关联 一个选项对应一道选择题
     *
     * @return void
     */
    public function qus()
    {
        return $this->hasOne('App\Models\Qus\Quss', 'id', 'bel_qus_id');
    }
}
