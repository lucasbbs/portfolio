@extends('admin.admin_master')
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
                <div class="col-md-8">
                    <div class="card-group">
                        <div class="card-header">All Slides</div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="10%">Order</th>
                                    <th scope="col" width="20%">Image</th>
                                    <th scope="col" width="15%">Created At</th>
                                    <th scope="col" width="15%">Updated At</th>
                                    <th scope="col" width="20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($slides as $key => $multi)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td><img src="{{ asset($multi->image) }}" alt="multi image" width="100px"
                                                height="100px"></td>
                                        <td> {{ Carbon\Carbon::parse($multi->created_at)->diffForHumans() }} </td>
                                        <td> {{ Carbon\Carbon::parse($multi->updated_at)->diffForHumans() }} </td>
                                        <td>
                                            <a href="{{ url('slider/delete/' . $multi->id) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Slides</div>
                        <div class="card-body">
                            <form action="{{ route('store.slider') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="portfolio" value="{{$id}}">
                                <div class="form-group mb-1">
                                    <label for="image" class="form-label">Add Slide</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>
                                @error('image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <button type="submit" class="btn btn-primary w-full my-2">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
