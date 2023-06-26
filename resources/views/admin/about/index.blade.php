@extends('admin.admin_master')
@section('admin')
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Home About <b></b>
            <!-- {{ __('Dashboard') }} -->
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="container">
            <div class="row w-100">
                <div class="w-100 row flex-row justify-content-between align-items-center">
                    <h2>Home About</h2>
                    <a href="{{ route('edit.about') }}"><button class="btn btn-info">Set About</button></a>
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

                        <div class="card-header">All About Data</div>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col" width="10%">date_of_birth</th>
                                    <th scope="col" width="20%">profession</th>
                                    <th scope="col" width="10%">phone</th>
                                    <th scope="col" width="10%">email</th>
                                    <th scope="col" width="10%">website</th>
                                    <th scope="col" width="10%">city</th>
                                    <th scope="col" width="10%">country</th>
                                    <th scope="col" width="10%">freelance</th>
                                    <th scope="col" width="10%">degree</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($abouts as $about)
                                    <tr>
                                        <td>{{ $about->date_of_birth }}</td>
                                        <td> {{ $about->profession }} </td>
                                        <td> {{ $about->phone }} </td>
                                        <td> {{ $about->email }} </td>
                                        <td> {{ $about->website }} </td>
                                        <td> {{ $about->city }} </td>
                                        <td> {{ $about->country }} </td>
                                        <td> {{ $about->freelance == '1' ? 'True' :  'False' }} </td>
                                        <td> {{ $about->degree }} </td>
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
