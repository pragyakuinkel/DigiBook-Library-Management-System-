<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Publisher;
use Illuminate\Http\RedirectResponse;

class PublisherController extends Controller
{
    /**
     * Handle an incoming add request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        //validate info
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Publisher::class],
            'address' => ['required'],
        ]);

        $publisher = Publisher::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
        ]);

        return redirect('/publishers');
    }

    // select all from publisher table
    public function publisherInfo(){

        $publishers = DB::table('publishers')
                    ->paginate(10);

        return view('admin.publishers.publishers', ['publishers' => $publishers]);
    }

    // select specific from publisher table
    public function selectPublisher($id){

        $publisher = DB::table('publishers')
        ->whereRaw('id=?', $id)
        ->get();

        return view('admin.publishers.editPublisher', ['publisher' => $publisher]);
    }

    // delete from updater table
    public function deletePublisher($id){

        //here left to check if the publisher is linked with any books so a alert box is called to make sure user still wants to comtinue
        $publisher = Publisher::findOrFail($id);  

        $publisher->delete();

        return redirect('/publishers');
    }

    // update the publisher table
    public function updatePublisher(Request $request,$id): RedirectResponse
    {
        $validator = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:publishers,email,'.$id],//check that the user email only belong to that uerid and no other
            'address' => ['required'],
        ]);

        $publisher = DB::table('publishers')
                    ->where('id', $id)
                    ->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'address' => $request->address,
                    ]); 

        return redirect('/publishers');
    }

}
