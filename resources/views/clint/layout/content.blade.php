@extends('admin.index')

@section('content')
<section class="products py-5" id="products">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-primary mb-3">منتجاتنا المميزة</h2>
                <p class="lead text-muted">اختر من مجموعة متنوعة من المنتجات عالية الجودة</p>
            </div>
            <div class="row g-4" id="productsGrid">
                <!-- Product Card 1 -->
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="position-relative overflow-hidden">
                            <img src="images/product-item1.jpg" class="card-img-top" alt="هاتف ذكي جديد" style="height: 200px; object-fit: cover;">
                            <div class="position-absolute top-0 end-0 m-2">
                                <span class="badge bg-danger">جديد</span>
                            </div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title fw-bold text-primary">هاتف ذكي جديد</h5>
                            <div class="text-success fw-bold fs-5 mb-2">1,299.99 ريال</div>
                            <p class="card-text text-muted flex-grow-1">هاتف ذكي متطور مع كاميرا عالية الجودة وشاشة كبيرة</p>
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary">
                                    <i class="fas fa-shopping-cart me-1"></i>
                                    إضافة إلى السلة
                                </button>
                                <button class="btn btn-outline-primary">
                                    <i class="fas fa-eye me-1"></i>
                                    عرض التفاصيل
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                

               

                <!-- Product Card 7 -->
             
            </div>
        </div>
    </section>
    
@endsection