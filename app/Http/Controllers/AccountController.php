<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Animals;
use App\Models\images;
use App\Models\adoptionRequests;
use Gate;

class AccountController extends Controller
{
   
  
    public function uploadAnimalInfo(Request $request)
    {
      
        /* Store animals into database */
        $animalModel = new Animals;

        $animalModel->userid = 1;   
        $animalModel->name = $request->name;
        $animalModel->DOB = $request->DOB;
        $animalModel->description = $request->animaldescription;
        $animalModel->pendingUsers = "";
        $animalModel->deniedUsers = "";
        $animalModel->save();

        $message=  route('uploadImageForm',['animalid'=>$animalModel->id]);
               
        return back()
            ->with('success', $message);          
    }

    public function uploadAnimalForm()
    {
               
        return view('/uploadNewAnimals');

    }

    public function adoptionInfo(Request $request)
    {
        
        $adoptionRequest = new adoptionRequests;

        $adoptionRequest->userid = $request->userid;  
        $adoptionRequest->animalid = $request->animalid;
        $adoptionRequest->pendingUsers = "1";
        $adoptionRequest->deniedUsers = "0";
        $adoptionRequest->save();

        return back()
            ->with('success', 'Request has been sent');
            
    }

    public function showAnimals()
    {
        $animalsQuery = Animals::all();
        $images = images::all();        
        $requestQuery= adoptionRequests::all();

        return view('/showAnimals', array('animals' => $animalsQuery, 'images' => $images, 'user' => auth()->user()->id, 'adoptionInfo'=>$requestQuery));
    }

    
    public function uploadImages(Request $request)
    {
        /* Restricted to only image upload */
        $request->validate([

            'file' => 'required|image|mimes:png,jpeg,jpg,svg,gif|max:8200',

        ]);

        /* The file of the image is stored in SERVER and name is stored in database */
        $fileModel = new images;

        $fileName = time() . '' . $request->file->getClientOriginalName();
        $filePath = $request->file('file')->storeAs('images', $fileName, 'public');
        $fileModel->name = basename($filePath); 
        $fileModel->animalid = $request->animalid;
        $fileModel->save();

        return back()
            ->with('success', 'You have successfully uploaded an image.')
            ->with('file', $fileName);
  
    }

    public function uploadImageForm($animalid)
    {
        $animalsQuery = Animals::all();
        
        return view('/uploadImages', array('animals' => $animalsQuery, 'animalid'=>$animalid));
    }   
    
}
