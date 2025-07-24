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
                <form action="{{route('updatProduct',$product->id)}}" method="POST"  enctype="multipart/form-data">
                    @csrf
                   <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputCity" class="col-form-label">أسم المنتج</label>
                            <input type="text" class="form-control" name="name" value="{{$product->name}}" multiple id="inputCity">
                            <p class="p-validtor"></p>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputState"  class="col-form-label">صنف المنتج</label>
                           <select id="inputState" name="parent" class="form-control">
                   
                          
                          
                           <option value="{{$product->catgorey_id }}">
                         
                           </option>
                         
                          
    
</select>

                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputZip" class="col-form-label">البراند</label>
                            <input type="text" class="form-control" name="brand" value="{{$product->brand}}" id="inputZip">
                            <p class="p-validtor"></p>
                        </div>

                         <div class="form-group col-md-3">
                            <label for="inputZip" class="col-form-label">الكمية</label>
                            <input type="text" class="form-control" name="quantity" value="{{$product->quantity}}" id="inputZip">
                            <p class="p-validtor"></p>
                        </div>


                        <div class="form-group col-md-3">
                            <label for="inputZip" class="col-form-label">سعر  الشراء</label>
                            <input type="text" class="form-control" name="cost_price" value="{{$product->cost_price}}" id="inputZip">
                            <p class="p-validtor"></p>
                        </div>

                        <div class="form-group col-md-3">
                            <label for="inputZip" class="col-form-label">سعر البيع </label>
                            <input type="text" class="form-control" name="purchase_price" value="{{$product->purchase_price}}" id="inputZip">
                            <p class="p-validtor"></p>
                        </div>




                    </div>
                    <div class="from-row">
                        <div class="form-group col-md-12">
                            <label for="inputZip" class="col-form-label">أضافة صوزة</label>
                            <input type="file" class="form-control" id="inputZip" name="image">
                            <p class="p-validtor"></p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">وصف المنتج</label>
                        <textarea class="form-control" name="disc" rows="4"  placeholder="Address2..">{{$product->description}}</textarea>
                        <p class="p-validtor"></p>
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
@endsection