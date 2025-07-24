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
                                <th>#</th>
                                <th>الاسم</th>
                                
                                <th>الوصف</th>
                                <th>التعديل</th>
                                <th>الحذف</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $data )
                             <tr>
                                <th>{{ $data->id }}</th>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->parint }}</td>
                                
                                <td><a href="editCatgory/{{ $data->id }}"><img src="admin/assets/icon/edit.png" width="30"></a></td>
                                <td><a href="deleteCatgory/{{ $data->id }}"><img src="admin/assets/icon/delet.png" width="30"></a></td>

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

@endsection