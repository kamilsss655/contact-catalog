<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id')->unique();
            $table->string('first_name', 32);
            $table->string('last_name', 32)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email', 100);
            $table->string('city', 64)->nullable();
            $table->string('street', 100)->nullable();
            $table->string('house_number', 10)->nullable();
            $table->string('county', 32)->nullable();
            $table->string('zip_code', 10)->nullable();
            $table->string('filename', 40)->nullable();
            
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::drop('contacts');
    }
}
