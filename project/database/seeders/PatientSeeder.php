<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('patients')->insert([
            'email'=>'anna.petrova@example.com',
            'password'=>Hash::make('qweqwe123'),
            'snils' => '123-456-789-01',
            'date_of_birth' => '1987.10.13',
            'last_name'=>'Петрова',
            'first_name'=> 'Анна',
            'father_name'=> 'Сергеевна',
            'phone'=>'81234567890',
        ]);
        DB::table('patients')->insert([
            'email'=>'maksim.ivanov@example.org',
            'password'=>Hash::make('qweqwe123'),
            'snils' => '234-567-890 12',
            'date_of_birth' => '1987.07.29',
            'last_name'=>'Иванов',
            'first_name'=> 'Максим',
            'father_name'=> 'Викторович',
            'phone'=>'82345678901',
        ]);
        DB::table('patients')->insert([
            'email'=>'olga.smirnova@example.net',
            'password'=>Hash::make('qweqwe123'),
            'snils' => '345-678-901 23',
            'date_of_birth' => '1990.08.22',
            'last_name'=>'Смирнова',
            'first_name'=> 'Ольга',
            'father_name'=> 'Алексеевна',
            'phone'=>'83456789012',
        ]);
        DB::table('patients')->insert([
            'email'=>'pavel.kuznetsov@example.com',
            'password'=>Hash::make('qweqwe123'),
            'snils' => '456-789-012 34',
            'date_of_birth' => '1985.04.15',
            'last_name'=>'Кузнецов',
            'first_name'=> 'Павел',
            'father_name'=> 'Сергеевич',
            'phone'=>'84567890123',
        ]);

    }
}
