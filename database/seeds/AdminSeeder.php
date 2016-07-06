<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name' => 'Do not forget',
            'last_name' => 'to delete me',
            'age' => 42,
            'gender' => 1,
            'password' => bcrypt('password'),
            'role' => 'admin'
        ]);
    }
}
