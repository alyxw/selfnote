<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Note;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;

class NoteController extends Controller
{

    public function GetAllNotes()
    {
        $notes = Note::select('id', 'updated_at', 'title', 'new')->where('user_id', Auth::id())->orderBy('updated_at', 'desc')->get();
        return Response()->json($notes, 200);
    }

    public function GetNote(Request $request, $id)
    {
        $note = Note::findorfail($id);
        if ($note->user_id != Auth::id()) return abort(403);
        return Response()->json($note);
    }

    public function ViewNoteEditor(Request $request, $id)
    {
        $note = Note::findorfail($id);
        if ($note->user_id != Auth::id()) return abort(403);
        return view('editnote', ['id' => $id]);
    }

    public function UpdateNote(Request $request, $id)
    {
        $note = Note::findorfail($id);
        if ($note->user_id != Auth::id()) return abort(403);
        $note->title = $request->title;
        $note->body = $request->body;
        $note->new = false;
        $note->save();
        return Response()->json($note);
    }

    public function NewNote(Request $request)
    {
        $note = new Note;
        $note->user_id = Auth::id();
        $note->new = true;
        $note->save();
        return redirect()->route('note.edit.get', [$note->id]);
    }
}
