@extends('admin.admin_master')


@section('admin')
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>
                    @if (isset($contact))
                        Edit Contact
                    @else    
                        Create Contact
                    @endif</h2>
            </div>
            <div class="card-body">
                <form action="{{ $route }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="Email"
                             value="{{(isset($contact)) ? $contact->email : ''}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea2">Phone</label>
                        <input type="phone" name="phone" class="form-control" id="exampleFormControlInput1"
                            placeholder="Phone"
                             value="{{(isset($contact)) ? $contact->phone : ''}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Address</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address">{{(isset($contact)) ? $contact->address : ''}}</textarea>
                    </div>
                    
                    <div class="form-footer pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
