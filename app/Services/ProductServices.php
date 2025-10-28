<?php


namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductServices
{
    public $productRepository;
    public function __construct(ProductRepository $productRepository){
        $this->productRepository = $productRepository;

    }
    function getAllProducts() {
        return $this->productRepository->getAll();
    }

function getProductById($id) {
    return $this->productRepository->getById($id);
}

function storeProduct(array $data,$image) {
    $product= $this->productRepository->create($data);



    $this->uploadImage($product,$image);

    return $product;


    
}


public function updateProduct(array $data, $id,$image)
{
   $product= $this->productRepository->update($id);
   $product->update($data);
   
   $this->uploadImage($product,$image);
   return $product;
}

public function updateSupplierProduct($request,$product){
   if ($request->filled('supplier')) {
            $product->suppliers()->sync($request->supplier);
        }
        return ;
}


protected function uploadImage(Product $product, $image)
{
    if ($product->hasMedia('images')) {
        $product->clearMediaCollection('images');
    }
    $product->addMedia($image)->toMediaCollection('images');
}


function deleteProduct($id) {
    return Product::destroy($id);
}


// public function uploadImage( $catgory, $image){
//  if ($image) {
//         $catgory->addMedia($image)->toMediaCollection('images');
//     }

// }




}