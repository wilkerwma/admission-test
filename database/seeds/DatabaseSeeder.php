<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('boards')->insert([
             'id' => 1,
          ]);

          DB::table('users')->insert([
             'name' => 'Admin',
             'email' => 'admin@mail.com',
             'password' => '123456',
         ]);

         DB::table('lanes')->insert([
             'name' => "To Do",
             'user_id' => 1,
             'board_id' => 1
         ]);
         DB::table('lanes')->insert([
             'name' => "In progress",
             'user_id' => 1,
             'board_id' => 1
         ]);
         DB::table('lanes')->insert([
             'name' => "Done",
             'user_id' => 1,
             'board_id' => 1
         ]);
    }
}
