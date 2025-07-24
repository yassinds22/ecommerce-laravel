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
                <form id="categoryForm" method="POST" enctype="multipart/form-data">
                    @csrf
                   <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCity" class="col-form-label">اسم الصنف</label>
                            <input  type="text" class="form-control"   name="name" id="inputCity">
                            <p class="p-validtor" id="nameError"></p>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState" class="col-form-label">نوع الصنف</label>
                            <select id="inputState" class="form-control" value="0" name="parint">
                                <option value="0">الرئسية</option>
                            </select>
                            <p class="p-validtor" id="parentError"></p>
                        </div>
                        
                    </div>
                  
                    <div class="form-group">
                        <div class="form-check pl-0">
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
        const form = document.getElementById('categoryForm');
        const submitBtn = document.getElementById('submitBtn');
        
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // إخفاء أي أخطاء سابقة
            document.querySelectorAll('.p-validtor').forEach(el => el.textContent = '');
            
            // تعطيل زر الإرسال لمنع الضغط المتكرر
            submitBtn.disabled = true;
            submitBtn.textContent = 'جاري الإضافة...';
            
            // إنشاء FormData لإرسال البيانات
            const formData = new FormData(form);
            
            // إرسال الطلب باستخدام AJAX
            fetch("{{ route('add.catgory') }}", {
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
                    throw new Error('فشل في الإضافة');
                }
            })
            .then(data => {
                // إعادة تعيين النموذج عند النجاح
                form.reset();
                
                // عرض رسالة النجاح
                alert('تمت إضافة الصنف بنجاح!');
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
                    alert(error.message || 'حدث خطأ أثناء الإضافة');
                }
            });
        });
    });
</script>
@endsection