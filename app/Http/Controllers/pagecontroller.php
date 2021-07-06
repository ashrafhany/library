<?php

namespace App\Http\Controllers;
use App\Book;
use App\Catogray;
use App\Comment;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class pagecontroller extends Controller
{
    public function index(){
        $books= Book::latest()->paginate(5);
        return view('welcome')->with('books',$books);
    }

    public function viewCatogray($id){
        $category = Catogray::find($id);
        $books = $category->books;
        return view('viewcategory')->with(['books'=>$books,'catogray'=>$category]);
    }
    public function viewBook($id){
        $book = Book::findorFail($id);
        return view('book')->with('book',$book);
    }
    public function addcomment(Request $request,$id){
        $this->validate($request,[
            'comment'=>'required|max:200'
        ]);
        $book = Book::findorFail($id);
        $comment = new Comment();
        $comment->user_id = auth()->user()->id;
        $comment->book_id = $book->id;
        $comment->comment = $request->input('comment');
        $comment->save();  
        return redirect()->back();  

    }
}
