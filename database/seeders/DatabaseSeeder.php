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

        $this->call(HotelSeeder::class);
=======
>>>>>>> dcb760432a5f750c192b66b5bba8a5fb73dd7a11
        $this->call([
            DestinationSeeder::class,
            TravelPackageSeeder::class,
        ]);
    }
}

