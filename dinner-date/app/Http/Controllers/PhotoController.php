<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
//added jonas
use Image; // saving image and editing  -> http://image.intervention.io/
use Input; // upload van form halen 
            // -> http://api.symfony.com/2.7/Symfony/Component/HttpFoundation/File/UploadedFile.html
            // -> http://laravel.com/docs/5.1/requests#files

use DB; //database connectie
use App\Picture;
use User;
use Auth;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        return view('photo');
    }

    public function postPicture(Request $request)
    {
        $this->validate($request, [
            'description'       => 'required|max:255',
            'photo'             => 'required|mimes:jpeg,gif,png',    
         ]);


        $filename               = Input::file('photo')->getClientOriginalName();
        Image::make(Input::file('photo'))
                                ->resize(300, 200)
                                ->save('userImg/'.$filename);
        
        $inputData              = $request->all();  

        $img                    = new Picture;
        $img->picture_url       = 'userImg/'.$filename;
        $img->description       = $inputData['description'];
        $img->isDish            = $inputData['isDish'];
        $img->user_id           = Auth::user()->id;

        $img->save();


    }
}
