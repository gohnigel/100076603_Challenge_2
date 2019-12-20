<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>School Network Platform</title>
        <link rel="stylesheet" href="/css/style.css">
    </head>
    <body>
        <nav>
            <h1 class="title">School Network Platform</h1>
            <h1 class="profile" @guest style="display: none;" @endguest><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Logout') }}</a></h1>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <h1 class="profile" @guest style="display: none;" @endguest>
                @auth
                    {{ Auth::user()->name }}
                @endauth
            </h1>
        </nav>

        <ul>
            <li><a href="/">Home page</a></li>
            <li style="@guest display: none; @else @if(Auth::user()->role != 'Super Admin') display:none; @endif @endguest"><a href="/schools">School dashboard</a></li>
            <li style="{{ DB::table('schools')->get()->isEmpty() ? 'display:none;' : '' }} @guest display:none; @else @if(Auth::user()->role != 'Super Admin') display:none; @endif @endguest"><a href="/schoolAdmin">School Admin dashboard</a></li>
            <li style="{{ DB::table('schools')->get()->isEmpty() ? 'display:none;' : '' }} @guest display:none; @else @if(Auth::user()->role != 'School Admin') display:none; @endif @endguest"><a href="/approve">Registration approval dashboard</a></li>
            <li style="{{ DB::table('schools')->get()->isEmpty() ? 'display:none;' : '' }} @guest display:none; @else @if(Auth::user()->role == 'Student') display:none; @endif @endguest"><a href="/students">Student dashboard</a></li>
            <li style="{{ DB::table('schools')->get()->isEmpty() ? 'display:none;' : '' }} @guest display:none; @else @if(Auth::user()->role != 'Student') display:none; @endif @endguest"><a href="/persinfo">Personal Information</a></li>
            <li style="{{ DB::table('schools')->get()->isEmpty() ? 'display:none;' : '' }} @guest display:none; @else @if(Auth::user()->role != 'Student') display:none; @endif @endguest"><a href="/projects">Project dashboard</a></li>
            <li style="{{ DB::table('schools')->get()->isEmpty() ? 'display:none;' : '' }} @guest display:none; @else @if(Auth::user()->role != 'Student') display:none; @endif @endguest"><a href="/readings">Readings dashboard</a></li>
        </ul>
        <section>
            @yield ('content')
        </section>
    </body>
</html>
