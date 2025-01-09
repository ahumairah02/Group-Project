<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImagesTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('images')->insert([
            ['destination_id' => 1, 'image_path' => 'istanbul1.jpg'],
            ['destination_id' => 1, 'image_path' => 'istanbul2.jpg'],
            ['destination_id' => 2, 'image_path' => 'kl1.jpg'],
            ['destination_id' => 2, 'image_path' => 'kl2.jpg'],
            ['destination_id' => 3, 'image_path' => 'marr1.jpg'],
            ['destination_id' => 3, 'image_path' => 'marr2.jpg'],
        ]);
    }
}
