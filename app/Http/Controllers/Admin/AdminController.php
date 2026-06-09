<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Contact;
use App\Models\CourseFile;
use App\Models\Courses;
use App\Models\Education;
use App\Models\Experience;
use App\Models\Projects;

class AdminController extends Controller
{
    /**
     * Display dashboard
     */
    public function index()
    {
        $data = $this->retrieveData();

        return view('admin.index', $data);
    }

    /**
     * Retrieve all dashboard data
     */
    private function retrieveData()
    {
        return [
            'contacts'     => Contact::latest()->get(),
            'courseFiles'  => CourseFile::latest()->get(),
            'courses'      => Courses::latest()->get(),
            'education'    => Education::latest()->get(),
            'experience'   => Experience::latest()->get(),
            'projects'     => Projects::latest()->get(),
        ];
    }

    // -----------------------------
    // Resource methods (future use)
    // -----------------------------

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}