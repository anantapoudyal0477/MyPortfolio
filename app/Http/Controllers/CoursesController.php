<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $listOfCourses = Courses::all();
        return view('pages.courses.index',[
            'pageTitle' => 'Courses',
            'listOfCourses' => $listOfCourses
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $course = Courses::findOrFail($id);
        $listOfFilesRelatedToCourse = $course->files()
        
        ->get();
        return view('pages.courses.show',[
            'pageTitle' => $course->name,
            'course' => $course,
            'listOfFilesRelatedToCourse' => $listOfFilesRelatedToCourse
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
