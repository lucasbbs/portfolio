@extends('admin.admin_master')
@section('admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Skills <b></b>
            <!-- {{ __('Dashboard') }} -->
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class="row w-100">
                <div class="w-100 row flex-row justify-content-between align-items-center">
                    <h2>Skills</h2>
                    <a href="{{ route('add.skill') }}"><button class="btn btn-info">Add Skill</button></a>
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
                                @foreach ($skills as $skill)
                                    <tr>
                                        <td>{{ $skill->id }}</td>
                                        <td>{{ $skill->name }}</td>
                                        <td>{{ $skill->percent }}</td>
                                        <td> {{ Carbon\Carbon::parse($skill->created_at)->diffForHumans() }} </td>
                                        <td> {{ Carbon\Carbon::parse($skill->updated_at)->diffForHumans() }} </td>
                                        <td>
                                            <a href="{{ url('skill/edit/' . $skill->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('skill/delete/' . $skill->id) }}"
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
