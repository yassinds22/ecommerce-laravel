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
                <form id="categoryForm"   method="post" enctype="multipart/form-data">
                    @csrf
                   <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCity" class="col-form-label">اسم المورد</label>
                            <input  type="text" class="form-control"   name="name" id="inputCity">
                            <p class="p-validtor" id="nameError"></p>
                        </div>

                         <div class="form-group col-md-4">
                            <label for="inputCity" class="col-form-label"> العنوان</label>
                            <input  type="text" class="form-control"   name="adddress" id="inputCity">
                            <p class="p-validtor" id="nameError"></p>
                        </div>

                             <div class="form-group col-md-4">
                            <label for="inputCity" class="col-form-label"> رقم الجوال</label>
                            <input  type="text" class="form-control"   name="phone" id="inputCity">
                            <p class="p-validtor" id="nameError"></p>
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
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script>
    $(document).ready(function () {
        $('#submitBtn').click(function (e) {
            e.preventDefault();
            
            let formData = new FormData($('#categoryForm')[0]);
            $.ajax({
                url: "{{ route('save.supplier') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    alert("تم الإضافة بنجاح!");
                    $('#categoryForm')[0].reset(); // إعادة تعيين الحقول
                    $('.p-validtor').text(''); // مسح الأخطاء إن وجدت
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    $('.p-validtor').text(''); // مسح القديم

                    if(errors.name){
                        $('#nameError').text(errors.name[0]);
                    }
                    if(errors.address){
                        $('#addressError').text(errors.address[0]);
                    }
                    if(errors.phone){
                        $('#phoneError').text(errors.phone[0]);
                    }
                }
            });
        });
    });
</script>

@endsection