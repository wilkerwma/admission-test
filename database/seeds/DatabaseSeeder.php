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
         //$this->call(UsersTableSeeder::class);
         DB::table('boards')->insert([
             'id' => 1,
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
