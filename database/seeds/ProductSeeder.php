<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'nama' => 'Boba',
            'category_id' => '2',
        	'gambar' => 'boba.png',
        ]);
        DB::table('products')->insert([
            'nama' => 'Coffee',
            'category_id' => '2',
        	'gambar' => 'cofee.png',
        ]);
        DB::table('products')->insert([
            'nama' => 'Es Cekek',
            'category_id' => '2',
        	'gambar' => 'escekek.png',
        ]);
    }
}
