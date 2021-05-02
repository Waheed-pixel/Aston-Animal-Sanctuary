@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">               
                <div class="card">
                    <div class="card-header">UPLOAD NEW IMAGES</div>
                    <div class="card-body">
                        <form method="POST" enctype="multipart/form-data" action="{{ route('uploadImages') }}">
                            @csrf
                            <div class="form-group row">
                                <input type="file" id="file" name="file">
                            </div>
                            <div class="form-group row">
                                <input type="hidden" id="animalid" name="animalid" value="{{$animalid}}">
                            </div>
                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-8">
                                    <button class="btn btn-primary">
                                        UPLOAD IMAGE
                                    </button>                                 
                                    @if ($message = Session::get('success')) 
                              <div class="alert alert-success" style = "right: 27rem; margin-top: 4rem;">
                                 {{-- animal id sent to url --}}
                                <strong>{{ $message }}</strong>
                              </div>
                          @endif
                                </div>
                            </div>
                        </form>
@endsection


