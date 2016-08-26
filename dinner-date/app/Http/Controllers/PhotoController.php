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
use Illuminate\Support\Facades\Redirect;
use Carbon\Carbon;
use App\Http\Requests\PhotoRequest;

class PhotoController extends Controller
{
    /**
     * @var Picture
     */
    protected $picture;
    
    /**
     * PhotoController constructor.
     * @param Picture $picture
     */
    public function __construct(Picture $picture)
    {
        $this->picture = $picture;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
   public function index()
    {
        return view('functions.photo');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getCrop()
    {
        return view('functions.crop');
    }

    public function postPicture(PhotoRequest $request)
    {
        $file = Input::file('photo');
        $rand = rand(11111,99999);
        $file_name = $rand.'-'.$file->getClientOriginalName();
        if ($file->move('img/users/',$file_name))
        {
            return redirect()->route('crop')->with('image',$file_name);
        }
        else
        {
            return "Error uploading file";
        }
    }
    public function postCrop(Request $request)
    {
        $data = $request->all();
        $quality = 90;

        $src  = $data['image'];
        $img  = imagecreatefromjpeg($src);
        $dest = ImageCreateTrueColor($data['w'], $data['h']);

        imagecopyresampled($dest, $img, 0, 0, $data['x'],
            $data['y'], $data['w'], $data['h'],
            $data['w'], $data['h']);
        imagejpeg($dest, $src, $quality);


        $count = $this->picture->where('user_id',Auth::user()->id)
                        ->count();
        if($count == 5) {
            $this->picture->RemoveLast(Auth::user()->id);
        }
        $new = [
            'picture_url' => $src,
//            'description' => $data['description'],
            'isDish' => 0,
            'user_id' => Auth::user()->id,
        ];
        $this->picture->create($new);
        return redirect()->route('dashboard')->withSuccess('succesfully added a picture');

        return "<img src='" . $src . "'>";
    }
}
