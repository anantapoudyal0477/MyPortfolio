<?php

namespace App\Http\Controllers\Viewer;

use App\Http\Controllers\Controller;
use Illuminate\View\View;
use Throwable;

class IndexController extends Controller
{
    public function __invoke(): View
    {
        try {
            $projects = $this->getJson('projects.json');
            $academicProjects = $this->getJson('academic-projects.json');
            $skills = $this->getJson('skills.json');
            $experience = $this->getJson('experience.json');
            $education = $this->getJson('education.json');
            $about = $this->getJson('about.json');
            $hero = $this->getJson('hero.json');

            return view('viewer.index', [
                'hero' => $hero,
                'about' => $about,
                'projects' => $projects,
                'academicProjects' => $academicProjects,
                'skills' => $skills,
                'experience' => $experience,
                'education' => $education,
            ]);
        } catch (Throwable $e) {
            report($e);
            abort(500);
        }
    }

    private function getJson(string $file): array
    {
        $path = storage_path("app/public/data/{$file}");

        return json_decode(
            file_get_contents($path),
            true
        ) ?? [];
    }
}