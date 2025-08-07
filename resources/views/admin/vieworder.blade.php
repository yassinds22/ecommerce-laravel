<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نظام الطلبات - معاينة الطلب</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
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
        
        body {
            background-color: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--dark-text);
            padding-bottom: 50px;
        }
        
        .header {
            background: linear-gradient(135deg, var(--primary-color) 0%, #1a2530 100%);
            color: white;
            padding: 25px 0;
            margin-bottom: 30px;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
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
</head>
<body>
    <!-- الهيدر -->
    <header class="header">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h1><i class="bi bi-cart-check-fill me-3"></i>نظام إدارة الطلبات</h1>
                    <p class="mb-0">تفاصيل الطلب والمنتجات والمعلومات المالية</p>
                </div>
                <div>
                    <span class="badge bg-light text-dark p-2">
                        <i class="bi bi-calendar me-2"></i>الخميس، 7 أغسطس 2025
                    </span>
                </div>
            </div>
        </div>
    </header>

    <!-- المحتوى الرئيسي -->
    <div class="container">
        <!-- بطاقة الطلب -->
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="order-card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h3 class="mb-1">الطلب رقم: #ORD-2023-7584</h3>
                                <p class="mb-0">بتاريخ: 25 أكتوبر 2023 - 14:05</p>
                            </div>
                            <span class="status-badge status-pending">قيد الانتظار</span>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <h5><i class="bi bi-person me-2"></i>معلومات العميل</h5>
                                    <p class="mb-1"><strong>الاسم:</strong> أحمد محمد</p>
                                    <p class="mb-1"><strong>البريد الإلكتروني:</strong> ahmed@example.com</p>
                                    <p class="mb-0"><strong>الهاتف:</strong> +966 50 123 4567</p>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-4">
                                    <h5><i class="bi bi-wallet2 me-2"></i>المعلومات المالية</h5>
                                    <p class="mb-1"><strong>طريقة الدفع:</strong> بطاقة ائتمانية</p>
                                    <p class="mb-1"><strong>حالة الدفع:</strong> مكتمل</p>
                                    <p class="mb-0"><strong>الإجمالي:</strong> <span class="text-success fw-bold">1,245.50 ر.س</span></p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-center mt-3">
                            <button id="previewBtn" class="btn preview-btn">
                                <i class="bi bi-table me-2"></i> معاينة تفاصيل الطلب
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- قسم معاينة الطلب (سيظهر عند الضغط على الزر) -->
        <div id="previewSection" class="preview-section">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="section-title">تفاصيل معاينة الطلب</h2>
                <button id="closePreview" class="close-btn">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            
            <!-- جدول تفاصيل الطلب -->
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
                        <tr>
                            <td>
                                <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'><rect width='100' height='100' fill='%233498db'/><text x='50%' y='50%' font-size='20' text-anchor='middle' fill='white' dy='.3em'>P1</text></svg>" 
                                     class="product-img" alt="منتج">
                            </td>
                            <td>
                                <strong>سماعات لاسلكية عالية الجودة</strong>
                                <p class="mb-0 text-muted small">رقم المنتج: PRD-001</p>
                            </td>
                            <td>350.00 ر.س</td>
                            <td>2</td>
                            <td>700.00 ر.س</td>
                            <td><span class="status-badge status-completed">متوفر</span></td>
                            <td>مخزن الرياض</td>
                        </tr>
                        <tr>
                            <td>
                                <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'><rect width='100' height='100' fill='%232ecc71'/><text x='50%' y='50%' font-size='20' text-anchor='middle' fill='white' dy='.3em'>P2</text></svg>" 
                                     class="product-img" alt="منتج">
                            </td>
                            <td>
                                <strong>هاتف ذكي - طراز حديث</strong>
                                <p class="mb-0 text-muted small">رقم المنتج: PRD-045</p>
                            </td>
                            <td>545.50 ر.س</td>
                            <td>1</td>
                            <td>545.50 ر.س</td>
                            <td><span class="status-badge status-processing">تحت الطلب</span></td>
                            <td>مخزن جدة</td>
                        </tr>
                        <tr>
                            <td>
                                <img src="data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' width='100' height='100' viewBox='0 0 100 100'><rect width='100' height='100' fill='%23e74c3c'/><text x='50%' y='50%' font-size='20' text-anchor='middle' fill='white' dy='.3em'>P3</text></svg>" 
                                     class="product-img" alt="منتج">
                            </td>
                            <td>
                                <strong>شاحن متنقل سريع 10000 مللي أمبير</strong>
                                <p class="mb-0 text-muted small">رقم المنتج: PRD-087</p>
                            </td>
                            <td>120.00 ر.س</td>
                            <td>3</td>
                            <td>360.00 ر.س</td>
                            <td><span class="status-badge status-completed">متوفر</span></td>
                            <td>مخزن الرياض</td>
                        </tr>
                        <tr class="highlight">
                            <td colspan="4" class="text-end"><strong>الإجمالي</strong></td>
                            <td><strong>1,605.50 ر.س</strong></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr class="highlight">
                            <td colspan="4" class="text-end"><strong>الخصم</strong></td>
                            <td><strong class="text-danger">-50.00 ر.س</strong></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr class="highlight">
                            <td colspan="4" class="text-end"><strong>ضريبة القيمة المضافة (15%)</strong></td>
                            <td><strong>233.33 ر.س</strong></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr class="highlight">
                            <td colspan="4" class="text-end"><strong>تكلفة الشحن</strong></td>
                            <td><strong>25.00 ر.س</strong></td>
                            <td colspan="2"></td>
                        </tr>
                        <tr class="highlight">
                            <td colspan="4" class="text-end"><strong>المبلغ النهائي</strong></td>
                            <td><strong class="text-success">1,813.83 ر.س</strong></td>
                            <td colspan="2"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <!-- معلومات إضافية -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="bi bi-truck me-2"></i>معلومات الشحن</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>عنوان التسليم:</strong> شارع الملك فهد، الرياض، المملكة العربية السعودية</p>
                            <p><strong>شركة الشحن:</strong> سمسا اكسبريس</p>
                            <p><strong>رقم التتبع:</strong> SA789456123</p>
                            <p><strong>التاريخ المتوقع للتسليم:</strong> 30 أكتوبر 2023</p>
                            <p><strong>تكلفة الشحن:</strong> 25.00 ر.س</p>
                            <p><strong>حالة الشحن:</strong> <span class="status-badge status-pending">قيد التجهيز</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card h-100">
                        <div class="card-header bg-primary text-white">
                            <h5 class="mb-0"><i class="bi bi-credit-card me-2"></i>معلومات الدفع</h5>
                        </div>
                        <div class="card-body">
                            <p><strong>طريقة الدفع:</strong> بطاقة ائتمانية</p>
                            <p><strong>اسم حامل البطاقة:</strong> أحمد محمد</p>
                            <p><strong>رقم البطاقة:</strong> **** **** **** 1234</p>
                            <p><strong>تاريخ الانتهاء:</strong> 12/2025</p>
                            <p><strong>رقم المعاملة:</strong> TXN-784512</p>
                            <p><strong>حالة الدفع:</strong> <span class="status-badge status-completed">مكتمل</span></p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- حالة الطلب -->
            <div class="card mt-4">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-clock-history me-2"></i>حالة الطلب</h5>
                </div>
                <div class="card-body">
                    <div class="timeline">
                        <div class="timeline-item">
                            <h6>تم إنشاء الطلب</h6>
                            <p class="text-muted mb-0">25 أكتوبر 2023 - 14:05</p>
                            <p class="mb-0">تم استلام الطلب بنجاح.</p>
                        </div>
                        <div class="timeline-item">
                            <h6>تم التحقق من الدفع</h6>
                            <p class="text-muted mb-0">25 أكتوبر 2023 - 14:30</p>
                            <p class="mb-0">تم التحقق من عملية الدفع بنجاح.</p>
                        </div>
                        <div class="timeline-item">
                            <h6>قيد التجهيز</h6>
                            <p class="text-muted mb-0">25 أكتوبر 2023 - 15:15</p>
                            <p class="mb-0">جاري تجهيز الطلب للتسليم.</p>
                        </div>
                        <div class="timeline-item">
                            <h6>تم تسليمه للشحن</h6>
                            <p class="text-muted mb-0">26 أكتوبر 2023 - 09:45</p>
                            <p class="mb-0">تم تسليم الطلب لشركة الشحن.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- التذييل -->
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6 text-md-start mb-3 mb-md-0">
                    <h3 class="mb-3"><i class="bi bi-cart-check-fill me-2"></i>نظام إدارة الطلبات</h3>
                    <p class="mb-0">الحل الأمثل لإدارة طلباتك وعملائك بطريقة سهلة وفعالة</p>
                </div>
                <div class="col-md-6 text-md-end">
                    <p class="mb-0">© 2023 نظام إدارة الطلبات. جميع الحقوق محفوظة.</p>
                    <p class="mb-0">الإصدار 2.5.1 | آخر تحديث: 5 أغسطس 2025</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- JavaScript لعرض وإخفاء قسم المعاينة -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const previewBtn = document.getElementById('previewBtn');
            const closeBtn = document.getElementById('closePreview');
            const previewSection = document.getElementById('previewSection');
            
            previewBtn.addEventListener('click', function() {
                previewSection.style.display = 'block';
                // تمرير إلى قسم المعاينة
                previewSection.scrollIntoView({ behavior: 'smooth' });
            });
            
            closeBtn.addEventListener('click', function() {
                previewSection.style.display = 'none';
            });
        });
    </script>
</body>
</html>