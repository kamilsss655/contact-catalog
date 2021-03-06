<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     
     public function up()
    {
      Schema::create('users', function(Blueprint $table)
      {
          $table->increments('id');
          $table->string('first_name', 15);
          $table->string('last_name', 32);
          $table->string('email', 50)->unique();
          $table->string('password', 100);
          $table->string('remember_token', 100)->nullable();
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
          Schema::drop('users');
      }

}