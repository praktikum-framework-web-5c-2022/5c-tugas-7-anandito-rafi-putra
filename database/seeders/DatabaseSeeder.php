<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Extracurricular;
use App\Models\Student;
use App\Models\StudentExtracurricular;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $faker = Faker::create('id_ID');
       $faker->seed(123);
        $jurusan =["IPA","IPS"];
       for ($i=0; $i < 10; $i++) { 
        Student::create([
            'nis' => $faker->unique()->numerify('20########'),
            'nama' => $faker->firstName.' '.$faker->lastName,
            'umur' =>$faker->numberBetween(15,20),
            'jurusan'=>$faker->randomElement($jurusan)
        ]);
       }
       Extracurricular::create([
        'nama' => 'Basket'
       ]);
       Extracurricular::create([
        'nama' => 'Berenang'
       ]);
       Extracurricular::create([
        'nama' => 'Futsal'
       ]);

       StudentExtracurricular::create([
        'student_id' => '1',
        'extracurricular_id' =>'2'
       ]);
       StudentExtracurricular::create([
        'student_id' => '1',
        'extracurricular_id' =>'3'
       ]);
       StudentExtracurricular::create([
        'student_id' => '2',
        'extracurricular_id' =>'2'
       ]);
       StudentExtracurricular::create([
        'student_id' => '3',
        'extracurricular_id' =>'1'
       ]);
       StudentExtracurricular::create([
        'student_id' => '4',
        'extracurricular_id' =>'1'
       ]);
       StudentExtracurricular::create([
        'student_id' => '5',
        'extracurricular_id' =>'3'
       ]);
       StudentExtracurricular::create([
        'student_id' => '6',
        'extracurricular_id' =>'3'
       ]);

    }
}
