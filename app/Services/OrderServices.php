<?php 



namespace App\Services;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Repositories\OrderRepositry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderServices{
    public $orderRepositry;
    public function __construct(OrderRepositry $orderRepositry){
        $this->orderRepositry = $orderRepositry;

    }

    public function getAll(){
        return $this->orderRepositry->getAll();
    }
    public function storeOrder(){

        return Order::where('user_id', Auth::id())
                            ->where('status', 'pending')
                            ->first();

    }
    //create Order
    public function createOrder($request){
        return  Order::create([
                'user_id' => Auth::id(),
                'subtotal' => $request->subtotal,
               
                'tax' => $request->tax,
                'total' => $request->total,
                'status' => 'pending',
                'order_number' => 'ORD-' . strtoupper(uniqid()),
                
            ]);

            
    }

    public function addItemOrder($request,$order){
          // إضافة العناصر
            foreach ($request->items as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $item['unit_price']
                ]);
                return;
    }
}

public function createRecordPayment($request,$order){

       Payment::create([
                'order_id' => $order->id,
                'method' => 'cash_on_delivery',
                'amount' => $request->total,
                'status' => 'pending',
                'is_paid' => false,
                 'transaction_id' => 'COD-' . date('YmdHis') . '-' . $order->id
            ]);
}
  

    // حذف سلة المستخدم
    public function clearCart()
    {
        Cart::where('user_id', Auth::id())->delete();
    }


    //end store


    public function getById($id){
         return $this->orderRepositry->getById($id);
    }

    public function updateById($Id){
        return  $this->orderRepositry->getUpdateById($Id);
    }

    public function destroy($id){
        return $this->orderRepositry->destroyById($id);
    }
    

}




