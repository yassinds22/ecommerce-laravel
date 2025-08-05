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
    
    //$product-> = $request->product_id;

    
    // 4. تصحيح اسم حقل الفئة (category_id بدلاً من catgorey_id)
    $product->catgorey_id  = $request->parent;
    
    // 5. أفضل طريقة للحصول على ID المستخدم
    $product->user_id = Auth::user()->id;
    $product->addMedia($request->file('image'))->toMediaCollection('images');
    
    // 6. حفظ المنتج
    $product->save();
      $product->suppliers()->attach($request->supplier);


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
  if ($request->hasFile('image')) {
   
    $product->clearMediaCollection('images');
    $product->addMedia($request->file('image'))->toMediaCollection('images');
}

  //$product->catgorey_id = $request->parent;
  $product->user_id = Auth::user()->id;
  $product->save();
  return redirect()->route('listProduct')->with('success','تم تعديل المنتج بنجاح');
}
public function destroyProduct($id)
{
    $deleteProduct = Product::destroy($id);

    if ($deleteProduct) {
        // لو الطلب AJAX، رجع JSON
        if (request()->ajax()) {
            return response()->json(['success' => true, 'message' => 'تم حذف المنتج']);
        }
        return redirect()->route('listProduct')->with('success', 'تم حذف المنتج');
    } else {
        if (request()->ajax()) {
            return response()->json(['success' => false, 'message' => 'لم يتم الحذف']);
        }
        return redirect()->back()->with('error', 'لم يتم الحذف');
    }
}

 


    //
}
