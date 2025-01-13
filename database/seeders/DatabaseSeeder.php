<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Call the DestinationSeeder to seed the destinations table
<<<<<<< HEAD
        $this->call(DestinationSeeder::class);

        $this->call(HotelSeeder::class);
=======
        $this->call([
            DestinationSeeder::class,
            TravelPackageSeeder::class,
        ]);
>>>>>>> c49357de4de771faff05afe7535630b20f6c2025
    }
}

