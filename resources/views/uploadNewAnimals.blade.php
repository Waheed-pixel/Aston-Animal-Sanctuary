@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

            {{-- show success message on successful upload --}}
                          @if ($message = Session::get('success')) 
                              <div class="alert alert-info" style = "margin-top: 3rem">                                         
                                    <a href= "{{$message}}">
                                    <button  class="btn btn-primary" style = "margin-left: 12rem">
                                        CLICK HERE TO UPLOAD IMAGES
                                    </button>
                                    </a>
                              </div>
                          @endif

                <div class="card">
                    <div class="card-header">ADD A NEW ANIMAL FOR ADOPTION</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('animalData') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">NAME OF ANIMAL</label>

                                <div class="col-md-6">
                                    <input type="text" id="name" name="name">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="animaldescription"
                                    class="col-md-4 col-form-label text-md-right">DESCRIPTION</label>

                                <div class="col-md-6">
                                    <textarea class="form-control" id="animaldescription" name="animaldescription" rows="4" cols="50"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="DOB" class="col-md-4 col-form-label text-md-right">DATE OF BIRTH</label>

                                <div class="col-md-6">
                                    <input type="date" id="DOB" name="DOB" min="1920-01-01" max="<?php echo date('Y-m-d');?>">
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-8">
                                    <button class="btn btn-primary">
                                        ADD ANIMAL
                                    </button>

                                </div>
                            </div>
                        </form>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection