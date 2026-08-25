<?php

namespace Database\Seeders;

use App\Models\Projects;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $projects = [

            /*
            |--------------------------------------------------------------------------
            | Professional Projects
            |--------------------------------------------------------------------------
            */

            [
                'title' => 'USAN Nepal — Live Website',

                'description' => 'A production Laravel website developed for USAN Nepal. The project includes dynamic content management and database-driven sections covering governance, sports and technology, committees, media center, services, programs, news, and events.',

                'image_url' => [
                    // Add your USAN Nepal screenshots here
                    // '/assets/images/USAN/1.png',
                    // '/assets/images/USAN/2.png',
                ],

                'technologies_used' => [
                    'Laravel',
                    'PHP',
                    'Blade',
                    'JavaScript',
                    'jQuery',
                    'Bootstrap',
                ],

                'database_used' => [
                    'MySQL',
                ],

                'hosting_platform' => 'Production',

                'order' => 1,

                'languages_used' => 'PHP, JavaScript',

                'status' => 'completed',

                'type' => 'web',

                'category' => 'professional',

                'live_url' => '',
            ],


            [
                'title' => 'Universal Hygiene & Chemicals Industries Ltd. — Live Website',

                'description' => 'A production Laravel corporate website developed for Universal Hygiene & Chemicals Industries Ltd. The website includes dynamic products, commodities, brands, blogs, testimonials, company information, and contact sections managed through a CMS.',

                'image_url' => [
                    // Add your UHCIL screenshots here
                    // '/assets/Images/UHCIL/1.png',
                    // '/assets/Images/UHCIL/2.png',
                ],

                'technologies_used' => [
                    'Laravel',
                    'PHP',
                    'Blade',
                    'JavaScript',
                    'jQuery',
                    'AJAX',
                    'Bootstrap',
                ],

                'database_used' => [
                    'MySQL',
                ],

                'hosting_platform' => 'Production',

                'order' => 2,

                'languages_used' => 'PHP, JavaScript',

                'status' => 'completed',

                'type' => 'web',

                'category' => 'professional',

                'live_url' => '',
            ],


            [
                'title' => 'Laravel Blog Website',

                'description' => 'A dynamic Laravel blog and content management system developed during my Laravel development internship. The project includes posts, categories, tags, testimonials, galleries, education, company information, authentication, CRUD operations, validation, Eloquent relationships, migrations, seeders, and AJAX-powered admin functionality.',

                'image_url' => [
                    // Use your existing DK Blog screenshots
                    // '/assets/Images/Laravel Blog Website/1.png',
                    // '/assets/Images/Laravel Blog Website/2.png',
                    // '/assets/Images/Laravel Blog Website/3.png',
                ],

                'technologies_used' => [
                    'Laravel',
                    'PHP',
                    'Blade',
                    'JavaScript',
                    'jQuery',
                    'AJAX',
                    'Bootstrap',
                ],

                'database_used' => [
                    'MySQL',
                ],

                'hosting_platform' => 'local',

                'order' => 3,

                'languages_used' => 'PHP, JavaScript',

                'status' => 'completed',

                'type' => 'web',

                'category' => 'professional',

                'live_url' => null,
            ],


            /*
            |--------------------------------------------------------------------------
            | Academic Projects
            |--------------------------------------------------------------------------
            */

            [
                'title' => 'Mind Games',

                'description' => 'A .NET MAUI mobile application containing three algorithm-based games: Tic-Tac-Toe, 8 Puzzle, and N-Queen. The application implements Alpha-Beta Pruning for Tic-Tac-Toe, A* search with Manhattan Distance for the 8 Puzzle, and Brute Force and Backtracking approaches for the N-Queen problem.',

                'image_url' => [
                    '/assets/Images/Mind Games/1.jpg',
                    '/assets/Images/Mind Games/2.jpg',
                    '/assets/Images/Mind Games/3.jpg',
                    '/assets/Images/Mind Games/4.jpg',
                    '/assets/Images/Mind Games/5.jpg',
                    '/assets/Images/Mind Games/6.jpg',
                    '/assets/Images/Mind Games/7.jpg',
                    '/assets/Images/Mind Games/8.jpg',
                    '/assets/Images/Mind Games/9.jpg',
                    '/assets/Images/Mind Games/10.jpg',
                    '/assets/Images/Mind Games/11.jpg',
                    '/assets/Images/Mind Games/12.jpg',
                    '/assets/Images/Mind Games/13.jpg',
                    '/assets/Images/Mind Games/14.jpg',
                    '/assets/Images/Mind Games/15.jpg',
                    '/assets/Images/Mind Games/16.jpg',
                    '/assets/Images/Mind Games/17.jpg',
                    '/assets/Images/Mind Games/18.jpg',
                    '/assets/Images/Mind Games/19.jpg',
                ],

                'technologies_used' => [
                    '.NET MAUI',
                ],

                'database_used' => null,

                'hosting_platform' => 'local',

                'order' => 4,

                'languages_used' => 'C#',

                'status' => 'completed',

                'type' => 'mobile',

                'category' => 'academic',

                'live_url' => null,
            ],


            [
                'title' => 'Online Food Ordering System',

                'description' => 'A web-based food ordering system developed using ASP.NET and MySQL. The system includes user authentication, food ordering, order processing, order history, and database management functionality.',

                'image_url' => [
                    '/assets/Images/Food E-commerce Website/1.png',
                    '/assets/Images/Food E-commerce Website/2.png',
                    '/assets/Images/Food E-commerce Website/3.png',
                    '/assets/Images/Food E-commerce Website/4.png',
                    '/assets/Images/Food E-commerce Website/5.png',
                ],

                'technologies_used' => [
                    'ASP.NET',
                ],

                'database_used' => [
                    'MySQL',
                ],

                'hosting_platform' => 'local',

                'order' => 5,

                'languages_used' => 'C#',

                'status' => 'completed',

                'type' => 'web',

                'category' => 'academic',

                'live_url' => null,
            ],


            [
                'title' => 'Online Clothing Recommendation System',

                'description' => 'A content-based clothing recommendation system developed using Django and MySQL. The system recommends clothing products by calculating similarity between products using cosine similarity and was developed and tested using a Kaggle dataset.',

                'image_url' => [
                    '/assets/Images/Clothing Recommendation System/1.png',
                    '/assets/Images/Clothing Recommendation System/2.png',
                    '/assets/Images/Clothing Recommendation System/3.png',
                    '/assets/Images/Clothing Recommendation System/4.png',
                    '/assets/Images/Clothing Recommendation System/5.png',
                    '/assets/Images/Clothing Recommendation System/6.png',
                    '/assets/Images/Clothing Recommendation System/7.png',
                    '/assets/Images/Clothing Recommendation System/8.png',
                    '/assets/Images/Clothing Recommendation System/9.png',
                    '/assets/Images/Clothing Recommendation System/10.png',
                    '/assets/Images/Clothing Recommendation System/11.png',
                    '/assets/Images/Clothing Recommendation System/12.png',
                    '/assets/Images/Clothing Recommendation System/13.png',
                    '/assets/Images/Clothing Recommendation System/14.png',
                    '/assets/Images/Clothing Recommendation System/15.png',
                    '/assets/Images/Clothing Recommendation System/16.png',
                    '/assets/Images/Clothing Recommendation System/17.png',
                    '/assets/Images/Clothing Recommendation System/18.png',
                    '/assets/Images/Clothing Recommendation System/19.png',
                    '/assets/Images/Clothing Recommendation System/20.png',
                    '/assets/Images/Clothing Recommendation System/21.png',
                    '/assets/Images/Clothing Recommendation System/22.png',
                    '/assets/Images/Clothing Recommendation System/23.png',
                    '/assets/Images/Clothing Recommendation System/24.png',
                    '/assets/Images/Clothing Recommendation System/25.png',
                    '/assets/Images/Clothing Recommendation System/26.png',
                    '/assets/Images/Clothing Recommendation System/27.png',
                    '/assets/Images/Clothing Recommendation System/28.png',
                    '/assets/Images/Clothing Recommendation System/29.png',
                    '/assets/Images/Clothing Recommendation System/30.png',
                    '/assets/Images/Clothing Recommendation System/31.png',
                    '/assets/Images/Clothing Recommendation System/32.png',
                    '/assets/Images/Clothing Recommendation System/33.png',
                    '/assets/Images/Clothing Recommendation System/34.png',
                    '/assets/Images/Clothing Recommendation System/35.png',
                    '/assets/Images/Clothing Recommendation System/36.png',
                ],

                'technologies_used' => [
                    'Django',
                    'scikit-learn',
                ],

                'database_used' => [
                    'MySQL',
                ],

                'hosting_platform' => 'local',

                'order' => 6,

                'languages_used' => 'Python',

                'status' => 'completed',

                'type' => 'web',

                'category' => 'academic',

                'live_url' => null,
            ],
        ];


        foreach ($projects as $project) {

            Projects::create([
                'title' => $project['title'],

                'slug' => Str::slug($project['title']),

                'short_description' => Str::limit(
                    $project['description'],
                    150
                ),

                'description' => $project['description'],

                'image_url' => $project['image_url'],

                'status' => $project['status'],

                'type' => $project['type'],

                'category' => $project['category'],

                'technologies_used' => $project['technologies_used'],

                'database_used' => $project['database_used'],

                'hosting_platform' => $project['hosting_platform'],

                'order' => $project['order'],

                'languages_used' => $project['languages_used'],

                // Only use this if your projects table
                // contains a live_url column.
                // 'live_url' => $project['live_url'],
            ]);
        }
    }
}
