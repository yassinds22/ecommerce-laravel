<?php 

namespace App\Repositories;

use App\Models\Catgory;



class CategoryRepositry
{public $catory;
    public function __construct(Catgory $catory){
        $this->catory = $catory;
    }




    public function getAll(){
        return $this->catory->all();

    }
public function getById($id){
    return $this->catory->findOrFail($id);

}
public function storeCatgory(array $data){
    return $this->catory->create($data);

}
public function update($id, array $data,$image){
    return $this->catory->update($id, $data);

}
public function delete($id){
    return $this->catory->findOrFail($id);

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