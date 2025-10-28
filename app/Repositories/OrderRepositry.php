<?php 

namespace App\Repositories;

use App\Models\Order;

class OrderRepositry
{ public $order;
    public function __construct(Order $order){
        $this->order = $order;
    }

    public function getAll(){
        return $this->order->get();

    }
    public function getById($id){
        return $this->order->with([
            'user', 
            'items.product',
            'payments' 
            
        ])->findOrFail($id);
    }
    public function getUpdateById($orderId){
        return $this->order->with([
            'user', 
            'items.product',
            'payments' 
            
        ])->findOrFail($orderId);
    }
    public function destroyById($id){
        $this->order->destroy($id);
    }
}