<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Project;

class MainController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return view('guest.welcome',compact('projects'));
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);

        return view('guest.show',compact('project'));

    }
}
