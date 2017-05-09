<?php

namespace App\Http\Controllers;


use App\Note;
use App\Card;
use Illuminate\Http\Request;
use App\Http\Requests;

class NotesController extends Controller
{
    public function store(Request $request, Card $card)
    {
        $this->validate($request,[
            'body' => 'required|min:10'
        ]);

//        $note = new Note;
//        $note->body = $request->body; // input user input data to body on notes
//        $card->notes()->save($note);// save

//        $card->notes()->create($request->all());
        $note = new Note($request->all());
//        $note->by(Auth::user());
//        $note->user_id = 1;
        $card->addNote($note, 1);

        return back();
    }

    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    public function update(Note $note, Request $request)
    {
        $note->update($request->all());

        return back();
    }
}
