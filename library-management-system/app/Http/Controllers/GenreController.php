<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\RedirectResponse;
use App\Models\Genre;

// genre infro 
class GenreController extends Controller
{
    /**
     * Handle an incoming add request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // store the genre info
        $request->validate([
            'name' => ['required', 'string', 'max:255','unique:'.Genre::class,'regex:/^[a-zA-Z\s]+$/'],
        ]);

        Genre::create([
            'name' => $request->name,
        ]);

        return redirect('/genre');
    }

    // select all from genre table
    public function genreInfo(){

        $genres = DB::table('genres')
                    ->paginate(10);

        return view('admin.genre.genre', ['genres' => $genres]);
    }

    // select specific from genre table
    public function selectGenre($id){

        $genre = DB::table('genres')
                ->where('id', $id)
                ->first();

        return view('/admin/genre/editGenre', ['genre' => $genre]);
    }

    // update the genre table
    public function updateGenre(Request $request,$id): RedirectResponse
    {
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255','regex:/^[a-zA-Z\s]+$/','unique:authors,name,'.$id],
        ]);

        $genre = DB::table('genres')
                    ->where('id', $id)
                    ->update([
                        'name' => $request->name,
                    ]); 

        return redirect('/genre');
    }

    // delete from updater table
    public function deleteGenre($id){

        $genre = Genre::findOrFail($id);  

        $genre->delete();

        return redirect('/genre');
    }
}
