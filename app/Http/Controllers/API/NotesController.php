<?php
//Notes Controller
namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Exception;

class NotesController extends Controller
{
/***
 * Notes Lists
 * @param Request $request
*/
    public function listNotes(Request $request){
        $user = Auth::user();
       try{
           $notes_lists = DB::table('notes')
               ->select('*')
               ->get();
           return response()->json($notes_lists, Response::HTTP_OK);
       }
       catch (Exception $e) {
           return response()->json([
               'message' => $e->getMessage()],
               Response::HTTP_NOT_FOUND);
       }
    }

 /***
 * Add Notes
 * @param Request $request
 */
    public function addNotes(Request $request){
        $user = Auth::user();
        try{
            $note_body = $request->notesBody;

            DB::table('notes')
                ->insert(
                    ['body' => $note_body ]
                );;

            return response()->json('Add Notes Success', Response::HTTP_OK);

        }
        catch(\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /***
     * EDIT Notes
     * @param Request $request
     */
    public function editNotes(Request $request){
        $user = Auth::user();
        try{
            $id = $request->noteId;
            $note_body = $request->notesBody;

            DB::table('notes')
                ->updateOrInsert(
                    ['id' => $id],
                    ['body' => $note_body ]
                );
            return response()->json('Edit Notes Success', Response::HTTP_OK);
        }
        catch(\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /***
     * delete Notes
     * @param Request $request
     */
    public function delete(Request $request){
        try{
            $id = $request->noteId;
            $note_body = $request->notesBody;

            DB::table('notes')
                ->where('id','=',$id)
                ->delete();

            return response()->json('Delete Notes Success', Response::HTTP_OK);
        }
        catch(\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()],
                Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}

