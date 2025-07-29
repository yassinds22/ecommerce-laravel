<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>سلة المشتريات - تصميم احترافي</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <style>
    body {
      background-color: #f0f2f5;
      font-family: 'Cairo', sans-serif;
    }
    .product-card {
      border-radius: 16px;
      padding: 20px;
      background-color: #ffffff;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      transition: 0.3s;
    }
    .product-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    .product-image {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 10px;
    }
    .invoice-box {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 16px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.05);
    }
    .invoice-line {
      display: flex;
      justify-content: space-between;
      margin: 10px 0;
    }
    .invoice-total {
      font-weight: bold;
      font-size: 1.2rem;
      border-top: 1px solid #ddd;
      padding-top: 10px;
    }
    .section-title {
      margin-bottom: 25px;
      font-weight: bold;
      font-size: 1.4rem;
      color: #333;
    }
  </style>
</head>
<body>

<div class="container py-5">
  <div class="row">
    <!-- المنتجات -->
    <div class="col-lg-8">
      <h2 class="section-title">🛒 منتجات السلة</h2>
      @foreach ($cartItems->items as $item)
      <div class="product-card d-flex align-items-center mb-4">
        <img src="{{ $item->product->getFirstMediaUrl('images') }}" class="product-image me-4" alt="صورة المنتج" />
        <div class="flex-grow-1">
          <h5 class="mb-1">{{ $item->product->name }}</h5>
          <p class="mb-2 text-muted">سعر الوحدة: <span class="unit-price">{{ $item->product->purchase_price }}</span> دولار</p>
          <div class="input-group w-50">
            <button class="btn btn-outline-danger" onclick="updateQuantity(this, -1)">-</button>
            <input type="number" class="form-control text-center quantity-input" value="{{ $item->quantity }}" min="1" onchange="calculateTotal()">
            <button class="btn btn-outline-success" onclick="updateQuantity(this, 1)">+</button>
          </div>
          <a href="{{route('cart.remove',$item->product->id)}}">حذف</a>
        </div>
      </div>
      @endforeach
    </div>

    <!-- الفاتورة -->
    <div class="col-lg-4">
      <div class="invoice-box">
        <h4 class="mb-4">🧾 ملخص الطلب</h4>
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

        <div class="d-grid gap-2 mt-4">
          <button class="btn btn-success">💳 إتمام الشراء</button>
          <button onclick="window.print()" class="btn btn-outline-secondary">🖨️ طباعة الفاتورة</button>
          <button onclick="sendInvoiceWhatsApp()" class="btn btn-outline-success">📩 إرسال عبر واتساب</button>
          <button onclick="copyInvoiceText()" class="btn btn-outline-primary">📋 نسخ نص الفاتورة</button>
          <button onclick="generatePDF()" class="btn btn-outline-info">📄 تحويل إلى PDF</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // نفس السكربت السابق
</script>

</body>
</html>
