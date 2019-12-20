@extends ('layout')

@section ('content')
    <!-- Form for adding schools -->
    <form action="/schools/{{ $school->id }}" method="post">
        @csrf
        @method('PUT')
        <p class="manager">* Required fields</p>

        <!-- School details -->
        <fieldset>
            <legend>School details</legend>

            <p>
                <label for="school_name">School name:</label>
                <input type="text" name="school_name" id="school_name" maxlength="255" required value="{{ $school->school_name }}">
                <span class="manager">*</span>

                @error('school_name')
                <span class="manager">{{ $errors->first('school_name') }}</span>
                @enderror

                <label for="school_do">Date built:</label>
                <input type="date" name="school_do" id="school_do" required value="{{ $school->school_do }}">
                <span class="manager">*</span>

                @error('school_do')
                <span class="manager">{{ $errors->first('school_do') }}</span>
                @enderror
            </p>

            <p>
                <label for="school_desc">School description:</label>
                <textarea class="textarea" name="school_desc" id="school_desc" required>{{ $school->school_desc }}</textarea>

                @error('school_desc')
                <span class="manager">{{ $errors->first('school_desc') }}</span>
                @enderror

                <label for="school_type">School type:</label>
                <select name="school_type" id="school_type" required>
                    <option value="Public government school" @if( $school->school_type == "Public government school") selected @endif >Public government school</option>
                    <option value="Private Chinese medium school" @if( $school->school_type == "Private Chinese medium school") selected @endif>Private Chinese medium school</option>
                    <option value="Private Tamil medium school" @if( $school->school_type == "Private Tamil medium school") selected @endif>Private Tamil medium school</option>
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
