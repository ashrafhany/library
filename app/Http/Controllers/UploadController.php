<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;
use App\Catogray;
use Faker\Provider\Image;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
     public function index(){
        //$categories = Catogray::all();
        return view('upload');//->with('categories',$categories);
     }

     public function upload(Request $request){
         $this->validate($request,[ 
            'title'=>'required',
            'author'=>'required',
            'info'=>'required',
            'image'=>'required|image',
            'book'=>'required|mimes:pdf',
         ]);
         if($request->hasFile('image')){
            $imageExe = $request->file('image')->getClientOriginalExtension();
            $imageName = time().'thumbnail.'.$imageExe;
             $request->file('image')->storeAs('thumbnails',$imageName);
         }
         if($request->hasFile('book')){
            $bookExe = $request->file('book')->getClientOriginalExtension();
            $bookName = time().'book.'.$bookExe;
            $request->file('book')->storeAs('books',$bookName);

         }
         $book = new Book();
         $book->title = $request->input('title');
         $book->author = $request->input('author');
         $book->info = $request->input('info');
         $book->image = $imageName;
         $book->bookfile = $bookName;
         $book->user_id = Auth::user()->id;
         $book->catogray_id = $request->input('category');
         $book->save();
         return redirect(route('upload'))->with('msg','Upload OK');
          

     }
}
