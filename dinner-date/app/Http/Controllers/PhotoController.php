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
     * @param PhotoRequest $request
     * @return mixed
     */
    public function postPicture(PhotoRequest $request)
    {
        $filename = Input::file('photo')->getClientOriginalName();
        $rand = rand(11111,99999);
        Image::make(Input::file('photo'))
            //->resize(300, 200)
            ->save('img/users/'.$rand.'-'.$filename);
        $count = $this->picture->where('user_id',Auth::user()->id)
                        ->count();
        if($count == 5) {
            $this->picture->RemoveLast(Auth::user()->id);
        }
        $data = $request->all();
        $new = [
            'picture_url' => '/img/users/'.$rand.'-'.$filename,
            'description' => $data['description'],
            'isDish' => 0,
            'user_id' => Auth::user()->id,
        ];
        $this->picture->create($new);

        return redirect()->route('dashboard')->withSuccess('succesfully added a picture');
    }
}
