@include('clint.layout.header')
 <section class="products py-5" id="products">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="display-5 fw-bold text-primary mb-3">منتجاتنا المميزة</h2>
                <p class="lead text-muted">اختر من مجموعة متنوعة من المنتجات عالية الجودة</p>
            </div>
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-4" id="productsGrid">
                <!-- Product 1 -->
                @foreach ($data as $data )
                <div class="col">
                    <div class="card h-100 border-0 shadow-hover">
                        <div class="position-relative overflow-hidden">
                            <img src="{{$data->getFirstmediaurl('images')}}" class="card-img-top object-fit-cover" alt="سماعات لاسلكية" style="height: 200px;">
                            <span class="position-absolute top-0 start-0 m-2 bg-danger badge rounded-pill">جديد</span>
                        </div>
                        <div class="card-body d-flex flex-column pb-0">
                            <h5 class="card-title fw-bold mb-1">{{$data->name}}</h5>
                            <div class="d-flex align-items-center mb-2">
                                <div class="text-warning">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="far fa-star"></i>
                                </div>
                                <small class="text-muted ms-2">(48 تقييم)</small>
                            </div>
                            <div class="text-success fw-bold fs-5 mb-3">199 ريال</div>
                            <p class="card-text text-muted flex-grow-1 mb-3">سماعات لاسلكية بتقنية بلوتوث 5.0 مع عزل ضوضاء نشط ومدة بطارية تصل إلى 20 ساعة</p>
                            <div class="d-grid gap-2 mb-3">
                                <button type="button" class="btn btn-primary w-100 d-flex justify-content-center align-items-center">
                                    <i class="fas fa-shopping-cart me-2"></i>إضافة إلى السلة
                                </button>
                                <a href="#" class="btn btn-outline-primary d-flex justify-content-center align-items-center">
                                    <i class="fas fa-eye me-2"></i>عرض التفاصيل
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
           
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // إضافة تأثير الظل عند التحويم باستخدام Bootstrap فقط
        document.querySelectorAll('.shadow-hover').forEach(card => {
            card.classList.add('shadow-sm');
            card.addEventListener('mouseenter', () => {
                card.classList.replace('shadow-sm', 'shadow-lg');
            });
            card.addEventListener('mouseleave', () => {
                card.classList.replace('shadow-lg', 'shadow-sm');
            });
        });
    </script>




@include('clint.layout.footer')