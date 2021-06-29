<?php


namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

// Model
use App\Model\LessonClass;

class LessonController extends Controller
{
  public function index(Request $req)
  {
    $id = $req->user_id;
    $status = $req->st;
    $item = $req->item;

    switch ($status) {
      case 'select':
      $_var = LessonClass::select('item')
                         ->where('student_idx','=',$id)
                         ->get();

      return response()->json([
        'data' => $_var
      ]);
      break;

      case 'insert':
      $_var = LessonClass::insert([
        ['student_idx' => $id, 'item' => $item]
      ]);

      return response()->json([
        'result' => 'Y'
      ]);
      break;
    }
  }
}


?>
