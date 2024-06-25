<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'email'=>'admin@admin',
            'password'=>Hash::make('qweqwe123'),
            'role'=>'2',
        ]);

        DB::table('users')->insert([
            'email'=>'aleksandrovaAS@irkat.ru',
            'password'=>Hash::make('qweqwe123'),
            'last_name'=>'Александрова',
            'first_name'=> 'Алена',
            'father_name'=> 'Сергеевна',
            'number_phone'=>'89832407732',
            'role'=>'1',
            'work_experience'=>'10 лет',
            'education'=>'Средне специальное',
            'date_of_birth' => '1986-02-01',
            'residence_address' => 'ул. Карла Либкнехта, дом 25',
            'path_img' => 'Алена.jpg',
        ]);
        DB::table('users')->insert([
            'email'=>'ivanova.alena@example.com',
            'password'=>Hash::make('qweqwe123'),
            'last_name'=>'Иванова',
            'first_name'=> 'Алёна',
            'father_name'=> 'Андреевна',
            'number_phone'=>'89111234567',
            'role'=>'1',
            'work_experience'=>'10 лет',
            'education'=>'Высшее',
            'date_of_birth' => '1992-03-05',
            'residence_address' => 'ул. Байкальская, дом 10',
            'path_img' => 'Иванова Алёна Андреевна.jpg',
        ]);
        DB::table('users')->insert([
            'email'=>'kochnev.kirill@example.com',
            'password'=>Hash::make('qweqwe123'),
            'last_name'=>'Кочнев',
            'first_name'=> 'Кирилл',
            'father_name'=> 'Александрович',
            'number_phone'=>'89219876543',
            'role'=>'1',
            'work_experience'=>'7 лет',
            'education'=>'Высшее образования хирурга-стоматолога',
            'date_of_birth' => '1991-02-28',
            'residence_address' => 'пр. Красных Партизан, дом 55',
            'path_img' => 'Кочнев Кирилл Александрович.jpg',
        ]);
        DB::table('users')->insert([
            'email'=>'losukova.maria@example.com',
            'password'=>Hash::make('qweqwe123'),
            'last_name'=>'Лосукова',
            'first_name'=> 'Мария',
            'father_name'=> 'Игоревна',
            'number_phone'=>'89312468012',
            'role'=>'1',
            'work_experience'=>'15 лет',
            'education'=>'Высшее образования педиатора-стоматолога',
            'date_of_birth' => '1981-06-06',
            'residence_address' => 'ул. Свердлова, дом 30',
            'path_img' => 'Лосукова Мария Игоревна.jpg',
        ]);
        DB::table('users')->insert([
            'email'=>'matveeva.anastasia@example.com',
            'password'=>Hash::make('qweqwe123'),
            'last_name'=>'Матвеева',
            'first_name'=> 'Анастасия',
            'father_name'=> 'Викторовна',
            'number_phone'=>'89816543210',
            'role'=>'1',
            'work_experience'=>'5 лет',
            'education'=>'Средне специальное',
            'date_of_birth' => '1983-10-19',
            'residence_address' => 'ул. Ленина, дом 40',
            'path_img' => 'Матвеева Анастасия Викторовна.jpg',
        ]);
        DB::table('users')->insert([
            'email'=>'pliskanovskiy.tikhon@example.com',
            'password'=>Hash::make('qweqwe123'),
            'last_name'=>'Плискановский',
            'first_name'=> 'Тихон',
            'father_name'=> 'Александрович',
            'number_phone'=>'89201357946',
            'role'=>'1',
            'work_experience'=>'12 лет',
            'education'=>'Средне специальное',
            'date_of_birth' => '1978-09-07',
            'residence_address' => 'ул. Комсомольская, дом 5',
            'path_img' => 'Плискановский Тихон Александрович.jpg',
        ]);
        DB::table('users')->insert([
            'email'=>'straut.evgenia@example.com',
            'password'=>Hash::make('qweqwe123'),
            'last_name'=>'Страут',
            'first_name'=> 'Евгения',
            'father_name'=> 'Александровна',
            'number_phone'=>'89052468032',
            'role'=>'1',
            'work_experience'=>'8 лет',
            'education'=>'Высшее медицинское',
            'date_of_birth' => '1990-11-07',
            'residence_address' => 'ул. Гагарина, дом 15',
            'path_img' => 'Страут Евгения Александровна.jpg',
        ]);
        DB::table('users')->insert([
            'email'=>'sumarokov.aleksey@example.com',
            'password'=>Hash::make('qweqwe123'),
            'last_name'=>'Сумароков',
            'first_name'=> 'Алексей',
            'father_name'=> 'Владимирович',
            'number_phone'=>'89856424790',
            'role'=>'1',
            'work_experience'=>'20 лет',
            'education'=>'Высшее медицинское',
            'date_of_birth' => '1980-09-04',
            'residence_address' => 'пр. Ленинградский, дом 20',
            'path_img' => 'Сумароков Алексей Владимирович.jpg',
        ]);
        DB::table('users')->insert([
            'email'=>'trubina.olgа@example.com',
            'password'=>Hash::make('qweqwe123'),
            'last_name'=>'Трубина',
            'first_name'=> 'Ольга',
            'father_name'=> 'Николаевна',
            'number_phone'=>'89163033333',
            'role'=>'1',
            'work_experience'=>'3 года',
            'education'=>'Высшее медицинское',
            'date_of_birth' => '1995-08-03',
            'residence_address' => 'ул. Байкальская, дом 35',
            'path_img' => 'Трубина Ольга Николаевна.jpg',
        ]);
        DB::table('users')->insert([
            'email'=>'sheneman.ekaterina@example.com',
            'password'=>Hash::make('qweqwe123'),
            'last_name'=>'Шенеман',
            'first_name'=> 'Екатерина',
            'father_name'=> 'Алексеевна',
            'number_phone'=>'89234567890',
            'role'=>'1',
            'work_experience'=>'9 лет',
            'education'=>'Высшее медицинское',
            'date_of_birth' => '1986-08-30',
            'residence_address' => 'ул. Карла Маркса, дом 18',
            'path_img' => 'Шенеман Екатерина Алексеевна.jpg',
        ]);
    }
}
