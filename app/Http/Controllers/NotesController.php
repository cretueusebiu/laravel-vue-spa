<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Notes;
use Illuminate\Support\Facades\Auth;
class NotesController extends Controller
{
    public function createNote(Request $req) {
        try {
           $note = new Notes; 
           $note->userId = Auth::user()->id;
           $note->subject = $req->get('subject');
           $note->message = $req->get('note');
           $note->save();
           return response()->json([
               'status' => 200,
               'message' => 'The note has been successfully created.',
           ]);
        } catch (Exception $exc) {
            dd($exc);
        }        
    }

    public function index(Request $req) {
        
    }

    public function edit($id) {
        return view('noteEdit')->with($id);
    }

    public function getNoteById($id) {
        $note = Notes::find($id);
        return response()->json([
            'status'=> 200,
            'data' => $note
        ]);
    }

    public function getNotes() {
        try {
         
           return Notes::where('userId', Auth::user()->id)->get();
        } catch(Exception $exc) {
            dd($exc);
        }
    }

    public function update(Request $req, $id) {
        try {
            
            $note = Notes::find($id);
            $note->subject = $req->get('subject');
           $note->message = $req->get('note');
           $note->update();
           return response()->json([
               'status' => 200,
               'message' => 'The note has been successfully updated.',
           ]);
        } catch(Exception $exc) {
            dd($exc);
        }
    }

     public function delete(Request $req, $id) {
        try {
            
            Notes::findOrFail($id)->delete();
            
           return response()->json([
               'status' => 200,
               'message' => 'The note has been successfully deleted.',
           ]);
        } catch(Exception $exc) {
            dd($exc);
        }
    }
}
