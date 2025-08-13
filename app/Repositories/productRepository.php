<?php 


namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    public $product;
    public function __construct(Product $product){
        $this->product = $product;
    }
    public function getAll(){
        return $this->product->all();

    }
public function getById($id){
    return $this->product->find($id);
    
}
public function create(array $data){
    return $this->product->create($data);
    
}
public function update($id){
   return $this->product->find($id);
    
}
public function delete($id){
    
}
public function attachSuppliers($productId, array $suppliers){
    
}
public function detachSuppliers(){
    
}
public function addImage($productId, $image){

}
public function removeImage($productId){
    
}

}