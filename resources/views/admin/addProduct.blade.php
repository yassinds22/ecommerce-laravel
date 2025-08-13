@extends('admin.index')
@section('content')
    <style>
        .p-validtor {
            color: red;
            padding: 5px;
            font-size: 12px;
        }
    </style>

    <div class="row">
        <div class="col-md-12">
            <div class="card m-b-20">
                <div class="card-header">
                    <h3 class="card-title">إضافة منتج</h3>
                </div>
                <div class="card-body">
                    <form id="productForm" action="{{ route('storaddProduct') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label class="col-form-label">أسم المنتج</label>
                                <input type="text" class="form-control" name="name" id="productName">
                                <p class="p-validtor" id="nameError"></p>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="col-form-label">صنف المنتج</label>
                                <select name="parent" class="form-control" id="categorySelect">
                                    @php $cat = \App\Models\Catgory::all(); @endphp
                                    @foreach($cat as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                                <p class="p-validtor" id="parentError"></p>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="col-form-label">اسم المورد</label>
                                <select name="supplier" class="form-control" id="supplierSelected">
                                    @php $suppliers = \App\Models\Supplier::all(); @endphp
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>
                                <p class="p-validtor" id="supplierError"></p>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="col-form-label">البراند</label>
                                <input type="text" class="form-control" name="brand" id="brandInput">
                                <p class="p-validtor" id="brandError"></p>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="col-form-label">الكمية</label>
                                <input type="text" class="form-control" name="quantity" id="quantityInput">
                                <p class="p-validtor" id="quantityError"></p>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="col-form-label">سعر الشراء</label>
                                <input type="text" class="form-control" name="cost_price" id="costPriceInput">
                                <p class="p-validtor" id="cost_priceError"></p>
                            </div>

                            <div class="form-group col-md-3">
                                <label class="col-form-label">سعر البيع</label>
                                <input type="text" class="form-control" name="purchase_price" id="purchasePriceInput">
                                <p class="p-validtor" id="purchase_priceError"></p>
                            </div>
                        </div>

                        <div class="from-row">
                            <div class="form-group col-md-12">
                                <label class="col-form-label">إضافة صورة</label>
                                <input type="file" class="form-control" name="image" id="imageInput">
                                <p class="p-validtor" id="imageError"></p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-form-label">وصف المنتج</label>
                            <textarea class="form-control" name="description" rows="4" id="descriptionTextarea"></textarea>
                            <p class="p-validtor" id="discError"></p>
                        </div>

                        <div class="form-group">
                            <div class="form-check pl-0">
                                <div class="checkbox checkbox-secondary">
                                    <input id="checkbox1" type="checkbox">
                                    <label for="checkbox1"><span> أوافق على الشروط</span></label>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submitBtn">أضافة</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

   
@endsection
