 <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <h4 class="mb-4">عن المتجر</h4>
                    <p>متجرنا الإلكتروني يوفر لكم أفضل المنتجات بأفضل الأسعار مع خدمة عملاء مميزة وضمان على جميع المنتجات.</p>
                    <div class="social-icons mt-4">
                        <a href="#"><i class="fab fa-facebook"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 mb-4">
                    <h4 class="mb-4">روابط سريعة</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white">الرئيسية</a></li>
                        <li class="mb-2"><a href="#" class="text-white">منتجاتنا</a></li>
                        <li class="mb-2"><a href="#" class="text-white">عروض خاصة</a></li>
                        <li class="mb-2"><a href="#" class="text-white">المدونة</a></li>
                        <li class="mb-2"><a href="#" class="text-white">اتصل بنا</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 mb-4">
                    <h4 class="mb-4">فئات المنتجات</h4>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white">إلكترونيات</a></li>
                        <li class="mb-2"><a href="#" class="text-white">أجهزة منزلية</a></li>
                        <li class="mb-2"><a href="#" class="text-white">ملابس</a></li>
                        <li class="mb-2"><a href="#" class="text-white">ألعاب</a></li>
                        <li class="mb-2"><a href="#" class="text-white">أثاث</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 mb-4">
                    <h4 class="mb-4">اتصل بنا</h4>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <i class="fas fa-map-marker-alt me-2"></i> الرياض، المملكة العربية السعودية
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-phone me-2"></i> +966 123 456 789
                        </li>
                        <li class="mb-3">
                            <i class="fas fa-envelope me-2"></i> info@mystore.com
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 bg-light">
            <div class="row">
                <div class="col-md-6 text-center text-md-start">
                    <p class="mb-0">© 2023 متجرنا الإلكتروني. جميع الحقوق محفوظة.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <img src="https://via.placeholder.com/40x25?text=VISA" alt="Visa" class="me-2">
                    <img src="https://via.placeholder.com/40x25?text=MC" alt="MasterCard" class="me-2">
                    <img src="https://via.placeholder.com/40x25?text=MADA" alt="Mada" class="me-2">
                    <img src="https://via.placeholder.com/40x25?text=APPLEPAY" alt="Apple Pay">
                </div>
            </div>
        </div>
    </footer>

     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // دالة للتمرير إلى قسم المنتجات
        function scrollToProducts() {
            document.getElementById('products').scrollIntoView({ behavior: 'smooth' });
        }
        
        // كود Ajax لإضافة المنتج إلى السلة
        $(document).ready(function() {
            // إعداد رأس CSRF لجميع طلبات Ajax
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            
            // معالجة النقر على زر الإضافة
            $('.add-to-cart-button').click(function(e) {
                e.preventDefault();
                
                var button = $(this);
                var productId = button.data('product-id');
                
                // تعطيل الزر لمنع النقر المتكرر
                button.prop('disabled', true);
                button.html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> جاري الإضافة...');
                
                // إرسال طلب Ajax
                $.ajax({
                    type: 'POST',
                    url: '/cart/add/' + productId,
                    data: {
                        // لا حاجة لإرسال بيانات إضافية
                    },
                    success: function(response) {
                        if (response.success) {
                            // تحديث عدد العناصر في السلة
                            $('#cart-count').text(response.cart_count);
                            
                            // تغيير الزر إلى حالة "تمت الإضافة"
                            button.html('<i class="fas fa-check me-1"></i> تمت الإضافة');
                            button.removeClass('btn-primary').addClass('btn-success btn-disabled');
                            
                            // إظهار إشعار النجاح
                            showNotification('تمت الإضافة بنجاح!', 'تمت إضافة المنتج إلى سلة التسوق الخاصة بك', 'success');
                        } else {
                            // في حالة الخطأ
                            showNotification('حدث خطأ!', response.message || 'لم يتم إضافة المنتج إلى السلة', 'danger');
                            button.prop('disabled', false);
                            button.html('<i class="fas fa-shopping-cart me-1"></i> إضافة إلى السلة');
                        }
                    },
                    error: function(xhr) {
                        // في حالة فشل الطلب
                        var errorMessage = xhr.responseJSON && xhr.responseJSON.message 
                            ? xhr.responseJSON.message 
                            : 'تعذر الاتصال بالخادم، يرجى المحاولة مرة أخرى';
                            
                        showNotification('حدث خطأ!', errorMessage, 'danger');
                        button.prop('disabled', false);
                        button.html('<i class="fas fa-shopping-cart me-1"></i> إضافة إلى السلة');
                    }
                });
            });
            
            // دالة لعرض الإشعارات
            function showNotification(title, message, type) {
                // إزالة أي إشعارات سابقة
                $('.notification').remove();
                
                // إنشاء عنصر الإشعار
                var alertClass = 'alert-' + type;
                var iconClass = type === 'success' ? 'fa-check-circle' : 'fa-exclamation-circle';
                
                var notification = $(
                    '<div class="notification">' +
                    '   <div class="alert ' + alertClass + ' alert-dismissible fade show" role="alert">' +
                    '       <div class="d-flex align-items-center">' +
                    '           <i class="fas ' + iconClass + ' me-2 fs-4"></i>' +
                    '           <div>' +
                    '               <h5 class="mb-0">' + title + '</h5>' +
                    '               <p class="mb-0">' + message + '</p>' +
                    '           </div>' +
                    '       </div>' +
                    '       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>' +
                    '   </div>' +
                    '</div>'
                );
                
                // إضافة الإشعار إلى الصفحة
                $('body').append(notification);
                
                // إزالة الإشعار بعد 3 ثواني
                setTimeout(function() {
                    notification.fadeOut(500, function() {
                        $(this).remove();
                    });
                }, 3000);
            }
        });
    </script>
    <script>
    $(document).ready(function() {
        fetchCartCount();

        function fetchCartCount() {
            $.ajax({
                url: "{{ route('cart.count') }}",
                method: 'GET',
                success: function(response) {
                    $('#cart-count').text(response.count);
                },
                error: function() {
                    console.error('فشل في تحميل عدد السلة');
                }
            });
        }
    });
</script>
</body>
</html>