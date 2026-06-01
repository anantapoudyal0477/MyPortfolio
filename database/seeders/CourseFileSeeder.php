<?php

namespace Database\Seeders;

use App\Models\CourseFile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CourseFileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $course1Files = [
            ['course_id' => 1, 'title' => 'csharp', 'file_name' => 'hello-world', 'file_path' => 'courses/csharp/hello-world.txt'],
            ['course_id' => 1, 'title' => 'csharp', 'file_name' => 'prime-number', 'file_path' => 'courses/csharp/prime-number.txt'],

            ['course_id' => 2, 'title' => 'java','folder_name' =>'', 'file_name' => 'hello-world', 'file_path' => 'courses/java/HelloWorld.java','level' => 'basic'],
            ['course_id' => 2, 'title' => 'java','folder_name' =>'', 'file_name' => 'prime-number', 'file_path' => 'courses/java/PrimeNumber.java','level' => 'basic'],
            ['course_id' => 2, 'title' => 'java','folder_name' =>'ConditionalStatement', 'file_name' => 'ConditionalStatement1', 'file_path' => 'courses/java/ConditionalStatement/ConditionalStatement1.java','level' => 'basic'],
            ['course_id' => 2, 'title' => 'java','folder_name' =>'ConditionalStatement', 'file_name' => 'ConditionalStatement2', 'file_path' => 'courses/java/ConditionalStatement/ConditionalStatement2.java','level' => 'basic'],
            ['course_id' => 2, 'title' => 'java','folder_name' =>'ConditionalStatement', 'file_name' => 'ConditionalStatement3', 'file_path' => 'courses/java/ConditionalStatement/ConditionalStatement3.java','level' => 'basic'],
            ['course_id' => 2, 'title' => 'java','folder_name' =>'ConditionalStatement', 'file_name' => 'ConditionalStatement4', 'file_path' => 'courses/java/ConditionalStatement/ConditionalStatement4.java','level' => 'basic'],
            ['course_id' => 2, 'title' => 'java','folder_name' =>'ConditionalStatement', 'file_name' => 'ConditionalStatement5', 'file_path' => 'courses/java/ConditionalStatement/ConditionalStatement5.java','level' => 'basic'],
            ['course_id' => 2, 'title' => 'java','folder_name' =>'ConditionalStatement', 'file_name' => 'ConditionalStatement6', 'file_path' => 'courses/java/ConditionalStatement/ConditionalStatement6.java','level' => 'basic'],
            ['course_id' => 2, 'title' => 'java','folder_name' =>'ConditionalStatement', 'file_name' => 'ConditionalStatement7', 'file_path' => 'courses/java/ConditionalStatement/ConditionalStatement7.java','level' => 'basic'],
            ['course_id' => 2, 'title' => 'java','folder_name' =>'ConditionalStatement', 'file_name' => 'ConditionalStatement8', 'file_path' => 'courses/java/ConditionalStatement/ConditionalStatement8.java','level' => 'basic'],
            ['course_id' => 2, 'title' => 'java','folder_name' =>'ConditionalStatement', 'file_name' => 'ConditionalStatement9', 'file_path' => 'courses/java/ConditionalStatement/ConditionalStatement9.java','level' => 'basic'],
            ['course_id' => 2, 'title' => 'java','folder_name' =>'ConditionalStatement', 'file_name' => 'ConditionalStatement10', 'file_path' => 'courses/java/ConditionalStatement/ConditionalStatement10.java','level' => 'basic'],

            ['course_id' => 2, 'title' => 'java','folder_name' =>'SwitchCase', 'file_name' => 'SwitchCase1', 'file_path' => 'courses/java/SwitchCase/SwitchCase1.java','level' => 'basic'],
            ['course_id' => 2, 'title' => 'java','folder_name' =>'SwitchCase', 'file_name' => 'SwitchCase2', 'file_path' => 'courses/java/SwitchCase/SwitchCase2.java','level' => 'basic'],
            ['course_id' => 2, 'title' => 'java','folder_name' =>'SwitchCase', 'file_name' => 'SwitchCase3', 'file_path' => 'courses/java/SwitchCase/SwitchCase3.java','level' => 'basic'],

        ];
         foreach ($course1Files as $file) {
            CourseFile::create($file);
        }

    }
}
