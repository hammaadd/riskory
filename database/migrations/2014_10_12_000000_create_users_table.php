<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('fname', 191)->nullable();;
            $table->string('lname', 191)->nullable();;
            $table->date('joined_at')->default(date('Y-m-d'));
            $table->enum('status',['A','D','S'])->nullable();
            $table->text('about')->nullable();
            $table->date('dob')->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries');
            $table->enum('gender',['Male','Female','Other'])->nullable();
            $table->string('avatar',191)->default('images/avatars/default.png');
            $table->string('cover',191)->default('images/covers/default.png');
            $table->string('phone_no',40)->nullable();
            $table->text('password_token')->nullable();
            $table->enum('is_email_verified',['Y','N'])->nullable();
            $table->date('token_expiry_date')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
