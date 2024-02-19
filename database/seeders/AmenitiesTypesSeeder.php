<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AmenitiesTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $amenitiesTypes = [
          ['description' => 'General Options', 'created_at' => now(), 'updated_at' => now()],
          ['description' => 'Bed Types', 'created_at' => now(), 'updated_at' => now()],
          ['description' => 'Room Composition', 'created_at' => now(), 'updated_at' => now()],
          ['description' => 'Room View', 'created_at' => now(), 'updated_at' => now()],
          ['description' => 'Domestic Appliances', 'created_at' => now(), 'updated_at' => now()],
          ['description' => 'Air Conditioning', 'created_at' => now(), 'updated_at' => now()],
          ['description' => 'Electronics', 'created_at' => now(), 'updated_at' => now()],
         ];

         DB::table('amenity_types')->insert($amenitiesTypes);
    }
}
