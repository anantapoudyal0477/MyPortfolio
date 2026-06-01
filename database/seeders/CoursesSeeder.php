<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Courses;

class CoursesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ListOfCourses = [
            'C#',
            'Java',
           
        ];

        foreach ($ListOfCourses as $course) {
            Courses::create(['name' => $course]);
        }
    }
}
