@extends ('layout')

@section ('content')
    <!-- Form for adding personal information -->
    <form action="/persinfo" method="post">
        @csrf
        <p class="manager">* Required fields</p>

        <!-- Personal information details -->
        <fieldset>
            <legend>Personal information of student</legend>

            <p>
                <!-- Name of student -->
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" maxlength="255" value="{{ Auth::user()->name }}" required readonly>
                <span class="manager">*</span>

                @error('name')
                <span class="manager">{{ $errors->first('name') }}</span>
                @enderror

                <!-- Gender of student -->
                <label for="">Gender:</label>
                <label for="gender_male"><input type="radio" name="gender" id="gender_male" value="Male" required>Male</label>
                <label for="gender_female"><input type="radio" name="gender" id="gender_female" value="Female" required>Female</label>
                <span class="manager">*</span>

                @error('gender')
                <span class="manager">{{ $errors->first('gender') }}</span>
                @enderror
            </p>

            <p>
                 <!-- Address of student -->
                <label for="address">Address:</label>
                <textarea name="address" id="address" cols="30" rows="" maxlength="225" required></textarea>
                <span class="manager">*</span>

                @error('address')
                <span class="manager">{{ $errors->first('address') }}</span>
                @enderror

                <!-- Country of student -->
                <label for="country">Country: </label>
                <select name="country" id="country" required>
                    <option value="Malaysia">Malaysia</option>
                    <option value="Singapore">Singapore</option>
                    <option value="Indonesia">Indonesia</option>
                    <option value="Brunei Darussalam">Brunei Darussalam</option>
                </select>
                <span class="manager">*</span>

                @error('country')
                <span class="manager">{{ $errors->first('country') }}</span>
                @enderror
            </p>

            <p>
                <!-- Date of birth of student -->
                <label for="dob">Date of birth:</label>
                <input type="date" name="dob" id="dob" required>
                <span class="manager">*</span>

                @error('dob')
                <span class="manager">{{ $errors->first('dob') }}</span>
                @enderror
            </p>

            <p>
                <!-- Phone number of student -->
                <label for="phone">Phone number:</label>
                <input type="text" name="phone" id="phone" maxlength="255" required>
                <span class="manager">*</span>

                @error('phone')
                <span class="manager">{{ $errors->first('phone') }}</span>
                @enderror

                <!-- Email of student -->
                <label for="email">Email:</label>
                <input type="email" name="email" id="email" maxlength="255" value="{{ Auth::user()->email }}" required readonly>
                <span class="manager">*</span>

                @error('email')
                <span class="manager">{{ $errors->first('email') }}</span>
                @enderror
            </p>

            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" required>

            @error('user_id')
                <p class="manager">{{ $errors->first('user_id') }}</p>
            @enderror

            <p><input type="submit" class="button"> <input type="reset" class="button"></p>

        </fieldset>
    </form>
@endsection
