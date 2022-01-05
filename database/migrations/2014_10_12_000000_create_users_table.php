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
      $table->increments('id');
      $table->string('name', 50)->nullable();
      $table->string('name_kana', 50)->nullable();
      $table->string('email')->unique();
      $table->string('password');
      $table->string('tell', 12)->nullable();
      $table->integer('zip')->nullable();
      $table->string('address')->nullable();
      $table->string('payjp_customer_id')->nullable();
      $table->rememberToken();
      $table->timestamps();
      $table->softDeletes();
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
