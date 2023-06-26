@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-border-bottom">
                            <h2>
                                @if (isset($tag))
                                    Edit Tag
                                @else
                                    Create Tag
                                @endif
                            </h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-1 form-group">
                                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                                    <input type="text" value="{{ old('tag_name', isset($tag) ? $tag->name : '') }}"
                                        class="form-control" id="exampleFormControlInput1" name="name"
                                        placeholder="Tag Name">
                                    @error('name')
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
