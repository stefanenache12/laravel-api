<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

use App\Models\Type;
use App\Models\Technology;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $projects = Project::all();
        return view('admin.projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create',compact('types','technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formData = $request->all();

        $project = new Project();

        $project -> title = $formData['title'];
        $project -> description = $formData['description'];
        $project -> img_link = $formData['img_link'];
        $project -> type_id = $formData['type_id'];

        $project->save();

        if(isset($formData['technologies'])){
            foreach ($formData['technologies'] as $technologyId) {

                $project->technologies()->attach($technologyId);
            }
        }

        return redirect()->route('admin.projects.index');
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
        
        $project = Project::findOrFail($id);
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.edit',compact('project','types','technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $formData = $request->all();

        $project -> title = $formData['title'];
        $project -> description = $formData['description'];
        $project -> img_link = $formData['img_link'];
        $project -> type_id = $formData['type_id'];

        $project->save();

        if (isset($formData['technologies'])) {
            $project->technologies()->sync($formData['technologies']);
        }
        else {
            $project->technologies()->detach();
        }

        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);

        $project -> delete();

        return redirect()->route('admin.projects.index');

    }
}
