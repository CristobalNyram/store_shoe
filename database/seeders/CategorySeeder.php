<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            'title' => 'Deporte',
            'description' => 'Para hacae ejercicio',
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('categories')->insert([
            'title' => 'Casual',
            'description' => 'Para ir a fiesta o estar en oficina',
            'created_at' => now(),
            'updated_at' => now()
        ]);


    }
}
