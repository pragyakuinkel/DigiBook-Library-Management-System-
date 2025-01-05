<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Publisher;
use App\Models\Book;
use App\Models\Authors;
use App\Models\BookAuthor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class UserSideController extends Controller
{
    // all book info home
    public function allBookInfo(){

        $publishers = DB::table('publishers')
                    ->get();

        $authors = DB::table('authors')
                    ->get();

        $books = DB::table('books')
                    ->orderBy('id','DESC')
                    ->paginate(10);

        $book_author = DB::table('book_authors')
                    ->get();

        $book_genre = DB::table('book_genres')
                    ->get();
                    
        $genres = DB::table('genres')
                    ->get();
        
        return view('userDashboard', ['publishers' => $publishers,'authors'=>$authors,'books'=>$books,"book_author"=>$book_author,"book_genre"=>$book_genre,"genres"=>$genres]);
    }

    //user book history
    public function bookHistory(){

        $publishers = DB::table('publishers')
                    ->get();

        $authors = DB::table('authors')
                    ->get();

        $books = DB::table('books')
                    ->orderBy('id','DESC')
                    ->paginate(10);

        $book_author = DB::table('book_authors')
                    ->get();

        $book_genre = DB::table('book_genres')
                    ->get();

        $genres = DB::table('genres')
                    ->get();

        $borrowed = DB::table('borrowers')            
                    ->where('user_id', Auth::user()->id)   
                    ->get();    
        
        return view('book.bookHistory', ['publishers' => $publishers,'authors'=>$authors,'books'=>$books,"book_author"=>$book_author,"book_genre"=>$book_genre,"genres"=>$genres,"borrowed"=>$borrowed]);
    }

    //select by genre
    public function allBookGenre($id){

        $authors = DB::table('authors')
                    ->get();

        $books = DB::table('books')
                    ->orderBy('id','DESC')
                    ->paginate(10);

        $book_author = DB::table('book_authors')
                    ->get();

        $book_genre_select = DB::table('book_genres')
                    ->whereRaw('genre_id=?', $id)
                    ->get();

        $genres = DB::table('genres')
                    ->whereRaw('id=?', $id)
                    ->get();
        
        return view('book.selectGenre', ['authors'=>$authors,'books'=>$books,"book_author"=>$book_author,"book_genre_select"=>$book_genre_select,"genres"=>$genres]);
    }

    //all book info
    public function bookInfo($id){

        $userId=null;

        if(Auth::user()){
            $userId=Auth::user()->id;
        }

        $authors = DB::table('authors')
                ->get();

        $book = DB::table('books')
                ->whereRaw('id=?', $id)
                ->first();

        $publishers = DB::table('publishers')
                    ->get();

        $book_author = DB::table('book_authors')
                    ->get();

        $book_genre = DB::table('book_genres')
                    ->get();

        $genres = DB::table('genres')
                    ->get();

        $reviews = DB::table('reviews')
                    ->orderBy('id','DESC')
                    ->whereRaw('reviewable_type=?','Books')
                    ->paginate(10);

        $users = DB::table('users')
                    ->get();

        $borrowed = DB::table('borrowers')
                ->where('book_id', $id)                
                ->where('user_id', $userId)
                ->where('returned_at', null)
                ->exists();                             
                
        return view('book.books', ['publishers' => $publishers,'authors'=>$authors,'book'=>$book,"book_author"=>$book_author,"book_genre"=>$book_genre,"genres"=>$genres,"reviews"=>$reviews,"users"=>$users,"borrowed"=>$borrowed]);
    }

    //select book availabe, not available and all
    public function selectBook($val){
        $authors = DB::table('authors')
                    ->get();

        $book_author = DB::table('book_authors')
                    ->get();

        if($val=='All'){
            //select all
            $books = DB::table('books')
                    ->orderBy('id','DESC')
                    ->paginate(10);
        }else{
            $books = DB::table('books')
                    ->orderBy('id','DESC')
                    ->whereRaw('availability=?', $val)
                    ->paginate(10);
        }
        
        return view('book.selectBook', ['authors'=>$authors,'books'=>$books,"book_author"=>$book_author,'val'=>$val]);
    }

    // search bar author, publisher, isbn and book name
    public function searchBar(Request $request){

        $authors = DB::table('authors')
                    ->get();

        $book_author = DB::table('book_authors')
                    ->get();
                    
        $books = DB::table('books')
                    ->join('publishers', 'publishers.id', '=', 'books.publication')
                    ->join('book_authors', 'books.id', '=', 'book_authors.book_id')
                    ->join('authors', 'book_authors.author_id', '=', 'authors.id')
                    ->where('books.name', 'like',"%{$request->search}%")
                    ->orWhere('books.isbn', 'like',"%{$request->search}%")
                    ->orWhere('authors.name', 'like',"%{$request->search}%")
                    ->orWhere('publishers.name', 'like',"%{$request->search}%")
                    ->select('books.*')
                    ->distinct()
                    ->paginate(10);

        $val=$request->search;

        return view('book.selectBook', ['authors'=>$authors,'books'=>$books,"book_author"=>$book_author,'val'=>$val]);
    }
}
