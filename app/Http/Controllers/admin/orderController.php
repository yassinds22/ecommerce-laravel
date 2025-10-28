<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Services\OrderServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class orderController extends Controller
{
    public $orderService;
    public function __construct(OrderServices $orderService){
        $this->orderService = $orderService;

    }
    
    public function index(){
        
        $orders=$this->orderService->getAll();
       
       return view("admin.listOrder")->with("data",$orders);
    
    }





public function store(Request $request)
{
    DB::beginTransaction();
    
    try {
        $pendingOrder =$this->orderService->storeOrder();

        if ($pendingOrder) {
            // تحديث الطلب الموجود
            $pendingOrder->subtotal += $request->subtotal;
            $pendingOrder->tax += $request->tax;
            $pendingOrder->total += $request->total;
            $pendingOrder->save();
            
            // تحديث أو إضافة العناصر
            foreach ($request->items as $item) {
                $existingItem = 
                OrderItem::where('order_id', $pendingOrder->id)
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
            $order =$this->orderService->createOrder($request);
            
            //  إضافة العناصر الطلب
           $this->orderService->addItemOrder($request, $order);
            
            // إنشاء سجل الدفع
         $this->orderService->createRecordPayment($request, $order);
            
            $message = 'تم إنشاء طلب جديد بنجاح';
            $order_id = $order->id;
        }

        $this->orderService->clearCart();
        
        // حذف السلة بعد التأكيد
       // Cart::where('user_id', Auth::id())->delete();
        
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

public function veiwOrderNumber($id){
 $order = $this->orderService->getById($id);
    
    return view('admin.detailsOrder')->with('data', $order);
  
}
public function updateOrder($id){
 $order =$this->orderService->updateById($id);
        return view('admin.updateOrder')->with('data', $order);

}

public function destoryOrder($id){
    $order=$this->orderService->destroy($id);
    if ($order) {
        return redirect()->route('listorder')->with('success','تم حذف الطلبية');
    }
    else {
        return redirect()->back()->with('error','لم يتم الحذف');
    }

}


}

