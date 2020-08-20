<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patent', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('abstract')->nullable();
            $table->string('demands')->nullable();
            $table->string('demand')->nullable();
            $table->string('introduction')->nullable();
            $table->date('ask_begin_date')->nullable();
            $table->date('ask_over_date')->nullable();
            $table->date('public_begin_date')->nullable();
            $table->date('public_over_date')->nullable();
            $table->date('priority_begin_date')->nullable();
            $table->date('priority_over_date')->nullable();
            $table->string('public_number')->nullable();
            $table->string('ask_number')->nullable();
            $table->string('priority_number')->nullable();
            $table->string('ipc_number')->nullable();
            $table->string('ipc_primary_number')->nullable();
            $table->string('cpc_number')->nullable();
            $table->string('loc_number')->nullable();
            $table->string('origin_name')->nullable();
            $table->string('present_name')->nullable();
            $table->string('present_name_address')->nullable();
            $table->string('invent_name')->nullable();
            $table->string('agent_name')->nullable();
            $table->string('agent_company_name')->nullable();
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
        Schema::dropIfExists('patent');
    }
}
