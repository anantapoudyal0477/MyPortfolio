<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Education;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
$educationData = [
    [
        'institution' => 'Patan Multiple Campus',
        'affiliation' => 'Tribhuvan University',
        'degree' => 'Master of Computer Application',
        'field_of_study' => 'Computer Application',
        'location' => 'Patan Dhoka, Lalitpur',
        'start_year' => 2026,
        'end_year' => null,
        'status' => 'ongoing',
        'gpa' => null,
        'order' => 1,
        'note' => 'Expected Graduation: 2028',
    ],
    [
        'institution' => 'Patan Multiple Campus',
        'affiliation' => 'Tribhuvan University',
        'degree' => 'Bachelor of Computer Application',
        'field_of_study' => 'Computer Application',
        'location' => 'Patan Dhoka, Lalitpur',
        'start_year' => 2021,
        'end_year' => 2026,
        'status' => 'completed',
        'gpa' => 3.4,
        'order' => 2,
        'note' => null,
    ],
    [
        'institution' => 'Capital Secondary School',
        'affiliation' => 'National Examination Board',
        'degree' => '+2 Management',
        'field_of_study' => 'Management',
        'location' => 'Koteshwor, Kathmandu',
        'start_year' => 2018,
        'end_year' => 2020,
        'status' => 'completed',
        'gpa' => 3.10,
        'order' => 3,
        'note' => null,
    ],
    [
        'institution' => 'Kanjirowa National School',
        'affiliation' => 'National Examination Board',
        'degree' => 'Secondary Education Examination (SEE)',
        'field_of_study' => 'General',
        'location' => 'Kathmandu',
        'end_year' => 2016,
        'status' => 'completed',
        'gpa' => 3.05,
        'order' => 4,
        'note' => null,
    ],
];

        foreach ($educationData as $education) {
            Education::create($education);
        }   
    }
}
