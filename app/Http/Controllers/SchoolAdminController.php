<?php

namespace App\Http\Controllers;

use App\User;
use App\School;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SchoolAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schoolAdmins = User::latest()->where('role', 'School Admin')->get();

        return view('schoolAdmin.index', ['schoolAdmins' => $schoolAdmins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $schools = School::latest()->get();

        // Shows a view to create a resource.
        return view('schoolAdmin.create', compact('schools'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:users',
            'password' => 'required|min:8|max:255',
            'school_id' => 'nullable',
            'role' => 'required',
            'approve' => 'nullable'
        ]);

        User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
            'school_id' => $request['school_id'],
            'approve' => $request['approve']
        ]);

        return redirect('/schoolAdmin');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('schoolAdmin.show', ['schoolAdmin' => User::where('role', 'School Admin')->findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('schoolAdmin.edit', ['schoolAdmin' => User::where('role', 'School Admin')->findOrFail($id), 'schools' => School::latest()->get()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $schoolAdmin = User::where('role', 'School Admin')->findOrFail($id);

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|min:8|max:255',
            'school_id' => 'nullable',
            'role' => 'required',
            'approve' => 'nullable'
        ]);

        $schoolAdmin->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
            'school_id' => $request['school_id'],
            'approve' => $request['approve'],
        ]);

        return redirect('/schoolAdmin/' . $schoolAdmin->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return redirect('/schoolAdmin');
    }

}
