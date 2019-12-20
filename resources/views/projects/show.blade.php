@extends ('layout')

@section ('content')

    <!-- Project tab -->
    <div id="projects">
        <h2>
            <a href="/projects/{{ $project->id }}/edit">{{ $project->title }}</a>
        </h2>

        <p>Start date: {{ date_format(date_create($project->start_date), "d/m/Y") }}</p>
        <p>End date: {{ date_format(date_create($project->end_date), "d/m/Y") }} </p>
        <p>File: <a href="/storage/files/{{ $project->file }}" target="_blank">{{ $project->file }}</a></p>
        <p>Members: {{ $project->members }}</p>
        <p><a href="/projects/{{ $project->id }}/delete" onclick="event.preventDefault(); if(confirm('Are you sure that you want to delete your project?')) document.getElementById('project-delete-form').submit();">Delete</a></p>

        <form id="project-delete-form" action="/projects/{{ $project->id }}/delete" method="POST" style="display: none;">
            @csrf
            @method('delete')
        </form>
    </div>

@endsection
