@extends ('layout')

@section ('content')
    <!-- Form for adding school admin -->
    <form action="/schoolAdmin" method="post">
        @csrf
        <p class="manager">* Required fields</p>

        <!-- School admin details -->
        <fieldset>
            <legend>School admin registration</legend>

            <p>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" maxlength="255" required>
                <span class="manager">*</span>

                @error('name')
                <span class="manager">{{ $errors->first('name') }}</span>
                @enderror

                <label for="email">Email:</label>
                <input type="email" name="email" id="email" maxlength="255" required>
                <span class="manager">*</span>

                @error('email')
                <span class="manager">{{ $errors->first('email') }}</span>
                @enderror
            </p>

            <p>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" minlength="8" maxlength="255" required>
                <span class="manager">*</span>

                @error('password')
                <span class="manager">{{ $errors->first('password') }}</span>
                @enderror

                <label for="school_id">School</label>
                <select name="school_id" id="school_id" required>
                    @foreach ($schools as $school)
                        <option value="{{ $school->id }}">{{ $school->school_name }}</option>
                    @endforeach
                </select>

                @error('school_id')
                <span class="manager">{{ $errors->first('school_id') }}</span>
                @enderror
            </p>

            <input type="hidden" name="role" value="School Admin" required>

            @error('role')
                <p class="manager">{{ $errors->first('role') }}</p>
            @enderror

            <input type="hidden" name="approve" value="{{ null }}">

            @error('approve')
                <p class="manager">{{ $errors->first('approve') }}</p>
            @enderror

            <p><input type="submit" class="button"> <input type="reset" class="button"></p>

        </fieldset>
    </form>
@endsection
