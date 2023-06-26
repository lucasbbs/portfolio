@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-border-bottom">
                            <h2>
                                @if (isset($portfolio))
                                    Edit Portfolio
                                @else
                                    Create Portfolio
                                @endif
                            </h2>
                        </div>
                        <div class="card-body">
                            <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-1 form-group">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text"
                                        value="{{ old('name', isset($portfolio) ? $portfolio->name : '') }}"
                                        class="form-control" id="name" name="name" placeholder="Portfolio Name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Category</label>
                                    <select class="form-control" name="tag" id="exampleFormControlSelect1">
                                        <option disabled {{ old('tag') == null ? 'selected' : '' }} value="">Select a
                                            tag</option>
                                        @foreach ($tags as $tag)
                                            <option
                                                {{ old('tag', isset($tag) ? $tag->id : '') == (isset($portfolio) ? $portfolio->tag->id : '0') ? 'selected' : '' }}
                                                value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tag')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 form-group">
                                    <label for="date" class="form-label">Date</label>
                                    <input type="date"
                                        value="{{ old('date', isset($portfolio) ? $portfolio->date : '') }}"
                                        class="form-control" id="date" name="date">
                                    @error('date')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 form-group">
                                    <label for="client" class="form-label">Client</label>
                                    <input type="text"
                                        value="{{ old('client', isset($portfolio) ? $portfolio->client : '') }}"
                                        class="form-control" id="client" name="client" placeholder="Portfolio Client">
                                    @error('client')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 form-group">
                                    <label for="url" class="form-label">Url</label>
                                    <input type="text"
                                        value="{{ old('url', isset($portfolio) ? $portfolio->url : '') }}"
                                        class="form-control" id="url" name="url" placeholder="Portfolio Url">
                                    @error('url')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 form-group">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text"
                                        value="{{ old('title', isset($portfolio) ? $portfolio->title : '') }}"
                                        class="form-control" id="title" name="title" placeholder="Portfolio Title">
                                    @error('title')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-1 form-group">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" id="description" name="description" placeholder="Portfolio Description">{{ old('description', isset($portfolio) ? $portfolio->description : '') }}</textarea>
                                    @error('description')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                @if (isset($portfolio))
                                    <div class="mb-1 form-group">
                                        <label for="old_image" class="form-label">Old Image</label>
                                        <img src="{{ asset($portfolio->image) }}" alt="{{ $portfolio->name }}"
                                            style="width: 100px; height: 100px;">
                                        <input type="hidden" name="old_image" value="{{ $portfolio->image }}">
                                    </div>
                                @endif
                                <div class="mb-1 form-group">
                                    <label for="image" class="form-label">Image</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    @error('image')
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
