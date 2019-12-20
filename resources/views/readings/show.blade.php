@extends ('layout')

@section ('content')
    <!-- Reading tab -->
    <div id="readings">
        <h2>
            <a href="/readings/{{ $reading->id }}/edit">{{ $reading->title }}</a>
        </h2>

        <p>DOI: {{ $reading->doi }}</p>
        <p>Year: {{ $reading->year }}</p>
        <p>Type: {{ $reading->type }}</p>
        <p><a href="/readings/{{ $reading->id }}/delete" onclick="event.preventDefault(); if(confirm('Are you sure that you want to delete your reading?')) document.getElementById('reading-delete-form').submit();">Delete</a></p>

        <form id="reading-delete-form" action="/readings/{{ $reading->id }}/delete" method="POST" style="display: none;">
            @csrf
            @method('delete')
        </form>
    </div>
@endsection
