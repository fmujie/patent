<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQusGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qus_group', function (Blueprint $table) {
            $table->bigIncrements('id'); // 题组编号
            $table->integer('bel_depart'); // 所属部门
            $table->string('bel_period'); // 所属届次
            $table->unsignedTinyInteger('status')->default(0); // 题组状态 0 可编辑 1 不可编辑 2 用户可访问答题
            $table->unsignedTinyInteger('pre_single'); // 预设单选
            $table->unsignedTinyInteger('pre_multiple'); // 预设多选
            $table->unsignedTinyInteger('pre_gapfil'); // 预设填空
            $table->unsignedTinyInteger('pre_sketch'); // 预设简答
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('qus_group');
    }
}
