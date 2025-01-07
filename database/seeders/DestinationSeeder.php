<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DestinationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('destinations')->insert([
            [
                'name' => 'Kuala Lumpur',
                'description' => 'The capital city of Malaysia, known for its iconic Petronas Towers and vibrant culture.',
                'country' => 'Malaysia',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Singapore',
                'description' => 'A global financial hub and city-state in Southeast Asia.',
                'country' => 'Singapore',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // Add more destinations as needed
        ]);
    }
}
