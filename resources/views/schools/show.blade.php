@extends ('layout')

@section ('content')

    <!-- Schools tab -->
    <div id="schools">
        <h2>
            <a href="/schools/{{ $school->id }}/edit">{{ $school->school_name }}</a>
        </h2>

        <p>Date first built: {{ date_format(date_create($school->school_do), "d/m/Y") }}</p>
        <p>School description: {{ $school->school_desc }}</p>
        <p>School type: {{ $school->school_type }}</p>
        <p><a href="/schools/{{ $school->id }}/delete" onclick="event.preventDefault(); if(confirm('Are you sure that you want to delete this school?')) document.getElementById('school-delete-form').submit();">Delete</a></p>
    </div>

    <form id="school-delete-form" action="/schools/{{ $school->id }}/delete" method="POST" style="display: none;">
        @csrf
        @method('delete')
    </form>

@endsection
