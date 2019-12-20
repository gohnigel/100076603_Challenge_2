@extends ('layout')

@section ('content')
    <!-- Form for adding schools -->
    <form action="/schools" method="post">
        @csrf
        <p class="manager">* Required fields</p>

        <!-- School details -->
        <fieldset>
            <legend>School details</legend>

            <p>
                <label for="school_name">School name:</label>
                <input type="text" name="school_name" id="school_name" maxlength="255" required>
                <span class="manager">*</span>

                @error('school_name')
                <span class="manager">{{ $errors->first('school_name') }}</span>
                @enderror

                <label for="school_do">Date built:</label>
                <input type="date" name="school_do" id="school_do" required>
                <span class="manager">*</span>

                @error('school_do')
                <span class="manager">{{ $errors->first('school_do') }}</span>
                @enderror
            </p>

            <p>
                <label for="school_desc">School description:</label>
                <textarea class="textarea" name="school_desc" id="school_desc" required></textarea>

                @error('school_desc')
                <span class="manager">{{ $errors->first('school_desc') }}</span>
                @enderror

                <label for="school_type">School type:</label>
                <select name="school_type" id="school_type" required>
                    <option value="Public government school">Public government school</option>
                    <option value="Private Chinese medium school">Private Chinese medium school</option>
                    <option value="Private Tamil medium school">Private Tamil medium school</option>
                </select>
                <span class="manager">*</span>

                @error('school_type')
                <span class="manager">{{ $errors->first('school_type') }}</span>
                @enderror
            </p>

            <p><input type="submit" class="button"> <input type="reset" class="button"></p>

        </fieldset>
    </form>
@endsection
