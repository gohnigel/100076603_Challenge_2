@extends ('layout')

@section ('content')
    <!-- Reading tab -->
    <div id="readings">
        <h1><a href="/readings/create">Add Reading</a></h1>
        @foreach ($readings as $reading)
        <h2>
            <a href="/readings/{{ $reading->id }}">{{ $reading->title }}</a>
        </h2>
        @endforeach
    </div>
@endsection
