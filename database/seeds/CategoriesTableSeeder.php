<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'title' => 'Tujuan Wisata',
            'slug' => 'tujuan-wisata'
        ];

        DB::table('categories')->insert($categories);
    }
}
