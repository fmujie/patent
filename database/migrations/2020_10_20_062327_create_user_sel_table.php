<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_sel', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id'); // 用户编号
            $table->integer('qus_id'); // 题目编号
            $table->integer('sel_id'); // 选项编号
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
        Schema::dropIfExists('user_sel');
    }
}
