<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('brands')->insert([
            'title' => 'Addidas',
            'description' => 'Solo somos calidad',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('brands')->insert([
            'title' => 'Nike',
            'description' => 'La mejor marca.',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
