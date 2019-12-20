<?php

namespace App\Http\Controllers;

use App\PersonalInformation;
use Auth;
use Illuminate\Http\Request;

class PersonalInformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personalInfo = PersonalInformation::where('user_id', Auth::user()->id)->latest()->get();

        return view('persinfo.index', ['personalInfo' => $personalInfo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('persinfo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        PersonalInformation::create($this->validatePersonalInformation($request));

        return redirect('/persinfo');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function show(PersonalInformation $personalInformation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('persinfo.edit', ['persinfo' => PersonalInformation::where('user_id', Auth::user()->id)->findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $personalInfo = PersonalInformation::where('user_id', Auth::user()->id)->findOrFail($id);

        $personalInfo->update($this->validatePersonalInformation($request));

        return redirect('/persinfo');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PersonalInformation  $personalInformation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        PersonalInformation::destroy($id);

        return redirect('/persinfo');
    }

    protected function validatePersonalInformation($request)
    {
        return $request->validate([
            'user_id' => 'required|integer',
            'name' => 'required|max:255',
            'gender' => 'required|max:255',
            'address' => 'required|max:255',
            'country' => 'required|max:255',
            'dob' => 'required|date',
            'phone' => 'required|max:255',
            'email' => 'required|max:255'
        ]);
    }
}
