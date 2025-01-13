<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TravelPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('travel_packages')->insert([
            [
                'destination_id' => 1, // Assuming Bosnia has destination_id = 1
                'name' => 'Discover Bosnia',
                'description' => 'Explore the rich culture and stunning landscapes of Bosnia with this 5-day travel package.',
                'price' => 1000.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'destination_id' => 2, // Assuming Kuala Lumpur has destination_id = 2
                'name' => 'Kuala Lumpur City Experience',
                'description' => 'Immerse yourself in the vibrant city life of Kuala Lumpur with this 4-day package. Includes cultural tours and iconic landmarks.',
                'price' => 1200.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'destination_id' => 3, // Assuming Singapore has destination_id = 3
                'name' => 'Singapore Highlights',
                'description' => 'A 3-day tour of Singapore featuring the Marina Bay Sands, Gardens by the Bay, and local culinary experiences.',
                'price' => 1500.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'destination_id' => 4, // Assuming Georgia has destination_id = 4
                'name' => 'Enchanting Georgia',
                'description' => 'Discover the charm of Georgia with this 6-day travel package, including Tbilisi city tours and wine-tasting experiences.',
                'price' => 1400.00,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

