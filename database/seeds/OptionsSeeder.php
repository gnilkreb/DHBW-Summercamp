<?php

use Illuminate\Database\Seeder;

class OptionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('options')->insert([
            'key' => 'register',
            'value' => '1',
            'type' => 'boolean',
            'label' => 'Registrierung'
        ]);

        DB::table('options')->insert([
            'key' => 'linear_progression',
            'value' => '0',
            'type' => 'boolean',
            'label' => 'Linearer Levelfortschritt'
        ]);
    }
}
