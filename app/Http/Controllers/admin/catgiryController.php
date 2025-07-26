<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Catgory;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class catgiryController extends Controller
{
    public function index(){
        return view('admin.addCatgory');
    }
  
    public function store(Request $request){
  //     $validtor=Validator( $request->all([
  //   'name'=>'required|min:5|max:30',

  // ],
  // [
  //   'name.required'=> 'هذا القل مطلوب ',
  //   'name.min'=> 'لازم يكون الاسم اكبر من 5 حروف',
  //   'name.max'=> 'لازم يكون الاسم اقل من 50 حروف',
  // ]
  // ) );
  // if( $validtor ->fails() ){
  //   return back()->withErrors($validtor->errors());

  // }
     $catgory = new Catgory();  
     $catgory->name = $request->name;
     $catgory->parint = $request->parint;
     $catgory->user_id=Auth::user()->id;
     
     $catgory->save();
     return response()->json($catgory);
    }

      public function listCatgory(){
        $allCatgory = Catgory::all();
         return view('admin.listCatgory')->with('data',$allCatgory);

    }
   public function editCatgory( $id)
{
  $product = Catgory::find($id);
  return view('admin.updateCatgory')->with('product',$product);


}
public function updateCatgory(Request $request, $id) 
{
  
  $catgory = Catgory::find($id);
  $catgory->name = $request->name;
  $catgory->parint = $request->parint;
  $catgory->user_id=Auth::user()->id;
  $catgory->save();
  return response()->json($catgory);
}
public function destroyCatgory( $id)
{
    $deleteCatgory = Catgory::destroy($id);
    if($deleteCatgory){
          return redirect()->route('listCatgory');
        }
        else
        {
            return redirect()->back()->with("sucess","لم يتم الحذف");



        }
}    //
}
