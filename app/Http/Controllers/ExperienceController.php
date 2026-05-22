<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    //
    public function index()
    {
        return view('pages.experience.index', [
            'pageTitle' => 'Experience',
            'experiences' => Experience::all()
        ]);
    }
}
