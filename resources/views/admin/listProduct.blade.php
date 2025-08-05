@extends('admin.index')
@section('titel')
قائمة المنتجات

@endsection
@section('content')
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Border Table</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered border-top mb-0">
                            <thead>
                                <tr>
                                    <th>الرقم</th>
                                    <th>الاسم</th>
                                    <th>الصورة</th>
                                    <th>صنف المنتج</th>
                                    <th> وصف المنتج</th>
                                    <th> البراند </th>
                                    <th>الكمية</th>
                                    <th>سعر الشراء</th>
                                    <th>سعر البيع</th>
                                    <th>الحذف</th>
                                    <th>التعديل</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($product as $data)
                                <tr id="product-row-{{ $data->id }}">
                                    <th>{{ $data->id }}</th>
                                    <td>{{ $data->name }}</td>
                                    <td><img src="{{$data->getFirstMedia('images')?->getUrl()}}" width="50"  height="50"></td>
                                    <td>{{ $data->catgorey_id }}</td>
                                    <td style="width: 200px">{{ $data->description }}</td>
                                    <td>{{ $data->brand }}</td>
                                    <td>{{ $data->quantity }}</td>
                                    <td>{{ $data->cost_price }}</td>
                                    <td>{{ $data->purchase_price }}</td>
                                   
                                    <td><a href="editproduct/{{$data->id}}"><img src="admin/assets/icon/edit.png" width="30"></a></td>
                                    <td>
                                      

                                        <a href="#" class="delete-product" data-id="{{ $data->id }}">
                                            <img src="admin/assets/icon/delet.png" width="30">
                                         </a>
                                         

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $(document).on('click', '.delete-product', function (e) {
            e.preventDefault(); // ⛔️ يمنع التوجيه التلقائي

            if (!confirm('هل أنت متأكد من حذف المنتج؟')) return;

            let id = $(this).data('id');

            $.ajax({
                url: '/deleteProduct/' + id,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    if (response.success) {
                        alert(response.message);
                        // إما تعيد تحميل الصفحة
                        location.reload();

                        // أو تحذف العنصر من DOM مباشرة (مثال):
                        // $('#product-' + id).remove();
                    } else {
                        alert('فشل الحذف: ' + response.message);
                    }
                },
                error: function (xhr) {
                    alert('حدث خطأ أثناء الحذف');
                    console.log(xhr.responseText);
                }
            });
        });
    });
</script>
>

@endsection