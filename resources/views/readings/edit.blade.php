@extends ('layout')

@section ('content')
    <!-- Form for adding readings -->
    <form action="/readings/{{ $reading->id }}" method="post">
        @csrf
        @method('PUT')
        <p class="manager">* Required fields</p>

        <!-- Reading details -->
        <fieldset>
            <legend>Reading details</legend>

            <p>
                {{-- Title of the reading --}}
                <label for="title">Reading title:</label>
                <input type="text" name="title" id="title" maxlength="255" value="{{ $reading->title }}" required>
                <span class="manager">*</span>

                @error('title')
                <span class="manager">{{ $errors->first('title') }}</span>
                @enderror
            </p>

            <p>
                {{-- Title of the reading --}}
                <label for="doi">DOI:</label>
            <input type="number" name="doi" id="doi" max="99999999999" value="{{ $reading->doi }}" required>
                <span class="manager">*</span>

                @error('doi')
                <span class="manager">{{ $errors->first('doi') }}</span>
                @enderror

                {{-- Title of the reading --}}
                <label for="year">Year:</label>
                <input type="number" name="year" id="year" max="99999999999" value="{{ $reading->year }}" required>
                <span class="manager">*</span>

                @error('year')
                <span class="manager">{{ $errors->first('year') }}</span>
                @enderror
            </p>

            <p>
                {{-- Type of the reading --}}
                <label for="type">Type:</label>
                <select name="type" id="type" required>
                        <option value="Book" @if($reading->type == "Book") selected @endif>Book</option>
                        <option value="Magazine" @if($reading->type == "Magazine") selected @endif>Magazine</option>
                </select>
                <span class="manager">*</span>

                @error('type')
                <span class="manager">{{ $errors->first('type') }}</span>
                @enderror
            </p>

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <p><input type="submit" class="button"> <input type="reset" class="button"></p>

        </fieldset>
    </form>

@endsection
