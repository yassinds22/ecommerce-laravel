<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Services\CatgoryServices;
use App\Services\ProductServices;
use App\Services\SupplierService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $productServices, $catgoryservices,$supplierService;

    public function __construct(ProductServices $productServices, CatgoryServices $catgoryServices,SupplierService $supplierService)
    {
        $this->productServices = $productServices;
        $this->catgoryservices=$catgoryServices;
        $this->supplierService=$supplierService;
    }

    /**
     * عرض صفحة إضافة منتج جديد
     */
    public function index()
    {
       // $allsupplier=$this->supplierService->;
       $allCat=$this->catgoryservices->getAll();
       $supplir=$this->supplierService->getAll();
        return view('admin.addProduct',compact('allCat','supplir'));
    }

    /**
     * عرض قائمة المنتجات
     */
    public function show()
    {
        $products = $this->productServices->getAllProducts();
        return view('admin.listProduct', compact('products'));
    }

    /**
     * حفظ منتج جديد في قاعدة البيانات
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        // ملاحظة: تأكد من أن اسم العمود الصحيح هو category_id
        $validated['category_id'] = $request->parent;
        $validated['user_id'] = Auth::id();

        $product = $this->productServices->storeProduct($validated, $request->file('image'));

        if ($request->filled('supplier')) {
            $product->suppliers()->attach($request->supplier);
        }

        return response()->json($product);
    }

    /**
     * عرض صفحة تعديل منتج
     */
    public function editProduct($id)
    {
        $product = $this->productServices->getProductById($id);
        return view('admin.updateProduct', compact('product'));
    }

    /**
     * تحديث بيانات منتج موجود
     */
    public function update(StoreProductRequest $request, $id)
    {
        $validated = $request->validated();
        $validated['user_id'] = Auth::id();
        $validated['category_id'] = $request->parent;

        $product = $this->productServices->updateProduct($validated, $id, $request->file('image'));

        if ($request->filled('supplier')) {
            $product->suppliers()->sync($request->supplier);
        }

        return response()->json([
            'success' => true,
            'data' => $product->fresh(), // جلب أحدث نسخة من البيانات
            'message' => 'تم تحديث المنتج بنجاح',
        ]);
    }

    /**
     * حذف منتج
     */
    public function destroyProduct($id)
    {
        $deleteProduct = $this->productServices->deleteProduct($id);

        if ($deleteProduct) {
            if (request()->ajax()) {
                return response()->json(['success' => true, 'message' => 'تم حذف المنتج']);
            }

            return redirect()->route('listProduct')->with('success', 'تم حذف المنتج');
        }

        if (request()->ajax()) {
            return response()->json(['success' => false, 'message' => 'لم يتم الحذف']);
        }

        return redirect()->back()->with('error', 'لم يتم الحذف');
    }
}
