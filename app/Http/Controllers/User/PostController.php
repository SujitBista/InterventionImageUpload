<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post\Post;
use Auth;
use Image;
class PostController extends Controller
{
	private $uploadPath = "uploads/images/";

	public function __construct(){
        $this->middleware('auth');
	}

	public function index(){
		return view('user.index');
	}

	public function create(){
		return view('user.create');
	}

    public function store(Request $request){
    	//server side validation
      try{
           $destination = $this->uploadPath;
           $request->validate([
             	 'title' => 'required|unique:user_posts',
             	 'description' => 'required',
             	 'location' => 'required',
             	 'numberOfRooms' => 'required',
             	 'price' => 'required',
             ]);

            if($request->hasFile('file')){
              $file = $request->file('file');
              $fileName = $file->getClientOriginalName();
              $fileType = $file->getClientOriginalExtension();

            	$userid = Auth::user()->id;
              $newFileName = sprintf("%s.%s",sha1($fileName.time()), $fileType);
               //$file->move($destination, $newFileName);
              $location = public_path('uploads/images/'.$newFileName);
              Image::make($file)->resize(800,400)->save($location);

                 Post::create([
    	       	 	'title' => $request->title,
    	       	 	'description' => $request->description,
    	       	 	'location' => $request->location,
    	       	 	'numberOfRooms' => $request->numberOfRooms,
    	       	 	'price' => $request->price,
    	       	 	'user_id' => $userid,
    	       	 	'imageName' => $newFileName,
           	    ]);
              }
          }catch(\Exception $e){
                return $e->getMessage();
            }
    }
}
