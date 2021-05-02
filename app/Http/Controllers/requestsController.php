<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\adoptionRequests;
use Gate;
use App\Models\Animals;
use App\Models\User;

class requestsController extends Controller
{
    

    public function manageRequestsForm()
    {
        $requestQuery= adoptionRequests::all();
        $userQuery= User::all();
        $animalsQuery = Animals::all();

        $requestQuery=$requestQuery->where('pendingUsers', 1);

        return view('/requestsForm', array('animals' => $animalsQuery, 'pendingRequests'=>$requestQuery, 'userAccounts'=>$userQuery));
        
    }

    public function processRequest(Request $request)
    {
        
        $userid = strip_tags(intval($request->userid));
        $myanimalid = strip_tags(intval($request->animalid));
        $message = "";

        if(strip_tags($request->myButtonRequest) === "0"){
            adoptionRequests::where('animalid',$myanimalid)->where('userid',$userid)->update(array(
                'pendingUsers'=>0,
                'deniedUsers'=>1,
            ));
            $message = 'Addoption has been denied';
    }

       
        else if(strip_tags($request->myButtonRequest) === "1"){

            $animalsQuery = Animals::where('id',$myanimalid)->get();;
            

            if($animalsQuery[0]->userid !== 1  ){

                $message = 'This animal has already been adopted';

            }
            else{
                                            
            adoptionRequests::where('animalid',$myanimalid)->where('userid',$userid)->update(array(
                'pendingUsers'=>0,
                
            ));
           
            Animals::where('id',$myanimalid)->update(array(
                'userid'=>$userid,
            ));
            $message = 'Addoption has been approved';
        }
    }
        return back()
        ->with('success', $message);
            
    }

    

    public function approvedRequestForm()
    {
        $requestQuery= adoptionRequests::all();
        $userQuery= User::all();
        $animalsQuery = Animals::all();

        $requestQuery=$requestQuery->where('pendingUsers', 0);
        $requestQuery=$requestQuery->where('deniedUsers', 0);

        return view('/approvedRequestForm', array('animals' => $animalsQuery, 'pendingRequests'=>$requestQuery, 'userAccounts'=>$userQuery));      

    }

    public function deniedRequestForm()
    {
        $requestQuery= adoptionRequests::all();
        $userQuery= User::all();
        $animalsQuery = Animals::all();

        $requestQuery=$requestQuery->where('deniedUsers', 1);

        return view('/deniedRequestForm', array('animals' => $animalsQuery, 'pendingRequests'=>$requestQuery, 'userAccounts'=>$userQuery));
        

    }

}
