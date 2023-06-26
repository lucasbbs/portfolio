@extends('admin.admin_master')


@section('admin')
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>
                    @if (isset($about))
                        Edit Home About
                    @else
                        Create Home About
                    @endif
                </h2>
            </div>
            <div class="card-body">
                <form action="{{ $route }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="date_of_birth">Date of birth</label>
                        <input type="date" name="date_of_birth" class="form-control" id="date_of_birth"
                            placeholder="Home About date_of_birth"
                            value="{{ old('date_of_birth', isset($about) ? $about->date_of_birth : '') }}">
                        @error('date_of_birth')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="profession">Profession</label>
                        <input class="form-control" id="profession" name="profession" value="{{ old('profession', isset($about) ? $about->profession : '') }}">
                        @error('profession')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input class="form-control" id="phone" name="phone" value="{{ old('phone', isset($about) ? $about->phone : '') }}">
                        @error('phone')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" name="email" value="{{old('email', isset($about) ? $about->email : '')}}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input class="form-control" id="website" name="website" value="{{old('website', isset($about) ? $about->website : '')}}">
                        @error('website')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input class="form-control" id="city" name="city" value="{{old('city', isset($about) ? $about->city : '')}}">
                        @error('city')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label>
                        <input class="form-control" id="country" name="country" value="{{old('country', isset($about) ? $about->country : '')}}">
                        @error('country')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="freelance">Freelance</label>
                        <input style="width: 18px" type="checkbox" class="form-control" id="freelance" name="freelance" value="1" @if(old('freelance', isset($about) ? $about->freelance == '1' : false)) checked @endif>
                        @error('freelance')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="degree">Degree</label>
                        <input class="form-control" id="degree" name="degree" value="{{old('degree', isset($about) ? $about->degree : '')}}">
                        @error('degree')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="form-footer pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
