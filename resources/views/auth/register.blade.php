@extends('layout')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <fieldset>
            <legend>{{ __('Register') }}</legend>

            <p class="manager">* Required fields</p>

            <p>
                {{-- Name of user --}}
                <label for="name">{{ __('Name:') }}</label>
                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                <span class="manager">*</span>

                @error('name')
                    <span class="manager">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{-- Email address of user --}}
                <label for="email">{{ __('Email Address:') }}</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                <span class="manager">*</span>

                @error('email')
                    <span class="manager">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </p>


            <p>
                {{-- Password of user --}}
                <label for="password">{{ __('Password:') }}</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                <span class="manager">*</span>

                @error('password')
                    <span class="manager">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

            {{-- Confirm password of user --}}
                <label for="password-confirm">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                <span class="manager">*</span>
            </p>

            {{-- Role of user --}}
            <p>
                <label for="role">{{ __('Role:') }}</label>
                <select id="role" class="form-control @error('role') is-invalid @enderror" name="role" value="{{ old('role') }}" required autocomplete="role" autofocus onchange="selectChange()">
                    <option value="Super Admin">Super Admin</option>
                    <option value="Student" @if(DB::table('schools')->get()->isEmpty()) disabled hidden @endif>Student</option>
                </select>
                <span class="manager">*</span>

                @error('role')
                    <span class="manager">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror

                {{-- Check based on whether school exists --}}
                @if(DB::table('schools')->get()->isEmpty())
                    {{-- Values are always empty --}}
                    <input type="hidden" name="school_id" value="{{ null }}">
                    <input type="hidden" name="approve" value="{{ null }}">
                @else
                    {{-- Only choose school if role is Student --}}
                    <input type="hidden" name="school_id" id="school_id_null" value="{{ null }}">
                    <span id="a" style="display:none;">
                        <label for="school_id">{{ __('School:') }}</label>
                        <select id="school_id" class="form-control @error('school_id') is-invalid @enderror" name="school_id" value="{{ old('school_id') }}" required autocomplete="school_id" autofocus disabled>
                            @foreach(DB::table('schools')->get() as $school)
                                <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                            @endforeach
                        </select>
                        <span class="manager">*</span>
                    </span>
            </p>

            <p>
                {{-- Only request for approval if role is Student --}}
                <input type="hidden" name="approve" id="approve_null" value="{{ null }}">
                <input type="hidden" name="approve" id="approve" value="Not Approved">
            </p>


            @endif

        </fieldset>

        <p>
            <button type="submit" class="button">
                {{ __('Register') }}
            </button>
        </p>

        <p>Already made an account? <a href="{{ route('login') }}">Click here to login</a></p>
    </form>

    <script>
        function selectChange()
        {
            if(document.querySelector('#role').value == 'Super Admin'){
                // If role is Super Admin, it does not have a school
                document.getElementById('a').setAttribute('style', 'display:none');
                document.getElementById('school_id').setAttribute('disabled', 'disabled');
                document.getElementById('school_id_null').removeAttribute('disabled');

                // If role is Super Admin, it does not need approval
                document.getElementById('approve_null').removeAttribute('disabled');
                document.getElementById('approve').setAttribute('disabled', 'disabled');

            } else {
                // If role is Student, it has a school
                document.getElementById('a').setAttribute('style', 'display:inline');
                document.getElementById('school_id').removeAttribute('disabled');
                document.getElementById('school_id_null').setAttribute('disabled', 'disabled');

                // If role is Student, it needs approval
                document.getElementById('approve_null').setAttribute('disabled', 'disabled');
                document.getElementById('approve').removeAttribute('disabled');
            }
        }
    </script>
@endsection
