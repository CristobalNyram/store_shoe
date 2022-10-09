<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shoe;

class ShoeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Shoe::factory()->count(24)->create();

    }
}
