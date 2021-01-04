<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	'jenis' => 'Makanan',
        	'gambar' => 'makanan.png',
        ]);

        DB::table('categories')->insert([
        	'jenis' => 'Minuman',
        	'gambar' => 'minuman.png',
        ]);
    }
}
