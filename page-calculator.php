<?php
/* Template Name: Price Calculator */

$prices = get_option('decoteck_prices', array(
    'cabinet_mdf' => 34000000,
    'cabinet_highgloss' => 36000000,
    'cabinet_membrane' => 35000000,
    'cabinet_neoclassic' => 39500000,
    'wardrobe_mdf' => 28000000,
    'wardrobe_highgloss' => 30000000,
    'wardrobe_neoclassic' => 33000000,
    'wardrobe_mirror' => 31000000,
    'closet_standard' => 35000000,
    'design_fee' => 1500000,
));

$logo_url = 'http://decoteck.local/wp-content/uploads/2026/08/decoteck1-1.png';

get_header(); ?>

<style>
.calc-hero { padding: 130px 50px 60px; text-align: center; background: linear-gradient(rgba(255,253,247,0.75), rgba(255,250,235,0.85)), url('https://images.unsplash.com/photo-1600566753086-00f18fe6ba68?auto=format&fit=crop&w=1920&q=80') center/cover; }
.calc-hero h1 { font-size: 3.5rem; color: var(--color-accent-dark); margin-bottom: 15px; }
.calc-hero p { font-family: var(--font-fa); font-size: 1.1rem; opacity: 0.85; direction: rtl; }

.calc-tabs { display: flex; justify-content: center; gap: 15px; padding: 40px 20px 20px; flex-wrap: wrap; }
.calc-tabs button { padding: 14px 32px; background: rgba(255,253,247,0.95); border: 2px solid var(--glass-border); border-radius: 14px; font-family: var(--font-fa); font-size: 1rem; font-weight: 700; color: var(--color-text); cursor: pointer; transition: all 0.3s; }
.calc-tabs button:hover, .calc-tabs button.active { background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark)); color: #fff; border-color: var(--color-accent-dark); box-shadow: 0 8px 25px rgba(201,169,97,0.4); transform: translateY(-3px); }

.calc-container { max-width: 950px; margin: 20px auto; padding: 0 30px 100px; }
.calc-panel { display: none; background: rgba(255,253,247,0.95); border: 1px solid var(--glass-border); border-radius: 20px; padding: 40px; box-shadow: 0 15px 45px rgba(139,105,20,0.15); }
.calc-panel.active { display: block; }
.calc-panel h2 { font-family: var(--font-fa); font-size: 1.6rem; color: var(--color-accent-dark); margin-bottom: 25px; text-align: right; direction: rtl; border-bottom: 2px dashed var(--color-accent); padding-bottom: 12px; }
.section-sub { font-family: var(--font-fa); font-size: 1.05rem; font-weight: 700; color: var(--color-accent-dark); direction: rtl; text-align: right; margin: 30px 0 15px; padding-right: 12px; border-right: 4px solid var(--color-accent); }

.calc-form-row { margin-bottom: 18px; direction: rtl; }
.calc-form-row label { display: block; font-family: var(--font-fa); font-size: 0.95rem; font-weight: 600; color: var(--color-text); margin-bottom: 8px; }
.calc-form-row input, .calc-form-row select, .calc-form-row textarea {
    width: 100%; padding: 12px 16px; background: #fff;
    border: 1px solid var(--glass-border); border-radius: 10px;
    color: #2b241a !important; font-family: var(--font-fa); font-size: 1rem; direction: rtl;
    transition: border-color 0.3s;
}
.calc-form-row input:focus, .calc-form-row select:focus, .calc-form-row textarea:focus { outline: none; border-color: var(--color-accent); box-shadow: 0 0 0 3px rgba(201,169,97,0.2); }
.calc-form-row textarea { min-height: 60px; resize: vertical; }
.form-row-3 { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px; }
.form-row-2 { display: grid; grid-template-columns: 2fr 1fr; gap: 10px; }

.extras-container { direction: rtl; }
.extra-item { display: grid; grid-template-columns: 2fr 1fr auto; gap: 10px; margin-bottom: 10px; background: rgba(255,248,220,0.4); padding: 10px; border-radius: 10px; border: 1px dashed var(--color-accent); }
.extra-item input { padding: 10px; border: 1px solid var(--glass-border); border-radius: 8px; font-family: var(--font-fa); direction: rtl; color: #2b241a !important; }
.extra-item .del-btn { background: #e74c3c; color: #fff; border: none; border-radius: 8px; padding: 0 15px; cursor: pointer; font-weight: 700; font-size: 1.2rem; }
.add-extra-btn { background: linear-gradient(135deg, var(--color-accent-dark), var(--color-text)); color: #fff; padding: 10px 20px; border: none; border-radius: 10px; font-family: var(--font-fa); font-weight: 700; cursor: pointer; margin-top: 5px; }

.calc-btn { width: 100%; padding: 18px; background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark)); color: #fff; border: none; border-radius: 14px; font-family: var(--font-fa); font-size: 1.15rem; font-weight: 700; cursor: pointer; transition: all 0.3s; margin-top: 25px; letter-spacing: 1px; }
.calc-btn:hover { transform: translateY(-3px); box-shadow: 0 15px 35px rgba(201,169,97,0.5); }

.info-note { margin-top: 20px; padding: 15px; background: rgba(255,248,220,0.4); border-right: 4px solid var(--color-accent); border-radius: 8px; font-family: var(--font-fa); font-size: 0.88rem; color: var(--color-text); direction: rtl; line-height: 1.8; }

/* Checkbox */
.chk-row { display: flex; align-items: center; gap: 10px; padding: 12px 15px; background: #fff; border: 1px solid var(--glass-border); border-radius: 10px; direction: rtl; font-family: var(--font-fa); font-weight: 600; }
.chk-row input { width: 18px; height: 18px; accent-color: var(--color-accent); }

/* INVOICE MODAL */
.invoice-modal { display: none; position: fixed; inset: 0; background: rgba(0,0,0,0.75); z-index: 9999; overflow-y: auto; padding: 30px 15px; }
.invoice-modal.show { display: block; }
.invoice-box { max-width: 800px; margin: 0 auto; background: #fff; border-radius: 16px; padding: 40px 50px; direction: rtl; font-family: 'Vazirmatn', sans-serif; box-shadow: 0 20px 60px rgba(0,0,0,0.5); position: relative; }
.invoice-close { position: absolute; top: 15px; left: 15px; background: #e74c3c; color: #fff; border: none; width: 36px; height: 36px; border-radius: 50%; font-size: 1.3rem; cursor: pointer; }
.invoice-header { text-align: center; padding-bottom: 20px; border-bottom: 3px double var(--color-accent); margin-bottom: 25px; }
.invoice-header img { height: 70px; margin: 0 auto 10px; }
.invoice-header h2 { font-family: 'Cormorant Garamond', serif; font-size: 2rem; color: var(--color-accent-dark); letter-spacing: 5px; margin-bottom: 4px; }
.invoice-header .tagline { font-family: 'Vazirmatn', sans-serif; font-size: 0.95rem; color: #555; font-style: italic; margin-top: 6px; }
.invoice-meta { display: flex; justify-content: space-between; font-size: 0.9rem; color: #666; margin-bottom: 25px; padding: 12px 15px; background: #faf7f0; border-radius: 8px; flex-wrap: wrap; gap: 10px; }
.invoice-title { text-align: center; font-size: 1.4rem; font-weight: 700; color: var(--color-accent-dark); margin-bottom: 20px; }
.invoice-table { width: 100%; border-collapse: collapse; margin-bottom: 20px; }
.invoice-table th, .invoice-table td { padding: 12px 15px; text-align: right; border-bottom: 1px solid #eee; font-size: 0.95rem; }
.invoice-table th { background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark)); color: #fff; font-weight: 700; }
.invoice-summary { background: #faf7f0; padding: 20px; border-radius: 12px; margin-top: 15px; border: 2px solid var(--color-accent); }
.invoice-summary .line { display: flex; justify-content: space-between; padding: 8px 0; font-size: 1rem; }
.invoice-summary .line.total { border-top: 2px dashed var(--color-accent); margin-top: 10px; padding-top: 15px; font-size: 1.4rem; font-weight: 700; color: var(--color-accent-dark); }
.invoice-summary .line.deposit { background: linear-gradient(135deg, #d4edda, #c3e6cb); padding: 12px 15px; border-radius: 8px; margin-top: 8px; font-weight: 700; color: #155724; }
.invoice-footer { margin-top: 25px; padding: 15px; background: #fff3cd; border: 1px dashed #f0ad4e; border-radius: 8px; font-size: 0.85rem; line-height: 2; color: #856404; }
.invoice-actions { display: flex; gap: 12px; margin-top: 20px; justify-content: center; }
.invoice-actions button { padding: 12px 28px; border: none; border-radius: 10px; font-family: 'Vazirmatn', sans-serif; font-weight: 700; cursor: pointer; transition: transform 0.3s; }
.invoice-actions button:hover { transform: translateY(-3px); }
.btn-print { background: var(--color-accent-dark); color: #fff; }
.btn-pdf { background: #e74c3c; color: #fff; }

@media print {
    body * { visibility: hidden; }
    .invoice-modal, .invoice-modal * { visibility: visible; }
    .invoice-modal { position: absolute; inset: 0; background: #fff; padding: 0; }
    .invoice-close, .invoice-actions { display: none !important; }
    .invoice-box { box-shadow: none; }
}

@media (max-width: 700px) {
    .calc-hero h1 { font-size: 2.2rem; }
    .calc-panel { padding: 25px 20px; }
    .form-row-3, .form-row-2 { grid-template-columns: 1fr; }
    .extra-item { grid-template-columns: 1fr; }
    .invoice-box { padding: 25px 20px; }
}
</style>

<section class="calc-hero">
    <h1>Price Calculator</h1>
    <p>محاسبه‌گر آنلاین قیمت کابینت و کمد دیواری — با پیش‌فاکتور رسمی</p>
</section>

<div class="calc-tabs">
    <button class="active" data-tab="cabinet">🔹 کابینت آشپزخانه</button>
    <button data-tab="wardrobe">🔹 کمد دیواری</button>
</div>

<div class="calc-container">

    <!-- CABINET -->
    <div class="calc-panel active" id="cabinet-panel">
        <h2>محاسبه قیمت کابینت</h2>

        <div class="section-sub">🗂️ اطلاعات مشتری</div>
        <div class="form-row-2">
            <div class="calc-form-row"><label>نام و نام خانوادگی</label><input type="text" id="c-cname" placeholder="نام کامل"></div>
            <div class="calc-form-row"><label>شماره تماس</label><input type="tel" id="c-cphone" placeholder="09xxxxxxxxx"></div>
        </div>

        <div class="section-sub">🔨 اطلاعات کابینت</div>
        <div class="calc-form-row">
            <label>نوع متریال کابینت</label>
            <select id="c-material">
                <option value="<?php echo $prices['cabinet_mdf']; ?>" data-label="MDF">MDF — <?php echo number_format($prices['cabinet_mdf']); ?> تومان/متر</option>
                <option value="<?php echo $prices['cabinet_highgloss']; ?>" data-label="هایگلاس">هایگلاس — <?php echo number_format($prices['cabinet_highgloss']); ?> تومان/متر</option>
                <option value="<?php echo $prices['cabinet_membrane']; ?>" data-label="ممبران">ممبران — <?php echo number_format($prices['cabinet_membrane']); ?> تومان/متر</option>
                <option value="<?php echo $prices['cabinet_neoclassic']; ?>" data-label="نئوکلاسیک">نئوکلاسیک — <?php echo number_format($prices['cabinet_neoclassic']); ?> تومان/متر</option>
            </select>
        </div>
        <div class="calc-form-row"><label>متر طول کابینت (زیر + رو)</label><input type="number" id="c-length" placeholder="مثلاً 5" min="0" step="0.5"></div>

        <div class="section-sub">📐 صفحه کابینت (روی ماشین ظرفشویی/لباسشویی)</div>
        <div class="calc-form-row"><label>طول صفحه (سانتی‌متر) — هر سانتی‌متر ۴۴,۰۰۰ تومان</label><input type="number" id="c-plate" placeholder="مثلاً 120" min="0" step="1"></div>

        <div class="section-sub">🚿 سینک اضافه</div>
        <div class="calc-form-row"><label>تعداد سینک اضافه — هر سینک ۳,۰۰۰,۰۰۰ تومان</label><input type="number" id="c-sink" placeholder="0" min="0" step="1" value="0"></div>

        <div class="section-sub">🎨 نماهای اضافه</div>
        <div class="form-row-3">
            <div class="calc-form-row"><label>نمای MDF (سانتی‌متر)</label><input type="number" id="c-nama-mdf" placeholder="0" min="0" step="1" value="0"></div>
            <div class="calc-form-row"><label>نمای هایگلاس (سانتی‌متر)</label><input type="number" id="c-nama-hg" placeholder="0" min="0" step="1" value="0"></div>
            <div class="calc-form-row"><label>نمای نئوکلاسیک (سانتی‌متر)</label><input type="number" id="c-nama-neo" placeholder="0" min="0" step="1" value="0"></div>
        </div>

        <div class="section-sub">➕ موارد اضافه (دلخواه)</div>
        <div class="extras-container" id="c-extras"></div>
        <button type="button" class="add-extra-btn" onclick="addExtra('c-extras')">+ افزودن مورد جدید</button>

        <div class="section-sub">🎯 خدمات ویژه</div>
        <label class="chk-row"><input type="checkbox" id="c-design" value="<?php echo $prices['design_fee']; ?>"> طراحی سه‌بعدی (<?php echo number_format($prices['design_fee']); ?> تومان)</label>

        <button class="calc-btn" onclick="calcCabinet()">💰 محاسبه و صدور پیش‌فاکتور</button>

        <div class="info-note">
            💡 هزینه نصب به صورت خودکار <strong>۱۰٪</strong> کل قیمت محاسبه می‌شود.<br>
            💡 پیش‌فاکتور قابل چاپ و ذخیره PDF است.
        </div>
    </div>

    <!-- WARDROBE -->
    <div class="calc-panel" id="wardrobe-panel">
        <h2>محاسبه قیمت کمد دیواری</h2>

        <div class="section-sub">🗂️ اطلاعات مشتری</div>
        <div class="form-row-2">
            <div class="calc-form-row"><label>نام و نام خانوادگی</label><input type="text" id="w-cname" placeholder="نام کامل"></div>
            <div class="calc-form-row"><label>شماره تماس</label><input type="tel" id="w-cphone" placeholder="09xxxxxxxxx"></div>
        </div>

        <div class="section-sub">🚪 اطلاعات کمد دیواری</div>
        <div class="calc-form-row">
            <label>نوع متریال کمد</label>
            <select id="w-material">
                <option value="<?php echo $prices['wardrobe_mdf']; ?>" data-label="MDF">MDF — <?php echo number_format($prices['wardrobe_mdf']); ?> تومان/متر</option>
                <option value="<?php echo $prices['wardrobe_highgloss']; ?>" data-label="هایگلاس">هایگلاس — <?php echo number_format($prices['wardrobe_highgloss']); ?> تومان/متر</option>
                <option value="<?php echo $prices['wardrobe_neoclassic']; ?>" data-label="نئوکلاسیک">نئوکلاسیک — <?php echo number_format($prices['wardrobe_neoclassic']); ?> تومان/متر</option>
                <option value="<?php echo $prices['wardrobe_mirror']; ?>" data-label="آینه‌ای">آینه‌ای — <?php echo number_format($prices['wardrobe_mirror']); ?> تومان/متر</option>
            </select>
        </div>
        <div class="calc-form-row"><label>متر طول کمد دیواری</label><input type="number" id="w-length" placeholder="مثلاً 3" min="0" step="0.1"></div>

        <div class="section-sub">🎨 نماهای اضافه</div>
        <div class="form-row-3">
            <div class="calc-form-row"><label>نمای MDF (سانتی‌متر)</label><input type="number" id="w-nama-mdf" placeholder="0" min="0" step="1" value="0"></div>
            <div class="calc-form-row"><label>نمای هایگلاس (سانتی‌متر)</label><input type="number" id="w-nama-hg" placeholder="0" min="0" step="1" value="0"></div>
            <div class="calc-form-row"><label>نمای نئوکلاسیک (سانتی‌متر)</label><input type="number" id="w-nama-neo" placeholder="0" min="0" step="1" value="0"></div>
        </div>

        <div class="section-sub">➕ موارد اضافه (دلخواه)</div>
        <div class="extras-container" id="w-extras"></div>
        <button type="button" class="add-extra-btn" onclick="addExtra('w-extras')">+ افزودن مورد جدید</button>

        <div class="section-sub">🎯 خدمات ویژه</div>
        <label class="chk-row"><input type="checkbox" id="w-design" value="<?php echo $prices['design_fee']; ?>"> طراحی سه‌بعدی (<?php echo number_format($prices['design_fee']); ?> تومان)</label>

        <button class="calc-btn" onclick="calcWardrobe()">💰 محاسبه و صدور پیش‌فاکتور</button>

        <div class="info-note">
            💡 هزینه نصب به صورت خودکار <strong>۱۰٪</strong> کل قیمت محاسبه می‌شود.
        </div>
    </div>

</div>

<!-- INVOICE MODAL -->
<div class="invoice-modal" id="invoice-modal">
    <div class="invoice-box" id="invoice-content">
        <button class="invoice-close" onclick="closeInvoice()">×</button>

        <div class="invoice-header">
            <img src="<?php echo $logo_url; ?>" alt="DECOTECK">
            <h2>DECOTECK</h2>
            <div class="tagline">✨ همراه شما در ساخت رویاهای دکوراسیون داخلی ✨</div>
        </div>

        <div class="invoice-meta">
            <div>📅 تاریخ: <strong id="inv-date"></strong></div>
            <div>⏰ ساعت: <strong id="inv-time"></strong></div>
            <div>🧾 شماره: <strong id="inv-number"></strong></div>
        </div>

        <div class="invoice-title" id="inv-title">پیش‌فاکتور کابینت آشپزخانه</div>

        <div style="background:#f9f5eb;padding:12px 15px;border-radius:8px;margin-bottom:15px;font-size:0.9rem;">
            <strong>مشتری:</strong> <span id="inv-cname">—</span> &nbsp;|&nbsp;
            <strong>شماره تماس:</strong> <span id="inv-cphone">—</span>
        </div>

        <table class="invoice-table">
            <thead>
                <tr>
                    <th>شرح</th>
                    <th>مقدار</th>
                    <th style="text-align:left;">مبلغ (تومان)</th>
                </tr>
            </thead>
            <tbody id="inv-rows"></tbody>
        </table>

        <div class="invoice-summary">
            <div class="line"><span>جمع کل خدمات:</span><span id="inv-subtotal">0 تومان</span></div>
            <div class="line"><span>هزینه نصب (۱۰٪):</span><span id="inv-install">0 تومان</span></div>
            <div class="line total"><span>مبلغ نهایی:</span><span id="inv-total">0 تومان</span></div>
            <div class="line deposit"><span>💳 پیش‌پرداخت (۶۰٪):</span><span id="inv-deposit">0 تومان</span></div>
        </div>

        <div class="invoice-footer">
            ⚠️ <strong>توجه:</strong> این پیش‌فاکتور تنها <strong>۲۴ ساعت</strong> اعتبار دارد.<br>
            ✅ فاکتور رسمی و قطعی، پس از واریز <strong>۶۰٪ مبلغ پیش‌پرداخت</strong> به حساب مجموعه دکوتک صادر می‌گردد.<br>
            📞 برای هماهنگی و ثبت سفارش: 09195512979 - 09197288439
        </div>

        <div class="invoice-actions">
            <button class="btn-print" onclick="window.print()">🖨️ چاپ پیش‌فاکتور</button>
            <button class="btn-pdf" onclick="downloadPDF()">📄 ذخیره PDF</button>
        </div>
    </div>
</div>

<script>
document.querySelectorAll('.calc-tabs button').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.calc-tabs button').forEach(b => b.classList.remove('active'));
        document.querySelectorAll('.calc-panel').forEach(p => p.classList.remove('active'));
        btn.classList.add('active');
        document.getElementById(btn.dataset.tab + '-panel').classList.add('active');
    });
});

function fmt(num) { return Math.round(num).toLocaleString('en-US'); }

function addExtra(containerId) {
    const div = document.createElement('div');
    div.className = 'extra-item';
    div.innerHTML = `
        <input type="text" placeholder="عنوان (مثلاً: کشو تاندم)" class="ex-title">
        <input type="number" placeholder="مبلغ (تومان)" class="ex-amount" min="0" step="1">
        <button type="button" class="del-btn" onclick="this.parentElement.remove()">×</button>
    `;
    document.getElementById(containerId).appendChild(div);
}

function getExtras(containerId) {
    const arr = [];
    document.querySelectorAll('#' + containerId + ' .extra-item').forEach(item => {
        const title = item.querySelector('.ex-title').value.trim();
        const amount = parseInt(item.querySelector('.ex-amount').value) || 0;
        if (title && amount > 0) arr.push({title, amount});
    });
    return arr;
}

const PRICE_PLATE = 44000;
const PRICE_SINK = 3000000;
const PRICE_NAMA_MDF = 30000;
const PRICE_NAMA_HG = 45000;
const PRICE_NAMA_NEO = 70000;

function calcCabinet() {
    const matPrice = parseInt(document.getElementById('c-material').value);
    const matLabel = document.getElementById('c-material').selectedOptions[0].dataset.label;
    const length = parseFloat(document.getElementById('c-length').value) || 0;
    const plate = parseFloat(document.getElementById('c-plate').value) || 0;
    const sink = parseInt(document.getElementById('c-sink').value) || 0;
    const namaMdf = parseFloat(document.getElementById('c-nama-mdf').value) || 0;
    const namaHg = parseFloat(document.getElementById('c-nama-hg').value) || 0;
    const namaNeo = parseFloat(document.getElementById('c-nama-neo').value) || 0;
    const design = document.getElementById('c-design').checked ? parseInt(document.getElementById('c-design').value) : 0;
    const extras = getExtras('c-extras');
    const cname = document.getElementById('c-cname').value.trim() || 'مشتری گرامی';
    const cphone = document.getElementById('c-cphone').value.trim() || '—';

    if (length <= 0) { alert('لطفاً متر طول کابینت را وارد کنید'); return; }

    const rows = [];
    rows.push({desc: `کابینت ${matLabel}`, qty: `${length} متر`, price: matPrice * length});
    if (plate > 0) rows.push({desc: 'صفحه کابینت (روی ماشین)', qty: `${plate} سانتی‌متر`, price: plate * PRICE_PLATE});
    if (sink > 0) rows.push({desc: 'سینک اضافه', qty: `${sink} عدد`, price: sink * PRICE_SINK});
    if (namaMdf > 0) rows.push({desc: 'نمای MDF', qty: `${namaMdf} سانتی‌متر`, price: namaMdf * PRICE_NAMA_MDF});
    if (namaHg > 0) rows.push({desc: 'نمای هایگلاس', qty: `${namaHg} سانتی‌متر`, price: namaHg * PRICE_NAMA_HG});
    if (namaNeo > 0) rows.push({desc: 'نمای نئوکلاسیک', qty: `${namaNeo} سانتی‌متر`, price: namaNeo * PRICE_NAMA_NEO});
    if (design > 0) rows.push({desc: 'طراحی سه‌بعدی', qty: '۱ پروژه', price: design});
    extras.forEach(e => rows.push({desc: e.title, qty: '—', price: e.amount}));

    showInvoice('پیش‌فاکتور کابینت آشپزخانه', cname, cphone, rows);
}

function calcWardrobe() {
    const matPrice = parseInt(document.getElementById('w-material').value);
    const matLabel = document.getElementById('w-material').selectedOptions[0].dataset.label;
    const length = parseFloat(document.getElementById('w-length').value) || 0;
    const namaMdf = parseFloat(document.getElementById('w-nama-mdf').value) || 0;
    const namaHg = parseFloat(document.getElementById('w-nama-hg').value) || 0;
    const namaNeo = parseFloat(document.getElementById('w-nama-neo').value) || 0;
    const design = document.getElementById('w-design').checked ? parseInt(document.getElementById('w-design').value) : 0;
    const extras = getExtras('w-extras');
    const cname = document.getElementById('w-cname').value.trim() || 'مشتری گرامی';
    const cphone = document.getElementById('w-cphone').value.trim() || '—';

    if (length <= 0) { alert('لطفاً متر طول کمد را وارد کنید'); return; }

    const rows = [];
    rows.push({desc: `کمد دیواری ${matLabel}`, qty: `${length} متر`, price: matPrice * length});
    if (namaMdf > 0) rows.push({desc: 'نمای MDF', qty: `${namaMdf} سانتی‌متر`, price: namaMdf * PRICE_NAMA_MDF});
    if (namaHg > 0) rows.push({desc: 'نمای هایگلاس', qty: `${namaHg} سانتی‌متر`, price: namaHg * PRICE_NAMA_HG});
    if (namaNeo > 0) rows.push({desc: 'نمای نئوکلاسیک', qty: `${namaNeo} سانتی‌متر`, price: namaNeo * PRICE_NAMA_NEO});
    if (design > 0) rows.push({desc: 'طراحی سه‌بعدی', qty: '۱ پروژه', price: design});
    extras.forEach(e => rows.push({desc: e.title, qty: '—', price: e.amount}));

    showInvoice('پیش‌فاکتور کمد دیواری', cname, cphone, rows);
}

function showInvoice(title, cname, cphone, rows) {
    const subtotal = rows.reduce((s,r) => s + r.price, 0);
    const install = subtotal * 0.10;
    const total = subtotal + install;
    const deposit = total * 0.60;

    document.getElementById('inv-title').innerText = title;
    document.getElementById('inv-cname').innerText = cname;
    document.getElementById('inv-cphone').innerText = cphone;

    const now = new Date();
    const persianDate = new Intl.DateTimeFormat('fa-IR', {year:'numeric',month:'long',day:'numeric'}).format(now);
    const time = now.toLocaleTimeString('fa-IR', {hour:'2-digit',minute:'2-digit'});
    document.getElementById('inv-date').innerText = persianDate;
    document.getElementById('inv-time').innerText = time;
    document.getElementById('inv-number').innerText = 'DEC-' + Date.now().toString().slice(-8);

    let rowsHtml = '';
    rows.forEach(r => {
        rowsHtml += `<tr><td>${r.desc}</td><td>${r.qty}</td><td style="text-align:left;font-weight:600;">${fmt(r.price)}</td></tr>`;
    });
    document.getElementById('inv-rows').innerHTML = rowsHtml;

    document.getElementById('inv-subtotal').innerText = fmt(subtotal) + ' تومان';
    document.getElementById('inv-install').innerText = fmt(install) + ' تومان';
    document.getElementById('inv-total').innerText = fmt(total) + ' تومان';
    document.getElementById('inv-deposit').innerText = fmt(deposit) + ' تومان';

    document.getElementById('invoice-modal').classList.add('show');
    document.body.style.overflow = 'hidden';
}

function closeInvoice() {
    document.getElementById('invoice-modal').classList.remove('show');
    document.body.style.overflow = 'auto';
}

function downloadPDF() {
    window.print();
    alert('💡 در پنجره چاپ، گزینه "Save as PDF" را انتخاب کنید.');
}
</script>

<?php get_footer(); ?>