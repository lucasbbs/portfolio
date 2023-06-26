@extends('admin.admin_master')
@section('admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Testimonials <b></b>
            <!-- {{ __('Dashboard') }} -->
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class="row w-100">
                <div class="w-100 row flex-row justify-content-between align-items-center">
                    <h2>Testimonials</h2>
                    <a href="{{ route('add.testimonial') }}"><button class="btn btn-info">Add Testimonial</button></a>
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

                        <div class="card-header">All Testimonials</div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">ID</th>
                                    <th scope="col" width="15%">Name</th>
                                    <th scope="col" width="15%">Description</th>
                                    <th scope="col" width="10%">Designation</th>
                                    <th scope="col" width="10%">Image</th>
                                    <th scope="col" width="15%">Created At</th>
                                    <th scope="col" width="15%">Updated At</th>
                                    <th scope="col" width="15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $testimonial)
                                    <tr>
                                        <td>{{ $testimonial->id }}</td>
                                        <td>{{ $testimonial->name }}</td>
                                        <td>{{ $testimonial->description }}</td>
                                        <td>{{ $testimonial->designation }}</td>
                                        <td><img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->name }}"
                                                style="width: 80px; height: fit-content"></td>
                                        <td> {{ Carbon\Carbon::parse($testimonial->created_at)->diffForHumans() }} </td>
                                        <td> {{ Carbon\Carbon::parse($testimonial->updated_at)->diffForHumans() }} </td>
                                        <td>
                                            <a href="{{ url('testimonial/edit/' . $testimonial->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('testimonial/delete/' . $testimonial->id) }}"
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
