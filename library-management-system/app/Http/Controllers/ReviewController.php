<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Reviews;
use Illuminate\Http\RedirectResponse;

class ReviewController extends Controller
{
    /**
     * Handle an incoming add request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request,$reviewed_area,$val_id): RedirectResponse
    {
        $book_id=null;

        $author_id=null;

        $publisher_id=null;

        $validator = $request->validate([
            'review' => ['required', 'string'],
        ]);

        if($reviewed_area=='Books'){//if reviewed_area is book
            
            $book_id=$val_id;

        }elseif($reviewed_area=='Publishers'){//if reviewed_area is publisher
            
            $publisher_id=$val_id;
            
        }else{//if reviewed_area is author
            
            $author_id=$val_id;

        }

        $publisher = Reviews::create([
            'user_id'=>Auth::user()->id,
            'book_id'=>$book_id,
            'author_id'=>$author_id,
            'publisher_id'=>$publisher_id,
            'reviewable_type'=>$reviewed_area,
            'review'=>$request->review
        ]);

        return redirect()->back();
    }

    // publisher review
    public function review($id){
        $publishers = DB::table('publishers')
                    ->whereRaw('id=?', $id)
                    ->get();

        $reviews = DB::table('reviews')
                    ->orderBy('id','DESC')
                    ->whereRaw('reviewable_type=?','Publishers')
                    ->get();

        $users = DB::table('users')
                    ->get();
        
        return view('reviews.publisherReviews', ['publishers' => $publishers,"reviews"=>$reviews,"users"=>$users]);
    }

    // author review
    public function authorReview($id){
        $authors = DB::table('authors')
                    ->whereRaw('id=?', $id)
                    ->get();
        $reviews = DB::table('reviews')
                    ->orderBy('id','DESC')
                    ->whereRaw('reviewable_type=?','Authors')
                    ->get();
        $users = DB::table('users')
                    ->get();
        
        return view('reviews.authorReviews', ['authors' => $authors,"reviews"=>$reviews,"users"=>$users]);
    }

}
