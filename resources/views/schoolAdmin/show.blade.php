@extends ('layout')

@section ('content')

    <!-- School admin tab -->
    <div id="schoolAdmin">
        <h2>
            <a href="/schoolAdmin/{{ $schoolAdmin->id }}/edit">{{ $schoolAdmin->name }}</a>
        </h2>

        <p>Email: {{ $schoolAdmin->email }}</p>
        <p><a href="/schoolAdmin/{{ $schoolAdmin->id }}/delete" onclick="event.preventDefault(); if(confirm('Are you sure that you want to delete this school admin?')) document.getElementById('schoolAdmin-delete-form').submit();">Delete</a></p>

        <form id="schoolAdmin-delete-form" action="/schoolAdmin/{{ $schoolAdmin->id }}/delete" method="POST" style="display: none;">
            @csrf
            @method('delete')
        </form>
    </div>

@endsection
