<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Experience;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workData= [
            [
                'company_name' => 'Civil Avaiation Authority of Nepal (CAAN)',
                'position' => 'internship',
                'start_date' => '2022-01-01',
                'end_date' => '2022-06-30',
                'description' => 'Internship at CAAN IT Department, this internship help me learn about laravel and mvc concept, as well as web hosting'
            ],
           
        ];
        foreach($workData as $work){
            Experience::create($work);
        }
    }
}
