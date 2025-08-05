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
                <form id="categoryForm"   method="POST" enctype="multipart/form-data">
                    @csrf
                   <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="nameInput" class="col-form-label">اسم الصنف</label>
                            <input  type="text" class="form-control" name="name" value="{{$data->name}}" id="nameInput">
                            <p class="p-validtor" id="nameError"></p>
                        </div>

                         <div class="form-group col-md-4">
                            <label for="addressInput" class="col-form-label"> العنوان</label>
                            <input  type="text" class="form-control" name="address" value="{{$data->adddress}}" id="addressInput">
                            <p class="p-validtor" id="addressError"></p>
                        </div>

                         <div class="form-group col-md-4">
                            <label for="phoneInput" class="col-form-label"> رقم الجوال</label>
                            <input  type="text" class="form-control" name="phone" value="{{$data->phone}}" id="phoneInput">
                            <p class="p-validtor" id="phoneError"></p>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary" id="submitBtn">تعديل</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- jQuery مكتبة -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function(){
        $('#submitBtn').click(function(e){
            e.preventDefault();

            // تنظيف رسائل الخطأ القديمة
            $('.p-validtor').text('');

            // جمع البيانات من الفورم
            let formData = new FormData($('#categoryForm')[0]);

            $.ajax({
                url: '{{ route("editSupplier", $data->id) }}',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function(response){
                    alert("تم التعديل بنجاح!");
                    // يمكنك هنا إعادة تحميل الصفحة أو تحديث جزء من الواجهة حسب حاجتك
                },
                error: function(xhr){
                    if(xhr.status === 422){
                        let errors = xhr.responseJSON.errors;
                        if(errors.name){
                            $('#nameError').text(errors.name[0]);
                        }
                        if(errors.address){
                            $('#addressError').text(errors.address[0]);
                        }
                        if(errors.phone){
                            $('#phoneError').text(errors.phone[0]);
                        }
                    } else {
                        alert('حدث خطأ غير متوقع، حاول مرة أخرى.');
                    }
                }
            });
        });
    });
</script>
@endsection
