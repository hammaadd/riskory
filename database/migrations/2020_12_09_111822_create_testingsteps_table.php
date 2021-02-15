<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestingstepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testingsteps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('rc_id')->nullable();
            $table->foreign('rc_id')->references('id')->on('risk_controls')->onDelete('cascade');
            $table->string('step',191);
            $table->integer('order');
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
        Schema::dropIfExists('testingsteps');
    }
}
