<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Image;
use App\Models\FileUpload;
class FileUploadController extends Controller
{
	private $uploadPath = "uploads/images/";

	public function __construct(){
    
	}


    // public function store(Request $request){
    // 	//server side validation
    //   try{
    //        $destination = $this->uploadPath;
    //        $request->validate([
            
    //          ]);

    //         if($request->hasFile('file')){
    //           $file = $request->file('file');
    //           $fileName = $file->getClientOriginalName();
    //           $fileType = $file->getClientOriginalExtension();
    //           $newFileName = sprintf("%s.%s",sha1($fileName.time()), $fileType);
    //           $location = public_path('uploads/images/'.$newFileName);
    //           Image::make($file)->resize(800,400)->save($location);

    //              FileUpload::create([
    // 	       	 	'imageName' => $newFileName,
    //        	    ]);
    //           }
    //       }catch(\Exception $e){
    //             return $e->getMessage();
    //         }
    //   }


      public function store(Request $request){
      
       try{
           $destination = $this->uploadPath;
            $request->validate([
                'file' => 'mimes:jpg,jpeg,png,gif,bmp|file|max:5000',
             ]);

              if($request->hasFile('file'))
              {   
                  $file = $request->file('file');
                  $fileName = $file->getClientOriginalName();
                  $fileType = $file->getClientOriginalExtension();
                  $newFileName = sprintf("%s.%s",sha1($fileName.time()), $fileType);
                  if(!file_exists('uploads/images')){
                     mkdir('uploads/images',0777,true);
                  }
                  $location = public_path('uploads/images/'.$newFileName);
                  ini_set('memory_limit','256M');
                  Image::make($file)->resize(800,400)->save($location);
                  if(!file_exists('uploads/thumbnails')){
                     mkdir('uploads/thumbnails',0777,true);
                  }
                  $location = public_path('uploads/thumbnails/'.$newFileName,50); //50 is for resolution
                  Image::make($file)->resize(240,160)->save($location);
                  // Roomate::create([
                  //   'imageName' => $newFileName,
                  //   ]);
              }
            } //close for try
            catch(\Exception $e)
            {
                return $e->getMessage();
            }
      } //close for store
}
