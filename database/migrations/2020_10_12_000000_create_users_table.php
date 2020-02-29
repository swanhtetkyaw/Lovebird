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
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_picture');
            $table->integer('phone');
            $table->text('address');
            $table->integer('age');
            $table->string('gender');
            $table->unsignedBigInteger('religious_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('education_id');

            $table->rememberToken();
            $table->timestamps();

            $table->foreign('religious_id')
                  ->references('id')->on('religiouses')
                  ->onDelete('cascade');

            $table->foreign('city_id')
                  ->references('id')->on('cities')
                  ->onDelete('cascade');

            $table->foreign('education_id')
                  ->references('id')->on('education')
                  ->onDelete('cascade');
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
