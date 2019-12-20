@extends ('layout')

@section ('content')
    <!-- Schools tab -->
    <div id="schools">
        <h1><a href="/schools/create">Add Schools</a></h1>
        @foreach ($schools as $school)
        <h2>
            <a href="/schools/{{ $school->id }}">{{ $school->school_name }}</a>
        </h2>

        <p>Date first built: {{ date_format(date_create($school->school_do), "d/m/Y") }}</p>
        @endforeach
    </div>
@endsection
