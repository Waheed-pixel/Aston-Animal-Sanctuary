@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('APPROVED REQUESTS') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <a href="{{route('manageRequests')}}"> 
                        <button name="myButtonRequest" class="btn btn-primary" style="margin-left:0rem; padding-top:1rem;">
                            <p style="margin-top:1rem;">BACK TO PREVIOUS PAGE</p>
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

                                <div class="alert alert-success" role="alert">
                                    <p>APPROVED</p>
                                </div>
                            
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
