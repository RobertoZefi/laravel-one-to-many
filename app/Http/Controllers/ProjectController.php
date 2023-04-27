<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Type;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        $data = [
            'projects' => $projects
        ];

        return view('projects.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::orderBy('type', 'asc')->get();
        return view('projects.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProjectRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validate([
            'title' => 'required|max:255|min:2',
            'client' => 'required|string|min:2',
            'description' => 'required',
            'type_id' => 'nullable|exists:types,id',
        ]);

        $data['slug'] = Str::slug($data['title']);

        $new_project = Project::create($data);

        /*$new_project = new Project;
        $new_project->title = $data['title'];
        $new_project->client = $data['client'];
        $new_project->description = $data['description'];
        $new_project->slug = $data['slug'];
        $new_project->type_id = $data['type_id'];

        $new_project->save();*/

        return to_route('projects.show', $new_project);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $types = Type::orderBy('type', 'asc')->get();
        return view('projects.edit', compact('project','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProjectRequest  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProjectRequest $request, Project $project)
    {
        $data = $request->validate([
            'title' => 'required|max:255|min:2',
            'client' => 'required|string|min:2',
            'description' => 'required',
            'type_id' => 'nullable|exists:types,id',
        ]);

        if ($data['title'] !== $project->title) {
            $data['slug'] = Str::slug($data['title']);
        }

        $project->update($data);

        /*$project->title = $data['title'];
        $project->client = $data['client'];
        $project->description = $data['description'];

        $project->save();*/

        return to_route('projects.show', $project);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return to_route('projects.index');
    }
}
