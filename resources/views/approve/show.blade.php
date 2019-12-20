@extends ('layout')

@section ('content')

    <!-- Registration approval tab -->
    <div id="students">
        <h2>
            <a href="/approve/{{ $student->id }}" onclick="event.preventDefault(); if(confirm('Are you sure that you want to approve this student?')) document.getElementById('edit-form').submit();">{{ $student->name }}</a>
        </h2>

        <p>Email: {{ $student->email }}</p>
    </div>

    <form id="edit-form" action="/approve/{{ $student->id }}" method="POST" style="display: none;">
        @csrf
        @method ('PUT')
        <input type="hidden" name="approve" value="Approved">
    </form>

@endsection
