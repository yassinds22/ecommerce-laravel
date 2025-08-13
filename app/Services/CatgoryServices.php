<?php

namespace App\Services;

use App\Models\Catgory;
use App\Repositories\CategoryRepositry;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CatgoryServices
{public $categoryRepositry;
    public function __construct(CategoryRepositry $categoryRepositry){
        $this->categoryRepositry = $categoryRepositry;
    }
    // 🔹 إنشاء سجل جديد
    public function storeCategory(array $data, $image)
{
    // إنشاء الكائن بدون صورة (تخزين البيانات الأساسية)
    try {
        DB::beginTransaction();
        $catgory = $this->categoryRepositry->storeCatgory($data, $image);

        $this->uploadImage($catgory, $image);
        Db::commit();

        return $catgory;

    }
    catch (\Exception $e) {

           DB::rollBack();
            Log::error('Category creation failed: ' . $e->getMessage());
            throw new \Exception('Failed to create category');
    }

    // التحقق من وجود الملف قبل التحميل
   

    return $cat;
}


    // 🔹 جلب جميع السجلات
    public function getAll()
    {
        return $this->categoryRepositry->getAll();
    }

    // 🔹 جلب السجل بواسطة الـ ID
    public function getById($id)
    {
        return $this->categoryRepositry->getById($id);
    }

    // 🔹 تحديث سجل
// Service
public function updateCategory($id, array $data, $image = null)
{
    $category = Catgory::findOrFail($id);
    $category->update($data);

    // تحديث الصورة إذا وجدت
    if ($image) {
        $category->clearMediaCollection('imagesCat');
        $this->uploadImage($category, $image);
    }

    return $category;
}

// رفع الصورة (خدمة فرعية)
public function uploadImage( $catgory, $image){
 if ($image) {
        $catgory->addMedia($image)->toMediaCollection('imagesCat');
    }

}




    // 🔹 حذف سجل
    public function delete($id)
    {
        $cat =$this->categoryRepositry->delete($id);
        return $cat->delete();
    }

    
}
