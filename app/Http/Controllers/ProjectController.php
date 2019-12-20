<?php

namespace App\Http\Controllers;

use App\User;
use App\Project;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::where('user_id', Auth::user()->id)->latest()->get();

        return view('projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::where('role', 'Student')->latest()->get();

        return view('projects.create', ['users' => $users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateProject($request);

        Project::create([
            'user_id' => request('user_id'),
            'title' => request('title'),
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
            'status' => request('status'),
            'file' => $request->file('file')->getClientOriginalName(),
            'members' => implode(',', request('members'))
        ]);

        $request->file->storeAs('files', $request->file->getClientOriginalName());

        return redirect('/projects');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('projects.show', ['project' => Project::where('user_id', Auth::user()->id)->findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::where('role', 'Student')->latest()->get();

        return view('projects.edit', ['project' => Project::where('user_id', Auth::user()->id)->findOrFail($id), 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validateProject($request);

        $project = Project::where('user_id', Auth::user()->id)->findOrFail($id);

        $project->update([
            'user_id' => request('user_id'),
            'title' => request('title'),
            'start_date' => request('start_date'),
            'end_date' => request('end_date'),
            'status' => request('status'),
            'file' => $request->file('file')->getClientOriginalName(),
            'members' => implode(',', request('members'))
        ]);

        $request->file->storeAs('files', $request->file->getClientOriginalName());

        return redirect('/projects/' . $project->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::where('user_id', Auth::user()->id)->findOrFail($id);

        Storage::delete('files/'. $project->file);

        Project::destroy($id);

        return redirect('/projects');
    }

    protected function validateProject($request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'title' => 'required||max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'status' => 'required|max:255',
            'file' => 'required|file',
            'members' => 'required'
        ]);
    }
}
