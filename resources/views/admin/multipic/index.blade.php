@extends('admin.admin_master')
@section('admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Portfolios <b></b>
            <!-- {{ __('Dashboard') }} -->
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class="row w-100">
                <div class="w-100 row flex-row justify-content-between align-items-center">
                    <h2>Portfolios</h2>
                    <a href="{{ route('add.portfolio') }}"><button class="btn btn-info">Add Portfolio</button></a>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="card-header">All Portfolios</div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="10%">ID</th>
                                    <th scope="col" width="20%">Name</th>
                                    <th scope="col" width="20%">Percent</th>
                                    <th scope="col" width="15%">Created At</th>
                                    <th scope="col" width="15%">Updated At</th>
                                    <th scope="col" width="20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($portfolios as $portfolio)
                                    <tr>
                                        <td>{{ $portfolio->id }}</td>
                                        <td>{{ $portfolio->name }}</td>
                                        <td>{{ $portfolio->percent }}</td>
                                        <td> {{ Carbon\Carbon::parse($portfolio->created_at)->diffForHumans() }} </td>
                                        <td> {{ Carbon\Carbon::parse($portfolio->updated_at)->diffForHumans() }} </td>
                                        <td>
                                            <a href="{{ url('portfolio/edit/' . $portfolio->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('portfolio/delete/' . $portfolio->id) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



{{-- @extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="card-group">
                        <div class="card-header">All Skills</div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="10%">ID</th>
                                    <th scope="col" width="20%">Name</th>
                                    <th scope="col" width="20%">Percent</th>
                                    <th scope="col" width="15%">Created At</th>
                                    <th scope="col" width="15%">Updated At</th>
                                    <th scope="col" width="20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($images as $multi)
                                    <tr>
                                        <td>{{ $multi->id }}</td>
                                        <td>{{ $multi->name }}</td>
                                        <td>{{ $multi->percent }}</td>
                                        <td> {{ Carbon\Carbon::parse($multi->created_at)->diffForHumans() }} </td>
                                        <td> {{ Carbon\Carbon::parse($multi->updated_at)->diffForHumans() }} </td>
                                        <td>
                                            <a href="{{ url('multi/edit/' . $multi->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('multi/delete/' . $multi->id) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>


                        {{-- @foreach ($images as $multi)
                            <div class="col-md-4 mt-5">
                                <div class="card position-relative">
                                        <img src="{{ asset($multi->image) }}" alt="multi image">
                                        <a href="{{ url('multi/delete/' . $multi->id) }}" class="position-absolute" style="top: -20px; right: -10px"><i style="font-size: 25px" class="mdi mdi-delete"></i></a>
                                </div>
                            </div>
                        @endforeach --}}
                    {{-- </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Multi Image</div>
                        <div class="card-body">
                            <form action="{{ route('store.images') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleFormControlInput1">Portfolio Name</label>
                                    <input type="text" value="{{ old('name') }}" class="form-control"
                                        id="exampleFormControlInput1" placeholder="Portfolio Name" name="name">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Tag</label>
                                    <select class="form-control" name="tag" id="exampleFormControlSelect1">
                                        <option disabled {{ old('tag') == null ? 'selected' : '' }} value="">Select a
                                            tag</option>
                                        @foreach ($tags as $tag)
                                            <option {{ old('tag') == $tag->id ? 'selected' : '' }}
                                                value="{{ $tag->id }}">{{ $tag->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('tag')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="exampleFormControlInput2" class="form-label">Multi Image</label>
                                    <input type="file" class="form-control" name="image" id="exampleFormControlInput2">
                                </div>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <button type="submit" class="btn btn-primary w-full my-2">Add Image</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
