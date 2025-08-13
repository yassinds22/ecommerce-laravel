<?php 
namespace App\Services;

use App\Models\Catgory;
use App\Models\Supplier;
use App\Repositories\SupplierRepository;

class SupplierService
{public $supplierRepository;
    public function __construct(SupplierRepository $supplierRepository){
        $this->supplierRepository = $supplierRepository;

    }
    public function storeSupplier($data){
       return  $this->supplierRepository->store($data);
       
          return response()->json([
            'message' => 'Supplier added successfully!',
            'data'    => $supplier
        ], 200); 
          
    }

    public function showSupplier(){
        return $this->supplierRepository->getAll();
    }

    public function getById($id){
        return $this->supplierRepository->getById($id);
        
    }
     public function updateCatgory( $id, $params){
      $update= Supplier::find($id);
      $update->update($params);
    }
    public function destroySupplier($id){
        return $this->supplierRepository->delete($id);
    }


}