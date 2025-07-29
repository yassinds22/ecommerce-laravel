<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>سلة المشتريات - متجر إلكتروني</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    body {
      background-color: #f6f7fb;
      font-family: 'Cairo', sans-serif;
    }
    .cart-section {
      background: #fff;
      border-radius: 24px;
      box-shadow: 0 4px 32px rgba(0,0,0,0.07);
      padding: 32px 24px;
      margin-top: 32px;
    }
    .cart-title {
      font-size: 2rem;
      font-weight: 700;
      color: #222;
      margin-bottom: 24px;
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .cart-title i {
      color: #4361ee;
      font-size: 1.5rem;
    }
    .cart-item {
      display: flex;
      align-items: center;
      gap: 18px;
      background: #f9f9fb;
      border-radius: 16px;
      padding: 18px 16px;
      margin-bottom: 18px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.04);
      transition: 0.3s;
      position: relative;
    }
    .cart-item:hover {
      box-shadow: 0 4px 16px rgba(67,97,238,0.08);
      transform: translateY(-2px);
    }
    .cart-item-img {
      width: 90px;
      height: 90px;
      object-fit: cover;
      border-radius: 10px;
      background: #fff;
      border: 1px solid #eee;
    }
    .cart-item-info {
      flex: 1;
      min-width: 0;
    }
    .cart-item-title {
      font-size: 1.1rem;
      font-weight: 700;
      color: #222;
      margin-bottom: 4px;
      white-space: nowrap;
      overflow: hidden;
      text-overflow: ellipsis;
    }
    .cart-item-price {
      color: #4361ee;
      font-weight: 600;
      font-size: 1rem;
      margin-bottom: 8px;
    }
    .cart-item-controls {
      display: flex;
      align-items: center;
      gap: 8px;
      margin-bottom: 8px;
    }
    .quantity-btn {
      width: 36px;
      height: 36px;
      border-radius: 8px;
      border: none;
      background: #eef2ff;
      color: #4361ee;
      font-size: 1.2rem;
      font-weight: bold;
      transition: background 0.2s, color 0.2s;
    }
    .quantity-btn:hover {
      background: #4361ee;
      color: #fff;
    }
    .quantity-input {
      width: 48px;
      text-align: center;
      border: 1px solid #eee;
      border-radius: 8px;
      font-size: 1rem;
      font-weight: 700;
      background: #fff;
      color: #222;
    }
    .remove-link {
      color: #ff6b6b;
      font-weight: 600;
      text-decoration: none;
      font-size: 0.95rem;
      transition: color 0.2s;
    }
    .remove-link:hover {
      color: #c82333;
      text-decoration: underline;
    }
    .cart-remove-float {
      position: absolute;
      top: 50%;
      left: 18px;
      transform: translateY(-50%);
      z-index: 2;
      background: #fff;
      padding: 6px 14px;
      border-radius: 8px;
      box-shadow: 0 1px 6px rgba(0,0,0,0.04);
      border: 1px solid #eee;
      font-size: 1rem;
      display: flex;
      align-items: center;
      font-weight: 700;
      transition: background 0.2s, color 0.2s;
    }
    .cart-remove-float:hover {
      background: #ff6b6b;
      color: #fff;
      border-color: #ff6b6b;
    }
    .invoice-box {
      background: #fff;
      padding: 28px 22px;
      border-radius: 18px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.05);
      margin-top: 12px;
    }
    .invoice-title {
      font-size: 1.3rem;
      font-weight: 700;
      color: #222;
      margin-bottom: 18px;
      display: flex;
      align-items: center;
      gap: 8px;
    }
    .invoice-title i {
      color: #06d6a0;
      font-size: 1.2rem;
    }
    .invoice-line {
      display: flex;
      justify-content: space-between;
      margin: 10px 0;
      font-size: 1rem;
    }
    .invoice-total {
      font-weight: bold;
      font-size: 1.15rem;
      border-top: 1px solid #ddd;
      padding-top: 10px;
      color: #4361ee;
    }
    .checkout-btn {
      background: linear-gradient(45deg, #4361ee, #5e72e4);
      color: #fff;
      font-weight: 700;
      border-radius: 12px;
      padding: 14px 0;
      font-size: 1.1rem;
      border: none;
      margin-bottom: 8px;
      transition: background 0.2s, transform 0.2s;
    }
    .checkout-btn:hover {
      background: linear-gradient(45deg, #3a56e6, #4e6af4);
      transform: translateY(-2px);
    }
    .invoice-actions .btn {
      border-radius: 10px;
      font-weight: 600;
      margin-bottom: 6px;
    }
    @media (max-width: 991px) {
      .cart-section {
        padding: 18px 6px;
      }
      .invoice-box {
        padding: 16px 6px;
      }
    }
    @media (max-width: 767px) {
      .cart-section {
        margin-top: 12px;
        padding: 8px 2px;
      }
      .cart-title {
        font-size: 1.2rem;
      }
      .cart-item {
        flex-direction: row;
        align-items: flex-start;
        gap: 10px;
      }
      .cart-item-img {
        width: 70px;
        height: 70px;
      }
      .cart-item-img-title-wrap {
        flex-direction: row;
        align-items: center;
        gap: 10px;
        min-width: 0;
      }
      .cart-item-title.mobile-title {
        display: block;
        font-size: 1rem;
        font-weight: 700;
        color: #222;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        margin-right: 0;
        margin-left: 0;
        max-width: 120px;
      }
      .cart-item-title.desktop-title {
        display: none;
      }
      .cart-item-info {
        padding-right: 0 !important;
        padding-left: 0 !important;
        flex: 1;
      }
      .cart-remove-float {
        left: 8px;
        font-size: 0.95rem;
        padding: 4px 10px;
      }
    }
  </style>
</head>
<body>

@include('clint.layout.header')
<div class="container py-4">
  <div class="cart-section">
    <div class="row">
      <!-- المنتجات -->
      <div class="col-lg-8 mb-4 mb-lg-0">
        <div class="cart-title"><i class="fas fa-shopping-cart"></i>منتجات السلة</div>
        @forelse ($cartItems->items as $item)
        <div class="cart-item position-relative">
          <div class="cart-item-img-title-wrap">
            <img src="{{ $item->product->getFirstMediaUrl('images') }}" class="cart-item-img" alt="صورة المنتج" />
            <div class="cart-item-title mobile-title">{{ $item->product->name }}</div>
          </div>
          <div class="cart-item-info pe-4">
            <div class="cart-item-title desktop-title">{{ $item->product->name }}</div>
            <div class="cart-item-price">سعر الوحدة: <span class="unit-price">{{ $item->product->purchase_price }}</span> دولار</div>
            <div class="cart-item-controls">
              <button class="quantity-btn" onclick="updateQuantity(this, -1)"><i class="fas fa-minus"></i></button>
              <input type="number" class="quantity-input" value="{{ $item->quantity }}" min="1" onchange="calculateTotal()">
              <button class="quantity-btn" onclick="updateQuantity(this, 1)"><i class="fas fa-plus"></i></button>
            </div>
          </div>
          <a href="{{route('cart.remove',$item->product->id)}}" class="remove-link cart-remove-float"><i class="fas fa-trash-alt me-1"></i>حذف</a>
        </div>
        @empty
        <div class="alert alert-info">سلة المشتريات فارغة.</div>
        @endforelse
      </div>
      <!-- الفاتورة -->
      <div class="col-lg-4">
        <div class="invoice-box">
          <div class="invoice-title"><i class="fas fa-receipt"></i>ملخص الطلب</div>
          <div class="mb-3">
            <strong>الاسم:</strong> ياسين علي عفيفي<br />
            <strong>رقم الهاتف:</strong> 00967736792196<br />
            <strong>البلد:</strong> اليمن
          </div>
          <div class="mb-3">
            <strong>رقم الطلبية:</strong> #123456<br />
            <strong>موعد إيصال الطلب:</strong> 5 أغسطس 2025
          </div>
          <div class="invoice-line">
            <span>الإجمالي الفرعي</span>
            <span id="subtotal-value">${{$total}}</span>
          </div>
          <div class="invoice-line">
            <span>الضريبة (10%)</span>
            <span id="tax-value">${{$ff=(0.10 / 100)*$total}}</span>
          </div>
          <div class="invoice-line invoice-total">
            <span>الإجمالي الكلي</span>
            <span id="total-value">${{$total+$ff}}</span>
          </div>
          <div class="d-grid gap-2 mt-4 invoice-actions">
            <button class="checkout-btn"><i class="fas fa-credit-card me-2"></i>إتمام الشراء</button>
            <button onclick="window.print()" class="btn btn-outline-secondary"><i class="fas fa-print me-2"></i>طباعة الفاتورة</button>
            <button onclick="sendInvoiceWhatsApp()" class="btn btn-outline-success"><i class="fab fa-whatsapp me-2"></i>إرسال عبر واتساب</button>
            <button onclick="copyInvoiceText()" class="btn btn-outline-primary"><i class="fas fa-copy me-2"></i>نسخ نص الفاتورة</button>
            <button onclick="generatePDF()" class="btn btn-outline-info"><i class="fas fa-file-pdf me-2"></i>تحويل إلى PDF</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
 @include('clint.layout.footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
  // نفس السكربت السابق
</script>
</body>
</html>
