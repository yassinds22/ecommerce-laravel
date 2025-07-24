@extends('admin.index')
@section('content')
    <style>
    .p-validtor{
        color: red;
        padding: 5px;
        font-size: 12px;
    }
</style>
<div class="row">
    <div class="col-md-12">
        <div class="card m-b-20">
            <div class="card-header">
                <h3 class="card-title">Form row</h3>
            </div>
            <div class="card-body">
                <form id="productForm" method="POST" enctype="multipart/form-data">
                    @csrf
                   <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputCity" class="col-form-label">أسم المنتج</label>
                            <input type="text" class="form-control" name="name" multiple id="productName">
                            <p class="p-validtor" id="nameError"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputState"  class="col-form-label">صنف المنتج</label>
                           <select id="categorySelect" name="parent" class="form-control">
                           @php
                            $cat= \App\Models\Catgory::all();
                             @endphp
                           @foreach($cat as $cat)
                           <option value="{{$cat->id}}">
                            {{$cat->name}}
                           </option>
                          @endforeach
                          </select>
                          <p class="p-validtor" id="parentError"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputZip" class="col-form-label">البراند</label>
                            <input type="text" class="form-control" name="brand" id="brandInput">
                            <p class="p-validtor" id="brandError"></p>
                        </div>

                         <div class="form-group col-md-3">
                            <label for="inputZip" class="col-form-label">الكمية</label>
                            <input type="text" class="form-control" name="quantity" id="quantityInput">
                            <p class="p-validtor" id="quantityError"></p>
                        </div>


                        <div class="form-group col-md-3">
                            <label for="inputZip" class="col-form-label">سعر الشراء</label>
                            <input type="text" class="form-control" name="cost_price" id="costPriceInput">
                            <p class="p-validtor" id="cost_priceError"></p>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputZip" class="col-form-label">سعر البيع</label>
                            <input type="text" class="form-control" name="purchase_price" id="purchasePriceInput">
                            <p class="p-validtor" id="purchase_priceError"></p>
                        </div>
                    </div>
                    
                    <div class="from-row">
                        <div class="form-group col-md-12">
                            <label for="inputZip" class="col-form-label">أضافة صورة</label>
                            <input type="file" class="form-control" id="imageInput" name="image">
                            <p class="p-validtor" id="imageError"></p>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="col-form-label">وصف المنتج</label>
                        <textarea class="form-control" name="disc" rows="4" placeholder="Address2.." id="descriptionTextarea"></textarea>
                        <p class="p-validtor" id="discError"></p>
                    </div>

                    <div class="form-group">
                        <div class="form-check pl-0">
                            <div class="checkbox checkbox-secondary">
                                <input id="checkbox1" type="checkbox">
                                <label for="checkbox1"><span> I Agree !</span></label>
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary" id="submitBtn">أضافة</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('productForm');
    const submitBtn = document.getElementById('submitBtn');
    
    form.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // إخفاء جميع رسائل الخطأ السابقة
        document.querySelectorAll('.p-validtor').forEach(el => el.textContent = '');
        
        // تعطيل زر الإرسال أثناء المعالجة
        submitBtn.disabled = true;
        submitBtn.textContent = 'جاري الإضافة...';
        
        // إنشاء FormData لإرسال البيانات
        const formData = new FormData(form);
        
        // إرسال البيانات باستخدام AJAX
        fetch("{{ route('storaddProduct') }}", {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            }
        })
        .then(response => {
            // إعادة تمكين زر الإرسال
            submitBtn.disabled = false;
            submitBtn.textContent = 'أضافة';
            
            // التحقق من حالة الاستجابة
            if (response.status === 200) {
                return response.json();
            } else if (response.status === 422) {
                return response.json().then(err => { throw err; });
            } else {
                throw new Error('فشل في إضافة المنتج');
            }
        })
        .then(data => {
            // إعادة تعيين النموذج عند النجاح
            form.reset();
            
            // عرض رسالة النجاح
            alert('تمت إضافة المنتج بنجاح!');
        })
        .catch(error => {
            console.error('Error:', error);
            
            // معالجة أخطاء التحقق
            if (error.errors) {
                for (const [key, value] of Object.entries(error.errors)) {
                    const errorElement = document.getElementById(key + 'Error');
                    if (errorElement) {
                        errorElement.textContent = value[0];
                    }
                }
            } else {
                alert(error.message || 'حدث خطأ أثناء إضافة المنتج');
            }
        });
    });
});
</script>
@endsection