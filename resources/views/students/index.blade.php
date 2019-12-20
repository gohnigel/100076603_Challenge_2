@extends ('layout')

@section ('content')

    <!-- Student tab -->
    <div id="students">
        <h1><a href="/students/create">Add Student</a></h1>
        @foreach ($students as $student)
        <h2>
            <a href="/students/{{ $student->id }}">{{ $student->name }}</a>
        </h2>
        @endforeach
    </div>

@endsection
