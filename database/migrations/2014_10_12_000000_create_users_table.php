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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('role_id')->default(2);
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        // Default user -> with administrator privileges

        DB::table('users')->insert(['role_id' => '1', 'name' => 'Damir Luketić', 'slug' => 'damir-luke', 'email' => 'luketic.damir@gmail.com', 'password' => '$2y$10$A7Hc/smCegNtvjlX56gEE.TLkQDRiHBT6/b6jFsShIZkYSLhaNEZW']);
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
