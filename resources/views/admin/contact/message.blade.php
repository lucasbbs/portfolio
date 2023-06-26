@extends('admin.admin_master')
@section('admin')
    <div class="py-12">
        <div class="container">
            <div class="row w-100">
                <div class="w-100 row flex-row justify-content-between align-items-center">
                    <h2>Message Page</h2>
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

                        <div class="card-header">All Message Data</div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="5%">ID</th>
                                    <th scope="col" width="10%">Name</th>
                                    <th scope="col" width="10%">Email</th>
                                    <th scope="col" width="10%">Subject</th>
                                    <th scope="col" width="35%">Message</th>
                                    <th scope="col" width="10%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($messages as $message)
                                    <tr>
                                        <td> {{ $message->id }} </td>
                                        <td> {{ $message->name }} </td>
                                        <td> {{ $message->email }} </td>
                                        <td> {{ $message->subject }} </td>
                                        <td> {{ $message->message }} </td>
                                        <td><a href="{{ url('admin/message/delete/' . $message->id) }}" class="btn btn-danger">Delete</a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $messages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
