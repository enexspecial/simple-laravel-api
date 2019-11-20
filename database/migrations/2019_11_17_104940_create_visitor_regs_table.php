<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorRegsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitor_regs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->dateTime('time_in');
            $table->string('whom_to_see');
            $table->string('reason');
            $table->string('mobile');
            $table->dateTime('time_out')->nullable();
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('visitor_regs');
    }
}
