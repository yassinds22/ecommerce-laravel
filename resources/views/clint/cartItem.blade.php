<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>سلة المشتريات مع نسخ وتحويل PDF</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <style>
    body {
      background-color: #f8f9fa;
      font-family: 'Cairo', sans-serif;
    }
    .product-card {
      border: 1px solid #ddd;
      border-radius: 12px;
      padding: 15px;
      margin-bottom: 20px;
      background-color: #fff;
      box-shadow: 0 4px 6px rgba(0,0,0,0.05);
    }
    .product-image {
      max-width: 100%;
      height: auto;
      border-radius: 8px;
    }
    .invoice-box {
      background-color: #fff;
      padding: 25px;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.05);
      margin-top: 10px;
    }
    .invoice-line {
      display: flex;
      justify-content: space-between;
      margin-bottom: 10px;
    }
    .invoice-total {
      font-weight: bold;
      border-top: 1px solid #ccc;
      padding-top: 10px;
    }
  </style>
</head>
<body>

<div class="container my-4">
  <div class="row">
    <!-- المنتجات -->
    <div class="col-md-8">
      <h4 class="mb-4">🛒 منتجات السلة</h4>

      <div class="product-card d-flex align-items-center">
        <img src="https://via.placeholder.com/100" class="product-image me-3" alt="منتج" />
        <div class="flex-grow-1">
          <h5 class="mb-1">اسم المنتج</h5>
          <p class="mb-1 text-muted">سعر الوحدة: <span class="unit-price">10</span> دولار</p>
          <div class="input-group w-50">
            <button class="btn btn-outline-danger" onclick="updateQuantity(this, -1)">-</button>
            <input
              type="number"
              class="form-control text-center quantity-input"
              value="1"
              min="1"
              onchange="calculateTotal()"
            />
            <button class="btn btn-outline-success" onclick="updateQuantity(this, 1)">+</button>
          </div>
        </div>
      </div>
    </div>

    <!-- الفاتورة -->
    <div class="col-md-4">
      <div class="invoice-box" id="invoiceBox">
        <h4>🧾 ملخص الطلب</h4>

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
          <span id="subtotal-value">$10.00</span>
        </div>
        <div class="invoice-line">
          <span>الضريبة (10%)</span>
          <span id="tax-value">$1.00</span>
        </div>
        <hr />
        <div class="invoice-line invoice-total">
          <span>الإجمالي الكلي</span>
          <span id="total-value">$11.00</span>
        </div>

        <div class="d-grid mt-4 gap-2">
          <button class="btn btn-success btn-lg">💳 إتمام الشراء</button>
          <button onclick="window.print()" class="btn btn-outline-secondary">🖨️ طباعة الفاتورة</button>
          <button onclick="sendInvoiceWhatsApp()" class="btn btn-outline-success">
            📩 إرسال عبر واتساب
          </button>
          <button onclick="copyInvoiceText()" class="btn btn-outline-primary">📋 نسخ نص الفاتورة</button>
          <button onclick="generatePDF()" class="btn btn-outline-info">📄 تحويل الفاتورة إلى PDF</button>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  // تحديث الكمية
  function updateQuantity(btn, delta) {
    const input = btn.parentNode.querySelector('.quantity-input');
    let val = parseInt(input.value);
    if (val + delta >= 1) {
      input.value = val + delta;
      calculateTotal();
    }
  }

  // حساب الفاتورة
  function calculateTotal() {
    let subtotal = 0;
    document.querySelectorAll('.product-card').forEach((card) => {
      const price = parseFloat(card.querySelector('.unit-price').textContent);
      const qty = parseInt(card.querySelector('.quantity-input').value);
      subtotal += price * qty;
    });
    const tax = subtotal * 0.1;
    const total = subtotal + tax;

    document.getElementById('subtotal-value').innerText = `$${subtotal.toFixed(2)}`;
    document.getElementById('tax-value').innerText = `$${tax.toFixed(2)}`;
    document.getElementById('total-value').innerText = `$${total.toFixed(2)}`;
  }
  calculateTotal();

  // إرسال فاتورة واتساب
  function sendInvoiceWhatsApp() {
    const name = 'ياسين علي عفيفي';
    const phone = '00967736792196';
    const country = 'اليمن';
    const orderId = '#123456';
    const deliveryDate = '5 أغسطس 2025';
    const subtotal = document.getElementById('subtotal-value').innerText;
    const tax = document.getElementById('tax-value').innerText;
    const total = document.getElementById('total-value').innerText;

    const message = `🧾 *فاتورة الطلب:*
الاسم: ${name}
رقم الهاتف: ${phone}
البلد: ${country}
رقم الطلبية: ${orderId}
موعد الإيصال: ${deliveryDate}

الإجمالي الفرعي: ${subtotal}
الضريبة (10%): ${tax}
الإجمالي الكلي: ${total}

شكراً لتسوقك معنا!`;

    const encodedMessage = encodeURIComponent(message);
    const whatsappNumber = '967736792196'; // بدون +
    const url = `https://wa.me/${whatsappNumber}?text=${encodedMessage}`;
    window.open(url, '_blank');
  }

  // نسخ نص الفاتورة
  function copyInvoiceText() {
    const name = 'ياسين علي عفيفي';
    const phone = '00967736792196';
    const country = 'اليمن';
    const orderId = '#123456';
    const deliveryDate = '5 أغسطس 2025';
    const subtotal = document.getElementById('subtotal-value').innerText;
    const tax = document.getElementById('tax-value').innerText;
    const total = document.getElementById('total-value').innerText;

    const message = `🧾 فاتورة الطلب:
الاسم: ${name}
رقم الهاتف: ${phone}
البلد: ${country}
رقم الطلبية: ${orderId}
موعد الإيصال: ${deliveryDate}

الإجمالي الفرعي: ${subtotal}
الضريبة (10%): ${tax}
الإجمالي الكلي: ${total}

شكراً لتسوقك معنا!`;

    navigator.clipboard.writeText(message).then(() => {
      alert('تم نسخ نص الفاتورة إلى الحافظة');
    }).catch(() => {
      alert('فشل نسخ النص، حاول مجددًا');
    });
  }

  // توليد PDF للفاتورة وتنزيله تلقائياً
  async function generatePDF() {
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF({ unit: 'pt', format: 'a4', putOnlyUsedFonts:true, floatPrecision:16 });

    const name = 'ياسين علي عفيفي';
    const phone = '00967736792196';
    const country = 'اليمن';
    const orderId = '#123456';
    const deliveryDate = '5 أغسطس 2025';
    const subtotal = document.getElementById('subtotal-value').innerText;
    const tax = document.getElementById('tax-value').innerText;
    const total = document.getElementById('total-value').innerText;

    doc.setFontSize(18);
    doc.text('🧾 فاتورة الطلب', 40, 50);
    doc.setFontSize(12);
    doc.text(`الاسم: ${name}`, 40, 80);
    doc.text(`رقم الهاتف: ${phone}`, 40, 100);
    doc.text(`البلد: ${country}`, 40, 120);
    doc.text(`رقم الطلبية: ${orderId}`, 40, 140);
    doc.text(`موعد الإيصال: ${deliveryDate}`, 40, 160);

    doc.text(`الإجمالي الفرعي: ${subtotal}`, 40, 200);
    doc.text(`الضريبة (10%): ${tax}`, 40, 220);
    doc.setFontSize(14);
    doc.text(`الإجمالي الكلي: ${total}`, 40, 260);

    doc.setFontSize(10);
    doc.text('شكراً لتسوقك معنا!', 40, 300);

    // تحميل الملف تلقائياً
    doc.save('فاتورة-الطلب.pdf');
  }
</script>

</body>
</html>
