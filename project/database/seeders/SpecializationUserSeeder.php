<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SpecializationUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('specializations_users')->insert([
            'user_id'=>'2',
            'specialization_id'=>'1',
        ]);
        DB::table('specializations_users')->insert([
            'user_id'=>'2',
            'specialization_id'=>'2',
        ]);
        DB::table('specializations_users')->insert([
            'user_id'=>'3',
            'specialization_id'=>'3',
        ]);
        DB::table('specializations_users')->insert([
            'user_id'=>'4',
            'specialization_id'=>'4',
        ]);
        DB::table('specializations_users')->insert([
            'user_id'=>'5',
            'specialization_id'=>'5',
        ]);
        DB::table('specializations_users')->insert([
            'user_id'=>'6',
            'specialization_id'=>'6',
        ]);
        DB::table('specializations_users')->insert([
            'user_id'=>'7',
            'specialization_id'=>'3',
        ]);
        DB::table('specializations_users')->insert([
            'user_id'=>'8',
            'specialization_id'=>'2',
        ]);
        DB::table('specializations_users')->insert([
            'user_id'=>'9',
            'specialization_id'=>'6',
        ]);
        DB::table('specializations_users')->insert([
            'user_id'=>'10',
            'specialization_id'=>'5',
        ]);
    }
}
