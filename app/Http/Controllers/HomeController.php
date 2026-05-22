<?php

namespace App\Http\Controllers;

use App\Models\Projects;
use App\Models\Education;
use App\Models\Experience;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.index', [
            'pageTitle' => 'Home',
            'description' => 'Welcome to my portfolio!',
            'listOfProjects'=>Projects::limit(3)->get(['id','title', 'short_description', 'slug', 'image_url']),
            'education'=>Education::all(['id','institution','affiliation', 'degree', 'field_of_study', 'start_year', 'end_year']),
            'experience'=>Experience::all(['id','company_name','position', 'start_date', 'end_date', 'description']),
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
        //
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
