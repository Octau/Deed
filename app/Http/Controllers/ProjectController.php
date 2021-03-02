<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProjectRequest;
use Illuminate\Http\Request;
use App\Models\Project;
use Auth;

class ProjectController extends Controller
{
    //
    public function index(){
        $projects = Project::where('user_id', Auth::user()->id)->get();
        return view('layouts.project.project-index')->with('projects', $projects);
    }

    public function add(){
        return view('layouts.project.project-add');
    }

    public function save(CreateProjectRequest $request){
        $project = new Project;

        $project->user_id = Auth::user()->id;
        $project->project_name = $request->project_name;
        $project->description = $request->description;
        $project->status = $request->status;

        $project->save();

        return redirect()->to(route('project.index'));
    }

    public function recruit(){
        $projects = Project::where('status', 'standby')
        ->join('users', 'projects.user_id', 'users.id')
        ->select('projects.project_name', 'projects.description', 'projects.status', 'projects.created_at', 'users.name', 'users.contact_number')
        ->paginate(20);

        return view('welcome')->with('projects', $projects);
    }
}
