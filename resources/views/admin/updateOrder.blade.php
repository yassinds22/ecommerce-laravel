@extends('admin.index')

@section('content')
<div class="container-fluid" style="margin-top: 50px">
    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">تعديل الطلبية #{{ $data->order_number }}</h6>
                    <div>
                        <span class="badge badge-{{ $data->status == 'completed' ? 'success' : 'warning' }} p-2">
                            {{ $data->status }}
                        </span>
                        <span class="badge badge-info p-2 ml-2">
                            {{ $data->created_at->format('d/m/Y') }}
                        </span>
                    </div>
                </div>
                
                <div class="card-body">
                    <form id="editOrderForm">
                        @csrf
                        @method('PUT')
                        
                        <!-- معلومات الطلب الأساسية -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="status" class="font-weight-bold">حالة الطلب</label>
                                    <select class="form-control" id="status" name="status">
                                        <option value="pending">قيد الانتظار</option>
                                        <option value="processing">قيد المعالجة</option>
                                        <option value="shipped">تم الشحن</option>
                                        <option value="delivered">تم التسليم</option>
                                        <option value="cancelled">ملغى</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="payment_status" class="font-weight-bold">حالة الدفع</label>
                                    <select class="form-control" id="payment_status" name="payment_status">
                                        <option value="pending">قيد الانتظار</option>
                                        <option value="completed">مكتمل</option>
                                        <option value="failed">فشل</option>
                                        <option value="refunded">تم الاسترداد</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <!-- معلومات العميل -->
                        <div class="card mb-4 border-left-primary">
                            <div class="card-header py-2 bg-light">
                                <h6 class="m-0 font-weight-bold text-primary">معلومات العميل</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-user fa-lg text-primary ml-3"></i>
                                            <div>
                                                <p class="mb-0 small text-muted">الاسم</p>
                                                <p class="mb-0 font-weight-bold"> {{$data->user->name}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-phone fa-lg text-primary ml-3"></i>
                                            <div>
                                                <p class="mb-0 small text-muted">الهاتف</p>
                                                <p class="mb-0 font-weight-bold">{{$data->user->number}}</p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <i class="fas fa-envelope fa-lg text-primary ml-3"></i>
                                            <div>
                                                <p class="mb-0 small text-muted">البريد الإلكتروني</p>
                                                <p class="mb-0 font-weight-bold">{{$data->user->email}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- معلومات الشحن -->
                        <div class="card mb-4 border-left-info">
                            <div class="card-header py-2 bg-light">
                                <h6 class="m-0 font-weight-bold text-info">معلومات الشحن</h6>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="shipping_name">اسم المستلم</label>
                                            <input type="text" class="form-control" id="shipping_name" name="shipping_name" value="{{$data->user->name}} ">
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="shipping_phone">هاتف المستلم</label>
                                            <input type="text" class="form-control" id="shipping_phone" name="shipping_phone" value="{{$data->user->number}}">
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="shipping_address">عنوان الشحن</label>
                                            <textarea class="form-control" id="shipping_address" name="shipping_address" rows="3">{{$data->user->cantry}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- المنتجات -->
                        <div class="card mb-4 border-left-success">
                            <div class="card-header py-2 bg-light d-flex justify-content-between align-items-center">
                                <h6 class="m-0 font-weight-bold text-success">المنتجات المطلوبة</h6>
                                <span class="badge badge-primary">3 منتجات</span>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead class="bg-light">
                                            <tr>
                                                <th width="50%">المنتج</th>
                                                <th width="10%">الكمية</th>
                                                <th width="15%">السعر</th>
                                                <th width="15%">المجموع</th>
                                                <th width="10%">الإجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                           @foreach ($data->items as $data )
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{$data->product->getFirstMediaUrl('images')}}" class="img-thumbnail border-0 mr-3" alt="منتج" width="150" height="100">
                                                        <div>
                                                            <p class="mb-0 font-weight-bold">{{$data->product->name}}</p>
                                                            <p class="mb-0 small text-muted">رقم المنتج: P-12345</p>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" min="1" value="{{$data->quantity}}">
                                                </td>
                                                <td>
                                                    <input type="number" class="form-control" step="0.01" value="{{$data->product->purchase_price}}">
                                                </td>
                                                @php
                                                $qul=$data->product->purchase_price*$data->quantity;
                                                @endphp
                                                <td class="font-weight-bold">{{$qul}} ر.س</td>
                                                <td class="text-center">
                                                    <button class="btn btn-sm btn-danger">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                           @endforeach
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        
                        <!-- المعلومات المالية -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <div class="card border-left-warning">
                                    <div class="card-header py-2 bg-light">
                                        <h6 class="m-0 font-weight-bold text-warning">المعلومات المالية</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>المجموع الفرعي:</span>
                                            <span class="font-weight-bold">9,799.00 ر.س</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>الخصم:</span>
                                            <span class="font-weight-bold">-200.00 ر.س</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>الضريبة (15%):</span>
                                            <span class="font-weight-bold">1,469.85 ر.س</span>
                                        </div>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span>تكلفة الشحن:</span>
                                            <span class="font-weight-bold">50.00 ر.س</span>
                                        </div>
                                        <hr>
                                        <div class="d-flex justify-content-between mb-2">
                                            <span class="font-weight-bold">الإجمالي:</span>
                                            <span class="font-weight-bold text-primary h5">11,118.85 ر.س</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="card border-left-secondary">
                                    <div class="card-header py-2 bg-light">
                                        <h6 class="m-0 font-weight-bold text-secondary">معلومات إضافية</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="tracking_number">رقم التتبع</label>
                                            <input type="text" class="form-control" id="tracking_number" name="tracking_number" value="TRK123456789">
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="shipped_at">تاريخ الشحن</label>
                                                    <input type="date" class="form-control" id="shipped_at" name="shipped_at">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="delivered_at">تاريخ التسليم</label>
                                                    <input type="date" class="form-control" id="delivered_at" name="delivered_at">
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label for="notes">ملاحظات</label>
                                            <textarea class="form-control" id="notes" name="notes" rows="3">يرجى الاتصال بالعميل قبل التوصيل</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- أزرار التحكم -->
                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-danger">
                                <i class="fas fa-trash-alt mr-1"></i> حذف الطلبية
                            </button>
                            <div>
                                {{-- <a href="{{ route('admin.orders.index') }}" class="btn btn-secondary"> --}}
                                    <i class="fas fa-times mr-1"></i> إلغاء
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-1"></i> حفظ التعديلات
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .card-header {
        background-color: #f8f9fc;
    }
    .form-control {
        border-radius: 0.35rem;
    }
    .table th {
        font-weight: 600;
        color: #4e73df;
        background-color: #f8f9fc;
    }
    .badge {
        border-radius: 0.25rem;
        font-weight: 500;
    }
    .border-left-primary {
        border-left: 0.25rem solid #4e73df!important;
    }
    .border-left-success {
        border-left: 0.25rem solid #1cc88a!important;
    }
    .border-left-info {
        border-left: 0.25rem solid #36b9cc!important;
    }
    .border-left-warning {
        border-left: 0.25rem solid #f6c23e!important;
    }
    .border-left-secondary {
        border-left: 0.25rem solid #858796!important;
    }
</style>
@endsection