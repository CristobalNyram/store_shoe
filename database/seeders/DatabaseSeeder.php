<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
 use Database\Seeders\Shoe;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([UserSeeder::class]);
        $this->call([CategorySeeder::class]);
        $this->call([BrandSeeder::class]);
        $this->call([ModelshoSeeder::class]);
        $this->call([ShoeSeeder::class]);





    }
}
