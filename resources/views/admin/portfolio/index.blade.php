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
                                    <th scope="col" width="3%">ID</th>
                                    <th scope="col" width="5%">Cover</th>
                                    <th scope="col" width="5%">Name</th>
                                    <th scope="col" width="5%">Category</th>
                                    <th scope="col" width="5%">Date</th>
                                    <th scope="col" width="8%">Client</th>
                                    <th scope="col" width="1%">Url</th>
                                    <th scope="col" width="5%">Title</th>
                                    <th scope="col" width="5%">Description</th>
                                    <th scope="col" width="1%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($portfolios as $portfolio)
                                    <tr>
                                        <td>{{ $portfolio->id }}</td>
                                        <td><img src="{{ asset($portfolio->image) }}" alt="" width="100px"
                                                height="100px"></td>
                                        <td>{{ $portfolio->name }}</td>
                                        <td>{{ $portfolio->tag->name }}</td>
                                        <td>{{ $portfolio->date }}</td>
                                        <td>{{ $portfolio->client }}</td>
                                        <td>{{ $portfolio->url }}</td>
                                        <td>{{ $portfolio->title }}</td>
                                        <td>{{ $portfolio->description }}</td>
                                        <td style="display: flex; flex-direction: column;">
                                            <a href="{{ url('portfolio/edit/' . $portfolio->id) }}"
                                                class="btn btn-info">Edit</a> <br>
                                            <a href="{{ url('portfolio/delete/' . $portfolio->id) }}"
                                                class="btn btn-danger">Delete</a> <br>
                                            <a href="{{ url('portfolio/slides/' . $portfolio->id) }}"
                                                class="btn btn-success">Slides</a>
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
