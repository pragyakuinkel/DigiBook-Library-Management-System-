<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Publisher;
use App\Models\Authors;
use Illuminate\Http\RedirectResponse;

class AuthorController extends Controller
{
    /**
     * Handle an incoming add request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255','regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Authors::class]
        ]);
        
        // store author info 
        $author = Authors::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect('/authors');
    }

    // select all from authors table
    public function authorInfo(){
        $authors = DB::table('authors')
                    ->paginate(10);
        return view('admin.authors.authors', ['authors' => $authors]);
    }

    // select specific from author table
    public function selectAuthor($id){
        $author = DB::table('authors')
        ->whereRaw('id=?', $id)
        ->first();
        return view('admin.authors.editAuthor', ['author' => $author]);
    }

    // delete from author table
    public function deleteAuthor($id){
        //here left to check if the publisher is linked with any books so a alert box is called to make sure user still wants to comtinue
        $publisher = Authors::findOrFail($id);  
        $publisher->delete();
        return redirect('/authors');
    }

    // update the authors table
    public function updateAuthor(Request $request,$id): RedirectResponse
    {
        //validate the info
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255','regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:authors,email,'.$id],//check that the user email only belong to that uerid and no other
        ]);

        // update the author info
        $authors = DB::table('authors')
                    ->where('id', $id)
                    ->update([
                        'name' => $request->name,
                        'email' => $request->email,
                    ]); 

        return redirect('/authors');
    }

}
