@extends('admin.admin_master')
@section('admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            All Brands <b></b>
            <!-- {{ __('Dashboard') }} -->
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="card-header">All Brands</div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">Brand Image</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($brands as $brand)
                                    <tr>
                                        {{-- $categories->firstItem() + $loop->index --}}
                                        <th scope="row">{{ $brand->id  }}</th>
                                        <td>{{ $brand->brand_name }}</td>
                                        <td> <img src="{{asset($brand->brand_image)}}" style="height:40px" alt="image"></td>
                                        <td> {{ Carbon\Carbon::parse($brand->created_at)->diffForHumans() }} </td>
                                        <td>
                                            <a href="{{ url('brand/edit/' . $brand->id) }}"
                                                class="btn btn-info">Edit</a>
                                            <a href="{{ url('softdelete/brand/' . $brand->id) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $brands->links() }}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">Add Brand</div>
                        <div class="card-body">
                            <form action="{{ route('store.brand') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-1 form-group">
                                    <label for="exampleFormControlInput1" class="form-label">Brand Name</label>
                                    <input type="text" class="form-control" id="exampleFormControlInput1"
                                        name="brand_name" placeholder="Brand Name">
                                    @error('brand_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-1">
                                    <label for="exampleFormControlInput2" class="form-label">Brand Image</label>
                                    <input type="file" class="form-control"
                                    name="brand_image" id="exampleFormControlInput2">
                                </div>
                                    @error('brand_image')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                <button type="submit" class="btn btn-primary w-full my-2">Add Brand</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Trash List</div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Brand Name</th>
                                    <th scope="col">User</th>
                                    <th scope="col">Deleted At</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trashBrands as $brand)
                                <tr>
                                    {{-- $categories->firstItem() + $loop->index --}}
                                    <th scope="row">{{ $brand->id  }}</th>
                                    <td>{{ $brand->brand_name }}</td>
                                    <td> <img src="{{asset($brand->brand_image)}}" style="height:40px" alt="image"></td>
                                    <td> {{ Carbon\Carbon::parse($brand->deleted_at)->diffForHumans() }} </td>
                                    <td>
                                        <a href="{{ url('brand/restore/' . $brand->id) }}"
                                            class="btn btn-info">Restore</a>
                                        <a href="{{ url('pdelete/brand/' . $brand->id) }}"
                                            class="btn btn-danger">Delete Permanently</a>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $trashBrands->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection