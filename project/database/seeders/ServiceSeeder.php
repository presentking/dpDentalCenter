<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('services')->insert([
            'name'=>'Первичный осмотр',
            'price'=>'5000',
            'specialization_id'=>'5',

        ]);
        DB::table('services')->insert([
            'name'=>'Удаление зуба',
            'price'=>'6000',
            'specialization_id'=>'4',

        ]);
        DB::table('services')->insert([
            'name'=>'Чистка зубов',
            'price'=>'2000',
            'specialization_id'=>'6',

        ]);
        DB::table('services')->insert([
            'name'=>'Консультация ортодонта',
            'price'=>'5700',
            'specialization_id'=>'2',

        ]);
        DB::table('services')->insert([
            'name'=>'Лечение кариеса',
            'price'=>'1990',
            'specialization_id'=>'1',

        ]);
        DB::table('services')->insert([
            'name'=>'Установка пломбы',
            'price'=>'12000',
            'specialization_id'=>'1',

        ]);
        DB::table('services')->insert([
            'name'=>'Лечение стоматита',
            'price'=>'2000',
            'specialization_id'=>'1',

        ]);
        DB::table('services')->insert([
            'name'=>'Депульпирование зуба',
            'price'=>'15000',
            'specialization_id'=>'1',

        ]);
        DB::table('services')->insert([
            'name'=>'Удаление зуба мудрости',
            'price'=>'3000',
            'specialization_id'=>'4',

        ]);
        DB::table('services')->insert([
            'name'=>'Удаление зуба под наркозом',
            'price'=>'8700',
            'specialization_id'=>'4',

        ]);
        DB::table('services')->insert([
            'name'=>'Удаление корня зуба',
            'price'=>'5500',
            'specialization_id'=>'4',

        ]);
        DB::table('services')->insert([
            'name'=>'Удаление эпулиса',
            'price'=>'5400',
            'specialization_id'=>'4',

        ]);
        DB::table('services')->insert([
            'name'=>'Установка брекетов',
            'price'=>'184000',
            'specialization_id'=>'2',

        ]);
        DB::table('services')->insert([
            'name'=>'Установка пластинок на зубы',
            'price'=>'35000',
            'specialization_id'=>'2',

        ]);
        DB::table('services')->insert([
            'name'=>'Установка элайнеров',
            'price'=>'345450',
            'specialization_id'=>'2',

        ]);
        DB::table('services')->insert([
            'name'=>'Лечение молочных зубов',
            'price'=>'7000',
            'specialization_id'=>'5',

        ]);
        DB::table('services')->insert([
            'name'=>'Удаление зубов у детей',
            'price'=>'4250',
            'specialization_id'=>'5',

        ]);
        DB::table('services')->insert([
            'name'=>'Пломбирование зубов у детей',
            'price'=>'5900',
            'specialization_id'=>'5',

        ]);
        DB::table('services')->insert([
            'name'=>'Лечение кариеса у детей',
            'price'=>'5900',
            'specialization_id'=>'5',

        ]);
        DB::table('services')->insert([
            'name'=>'Удаление зубов под наркозом у детей',
            'price'=>'7900',
            'specialization_id'=>'5',

        ]);
        DB::table('services')->insert([
            'name'=>'Бандажное кольцо с распоркой',
            'price'=>'19000',
            'specialization_id'=>'2',

        ]);
        DB::table('services')->insert([
            'name'=>'Аппарат Френкеля',
            'price'=>'49900',
            'specialization_id'=>'2',

        ]);
        DB::table('services')->insert([
            'name'=>'Изготовление диагностической модели',
            'price'=>'1420',
            'specialization_id'=>'2',

        ]);
    }
}
