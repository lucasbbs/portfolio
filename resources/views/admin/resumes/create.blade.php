@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-border-bottom">
                            <h2>
                                @if (isset($resume))
                                    Edit Resume
                                @else
                                    Create Resume
                                @endif
                            </h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="section">Section</label>
                                    <select class="form-control" name="section" id="section">
                                        <option disabled {{ old('section') == null ? "selected" : "" }} value="">Select a section</option>
                                        <option {{ old('section', isset($resume) ? $resume->section : '' ) == 'summary' ? "selected" : "" }} value="summary">Summary</option>
                                        <option {{ old('section', isset($resume) ? $resume->section : '' ) == 'education' ? "selected" : "" }} value="education">Education</option>
                                        <option {{ old('section', isset($resume) ? $resume->section : '' ) == 'professional_experience' ? "selected" : "" }} value="professional_experience">Professional Experience</option>
                                    </select>
                                    @error('section')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 form-group">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" value="{{ old('title', isset($resume) ? $resume->title : '') }}"
                                        class="form-control" id="title" name="title"
                                        placeholder="Resume Title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 form-group">
                                    <label for="company" class="form-label">Company</label>
                                    <input type="text" value="{{ old('company', isset($resume) ? $resume->company : '') }}"
                                        class="form-control" id="company" name="company"
                                        placeholder="Resume Company">
                                    @error('company')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 form-group">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" value="{{ old('city', isset($resume) ? $resume->city : '') }}"
                                        class="form-control" id="city" name="city"
                                        placeholder="Resume City">
                                    @error('city')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 form-group">
                                    <label for="state" class="form-label">State</label>
                                    <input type="text" value="{{ old('state', isset($resume) ? $resume->state : '') }}"
                                        class="form-control" id="state" name="state"
                                        placeholder="Resume State">
                                    @error('state')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 form-group">
                                    <label for="country" class="form-label">Country</label>
                                    <input type="text" value="{{ old('country', isset($resume) ? $resume->country : '') }}"
                                        class="form-control" id="country" name="country"
                                        placeholder="Resume Country">
                                    @error('country')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 form-group">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input type="date" value="{{ old('start_date', isset($resume) ? $resume->start_date : '') }}"
                                        class="form-control" id="start_date" name="start_date"
                                        placeholder="Resume Start Date">
                                    @error('start_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 form-group">
                                    <label for="end_date" class="form-label">End Date</label>
                                    <input type="date" value="{{ old('end_date', isset($resume) ? $resume->end_date : '') }}"
                                        class="form-control" id="end_date" name="end_date"
                                        placeholder="Resume End Date">
                                    @error('end_date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 form-group">
                                    <label for="myeditorinstance">Description</label>
                                    <textarea class="form-control" id="myeditorinstance" rows="3" name="description">{{old('description',isset($resume) ? $resume->description : '')}}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
            
                                <button type="submit" class="btn btn-primary w-full my-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    window.onload = function() {
        const sectionSelector = document.querySelector('#section');
        sectionSelector.addEventListener('change', (e) => {
            if (e.target.value === 'summary') {
                document.querySelector('#company').setAttribute('disabled', true);
                document.querySelector('#city').setAttribute('disabled', true);
                document.querySelector('#state').setAttribute('disabled', true);
                document.querySelector('#country').setAttribute('disabled', true);
                document.querySelector('#start_date').setAttribute('disabled', true);
                document.querySelector('#end_date').setAttribute('disabled', true);
            } else {
                document.querySelector('#company').removeAttribute('disabled');
                document.querySelector('#city').removeAttribute('disabled');
                document.querySelector('#state').removeAttribute('disabled');
                document.querySelector('#country').removeAttribute('disabled');
                document.querySelector('#start_date').removeAttribute('disabled');
                document.querySelector('#end_date').removeAttribute('disabled');
            }
        })
    };
</script>
