<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class productController extends Controller
{
     public function index(){
        return view('admin.addProduct');
    }
      public function show(){
        $product = Product::all();
         return view('admin.listProduct')->with('product',$product);

    }
public function store(Request $request)
{
    // 1. إنشاء كائن المنتج
    $product = new Product();
    
 

    // 3. تعيين القيم
    $product->name = $request->name;
    $product->description = $request->disc;
    $product->quantity = $request->quantity;
    $product->cost_price = $request->cost_price;
    $product->purchase_price = $request->purchase_price;
    $product->brand = $request->brand;
    
    // 4. تصحيح اسم حقل الفئة (category_id بدلاً من catgorey_id)
    $product->catgorey_id  = $request->parent;
    
    // 5. أفضل طريقة للحصول على ID المستخدم
    $product->user_id = Auth::user()->id;
    
    // 6. حفظ المنتج
    $product->save();

    // 7. إعادة توجيه بعد الحفظ (مهم!)
    return response()->json($product);
}
public function editProduct( $id)
{
  $product = Product::find($id);
  return view('admin.updateProduct')->with('product',$product);

}
public function update(Request $request, $id)  {
  $product = Product::find($id);
  $product->name = $request->name;
  $product->description = $request->disc;
  $product->quantity = $request->quantity;
  $product->cost_price = $request->cost_price;
  $product->purchase_price = $request->purchase_price;
  $product->brand = $request->brand;
  //$product->catgorey_id = $request->parent;
  $product->user_id = Auth::user()->id;
  $product->save();
  return response()->json($product);
}
public function destroyProduct( $id)
{
  $deleteProduct = Product::destroy($id);
    if($deleteProduct){
          return redirect()->route('listProduct');
        }
        else
        {
            return redirect()->back()->with("sucess","لم يتم الحذف");



        }
  
}  
 


    //
}
