<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCatgoryRequest;
use App\Models\Catgory;
use App\Services\CatgoryServices;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class catgiryController extends Controller
{
  public $catgoryServices;
  public function __construct(CatgoryServices $catgoryServices){
    $this->catgoryServices = $catgoryServices;

  }
    public function index(){
        return view('admin.addCatgory');
    }
  
  public function store(StoreCatgoryRequest $request)
{
    $validated = $request->validated();
    $validated['user_id'] = Auth::id();
    
      $catgory = $this->catgoryServices->storeCategory(data: $validated,image: $request->file('image')  );
        return response()->json($catgory);
 
}




      public function listCatgory(){
        $allCatgory =$this->catgoryServices->getAll();
         return view('admin.listCatgory')->with('data',$allCatgory);

    }
   public function editCatgory( $id)
{
  $product =$this->catgoryServices->getById($id);
  return view('admin.updateCatgory')->with('product',$product);


}
public function updateCatgory(StoreCatgoryRequest $request, $id) 
{
    $validated = $request->validated();
    
    try {
        $this->catgoryServices->updateCategory(
            id: $id,
            data: $validated,
            image: $request->file('image') // قد يكون null
        );

        return redirect()->route('listCategory')->with('success', 'تم تعديل الصنف بنجاح');

    } catch (\Exception $e) {
        return redirect()->back()
            ->withInput()
            ->with('error', 'فشل في تعديل الصنف: ' . $e->getMessage());
    }
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
