@extends('admin.admin_master')


@section('admin')
    <div class="col-lg-12">
        <div class="card card-default">
            <div class="card-header card-header-border-bottom">
                <h2>
                    @if (isset($slider))
                        Edit Slider
                    @else    
                        Create Slider
                    @endif</h2>
            </div>
            <div class="card-body">
                <form action="{{ $route }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @if (isset($slider))
                    <input type="hidden" name="old_image" value="{{$slider->image}}">
                    @endif
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Slider Title </label>
                        <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                            placeholder="Slider Title"
                            value="{{(isset($slider)) ? $slider->title : ''}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Slider Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{(isset($slider)) ? $slider->description : ''}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Slider Image</label>
                        <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1"
                        value="{{
                            (isset($slider)) ? $slider->image : ''
                        }}">
                    </div>

                    @if (isset($slider))
                        <img src="{{asset($slider->image)}}" width="100%" alt="{{$slider->title}}">
                    @endif

                    <div class="form-footer pt-5 mt-4 border-top">
                        <button type="submit" class="btn btn-primary btn-default">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
