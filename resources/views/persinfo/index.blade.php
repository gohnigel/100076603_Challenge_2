@extends ('layout')

@section ('content')

    <!-- Personal Information tab -->
    <div id="personalInfo">
        <h1><a href="/persinfo/create" @if(!$personalInfo->isEmpty()) hidden @endif>Add Personal Info</a></h1>

        @foreach ($personalInfo as $persinfo)
        <h2>
            <a href="/persinfo/{{ $persinfo->id }}/edit">{{ $persinfo->name }}</a>
        </h2>

        <p>Gender: {{ $persinfo->gender }}</p>
        <p>Address: {{ $persinfo->address }}</p>
        <p>Country: {{ $persinfo->country }}</p>
        <p>Date of birth: {{ date_format(date_create($persinfo->dob), "d/m/Y") }}</p>
        <p>Phone number: {{ $persinfo->phone }}</p>
        <p>Email: {{ $persinfo->email }}</p>
        <p><a href="/persinfo/{{ $persinfo->id }}/delete" onclick="event.preventDefault(); if(confirm('Are you sure that you want to delete your personal information?')) document.getElementById('persinfo-delete-form').submit();">Delete</a></p>

        <form id="persinfo-delete-form" action="/persinfo/{{ $persinfo->id }}/delete" method="POST" style="display: none;">
            @csrf
            @method('delete')
        </form>

        @endforeach
    </div>

@endsection
