<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRccontrolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rccontrols', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rc_id')->nullable();
            $table->foreign('rc_id')->references('id')->on('risk_controls')->onDelete('cascade');
            $table->unsignedBigInteger('control_id')->nullable();
            $table->foreign('control_id')->references('id')->on('controls')->onDelete('cascade');
            $table->string('type',120);
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
        Schema::dropIfExists('rccontrols');
    }
}
