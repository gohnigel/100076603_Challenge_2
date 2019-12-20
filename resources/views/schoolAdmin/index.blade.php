@extends ('layout')

@section ('content')

    <!-- School admin tab -->
    <div id="schoolAdmin">
        <h1><a href="/schoolAdmin/create">Add School Admin</a></h1>
        @foreach ($schoolAdmins as $schoolAdmin)
        <h2>
            <a href="/schoolAdmin/{{ $schoolAdmin->id }}">{{ $schoolAdmin->name }}</a>
        </h2>
        @endforeach
    </div>

@endsection
