<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('profile_picture');
            $table->integer('phone');
            $table->text('address');
            $table->integer('age');
            $table->string('gender');
            $table->unsignedBigInteger('religious_id');
            $table->unsignedBigInteger('city_id');
            $table->unsignedBigInteger('education_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onDelete('cascade');

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
        Schema::dropIfExists('user_infos');
    }
}
