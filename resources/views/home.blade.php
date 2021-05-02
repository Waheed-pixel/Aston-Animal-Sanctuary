@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('WELCOME TO OUR WEBSITE') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{--This home page can only be seen by an admin user --}}
                    @if (Auth::user()->role === 1)

                           <P>
                           As an admin you are required to manage the content of this wesbite.
                           This means that you have the responsibility of carrying out the 
                           following tasks: <br>
                           <br>
                           - UPLOAD NEW ANIMALS <br>
                           - MANAGE ADOPTION REQUESTS <br>
                           - VIEW APPROVED/DENIEND REQUESTS <br>
                           <br>
                           To upload new animals you msut click on the 'UPLOAD ANIMLAS' page in the
                           navbar and fill out a basic form. Once you have added an animal, you will
                           be taken to a new page that will ask you to add an image for that animal.
                           You can also add multiple images for the same animal.
                           <br>
                           <br>
                           To manage adoption requests you msut click on the 'MANAGE ADOPTIOIN REQUESTS'
                           page in the navbar. This is where all the adoption requests sent by the public users
                           will be displayed and as an admin you will have the authority to either accept or
                           deny the requests. You can also view all the approved/denied requests by clicking on
                           the 'VIEW APPROVED REQUESTS' (green button) and 'VIEW DENIED REQUESTS' (red button) 
                           buttons which are displayed on the 'MANAGE ADOPTIOIN REQUESTS' page.
                           <br>
                           <br>
                           The 'DISPLAY ANIMALS' page in the navbar will show you all the animals that have either
                           been adopted or are still available for adoption.                                                   
                           <br>
                           <br>                   
                           </P>
                                                                                                                                        
                    @endif

                    {{--This home page can only be seen by a public user --}}
                    @if (Auth::user()->role === 0)

                            <p>
                            Hellow, welcome to ASTON ANIMAL SANCTUARY. You have come to the right place
                            to adopt our beautiful animals. We have been taking care of these animals and
                            we hope you do the same. Now go ahead and send an adoption request for your 
                            choice of animals and add a new member to your family. Once you have sent an 
                            adoption request, just wait to see if your adoption request has been approved.
                            Please stay active as our staff are very responsive and will reply as soon 
                            as possible.
                            </p>
                                                                                                                                        
                    @endif                   
                    <br>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
