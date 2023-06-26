@extends('admin.admin_master')
@section('admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Tags <b></b>
            <!-- {{ __('Dashboard') }} -->
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class="row w-100">
                <div class="w-100 row flex-row justify-content-between align-items-center">
                    <h2>Tags</h2>
                    <a href="{{ route('add.tag') }}"><button class="btn btn-info">Add Tag</button></a>
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

                        <div class="card-header">All Tags</div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="10%">ID</th>
                                    <th scope="col" width="40%">Name</th>
                                    <th scope="col" width="15%">Created At</th>
                                    <th scope="col" width="15%">Updated At</th>
                                    <th scope="col" width="20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->name }}</td>
                                        <td> {{ Carbon\Carbon::parse($tag->created_at)->diffForHumans() }} </td>
                                        <td> {{ Carbon\Carbon::parse($tag->updated_at)->diffForHumans() }} </td>
                                        <td>
                                            <a href="{{ url('tag/edit/' . $tag->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('tag/delete/' . $tag->id) }}"
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
