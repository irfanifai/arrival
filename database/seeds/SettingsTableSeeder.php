<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = [
            'title' => 'Arrival',
            'tagline' => 'Simple Blog with Laravel Framework',
            'email' => 'idstackdeveloper@gmail.com',
            'phone' => '+62210632481',
            'address' => 'Jl. Suryopranoto 1-9 Delta Bldg Bl B/16,Petojo Selatan, 32144',
            'so_facebook' => 'https://facebook.com/arrival',
            'so_twitter' => 'https://facebook.com/arrival',
            'so_instagram' => 'https://instagram.com/arrival'
        ];

        DB::table('settings')->insert($settings);
    }
}
