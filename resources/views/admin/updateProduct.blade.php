@extends('admin.index')
@section('content')
    <style>
    .p-validtor{
        color: red;
        padding: 5px;
        font-size: 12px;
    }
    #loading-overlay {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0,0,0,0.5);
        display: none;
        justify-content: center;
        align-items: center;
        z-index: 9999;
    }
    #loading-text {
        color: white;
        font-size: 24px;
        background: rgba(0,0,0,0.7);
        padding: 20px;
        border-radius: 5px;
    }
    .alert-danger {
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
        padding: 15px;
        margin-bottom: 20px;
        border-radius: 5px;
    }
</style>
<div id="loading-overlay">
    <div id="loading-text">جاري التحديث...</div>
</div>

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
                            <input type="text" class="form-control" name="name" value="{{$product->name}}" multiple id="inputCity">
                            <p class="p-validtor" id="name-error"></p>
                        </div>
                        @php
                        $cat=App\Models\Catgory::all();
                       
                        @endphp
                        <div class="form-group col-md-3">
                                <label class="col-form-label">صنف المنتج</label>
                                <select name="parent" class="form-control" id="categorySelect">
                                   
                                   @foreach ($cat as $catgory )
   <option value="{{ $catgory->id }}" {{ $catgory->id == $product->catgorey_id ? 'selected' : '' }}>
       {{ $catgory->name }}
   </option>
@endforeach
                                </select>
                            </div>
                        <div class="form-group col-md-3">
                            <label for="inputZip" class="col-form-label">البراند</label>
                            <input type="text" class="form-control" name="brand" value="{{$product->brand}}" id="inputZip">
                            <p class="p-validtor" id="brand-error"></p>
                        </div>

                         <div class="form-group col-md-3">
                            <label for="inputZip" class="col-form-label">الكمية</label>
                            <input type="text" class="form-control" name="quantity" value="{{$product->quantity}}" id="inputZip">
                            <p class="p-validtor" id="quantity-error"></p>
                        </div>
    

                        <div class="form-group col-md-3">
                            <label for="inputZip" class="col-form-label">سعر  الشراء</label>
                            <input type="text" class="form-control" name="cost_price" value="{{$product->cost_price}}" id="inputZip">
                            <p class="p-validtor" id="cost_price-error"></p>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputZip" class="col-form-label">سعر البيع </label>
                            <input type="text" class="form-control" name="purchase_price" value="{{$product->purchase_price}}" id="inputZip">
                            <p class="p-validtor" id="purchase_price-error"></p>
                        </div>
                    </div>
                    <div class="from-row">
                        <div class="form-group col-md-12">
                            <label for="inputZip" class="col-form-label">أضافة صورة</label>
                            <input type="file" class="form-control" id="inputZip" name="image">
                            <p class="p-validtor" id="image-error"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">وصف المنتج</label>
                        <textarea class="form-control" name="description" rows="4" placeholder="Address2.." id="description">{{$product->description}}</textarea>
                        <p class="p-validtor" id="description-error"></p>
                    </div>

                    <div class="form-group">
                        <div class="form-check pl-0">
                            <div class="checkbox checkbox-secondary"><input id="checkbox1" type="checkbox">
                                <label for="checkbox1"><span> I Agree !</span></label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary ">أضافة</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    // إضافة Ajax للنموذج
    $('#productForm').submit(function(e) {
        e.preventDefault();
        
        // إظهار شاشة التحميل
        $('#loading-overlay').show();
        
        // إخفاء جميع رسائل الخطأ السابقة
        $('.p-validtor').text('').hide();
        
        // إنشاء بيانات النموذج
        let formData = new FormData(this);
        
        // إرسال البيانات عبر Ajax
        $.ajax({
            url: "{{ route('updatProduct', $product->id) }}",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                // إخفاء شاشة التحميل
                $('#loading-overlay').hide();
                
                if(response.success) {
                    // رسالة النجاح
                    alert('تم تحديث المنتج بنجاح');
                    // التوجيه إلى صفحة قائمة المنتجات
                    window.location.href = "{{ route('listProduct') }}";
                } else {
                    // رسالة الفشل
                    alert('فشل في تحديث المنتج: ' + (response.message || 'حدث خطأ غير معروف'));
                }
            },
            error: function(xhr) {
                // إخفاء شاشة التحميل
                $('#loading-overlay').hide();
                
                // إذا كان الخطأ من نوع 422 (أخطاء تحقق)
                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    
                    // عرض أخطاء التحقق تحت الحقول
                    $.each(errors, function(field, messages) {
                        var errorField = $('#' + field + '-error');
                        if (errorField.length) {
                            errorField.text(messages[0]).show();
                        } else {
                            alert(messages[0]);
                        }
                    });
                } else {
                    alert('فشل في تحديث المنتج: ' + (xhr.responseJSON?.message || 'حدث خطأ في الخادم'));
                }
            }
        });
    });
});
</script>
@endsection