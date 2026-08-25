<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Experience;

class ExperienceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $workData = [

            /*
            |--------------------------------------------------------------------------
            | Laravel Developer Intern
            |--------------------------------------------------------------------------
            */

            [
                'company_name' => 'D.Kedar Tech7 Pvt. Ltd.',

                'position' => 'Laravel Developer Intern',

                'start_date' => '2026-06-19',

                'end_date' => null,

                'description' => 'Working as a Laravel Developer Intern, developing and maintaining dynamic websites using Laravel, PHP, MySQL, Blade, JavaScript, jQuery, AJAX, and Bootstrap. Implemented CRUD operations, database migrations, seeders, Eloquent relationships, validation, authentication, and CMS functionality. Developed reusable admin-panel components and dynamic sections including banners, galleries, testimonials, products, blogs, company information, and contact forms. Contributed to three client projects, including a blog website and two live production websites, while gaining practical experience in debugging, Git, database management, deployment, and production-oriented Laravel applications.',
            ],

            /*
            |--------------------------------------------------------------------------
            | Web Development Intern
            |--------------------------------------------------------------------------
            */

            [
                'company_name' => 'Civil Aviation Authority of Nepal (CAAN)',

                'position' => 'Web Development Intern',

                'start_date' => '2024-11-25',

                'end_date' => '2025-02-04',

                'description' => 'Worked as a Web Development Intern at the Civil Aviation Authority of Nepal, gaining practical experience with Laravel, PHP, MySQL, HTML, CSS, and JavaScript. Developed components for an airport informational website using Laravel MVC architecture, routing, and controllers. Assisted in developing a content management system for managing airport information and gained practical knowledge of web hosting and deployment.',
            ],

        ];

        foreach ($workData as $work) {
            Experience::create($work);
        }
    }
}
