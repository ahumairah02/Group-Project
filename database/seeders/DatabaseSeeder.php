<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Call the DestinationSeeder to seed the destinations table
        $this->call(DestinationSeeder::class);
    }
}

