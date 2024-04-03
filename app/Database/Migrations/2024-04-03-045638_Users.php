<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Users extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username', 100)->unique();
            $table->string('password', 100);
            $table->string('name', 100);
            $table->dateTime('created_at')->nullable();
            $table->dateTime('updated_at')->nullable();
        });

        // Insert data into users table
        DB::table('users')->insert([
            ['username' => 'admin', 'password' => '$2y$10$KOh0dIpOfmO0A1iE7bt03eIuxtRIqBP9jTvQOc3rmjB5QKRNKhyCW', 'name' => 'admin', 'created_at' => '2024-04-01 14:10:50', 'updated_at' => '2024-04-01 14:10:50'],
            ['username' => 'roni_', 'password' => '$2y$10$HcB0Bi7QIHFAf.6FAP3wgOVUa/bXtUIG1GLUGa2bsq89BsI.Rp.e6', 'name' => 'roni', 'created_at' => '2024-04-03 04:07:22', 'updated_at' => '2024-04-03 04:07:22'],
            ['username' => 'tama_', 'password' => '$2y$10$c4r4eG.FOJPYffMRt8w6b.sU2u2bQ7hJuuf.xnKrKvJr5JqRt4zZu', 'name' => 'tama', 'created_at' => '2024-04-03 04:10:34', 'updated_at' => '2024-04-03 04:10:34']
        ]);
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
