@extends('admin.index')
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
                                    <td><img src="" width="50"  height="50"></td>
                                    <td>{{ $data->catgorey_id }}</td>
                                    <td style="width: 200px">{{ $data->description }}</td>
                                    <td>{{ $data->brand }}</td>
                                    <td>{{ $data->quantity }}</td>
                                    <td>{{ $data->cost_price }}</td>
                                    <td>{{ $data->purchase_price }}</td>
                                   
                                    <td><a href="editproduct/{{$data->id}}"><img src="admin/assets/icon/edit.png" width="30"></a></td>
                                    <td>
                                        <a href="deleteProduct/{{$data->id}}" class="delete-product" >
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



   
@endsection