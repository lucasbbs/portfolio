@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-border-bottom">
                            <h2>
                                @if (isset($skill))
                                    Edit Skill
                                @else
                                    Create Skill
                                @endif
                            </h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-1 form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" value="{{ old('name', isset($skill) ? $skill->name : '') }}"
                                        class="form-control" id="name" name="name"
                                        placeholder="Skill Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 form-group">
                                    <label for="percent" class="form-label">Percent</label>
                                    <input
                                        type="number"
                                        min="0"
                                        max="100"
                                        value="{{ old('percent', isset($skill) ? $skill->percent : '') }}"
                                        class="form-control" id="percent" name="percent"
                                        placeholder="Skill Percent">
                                    @error('percent')
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
