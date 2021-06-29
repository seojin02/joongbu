<?

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;

// Model
use App\Model\ExperienceClass;

use App\Model\ClassConfig;

class ClassDeleteController extends Controller
{
  public function index(Request $req)
  {
    $id = $req->id;
    $select_flag = $req->selectFlag;

    try{
      $_class = ExperienceClass::where('id','=',$id)->delete();
      return response()->json([
        'result' => 'Y'
      ]);
    }catch(Exception $e){
      return response()->json([
        'result' => 'N'
      ]);
    }
  }

  public function store(Request $request)
  {

  }

  public function edit(Request $request)
  {

  }

  public function destory(Request $request, $id)
  {

  }
}

?>
