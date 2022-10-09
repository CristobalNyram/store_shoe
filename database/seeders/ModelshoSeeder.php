<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ModelshoSeeder  extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('modelshos')->insert([
            'title' => 'Ergonomico',
            'description' => 'Listo',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
