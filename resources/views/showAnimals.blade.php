@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">       
            <div class="card">
                <div class="card-header">{{ __('ANIMALS') }}</div>               
                    <div class="card-body">
               
                @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                @endif                             
                    <table class="table table-striped table-bordered table-hover"> 
                       
                            <thead>                      
                            <th>ADOPTION STATUS </th>
                            <th> NAME </th>
                            <th> DOB </th>
                            <th> DESCRIPTION </th>
                            <th>IMAGES </th>                                      
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($animals as $animal)
                            <tr>
                            <td>
                            @if(Auth::user()->role === 1)

                            @if($animal->userid === 1)

                                <div class="alert alert-success" role="alert">
                                <p>AVAILABLE</p>
                                </div>                       
                            @else 

                                <div class="alert alert-info" role="alert">
                                <p>ADOPTED</p>                        
                                </div>
                            
                            @endif
                                                
                            @else
                            <?php
                            $requestStatus = false;
                            ?>
                            @foreach ($adoptionInfo as $requestAnimal) 
                            @if($requestAnimal->userid === Auth::user()->id)
                            @if ($requestAnimal->pendingUsers === 1 && $requestAnimal->animalid === $animal->id)                               
                            
                                <div class="alert alert-dark" role="alert">
                                <p>PENDING...</p>                        
                                </div>
                            
                            <?php
                            $requestStatus = true;
                            ?>                              
                            @elseif ($requestAnimal->deniedUsers === 1 && $requestAnimal->animalid === $animal->id)
                            
                                <div class="alert alert-danger" role="alert">
                                <p>ADOPTON DENIED</p>                        
                                </div>

                            <?php
                            $requestStatus = true;
                            ?>                                     
                            @endif 
                            @endif                              
                            
                            @endforeach
                            @if(Auth::user()->role !== 1 && $animal->userid === 1 && $requestStatus === false)
                            <div class="form-group">
                            <div class="col-md-8">
                            <form method="POST" action="{{ route('adoptionInfo') }}">
                                    @csrf
                            <input type="hidden" id="animalid" name="animalid" value="<?php echo $animal->id ?>">
                            <input type="hidden" id="userid" name="userid" value="<?php echo $user ?>">
                            <div class="alert alert-success" role="alert">
                                <p>AVAILABLE</p>
                            </div>
                                                            
                                <button tupe="submit" class="btn btn-primary">
                                    SEND ADOPTION REQUEST
                                </button>
                            </form>   
                            @elseif($animal->userid !== 1)
                            @if($animal->userid === Auth::user()->id)

                                <div class="alert alert-success" role="alert">
                                <p>ADOPTION APPROVED</p>
                                </div>

                            @else

                                <div class="alert alert-info" role="alert">
                                <p>This animal has been adopted by someone else</p>
                                </div>

                            @endif

                            @endif  
                            @endif                         
                           </td>
                            <td> {{$animal->name }}</td>
                            <td> {{$animal->DOB }}</td>
                            <td> {{$animal->description}}</td>

                            <td> @foreach ($images as $image)
                                
                            <!-- Matches Imageas and ID -->
                            @if ($image->animalid !== $animal->id) 
                                @continue;
                            @endif
                                            
                            <img src="{{ asset('/storage/images/' . $image->name) }}"
                            alt="{{ $image->name }}" width="70" height="70" />
                            @endforeach
                        </td>                                               
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>       
    </div>
</div>
@endsection




