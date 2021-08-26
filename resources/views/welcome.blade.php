@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <form id="forms" method="post" action="{{ route('aa') }}" enctype="multipart/form-data">
                @csrf
              <div class="form-group">
                <label>Email</label>
                <input type="email" id="email" name="email" class="form-control">
                <span class="text-danger" id="email-error"></span>
              </div>
              <div class="form-group">
                <label>image</label>
                <input type="file" id="image" name="image[]" multiple="multiple" class="form-control">
                <span class="text-danger" id="image-error"></span>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
        </div>
    </div>
</div>


@endsection