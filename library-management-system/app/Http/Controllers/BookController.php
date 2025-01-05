<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Publisher;
use App\Models\Book;
use App\Models\Authors;
use App\Models\BookAuthor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;


class BookController extends Controller
{
    public function bookInfo(){
        $publishers = DB::table('publishers')
                    ->get();

        $authors = DB::table('authors')
                    ->get();

        $genres = DB::table('genres')
                    ->get();
                    
        return view('admin.books.addbook', ['publishers' => $publishers,'authors'=>$authors,'genres'=>$genres]);
    }

    /**
     * Handle an incoming add request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //validate the infos
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'isbn' => ['required', 'unique:'.Book::class],
            'publication'=> ['required', 'string', 'max:255'],
            'publication_year' => ['required', 'string'],
            'copy'=> ['required', 'integer'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //image path
        $imagePath = $request->file('image')?->store('photos', 'public');

        //check available copy
        if($request->copy > 0){
            // set availability as availavle
            $available="Available";
        }else{
            // set availability as not availavle
            $available="Not Available";
        }

        //store in bookd
        $book = Book::create([
            'name' => $request->name,
            'isbn' => $request->isbn,
            'publication' => $request->publication,
            'publication_year' => $request->publication_year,
            'available_copy'=> $request->copy,
            'availability'=>$available,
            'image' => $imagePath,
        ]);

        // put info in books_authors
        $book->authors()->attach($request->authors); 
        
        // put info in books_genres
        $book->genres()->attach($request->genres); 

        return redirect('/manage_books');

    }

    //edit book info
    public function updateBook(Request $request,$id): RedirectResponse{

        //validate info
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'isbn' => ['required', 'unique:books,isbn,'.$id],
            'publication'=> ['required', 'string', 'max:255'],
            'publication_year' => ['required', 'string'],
            'copy'=> ['required', 'integer'],
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        //find book of id passed
        $book = Book::findOrFail($id);

        if ($request->hasFile('image')) {//if new image added
            if ($book->image) {
                //delete old image
                Storage::delete('public/' . $book->image);
            }
    
            //create new image path
            $imagePath = $request->file('image')->store('books', 'public');
        } else {
            //old image path
            $imagePath = $book->image;
        }

        if($request->copy > 0){
            //if book copy is 0 then availability is available
            $available="Available";
        }else{
            //set availability to not available
            $available="Not Available";
        }

        //update info
        $book->update([
                    'name' => $request->name,
                    'isbn' => $request->isbn,
                    'publication' => $request->publication,
                    'publication_year' => $request->publication_year,
                    'available_copy'=> $request->copy,
                    'availability'=>$available,
                    'imagePath'=>$imagePath
                ]); 
        
        //update in books_authors
        $book->authors()->sync($request->authors); 
        
        //update in books_genres
        $book->genres()->sync($request->genres); 

        return redirect('/manage_books');
    }


    // delete from book table
    public function deleteBook($id){

        $book = Book::findOrFail($id);  

        Storage::delete('public/' . $book->image);

        $book->delete();

        return redirect('/manage_books');
    }

    //all book info
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
        
        return view('admin.books.managebooks', ['publishers' => $publishers,'authors'=>$authors,'books'=>$books,"book_author"=>$book_author,"book_genre"=>$book_genre,"genres"=>$genres]);
    }

    // single book info
    public function singleBook($id){

        $authors = DB::table('authors')
                ->get();

        $book = DB::table('books')
                ->where('id', $id)
                ->first();

        $publishers = DB::table('publishers')
                    ->get();

        $book_author = DB::table('book_authors')
                    ->get();

        $book_genre = DB::table('book_genres')
                    ->get();

        $genres = DB::table('genres')
                    ->get();                 
                
        return view('admin.books.editbook', ['publishers' => $publishers,'authors'=>$authors,'book'=>$book,"book_author"=>$book_author,"book_genre"=>$book_genre,"genres"=>$genres]);
    }

}
