@extends('admin.admin_master')
@section('admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Resumes <b></b>
            <!-- {{ __('Dashboard') }} -->
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class="row w-100">
                <div class="w-100 row flex-row justify-content-between align-items-center">
                    <h2>Resumes</h2>
                    <a href="{{ route('add.resume') }}"><button class="btn btn-info">Add Resume</button></a>
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

                        <div class="card-header h3">Summary Resumes</div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">ID</th>
                                    <th scope="col" width="10%">Title</th>
                                    <th scope="col" width="70%">Description</th>
                                    <th scope="col" width="15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($summaryResumes as $resume)
                                    <tr>
                                        <td title="Created at: {{Carbon\Carbon::parse($resume->created_at)->diffForHumans()}}&#013;Updated at: {{Carbon\Carbon::parse($resume->updated_at)->diffForHumans()}}">{{ $resume->id }}</td>
                                        <td>{{ $resume->title }}</td>
                                        <td>{{ $resume->description }}</td>
                                        <td>
                                            <a href="{{ url('resume/edit/' . $resume->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('resume/delete/' . $resume->id) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="card-header h3">Education Resumes</div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="2%">ID</th>
                                    <th scope="col" width="10%">Title</th>
                                    <th scope="col" width="10%">Company</th>
                                    <th scope="col" width="10%">City</th>
                                    <th scope="col" width="2%">State</th>
                                    <th scope="col" width="5%">Country</th>
                                    <th scope="col" width="10%">Start Date</th>
                                    <th scope="col" width="10%">End Date</th>
                                    <th scope="col" width="10%">Description</th>
                                    <th scope="col" width="13%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($educationResumes as $resume)
                                    <tr>
                                        <td title="Created at: {{Carbon\Carbon::parse($resume->created_at)->diffForHumans()}}&#013;Updated at: {{Carbon\Carbon::parse($resume->updated_at)->diffForHumans()}}">{{ $resume->id }}</td>
                                        <td>{{ $resume->title }}</td>
                                        <td>{{ $resume->company }}</td>
                                        <td>{{ $resume->city }}</td>
                                        <td>{{ $resume->state }}</td>
                                        <td>{{ $resume->country }}</td>
                                        <td>{{ $resume->start_date }}</td>
                                        <td>{{ $resume->end_date }}</td>
                                        <td>{{ $resume->description }}</td>
                                        <td>
                                            <a href="{{ url('resume/edit/' . $resume->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('resume/delete/' . $resume->id) }}"
                                                class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="card-header h3">Professional Resumes</div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="2%">ID</th>
                                    <th scope="col" width="10%">Title</th>
                                    <th scope="col" width="10%">Company</th>
                                    <th scope="col" width="10%">City</th>
                                    <th scope="col" width="2%">State</th>
                                    <th scope="col" width="5%">Country</th>
                                    <th scope="col" width="10%">Start Date</th>
                                    <th scope="col" width="10%">End Date</th>
                                    <th scope="col" width="10%">Description</th>
                                    <th scope="col" width="15%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($professionalResumes as $resume)
                                    <tr>
                                        <td title="Created at: {{Carbon\Carbon::parse($resume->created_at)->diffForHumans()}}&#013;Updated at: {{Carbon\Carbon::parse($resume->updated_at)->diffForHumans()}}">{{ $resume->id }}</td>
                                        <td>{{ $resume->title }}</td>
                                        <td>{{ $resume->company }}</td>
                                        <td>{{ $resume->city }}</td>
                                        <td>{{ $resume->state }}</td>
                                        <td>{{ $resume->country }}</td>
                                        <td>{{ $resume->start_date }}</td>
                                        <td>{{ $resume->end_date }}</td>
                                        <td>{{ $resume->description }}</td>
                                        <td>
                                            <a href="{{ url('resume/edit/' . $resume->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('resume/delete/' . $resume->id) }}"
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
