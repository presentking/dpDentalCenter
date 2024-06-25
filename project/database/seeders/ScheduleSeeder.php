<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('schedules')->insert([
            'date'=>'2024-06-01',
            'start_work'=>'8:30',
            'end_work' => '17:30',
            'time_of_receipt'=>'00:30:00',
            'user_id' => 3,
        ]);
        DB::table('schedules')->insert([
            'date'=>'2024-06-01',
            'start_work'=>'8:30',
            'end_work' => '17:30',
            'time_of_receipt'=>'00:30:00',
            'user_id' => 2,
        ]);
        DB::table('schedules')->insert([
            'date'=>'2024-06-02',
            'start_work'=>'8:30',
            'end_work' => '17:30',
            'time_of_receipt'=>'00:30:00',
            'user_id' => 3,
        ]);
        DB::table('schedules')->insert([
            'date'=>'2024-06-07',
            'start_work'=>'8:30',
            'end_work' => '17:30',
            'time_of_receipt'=>'00:30:00',
            'user_id' => 5,
        ]);
        DB::table('schedules')->insert([
            'date'=>'2024-06-29',
            'start_work'=>'8:30',
            'end_work' => '17:30',
            'time_of_receipt'=>'00:30:00',
            'user_id' => 4,
        ]);
        DB::table('schedules')->insert([
            'date'=>'2024-06-07',
            'start_work'=>'8:30',
            'end_work' => '17:30',
            'time_of_receipt'=>'00:30:00',
            'user_id' => 3,
        ]);
        DB::table('schedules')->insert([
            'date'=>'2024-06-08',
            'start_work'=>'8:30',
            'end_work' => '17:30',
            'time_of_receipt'=>'00:30:00',
            'user_id' => 5,
        ]);
        DB::table('schedules')->insert([
            'date'=>'2024-06-08',
            'start_work'=>'8:30',
            'end_work' => '17:30',
            'time_of_receipt'=>'00:30:00',
            'user_id' => 7,
        ]);
        DB::table('schedules')->insert([
            'date'=>'2024-06-09',
            'start_work'=>'8:30',
            'end_work' => '17:30',
            'time_of_receipt'=>'00:30:00',
            'user_id' => 10,
        ]);
        DB::table('schedules')->insert([
            'date'=>'2024-06-20',
            'start_work'=>'8:30',
            'end_work' => '17:30',
            'time_of_receipt'=>'00:30:00',
            'user_id' => 9,
        ]);
        DB::table('schedules')->insert([
            'date'=>'2024-06-08',
            'start_work'=>'8:30',
            'end_work' => '17:30',
            'time_of_receipt'=>'00:30:00',
            'user_id' => 7,
        ]);
        DB::table('schedules')->insert([
            'date'=>'2024-06-23',
            'start_work'=>'8:30',
            'end_work' => '17:30',
            'time_of_receipt'=>'00:30:00',
            'user_id' => 9,
        ]);
        DB::table('schedules')->insert([
            'date'=>'2024-06-25',
            'start_work'=>'8:30',
            'end_work' => '17:30',
            'time_of_receipt'=>'00:30:00',
            'user_id' => 9,
        ]);
        DB::table('schedules')->insert([
            'date'=>'2024-06-25',
            'start_work'=>'8:30',
            'end_work' => '17:30',
            'time_of_receipt'=>'00:30:00',
            'user_id' => 4,
        ]);
        DB::table('schedules')->insert([
            'date'=>'2024-06-02',
            'start_work'=>'8:30',
            'end_work' => '17:30',
            'time_of_receipt'=>'00:30:00',
            'user_id' => 5,
        ]);
        DB::table('schedules')->insert([
            'date'=>'2024-06-02',
            'start_work'=>'8:30',
            'end_work' => '17:30',
            'time_of_receipt'=>'00:30:00',
            'user_id' => 5,
        ]);
        DB::table('schedules')->insert([
            'date'=>'2024-06-02',
            'start_work'=>'8:30',
            'end_work' => '17:30',
            'time_of_receipt'=>'00:30:00',
            'user_id' => 6,
        ]);
    }
}
