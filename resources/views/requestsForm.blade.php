@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('MANAGE ADOPTION REQUESTS') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if ($message = Session::get('success'))
                          <div class="alert alert-success">
                              <strong>{{ $message }}</strong>
                          </div>
                        @endif

                    <a href="{{route('approvedRequest')}}"> 
                    <button name="myButtonRequest" class="btn btn-success" style="margin-left:3rem; padding-top:1rem;">
                    <p style="margin-top:1rem;">CLICK TO VIEW APPROVED REQUESTS</p>
                    </button>
                    </a>

                    <a href="{{route('deniedRequest')}}"> 
                    <button name="myButtonRequest" class="btn btn-danger" style="margin-left:1rem; padding-top:1rem;">
                    <p style="margin-top:1rem;">CLICK TO VIEW DENIED REQUESTS</p>
                    </button>
                    </a>
                    
                    <br>
                    <br>
                   
                    <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                    <th>USER NAME</th><th>ANIMAL NAME</th><th>STATUS</th>
                    </tr>
                    </thead>
                    <tbody>
                @foreach($pendingRequests as $request)
                <tr>
                
                    <td> 
                    
                    @foreach($userAccounts as $user)

                    @if($user->id === $request->userid) 

                    {{$user->name}}

                    @break

                    @else
                    @continue

                
                    @endif
                    
                    @endforeach

                    </td>


                    <td> 

                    @foreach($animals as $animal)

                    @if($animal->id === $request->animalid) 

                    {{$animal->name}}

                    @break

                    @else
                    @continue

                
                    @endif
                    
                    @endforeach
                    </td>
                    <td> 

                    <form method="POST" action="{{route('processRequest')}}" >

                            @csrf
                    <input type="hidden" id="animalid" name="animalid" value="<?php echo $request->animalid ?>">
                    <input type="hidden" id="userid" name="userid" value="<?php echo $request->userid ?>">
                    
                        <button name="myButtonRequest" value= "1" tupe="submit" class="btn btn-success">
                            APPROVE
                        </button>

                        <button name="myButtonRequest" value= "0" tupe="submit" class="btn btn-danger">
                            DENY
                        </button>

                    </form>  
                    
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
