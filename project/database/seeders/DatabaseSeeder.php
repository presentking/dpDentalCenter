<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            PatientSeeder::class,
            UserSeeder::class,
            SpecializationSeeder::class,
            ServiceSeeder::class,
            SpecializationUserSeeder::class,
            ScheduleSeeder::class,
        ]);
    }
}
