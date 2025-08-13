<?php 
namespace App\Repositories;

use App\Models\Supplier;

class SupplierRepository
{public $supplier;
    public function __construct(Supplier $supplier){
        $this->supplier = $supplier;

    }


  public function getAll(){
   return $this->supplier->get();

  }
public function getById($id){
    return $this->supplier->findOrFail($id);
    
}
public function store(array $data){
    return $this->supplier->create($data);
    
}
public function update($id, array $data){

    return $this->supplier->find($id);
    
}
public function delete($id){
   return $this->supplier->destroy($id);
    
}
public function attachSuppliers($productId, array $suppliers){
    
}
public function detachSuppliers($productId, array $suppliers){
    
}
public function addImage($productId, $image){
    
}
public function removeImage($productId){
    
}


}


