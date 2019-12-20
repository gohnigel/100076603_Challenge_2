@extends ('layout')

@section ('content')
    <!-- Form for adding projects -->
<form action="/projects/{{ $project->id }}" method="post" enctype="multipart/form-data" autocomplete="off">
        @csrf
        @method('PUT')
        <p class="manager">* Required fields</p>

        <!-- Project details -->
        <fieldset>
            <legend>Project details</legend>

            <p>
                {{-- Title of the project --}}
                <label for="title">Project title:</label>
                <input type="text" name="title" id="title" maxlength="255" value="{{ $project->title }}" required>
                <span class="manager">*</span>

                @error('title')
                <span class="manager">{{ $errors->first('title') }}</span>
                @enderror
            </p>

            <p>
                {{-- Starting date of the project --}}
                <label for="start_date">Start date:</label>
                <input type="date" name="start_date" id="start_date" value="{{ $project->start_date }}" required>
                <span class="manager">*</span>

                @error('start_date')
                <span class="manager">{{ $errors->first('start_date') }}</span>
                @enderror

                {{-- Ending date of the project --}}
                <label for="end_date">End date:</label>
                <input type="date" name="end_date" id="end_date" value="{{ $project->end_date }}" required>
                <span class="manager">*</span>

                @error('end_date')
                <span class="manager">{{ $errors->first('end_date') }}</span>
                @enderror
            </p>

            <p>
                {{-- Status of the project --}}
                <label for="status">Status:</label>
                <select name="status" id="status" required>
                    <option value="Completed" @if($project->status == "Completed") selected @endif>Completed</option>
                    <option value="Not completed" @if($project->status == "Not completed") selected @endif>Not completed</option>
                </select>
                <span class="manager">*</span>

                @error('status')
                <span class="manager">{{ $errors->first('status') }}</span>
                @enderror
            </p>

            <p>
                {{-- File used for the project --}}
                <a href="/storage/{{ $project->file }}" target="_blank">{{ $project->file }}</a>
                <label for="file">File:</label>
                <input type="file" name="file" id="file" maxlength="225" required>
                <span class="manager">*</span>
            </p>

            <p>
                {{-- Members of project --}}
                <label for="members">Members:</label>
                <select name="members[]" id="members" multiple required>
                    @foreach($users as $user)
                        <option value="{{ $user->name }}" @if(explode(",", $project->members)) selected @endif>{{ $user->name }}</option>
                    @endforeach
                </select>
                <span class="manager">*</span>

                @error('member_id')
                <span class="manager">{{ $errors->first('member_id') }}</span>
                @enderror
            </p>

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

            <p><input type="submit" class="button"> <input type="reset" class="button"></p>

        </fieldset>
    </form>

@endsection
