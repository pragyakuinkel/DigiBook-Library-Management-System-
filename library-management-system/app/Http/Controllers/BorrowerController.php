<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Borrowers;
use Illuminate\Http\RedirectResponse;

class BorrowerController extends Controller
{
    /**
     * Handle an incoming add request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request,$book_id): RedirectResponse
    {

        // store borrower info here when the borrow button is clicked
        $borrower = Borrowers::create([
            'book_id'=>$book_id,
            'user_id'=>Auth::user()->id,
            'borrowed_at'=>now()->format('Y-m-d H:i:s'),
        ]);

        $book = DB::table('books')
                    ->where('id', $book_id)
                    ->first();

        $copy=$book->available_copy - 1;

        if($copy==0){//if the book is no longer available
            //update the availability as well
            $book = DB::table('books')
                        ->where('id', $book_id)
                        ->update([
                            'available_copy'=>$copy,
                            'availability'=>"Not Available",
                        ]); 
        }else{
            //just update the available copy
            $book = DB::table('books')
                        ->where('id', $book_id)
                        ->update([
                            'available_copy'=>$copy,
                        ]); 
        }
        
        //redirect back 
        return redirect()->back();
        
    }

    //when user returns the book 
    public function return(Request $request,$id): RedirectResponse
    {
        //update the returned_at to current date when returned
        $returnBook = DB::table('borrowers')
                    ->where('book_id', $id)
                    ->where('user_id', Auth::user()->id)
                    ->update([
                        'returned_at'=>now()->format('Y-m-d H:i:s'),
                    ]); 

        $book = DB::table('books')
                    ->where('id', $id)
                    ->first();

        //add copy by one after return            
        $copy=$book->available_copy + 1;

        //update copy and availability as available
        $book = DB::table('books')
                    ->where('id', $id)
                    ->update([
                        'available_copy'=>$copy,
                        'availability'=>"Available",
                    ]); 
        
        return redirect()->back();
    }

    // borrower info
    public function borrowerInfo(){

        $books = DB::table('books')
                    ->get();

        $users = DB::table('users')
                    ->get();

        $borrows = DB::table('borrowers')
                    ->orderBy('id','DESC')
                    ->paginate(10);
        
        return view('admin.borrowers.borrowers', ['books'=>$books,"users"=>$users,"borrows"=>$borrows]);

    }

    //user info of borrower of passed id
    public function userInfo($id){

        $user = DB::table('users')
                    ->where('id',$id)
                    ->first();
        
        return view('admin.borrowers.userInfo', ["user"=>$user]);

    }

}
