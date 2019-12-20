@extends ('layout')

@section ('content')

    <!-- Student tab -->
    <div id="students">
        <h2>
            <a href="/students/{{ $student->id }}/edit">{{ $student->name }}</a>
        </h2>

        <p>Email: {{ $student->email }}</p>
        <p><a href="/students/{{ $student->id }}/delete" onclick="event.preventDefault(); if(confirm('Are you sure that you want to delete this student?')) document.getElementById('student-delete-form').submit();">Delete</a></p>

        <form id="student-delete-form" action="/students/{{ $student->id }}/delete" method="POST" style="display: none;">
            @csrf
            @method('delete')
        </form>
    </div>

@endsection
