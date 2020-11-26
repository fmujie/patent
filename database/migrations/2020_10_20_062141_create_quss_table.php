<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQussTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quss', function (Blueprint $table) {
            $table->bigIncrements('id'); // 题目编号
            $table->integer('bel_qus_gpid'); // 所属题组编号
            $table->string('qus_type'); // 题目类型
            $table->string('qus_content'); // 问题内容
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
        Schema::dropIfExists('quss');
    }
}
