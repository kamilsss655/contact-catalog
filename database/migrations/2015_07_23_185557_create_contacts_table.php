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
            $table->string('first_name', 15);
            $table->string('last_name', 32)->nullable();
            $table->string('phone', 20)->nullable();
            $table->string('email', 50);
            $table->string('city', 32)->nullable();
            $table->string('street', 75)->nullable();
            $table->string('house_number', 8)->nullable();
            $table->string('county', 20)->nullable();
            $table->string('zip_code', 6)->nullable();
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
