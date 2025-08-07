@extends('admin.index')
@section('content')
    <style>
        :root {
            --primary-color: #2c3e50;
            --secondary-color: #3498db;
            --accent-color: #e74c3c;
            --light-bg: #f8f9fa;
            --dark-text: #2c3e50;
            --light-text: #7f8c8d;
            --success-color: #2ecc71;
            --warning-color: #f39c12;
        }
        
      
        
        .order-card {
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            margin-bottom: 25px;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        
        .order-card:hover {
            transform: translateY(-5px);
        }
        
        .card-header {
            background: linear-gradient(135deg, var(--secondary-color) 0%, #2980b9 100%);
            color: white;
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .card-body {
            padding: 25px;
        }
        
        .preview-btn {
            background: linear-gradient(135deg, var(--accent-color) 0%, #c0392b 100%);
            border: none;
            border-radius: 50px;
            padding: 12px 30px;
            font-weight: bold;
            font-size: 1.1rem;
            box-shadow: 0 4px 15px rgba(231, 76, 60, 0.3);
            transition: all 0.3s ease;
        }
        
        .preview-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 7px 20px rgba(231, 76, 60, 0.4);
        }
        
        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin: 30px 0;
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }
        
        .order-table th {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1a2530 100%);
            color: white;
            padding: 16px 20px;
            text-align: right;
            font-weight: 600;
        }
        
        .order-table td {
            padding: 14px 20px;
            border-bottom: 1px solid #eee;
            text-align: right;
        }
        
        .order-table tr:last-child td {
            border-bottom: none;
        }
        
        .order-table tr:hover td {
            background-color: #f8f9fa;
        }
        
        .order-table .highlight {
            background-color: rgba(52, 152, 219, 0.05);
            font-weight: 600;
        }
        
        .status-badge {
            padding: 6px 14px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 0.85rem;
        }
        
        .status-pending {
            background-color: var(--warning-color);
            color: white;
        }
        
        .status-completed {
            background-color: var(--success-color);
            color: white;
        }
        
        .status-processing {
            background-color: var(--secondary-color);
            color: white;
        }
        
        .section-title {
            position: relative;
            padding-right: 15px;
            margin-bottom: 25px;
            color: var(--primary-color);
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            right: 0;
            bottom: -8px;
            width: 50px;
            height: 3px;
            background: var(--secondary-color);
            border-radius: 3px;
        }
        
        .product-img {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 10px;
            border: 1px solid #eee;
        }
        
        .footer {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1a2530 100%);
            color: white;
            padding: 25px 0;
            margin-top: 40px;
            border-radius: 20px 20px 0 0;
            text-align: center;
        }
        
        .summary-card {
            background: white;
            border-radius: 15px;
            padding: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            margin-top: 25px;
        }
        
        .summary-item {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px dashed #eee;
        }
        
        .summary-total {
            font-weight: bold;
            font-size: 1.2rem;
            color: var(--accent-color);
        }
        
        .timeline {
            position: relative;
            padding-right: 3rem;
            margin-top: 2rem;
        }
        
        .timeline::before {
            content: '';
            position: absolute;
            right: 15px;
            top: 0;
            height: 100%;
            width: 2px;
            background: var(--secondary-color);
        }
        
        .timeline-item {
            position: relative;
            margin-bottom: 2rem;
        }
        
        .timeline-item::before {
            content: '';
            position: absolute;
            right: -3.2rem;
            top: 5px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: var(--secondary-color);
            border: 3px solid white;
            box-shadow: 0 0 0 2px var(--secondary-color);
        }
        
        .preview-section {
            display: none;
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .close-btn {
            background: #eee;
            border: none;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }
        
        .close-btn:hover {
            background: var(--accent-color);
            color: white;
        }
    </style>


    <!-- المحتوى الرئيسي -->
    
        <!-- بطاقة الطلب -->
      <div class="row">
        <div class="table-responsive">
                <table class="order-table">
                    <thead>
                        <tr>
                            <th width="10%">الصورة</th>
                            <th width="25%">المنتج</th>
                            <th width="15%">السعر</th>
                            <th width="10%">الكمية</th>
                            <th width="15%">المجموع</th>
                            <th width="15%">الحالة</th>
                            <th width="10%">المخزن</th>
                        </tr>
                    </thead>
                    <tbody>
                       @foreach ($data->items as $order )
                        <tr>
                            <td>
                                <img src="{{$order->product->getFirstMediaUrl('images')}}" width='150' height='100' viewBox='0 0 100 100'>
                                     
                            </td>
                            <td>
                                <strong>{{$order->product->name}}</strong>
                                <p class="mb-0 text-muted small">رقم المنتج: {{$order->id}}</p>
                            </td>
                            <td>{{$order->product->purchase_price}} ر.س</td>
                            <td>{{$order->quantity}}</td>
                            @php
                            $qul=$order->product->purchase_price*$order->quantity;
                            @endphp
                            <td>{{$qul}} ر.س</td>
                            <td><span class="status-badge status-completed">
                                @if ($order->product->quantity>0)
                                 متوفر
                                 @else
                                 غير  متوفر
                                
                                @endif
                               
                            </span></td>
                            <td>مخزن المحلي</td>
                        </tr>
                       @endforeach
                       
                        <tr class="highlight">
                            <td colspan="4" class="text-end"><strong>الإجمالي</strong></td>
                            <td><strong>{{$data->subtotal}} ر.س</strong></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr class="highlight">
                            <td colspan="4" class="text-end"><strong>الخصم</strong></td>
                            <td><strong class="text-danger">{{$data->discount}} ر.س</strong></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr class="highlight">
                            <td colspan="4" class="text-end"><strong>ضريبة القيمة المضافة (15%)</strong></td>
                            <td><strong>{{$data->tax}} ر.س</strong></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr class="highlight">
                            <td colspan="4" class="text-end"><strong>تكلفة الشحن</strong></td>
                            <td><strong>مجاني ر.س</strong></td>
                            <td colspan="2"></td>
                        </tr>
                        @php
                        $total=$data->total-$data->discount;
                        @endphp
                        <tr class="highlight">
                            <td colspan="4" class="text-end"><strong>المبلغ النهائي</strong></td>
                            <td><strong class="text-success">{{$total}} ر.س</strong></td>
                            <td colspan="2"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
      </div>
@endsection


   
