@extends('admin.index')
@section('content')
    <div class="row">
    <div class="col-md-12">
        <div class="card m-b-20">
            <div class="card-header">
                <h3 class="card-title">Form row</h3>
            </div>
            <div class="card-body">
                <form action="{{route('updateCatgory',$product->id)}}" method="POST" >
                    @csrf
                   <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="inputCity" class="col-form-label">اسم الصنف</label>
                            <input type="text" class="form-control" name="name" value="{{$product->name}}" id="inputCity">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="inputState" class="col-form-label">نوع الصنف</label>
                            <select id="inputState" class="form-control" name="parint">
                                <option  value="0">رئيسي</option>
                            </select>
                        </div>
                        
                    </div>
                    

                    <div class="form-group">
                        <div class="form-check pl-0">

                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary ">تعديل</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection