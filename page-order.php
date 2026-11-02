<?php
/* Template Name: Order */

// پردازش فرم
$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['phone'])) {
    global $wpdb;
    $table = $wpdb->prefix . 'decoteck_orders';

    // ساخت جدول در اولین بار
    $wpdb->query("CREATE TABLE IF NOT EXISTS $table (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(120),
        phone VARCHAR(30),
        service VARCHAR(120),
        note TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )");

    $wpdb->insert($table, array(
        'name'    => sanitize_text_field($_POST['name']),
        'phone'   => sanitize_text_field($_POST['phone']),
        'service' => sanitize_text_field($_POST['service']),
        'note'    => sanitize_textarea_field($_POST['note']),
    ));
    $success = true;
}

get_header(); ?>

<style>
.inner-hero {
    padding: 200px 50px 100px;
    text-align: center;
    background: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.75)),
                url('https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=1920&q=80') center/cover;
}
.inner-hero h1 { font-size: 4rem; letter-spacing: 4px; margin-bottom: 15px; }
.inner-hero p { font-family: var(--font-fa); font-size: 1.1rem; opacity: 0.8; }

.order-wrap {
    max-width: 700px;
    margin: 0 auto;
    padding: 80px 30px 120px;
}
.order-form {
    background: rgba(255,255,255,0.04);
    padding: 50px 40px;
    border-radius: 20px;
    border: 1px solid rgba(255,255,255,0.12);
    backdrop-filter: blur(10px);
}
.order-form h3 {
    font-family: var(--font-fa); direction: rtl;
    font-size: 1.6rem; margin-bottom: 10px; text-align: right;
}
.order-form .sub {
    font-family: var(--font-fa); direction: rtl;
    font-size: 0.95rem; opacity: 0.7;
    margin-bottom: 30px; text-align: right;
}
.order-form label {
    display: block; direction: rtl;
    font-family: var(--font-fa); font-size: 0.9rem;
    margin-bottom: 8px; opacity: 0.85;
}
.order-form input,
.order-form select,
.order-form textarea {
    width: 100%; padding: 14px 18px;
    background: rgba(255,255,255,0.05);
    border: 1px solid rgba(255,255,255,0.15);
    border-radius: 10px;
    color: #f5f1ea;
    font-family: var(--font-fa);
    font-size: 1rem;
    margin-bottom: 18px;
    direction: rtl;
    transition: border-color 0.3s;
}
.order-form input:focus,
.order-form select:focus,
.order-form textarea:focus {
    outline: none; border-color: rgba(255,255,255,0.5);
}
.order-form textarea { min-height: 100px; resize: vertical; }
.order-form button {
    width: 100%; padding: 16px;
    background: #f5f1ea; color: #0a0a0a;
    border: none; border-radius: 10px;
    font-family: var(--font-fa);
    font-size: 1.1rem; font-weight: 600;
    letter-spacing: 1px; cursor: pointer;
    transition: all 0.3s;
    margin-top: 10px;
}
.order-form button:hover {
    background: #fff; transform: translateY(-2px);
    box-shadow: 0 10px 30px rgba(255,255,255,0.2);
}
.success-msg {
    background: rgba(6,255,165,0.1);
    border: 1px solid rgba(6,255,165,0.4);
    color: #06ffa5;
    padding: 20px;
    border-radius: 12px;
    text-align: center;
    font-family: var(--font-fa);
    font-size: 1.1rem;
    margin-bottom: 25px;
    direction: rtl;
}
</style>

<section class="inner-hero">
    <h1>Place Your Order</h1>
    <p>ثبت سفارش — تیم دکوتک ظرف کمتر از ۲ ساعت با شما تماس می‌گیرد</p>
</section>

<div class="order-wrap">
    <form class="order-form" method="post">

        <?php if ($success): ?>
            <div class="success-msg">
                ✓ سفارش شما با موفقیت ثبت شد. به‌زودی با شما تماس می‌گیریم.
            </div>
        <?php endif; ?>

        <h3>ثبت سفارش</h3>
        <p class="sub">لطفاً شماره تماس خود را وارد کنید تا کارشناسان ما با شما تماس بگیرند.</p>

        <label>نام و نام خانوادگی (اختیاری)</label>
        <input type="text" name="name" placeholder="نام کامل">

        <label>شماره تماس *</label>
        <input type="tel" name="phone" placeholder="09xxxxxxxxx" required>

        <label>نوع خدمات مورد نظر</label>
        <select name="service">
            <option value="cabinet">کابینت آشپزخانه</option>
            <option value="wardrobe">کمد دیواری</option>
            <option value="closet">کلوزت</option>
            <option value="3d">طراحی سه‌بعدی</option>
            <option value="renovation">بازسازی کامل</option>
            <option value="roof">روف گاردن</option>
            <option value="consult">مشاوره</option>
        </select>

        <label>توضیحات (اختیاری)</label>
        <textarea name="note" placeholder="متراژ، سبک مورد نظر، بودجه تقریبی..."></textarea>

        <button type="submit">ثبت سفارش و درخواست تماس</button>
    </form>
</div>

<?php get_footer(); ?>