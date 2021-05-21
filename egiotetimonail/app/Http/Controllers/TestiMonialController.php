<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Response;
///import model class
use App\testimonials;

/////use Image Intervention Library for handling and manipulation of Image, this library has also provide feature like create, edit and compose image.
use Image;

// use Intervention\Image\Facades\Image as Image;


class TestiMonialController extends Controller
{
    //root method of this class
    /// It will fetch data from images folder and display on testimonial.blade.php
    function index()
    {
     $data = testimonials::latest()->paginate(4);
     return view('testimonial', compact('data'))
     ///The with() method for send data to the view.
       ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    //In this method first it validate that data follow validation rules or not
    //. If  yes then it has process for insert into table in db 
    function insert_data(Request $request)
    {
     $request->validate([

      'title'  => 'required|min:3|max:60',
      'message'  => 'required|max:300',
      'image' => 'mimes:jpeg,png|max:1024' //max size allowed will be 1mo
     ]);

     $image_file = $request->image;
     $image=null;
     if($image_file != null){
      $image = Image::make($image_file);
      Response::make($image->encode('jpeg'));
     }

     
     $form_data = array(
      'title'  => $request->title,
      'message'  => $request->message,
      'image' => $image
     );

     testimonials::create($form_data);

     /////message after insert data ///// 
     return redirect()->back()->with('success', 'the testimonial store in database successfully');
    }

    /////// fetch image and converted into binary and return image as an output of this method

    function fetch_data($image_id)
    {

      ////findOrFail() is alike of find() function with one extra ability - to throws the Not Found Exceptions
     $image = testimonials::findOrFail($image_id);

     $image_file = Image::make($image->image);

     $response = Response::make($image_file->encode('jpeg'));

     $response->header('Content-Type', 'image/jpeg');

     return $response;
    }
}
