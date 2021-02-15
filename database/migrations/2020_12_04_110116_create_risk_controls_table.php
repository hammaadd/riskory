<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRiskControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         /*
            U = Under Discussion 
            A = Approved 
            R = Rejected
            O = Our next bigthing
            P = Pending for approval
            */
        Schema::create('risk_controls', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->string('slug',191)->unique();
            $table->string('objective',191);
            $table->text('description');
            $table->string('frequency',150)->nullable();
            $table->enum('implementation_type',['Automated','Semi-automated','Manual']);
            $table->text('business_impact')->nullable();
            $table->text('recommendation')->nullable();
            $table->enum('status',['U','A','R','O','P'])->default('P');
            $table->enum('is_comment_disabled',['0','1'])->default('0');
            $table->unsignedBigInteger('views')->default(0);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
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
        Schema::dropIfExists('risk_controls');
    }
}
