@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row w-100">
                <div class="w-100 row flex-row justify-content-between align-items-center">
                    <h2>Contact Page</h2>
                    <a href="{{ route('add.contact') }}"><button class="btn btn-info">Add Contact</button></a>
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

                        <div class="card-header">All Contact Data</div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">ID</th>
                                    <th scope="col" width="35%">Address</th>
                                    <th scope="col" width="20%">Contact email</th>
                                    <th scope="col" width="20%">Contact phone</th>
                                    <th scope="col" width="20%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($contacts as $contact)
                                    <tr>
                                        <td> {{ $contact->id }} </td>
                                        <td> {{ $contact->address }} </td>
                                        <td> {{ $contact->email }} </td>
                                        <td> {{ $contact->phone }} </td>
                                        <td>
                                            <a href="{{ url('contact/edit/' . $contact->id) }}" class="btn btn-info">Edit</a>
                                            <a href="{{ url('contact/delete/' . $contact->id) }}"
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
