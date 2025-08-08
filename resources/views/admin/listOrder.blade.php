<style>
        :root {
            --primary: #4361ee;
            --secondary: #3f37c9;
            --success: #4cc9f0;
            --warning: #f72585;
            --dark: #1d3557;
            --light: #f8f9fa;
            --gray: #6c757d;
            --border: #dee2e6;
            --sidebar-bg: linear-gradient(to bottom, #4361ee, #3f37c9);
        }
        
        body {
            background-color: #f5f7fb;
            color: #333;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }
        
        .sidebar {
            background: var(--sidebar-bg);
            color: white;
            min-height: 100vh;
            padding: 0;
            transition: all 0.3s;
        }
        
        .logo {
            padding: 20px;
            border-bottom: 1px solid rgba(255,255,255,0.1);
            text-align: center;
        }
        
        .menu-item {
            padding: 12px 20px;
            border-radius: 5px;
            margin: 5px 15px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
        }
        
        .menu-item:hover, .menu-item.active {
            background-color: rgba(255,255,255,0.1);
        }
        
        .menu-item i {
            margin-left: 10px;
            font-size: 18px;
        }
        
        .page-title {
            font-weight: 700;
            color: var(--dark);
        }
        
        .card {
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border: none;
            margin-bottom: 25px;
        }
        
        .card-header {
            background-color: white;
            border-bottom: 1px solid var(--border);
            padding: 20px;
            border-radius: 15px 15px 0 0 !important;
            font-weight: 600;
            font-size: 1.2rem;
            color: var(--dark);
        }
        
        .filter-btn {
            background-color: var(--primary);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 20px;
            font-weight: 500;
        }
        
        .filter-btn:hover {
            background-color: var(--secondary);
        }
        
        .add-order-btn {
            background-color: var(--success);
            color: white;
            border: none;
            border-radius: 8px;
            padding: 8px 20px;
            font-weight: 500;
        }
        
        .add-order-btn:hover {
            background-color: #3ab8dd;
        }
        
        .order-id {
            color: var(--primary);
            font-weight: 500;
        }
        
        .order-status {
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .status-completed {
            background-color: rgba(76, 201, 240, 0.2);
            color: #4cc9f0;
        }
        
        .status-pending {
            background-color: rgba(247, 37, 133, 0.2);
            color: #f72585;
        }
        
        .status-processing {
            background-color: rgba(67, 97, 238, 0.2);
            color: #4361ee;
        }
        
        .status-shipped {
            background-color: rgba(255, 193, 7, 0.2);
            color: #ffc107;
        }
        
        .action-btn {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            border: none;
            margin-left: 5px;
        }
        
        .view-btn {
            background-color: rgba(67, 97, 238, 0.1);
            color: var(--primary);
        }
        
        .edit-btn {
            background-color: rgba(76, 201, 240, 0.1);
            color: var(--success);
        }
        
        .delete-btn {
            background-color: rgba(247, 37, 133, 0.1);
            color: var(--warning);
        }
        
        .action-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        
        .pagination-btn {
            width: 35px;
            height: 35px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            background-color: #f8f9fa;
            color: var(--gray);
            border: 1px solid var(--border);
            font-weight: 500;
            margin: 0 3px;
        }
        
        .pagination-btn.active {
            background-color: var(--primary);
            color: white;
            border-color: var(--primary);
        }
        
        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary);
        }
        
        .stat-card {
            text-align: center;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
            transition: transform 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-icon {
            font-size: 2rem;
            margin-bottom: 15px;
        }
        
        .stat-number {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 5px;
        }
        
        .stat-title {
            font-size: 0.9rem;
            color: var(--gray);
        }
        
        @media (max-width: 768px) {
            .sidebar {
                min-height: auto;
                height: auto;
            }
            
            .menu-item span {
                display: none;
            }
            
            .menu-item i {
                margin-left: 0;
                font-size: 20px;
            }
            
            .stat-card {
                margin-bottom: 15px;
            }
        }
    </style>
@extends('admin.index')
@section('titel')
قائمة الطلبات

@endsection
@section('content')
 <!-- قسم إحصائيات الطلبات -->
    <div class="row" style="margin-top: 20px">
      <div class="row px-3 mb-4">
                    <div class="col-md-3 col-sm-6">
                        <div class="stat-card bg-white">
                            <div class="stat-icon text-primary">
                                <i class="fas fa-shopping-cart"></i>
                            </div>
                            <div class="stat-number">128</div>
                            <div class="stat-title">إجمالي الطلبات</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="stat-card bg-white">
                            <div class="stat-icon text-warning">
                                <i class="fas fa-hourglass-half"></i>
                            </div>
                            <div class="stat-number">24</div>
                            <div class="stat-title">طلبات قيد الانتظار</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="stat-card bg-white">
                            <div class="stat-icon text-info">
                                <i class="fas fa-truck"></i>
                            </div>
                            <div class="stat-number">65</div>
                            <div class="stat-title">طلبات تم شحنها</div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="stat-card bg-white">
                            <div class="stat-icon text-success">
                                <i class="fas fa-check-circle"></i>
                            </div>
                            <div class="stat-number">39</div>
                            <div class="stat-title">طلبات مكتملة</div>
                        </div>
                    </div>
                </div>
    </div>
 <!-- قسم فلترة الطلبات -->
    <div class="row">
  
                <div class="row px-3 mb-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span>فلترة الطلبات</span>
                                <button class="btn btn-sm btn-link text-primary p-0">إعادة تعيين الفلتر</button>
                            </div>
                            <div class="card-body">
                                <div class="row g-3">
                                    <div class="col-lg-3 col-md-6">
                                        <label class="form-label">رقم الطلب</label>
                                        <input type="text" class="form-control" placeholder="ابحث برقم الطلب...">
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <label class="form-label">اسم العميل</label>
                                        <input type="text" class="form-control" placeholder="ابحث باسم العميل...">
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <label class="form-label">حالة الطلب</label>
                                        <select class="form-select">
                                            <option value="">جميع الحالات</option>
                                            <option value="pending">قيد الانتظار</option>
                                            <option value="processing">قيد المعالجة</option>
                                            <option value="shipped">تم الشحن</option>
                                            <option value="completed">مكتمل</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <label class="form-label">تاريخ الطلب</label>
                                        <input type="date" class="form-control">
                                    </div>
                                    <div class="col-12 text-end">
                                        <button class="filter-btn">
                                            <i class="fas fa-search me-2"></i>بحث
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>

 <!-- قسم قائمة الطلبات -->
    <div class="row">
        
                <div class="row px-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <span>قائمة الطلبات</span>
                                <button class="add-order-btn">
                                    <i class="fas fa-plus me-2"></i>إضافة طلب جديد
                                </button>
                            </div>
                            <div class="card-body p-0">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead class="table-light">
                                            <tr>
                                                <th class="text-nowrap">رقم الطلب</th>
                                                <th class="text-nowrap">العميل</th>
                                                <th class="text-nowrap">تاريخ الطلب</th>
                                                <th class="text-nowrap">المبلغ</th>
                                                <th class="text-nowrap">حالة الطلب</th>
                                                <th class="text-nowrap">الإجراءات</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $item )
                                            
                                            
                                            <tr>
                                                <td class="order-id">{{$item->order_number}}</td>
                                                <td>{{$item->user->name}}</td>
                                                <td>{{$item->created_at}}</td>
                                                <td>{{$item->total}} ر.س</td>
                                                <td><!--'pending','processing','shipped','delivered','cancelled'-->
                                                    @if ($item->status=='pending')
                                                    <span class="order-status status-completed"> قيد الانتظار</span>
                                                   
                                                    @elseif($item->status=='processing')
                                                    <span class="order-status status-processing">قيد المعالجة</span>
                                                    
                                                    @elseif($item->is_paid==1)
                                                     <span class="order-status status-completed"> مكتمل</span>
                                                   
                                                    
                                                    @elseif($item->status=='delivered')
                                                     <span class="order-status status-completed">  تم الشحن</span>
                                                  

                                                    @elseif($item->status=='cancelled')
                                                     <span class="order-status status-cancelled"> تم الالغاء</span>
                                                   
                                                    
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{route('detailsorder',$item->id)}}" ><i class="fas fa-eye"></i></a>
                                                    <a href="{{route('update.order',$item->id)}}" class="action-btn edit-btn"><i class="fas fa-edit"></i></a>
                                                    <a href="{{route('delete.order',$item->id)}}" class="action-btn delete-btn"><i class="fas fa-trash"></i></a>
                                                </td>
                                            </tr>
                                            @endforeach
                                           
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="text-muted">
                                        عرض 1 إلى 5 من 45 طلب
                                    </div>
                                    <div class="d-flex">
                                        <div class="pagination-btn">
                                            <i class="fas fa-chevron-right"></i>
                                        </div>
                                        <div class="pagination-btn active">1</div>
                                        <div class="pagination-btn">2</div>
                                        <div class="pagination-btn">3</div>
                                        <div class="pagination-btn">4</div>
                                        <div class="pagination-btn">
                                            <i class="fas fa-chevron-left"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

    </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // إضافة تفاعل بسيط للواجهة
        document.querySelectorAll('.action-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                const actionType = this.querySelector('i').className;
                let message = '';
                
                if (actionType.includes('eye')) {
                    message = 'عرض تفاصيل الطلب';
                } else if (actionType.includes('edit')) {
                    message = 'تعديل الطلب';
                } else if (actionType.includes('trash')) {
                    message = 'حذف الطلب';
                }
                
                alert(message);
            });
        });
        
        document.querySelector('.filter-btn').addEventListener('click', function() {
            alert('جاري البحث عن الطلبات...');
        });
        
        document.querySelector('.add-order-btn').addEventListener('click', function() {
            alert('فتح نموذج إضافة طلب جديد');
        });
    </script


@endsection