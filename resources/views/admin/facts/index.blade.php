@extends('admin.admin_master')
@section('admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Facts <b></b>
            <!-- {{ __('Dashboard') }} -->
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class="row w-100">
                <div class="w-100 row flex-row justify-content-between align-items-center">
                    <h2>Facts</h2>
                    <a href="{{ route('add.fact') }}"><button class="btn btn-info">Add Fact</button></a>
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

                        <div class="card-header">All Facts</div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">ID</th>
                                    <th scope="col" width="10%">Name</th>
                                    <th scope="col" width="10%">Description</th>
                                    <th scope="col" width="10%">Number</th>
                                    <th scope="col" width="10%">Icon</th>
                                    <th scope="col" width="15%">Created At</th>
                                    <th scope="col" width="15%">Updated At</th>
                                    <th scope="col" width="20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($facts as $fact)
                                    <tr>
                                        <td>{{ $fact->id }}</td>
                                        <td>{{ $fact->name }}</td>
                                        <td>{{ $fact->description }}</td>
                                        <td>{{ $fact->number }}</td>
                                        <td><i class="{{$fact->icon->classes}} h1"></i></td>
                                        <td> {{ Carbon\Carbon::parse($fact->created_at)->diffForHumans() }} </td>
                                        <td> {{ Carbon\Carbon::parse($fact->updated_at)->diffForHumans() }} </td>
                                        <td>
                                            <a href="{{ url('fact/edit/' . $fact->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('fact/delete/' . $fact->id) }}"
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
