@extends ('layout')

@section ('content')

    <!-- Registration approval tab -->
    <div id="students">
        @forelse ($students as $student)
        <h2>
            <a href="/approve/{{ $student->id }}">{{ $student->name }}</a>
        </h2>
        @empty
        <h2>All students have been approved</h2>
        @endforelse
    </div>

@endsection
