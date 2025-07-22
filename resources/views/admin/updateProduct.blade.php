@extends('admin.index')
@section('content')
    <div class="row">
    <div class="col-md-12">
        <div class="card m-b-20">
            <div class="card-header">
                <h3 class="card-title">Form row</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="#}">
                    @csrf
                   <div class="form-row">
                        <div class="form-group col-md-3">
                            <label for="inputCity" class="col-form-label">أسم المنتج</label>
                            <input type="text" class="form-control" value="" name="name" id="inputCity">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputState"  class="col-form-label">صنف المنتج</label>
                            <select id="inputState"  name="parint" class="form-control">
                                {{-- @foreach ($catdat as $catdat ) --}}
                                <option value=""></option>

                                {{-- @endforeach --}}


                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputZip" class="col-form-label">الكمية</label>
                            <input type="text" class="form-control" value="" name="qul" id="inputZip">
                        </div>
                        <div class="form-group col-md-3">
                            <label for="inputZip" class="col-form-label">سعر المنتح الواحد</label>
                            <input type="text" class="form-control" value="" name="price" id="inputZip">
                        </div>
                    </div>
                    <div class="from-row">
                        <div class="form-group col-md-12">
                            <label for="inputZip" class="col-form-label">أضافة صوزة</label>
                            <input type="file" class="form-control" id="inputZip">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-form-label">وصف المنتج</label>
                        <textarea class="form-control" name="disc" rows="4" placeholder="Address2.."></textarea>
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