<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();

        if($user->id == 3)
        {
            $note = Note::query()
            ->orderBy("created_at","desc")
            ->paginate();
        

        }
        else{
        $note = Note::query()
        ->where("user_id", request()->user()->id)
        ->orderBy("created_at","desc")
        ->paginate();
        }
       return view('note.index', ['notes'=> $note]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('note.create',  );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
       
       
       $data = $request->validate([
        'note'=> ['required','string']
        ]);
      

        
        $data['user_id']= $request->user()->id;
      

        $note = Note::create($data);
        return to_route('note.show',$note)->with('message','Note was created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note, Request $request)
    {

        $user = $request->user();
        if($note->user_id !== request()->user()->id &&  $user->id !== 3){
            abort(403); 
        }

        return view('note.show', ['notes'=> $note]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note, Request $request)
    {
        $user = $request->user();
        if($note->user_id !== request()->user()->id &&  $user->id !== 3){
            abort(403); 
        }
        return view('note.edit', ['notes'=> $note]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Note $note)
    {
        $data = $request->validate([
            'note'=> ['required','string']
            ]);
           
    
            $note->update($data);
            return to_route('note.show',$note)->with('message','Note was updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
     $note->delete();
     
     return to_route('note.index')->with('message','Note was deleted');

    }
}
