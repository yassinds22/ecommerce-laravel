 @extends('admin.index')
 @section('titel')
قائمة الموردين

@endsection
@section('content')



    

<div class="row">

     <div class="col-md-12">
        <div class="card m-b-5">
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
                            <input  type="text" class="form-control"   name="address" id="inputCity">
                            <p class="p-validtor" id="nameError"></p>
                        </div>

                             <div class="form-group col-md-4">
                            <label for="inputCity" class="col-form-label"> رقم الجوال</label>
                            <input  type="text" class="form-control"   name="phone" id="inputCity">
                            <p class="p-validtor" id="nameError"></p>
                        </div>        
                    </div>
                  
                    <button type="submit" class="btn btn-primary" id="submitBtn">أضافة</button>
                </form>
            </div>
        </div>
    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>




    <div class="col-md-12 col-lg-12">

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered border-top mb-0">
                        <thead>
                            <tr>
                                <th>الرقم</th>
                                <th>الاسم</th>
                                
                                <th>العنوان</th>
                                <th>ؤقم الجوال</th>
                                <th>تعديل</th>
                                <th>حذف</th>
                            </tr>
                        </thead>
                        <tbody >
                           
                            
                          @php
                          $coute=0;
                          @endphp
                            
                            @foreach ($data as $data )
                             <tr>
                                <th>{{ $coute++}}</th>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->adddress }}</td>
                                <td>{{ $data->phone }}</td>
                                
                                <td><a href="updatesupplier/{{ $data->id }}"><img src="admin/assets/icon/edit.png" width="30"></a></td>
                                <td><a href="deletesupplier/{{ $data->id }}"><img src="admin/assets/icon/delet.png" width="30"></a></td>

                            </tr>


{{-- <!-- نافذة التأكيد (Modal) --> --}}


                            @endforeach


                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>




</div>
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
                  
                    $('table tbody').append(newRow); // أضف السطر للجدول
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    $('.p-validtor').text('');

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