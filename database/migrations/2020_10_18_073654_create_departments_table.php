<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('departmentName');
            $table->timestamps();
        });
        DB::insert("INSERT INTO `departments` (`departmentName`) VALUES
        ('综合部'),
        ('媒体中心'),
        ('新闻记者部'),
        ('品牌运营部'),
        ('技术支持部-程序'),
        ('技术支持部-美工'),
        ('技术支持部-闪客'),
        ('摄影小组')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('departments');
    }
}
