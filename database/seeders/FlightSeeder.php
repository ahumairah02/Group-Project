<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FlightSeeder extends Seeder
{
    public function run()
    {
        // Sample flight data
        DB::table('flights')->insert([
            ['flight_no' => 'AIR228',  'price' => 1819, 'destination_id' => 1],
            ['flight_no' => 'EMI478',  'price' => 915,  'destination_id' => 2],
            ['flight_no' => 'MAL571', 'price' => 1977, 'destination_id' => 3],
            ['flight_no' => 'MAL199', 'price' => 1843,  'destination_id' => 2],
            ['flight_no' => 'MAL503',  'price' => 1708, 'destination_id' => 1],
            ['flight_no' => 'MAL966',  'price' => 125,  'destination_id' => 2],
            ['flight_no' => 'MAL140',  'price' => 1268,  'destination_id' => 3],
            ['flight_no' => 'AIR959', 'price' => 1506, 'destination_id' => 3],
            ['flight_no' => 'EMI471',  'price' => 1665, 'destination_id' => 2],
            ['flight_no' => 'AIR189', 'price' => 1904,  'destination_id' => 1],
        ]);
    }
}
