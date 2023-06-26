@extends('admin.admin_master')
@section('admin')

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Brand <b></b>
        <!-- {{ __('Dashboard') }} -->
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">Edit Brand</div>
                        <div class="card-body">
                            <form action="{{ url('brand/update/'.$brand->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="old_image" value="{{$brand->brand_image}}">
                                <div class="mb-1 form-group">
                                    <label for="exampleFormControlInput1" class="form-label">Brand Name</label>
                                    <input type="text" value="{{ old('brand_name', $brand->brand_name) }}" class="form-control" id="exampleFormControlInput1" name="brand_name" placeholder="Brand Name">
                                    @error('brand_name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-1 form-group">
                                    <label for="exampleFormControlInput2" class="form-label">Brand Image</label>
                                    <input type="file" value="{{ $brand->brand_image }}" class="form-control" id="exampleFormControlInput2" name="brand_image" placeholder="Brand Image">

                                    @error('brand_image')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <img src="{{ asset($brand->brand_image) }}" style="width:400px" alt="brand image">
                                </div>

                        <button type="submit" class="btn btn-primary w-full my-2">Update Brand</button>
                        </form>
                        </div>
                    </div>
                </div>
</div>
    </div>
    </div>
@endsection