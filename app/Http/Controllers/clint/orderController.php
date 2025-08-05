<?php

namespace App\Http\Controllers\clint;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItme;
use App\Models\ItemOrder;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Stmt\Return_;

class orderController extends Controller
{
    public function index(){
        return view("clint.orderCart");
    }


    public function store(Request $request)
    {
        // بدء معاملة قاعدة البيانات
        DB::beginTransaction();
        
        try {
            // إنشاء الطلب الجديد
            $order = new Order();
            $order->user_id = Auth::id(); // أو يمكنك استخدام $request->user()->id
            $order->subtotal = $request->subtotal;
            $order->tax = $request->tax;
            $order->total = $request->total;
            $order->status = 'pending'; // أو 'completed' حسب حالتك
             $order->order_number = 'ORD-' . strtoupper(uniqid());

            $order->save();
            
            // إضافة عناصر الطلب
            foreach ($request->items as $item) {
                $orderItem = new ItemOrder();
                $orderItem->order_id = $order->id;
                $orderItem->product_id = $item['product_id'];
                $orderItem->quantity = $item['quantity'];
                 $orderItem->price = $item['unit_price'];
                $orderItem->save();
            }
             Cart::where('user_id', Auth::id())->delete();
            
            // حفظ المعلومات في قاعدة البيانات
            DB::commit();
            
            return response()->json([
                'success' => true,
                'message' => 'تم إنشاء الطلب بنجاح!',
                'order_id' => $order->id
            ]);
            
        } catch (\Exception $e) {
            // التراجع في حالة حدوث خطأ
            DB::rollback();
            
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ أثناء إنشاء الطلب: ' . $e->getMessage()
            ], 500);
        }
    }

    //
}
