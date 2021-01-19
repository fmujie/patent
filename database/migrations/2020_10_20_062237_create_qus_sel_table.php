<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQusSelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qus_sel', function (Blueprint $table) {
            $table->bigIncrements('id'); // 选项编号
            $table->unsignedInteger('bel_qusid'); // 所属题目编号
            $table->text('sel_content'); // 选项内容
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
        Schema::dropIfExists('qus_sel');
    }
}
