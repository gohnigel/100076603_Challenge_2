@extends ('layout')

@section ('content')

    <!-- Project tab -->
    <div id="projects">
        <h1><a href="/projects/create">Add Project</a></h1>
        @foreach ($projects as $project)
        <h2>
            <a href="/projects/{{ $project->id }}">{{ $project->title }}</a>
        </h2>
        @endforeach
    </div>

@endsection
