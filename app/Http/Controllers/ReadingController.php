<?php

namespace App\Http\Controllers;

use App\Reading;
use Auth;
use Illuminate\Http\Request;

class ReadingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $readings = Reading::where('user_id', Auth::user()->id)->latest()->get();

        return view('readings.index', ['readings' => $readings]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('readings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Reading::create($this->validateReading($request));

        return redirect('/readings');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('readings.show', ['reading' => Reading::where('user_id', Auth::user()->id)->findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('readings.edit', ['reading' => Reading::where('user_id', Auth::user()->id)->findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reading = Reading::where('user_id', Auth::user()->id)->findOrFail($id);

        $reading->update($this->validateReading($request));

        return redirect('/readings/' . $reading->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Reading  $reading
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Reading::destroy($id);

        return redirect('/readings');
    }

    protected function validateReading($request)
    {
        return $request->validate([
            'user_id' => 'required|integer',
            'title' => 'required|max:255',
            'doi' => 'required|integer|max:99999999999',
            'year' => 'required|integer|max:99999999999',
            'type' => 'required|max:255'
        ]);
    }
}
