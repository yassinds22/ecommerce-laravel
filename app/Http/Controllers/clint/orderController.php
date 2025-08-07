<?php

namespace App\Http\Controllers\clint;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItme;
use App\Models\ItemOrder;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
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
    DB::beginTransaction();
    
    try {
        $pendingOrder = Order::where('user_id', Auth::id())
                            ->where('status', 'pending')
                            ->first();

        if ($pendingOrder) {
            // تحديث الطلب الموجود
            $pendingOrder->subtotal += $request->subtotal;
            $pendingOrder->tax += $request->tax;
            $pendingOrder->total += $request->total;
            $pendingOrder->save();
            
            // تحديث أو إضافة العناصر
            foreach ($request->items as $item) {
                $existingItem = OrderItem::where('order_id', $pendingOrder->id)
                                        ->where('product_id', $item['product_id'])
                                        ->first();
                
                if ($existingItem) {
                    // زيادة الكمية مع الحفاظ على السعر الأصلي
                    $existingItem->quantity += $item['quantity'];
                    $existingItem->save();
                } else {
                    // إضافة عنصر جديد مع السعر الحالي
                    OrderItem::create([
                        'order_id' => $pendingOrder->id,
                        'product_id' => $item['product_id'],
                        'quantity' => $item['quantity'],
                        'price' => $item['unit_price']
                    ]);
                }
            }
            
            // تحديث مبلغ الدفع ليعكس القيمة الجديدة
            $payment = Payment::where('order_id', $pendingOrder->id)->first();
            if ($payment) {
                $payment->amount = $pendingOrder->total;
                $payment->save();
            }
            
            $message = 'تم تحديث الطلب الحالي بإضافة العناصر الجديدة';
            $order_id = $pendingOrder->id;
        } else {
            // إنشاء طلب جديد
            $order = Order::create([
                'user_id' => Auth::id(),
                'subtotal' => $request->subtotal,
               
                'tax' => $request->tax,
                'total' => $request->total,
                'status' => 'pending',
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                
            ]);
            
            // إضافة العناصر
            foreach ($request->items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['unit_price']
                ]);
            }
            
            // إنشاء سجل الدفع
            Payment::create([
                'order_id' => $order->id,
                'method' => 'cash_on_delivery',
                'amount' => $request->total,
                'status' => 'pending',
                'is_paid' => false,
                 'transaction_id' => 'COD-' . date('YmdHis') . '-' . $order->id
            ]);
            
            $message = 'تم إنشاء طلب جديد بنجاح';
            $order_id = $order->id;
        }
        
        // حذف السلة بعد التأكيد
        Cart::where('user_id', Auth::id())->delete();
        
        DB::commit();
        
        return response()->json([
            'success' => true,
            'message' => $message,
            'order_id' => $order_id
        ]);
        
    } catch (\Exception $e) {
        DB::rollback();
        return response()->json([
            'success' => false,
            'message' => 'حدث خطأ أثناء العملية: ' . $e->getMessage()
        ], 500);
    }
}

    //
}
