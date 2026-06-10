<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Projects;
use Illuminate\Support\Str;


class ProjectsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    
    public function run(): void
    {
        $projects = [
            [
                "title" => "Food E-commerce Website",
                "description" => "ASP.NET food ordering system with CRUD and admin panel.",
                "image_url" => [
                    "/assets/Images/Food E-commerce Website/1.png",
                    "/assets/Images/Food E-commerce Website/2.png",
                    "/assets/Images/Food E-commerce Website/3.png",
                    "/assets/Images/Food E-commerce Website/4.png",
                    "/assets/Images/Food E-commerce Website/5.png",
                ],
                "technologies_used" => ["ASP.NET"],    
                "database_used" => ["MySQL"],
                "languages_used" => "C#",
                "hosting_platform" => "local",
                "order" => 1,
            ],
            [
                "title" => "Online Clothing Recommendation System",
                "description" => "Django-based ML recommendation system using cosine similarity.",
                "image_url" => [
                    "/assets/Images/Clothing Recommendation System/1.png",
                    "/assets/Images/Clothing Recommendation System/2.png",
                    "/assets/Images/Clothing Recommendation System/3.png",
                    "/assets/Images/Clothing Recommendation System/4.png",
                    "/assets/Images/Clothing Recommendation System/5.png",
                    "/assets/Images/Clothing Recommendation System/6.png",
                    "/assets/Images/Clothing Recommendation System/7.png",
                    "/assets/Images/Clothing Recommendation System/8.png",
                    "/assets/Images/Clothing Recommendation System/9.png",
                    "/assets/Images/Clothing Recommendation System/10.png",
                    "/assets/Images/Clothing Recommendation System/11.png",
                    "/assets/Images/Clothing Recommendation System/12.png",
                    "/assets/Images/Clothing Recommendation System/13.png",
                    "/assets/Images/Clothing Recommendation System/14.png",
                    "/assets/Images/Clothing Recommendation System/15.png",
                    "/assets/Images/Clothing Recommendation System/16.png",
                    "/assets/Images/Clothing Recommendation System/17.png",
                    "/assets/Images/Clothing Recommendation System/18.png",
                    "/assets/Images/Clothing Recommendation System/19.png",
                    "/assets/Images/Clothing Recommendation System/20.png",
                    "/assets/Images/Clothing Recommendation System/21.png",
                    "/assets/Images/Clothing Recommendation System/22.png", 
                    "/assets/Images/Clothing Recommendation System/23.png",
                    "/assets/Images/Clothing Recommendation System/24.png",
                    "/assets/Images/Clothing Recommendation System/25.png",
                    "/assets/Images/Clothing Recommendation System/26.png",
                    "/assets/Images/Clothing Recommendation System/27.png",
                    "/assets/Images/Clothing Recommendation System/28.png",
                    "/assets/Images/Clothing Recommendation System/29.png",
                    "/assets/Images/Clothing Recommendation System/30.png",
                    "/assets/Images/Clothing Recommendation System/31.png",
                    "/assets/Images/Clothing Recommendation System/32.png",
                    "/assets/Images/Clothing Recommendation System/33.png", 
                    "/assets/Images/Clothing Recommendation System/34.png",
                    "/assets/Images/Clothing Recommendation System/35.png",
                    "/assets/Images/Clothing Recommendation System/36.png",
                ],
                "technologies_used" =>["Django","scikit-learn"],
                "database_used" => ["MySQL"],
                "hosting_platform" => "local",
                "order" => 2,
                "languages_used" => "Python",
            ],
            [
                "title" => "Personal Portfolio Website 1",
                "description" => "Static portfolio built with HTML, CSS, JS.",
                "image_url" => [
                    "/assets/Images/Personal Portfolio Website 1/1.png",
                    "/assets/Images/Personal Portfolio Website 1/2.png",
                    "/assets/Images/Personal Portfolio Website 1/3.png",
                    "/assets/Images/Personal Portfolio Website 1/4.png",
                ],
                "technologies_used" => ["HTML", "CSS"],
                "database_used" => null,
                "hosting_platform" => "github pages",
                "order" => 3,
                "languages_used" => "JavaScript",
            ],
            [
                "title" => "First Laravel Project",
                "description" => "Laravel learning project covering MVC, routes, and Eloquent.",
                "image_url" => [
                    //1 to 28
                    "/assets/Images/First Laravel Project/1.png",
                    "/assets/Images/First Laravel Project/2.png",
                    "/assets/Images/First Laravel Project/3.png",
                    "/assets/Images/First Laravel Project/4.png",   
                    "/assets/Images/First Laravel Project/5.png",
                    "/assets/Images/First Laravel Project/6.png",
                    "/assets/Images/First Laravel Project/7.png",
                    "/assets/Images/First Laravel Project/8.png",
                    "/assets/Images/First Laravel Project/9.png",
                    "/assets/Images/First Laravel Project/10.png",
                    "/assets/Images/First Laravel Project/11.png",
                    "/assets/Images/First Laravel Project/12.png",
                    "/assets/Images/First Laravel Project/13.png",
                    "/assets/Images/First Laravel Project/14.png",
                    "/assets/Images/First Laravel Project/15.png",
                    "/assets/Images/First Laravel Project/16.png",
                    "/assets/Images/First Laravel Project/17.png",
                    "/assets/Images/First Laravel Project/18.png",
                    "/assets/Images/First Laravel Project/19.png",
                    "/assets/Images/First Laravel Project/20.png",
                    "/assets/Images/First Laravel Project/21.png",
                    "/assets/Images/First Laravel Project/22.png",
                    "/assets/Images/First Laravel Project/23.png",
                    "/assets/Images/First Laravel Project/24.png",
                    "/assets/Images/First Laravel Project/25.png",
                    "/assets/Images/First Laravel Project/26.png",
                    "/assets/Images/First Laravel Project/27.png",
                    "/assets/Images/First Laravel Project/28.png",
                ],
                "technologies_used" => ["Laravel"],
                "database_used" => ["MySQL"],
                "hosting_platform" => "local",
                "order" => 4,
                "languages_used" => "PHP",
            ],
            [
                "title" => "Mind Games using MAUI",
                "description" => "Mobile app with AI-based games like Tic-Tac-Toe and N-Queen.",
                "image_url" => [
                    "/assets/Images/Mind Games/1.jpg",
                    "/assets/Images/Mind Games/2.jpg",
                    "/assets/Images/Mind Games/3.jpg",
                    "/assets/Images/Mind Games/4.jpg",
                    "/assets/Images/Mind Games/5.jpg",
                    "/assets/Images/Mind Games/6.jpg",
                    "/assets/Images/Mind Games/7.jpg",
                    "/assets/Images/Mind Games/8.jpg",
                    "/assets/Images/Mind Games/9.jpg",
                    "/assets/Images/Mind Games/10.jpg",
                    "/assets/Images/Mind Games/11.jpg",
                    "/assets/Images/Mind Games/12.jpg",
                    "/assets/Images/Mind Games/13.jpg",
                    "/assets/Images/Mind Games/14.jpg",
                    "/assets/Images/Mind Games/15.jpg",
                    "/assets/Images/Mind Games/16.jpg",
                    "/assets/Images/Mind Games/17.jpg",
                    "/assets/Images/Mind Games/18.jpg", 
                    "/assets/Images/Mind Games/19.jpg",
                ],
                "technologies_used" => ["MAUI"],
                "database_used" => null,
                "hosting_platform" => "local",
                "order" => 5,
                "languages_used" => "C#",
            ],
        ];

        foreach ($projects as $project) {
            Projects::create([
                'title' => $project['title'],
                'slug' => Str::slug($project['title']),
                'short_description' => substr($project['description'], 0, 100),
                'description' => $project['description'],
                'image_url' => $project['image_url'],
                'status' => 'completed',
                'type' => 'web',
                'category' => 'personal',
                'technologies_used' => $project['technologies_used'],
                'database_used' => $project['database_used'],
                'hosting_platform' => $project['hosting_platform'],
                'order' => $project['order'],
                'languages_used' => $project['languages_used'],
            ]);
        }
        
    }
}
