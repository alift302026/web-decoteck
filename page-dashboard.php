<?php
/* Template Name: Dashboard */

$customer = decoteck_get_current_customer();

// Not logged in? Redirect to login
if (!$customer) {
    echo '<script>window.location.href="' . home_url('/login/') . '"</script>';
    exit;
}

// Logout
if (isset($_GET['logout'])) {
    session_destroy();
    echo '<script>window.location.href="' . home_url('/') . '"</script>';
    exit;
}

global $wpdb;
$tp = $wpdb->prefix . 'decoteck_projects';
$tc = $wpdb->prefix . 'decoteck_customers';
$tr = $wpdb->prefix . 'decoteck_reviews';

// Update profile
if (isset($_POST['update_profile'])) {
    $wpdb->update($tc, array(
        'full_name' => sanitize_text_field($_POST['full_name']),
        'email' => sanitize_email($_POST['email']),
        'address' => sanitize_textarea_field($_POST['address']),
    ), array('id' => $customer->id));
    echo '<script>window.location.reload();</script>';
    exit;
}

// Change password
$pass_msg = '';
if (isset($_POST['change_password'])) {
    $old = $_POST['old_password'];
    $new = $_POST['new_password'];
    $new2 = $_POST['new_password2'];
    if (!password_verify($old, $customer->password)) {
        $pass_msg = '<div class="msg-err">❌ رمز فعلی اشتباه است.</div>';
    } elseif (strlen($new) < 6) {
        $pass_msg = '<div class="msg-err">❌ رمز جدید حداقل ۶ کاراکتر باشد.</div>';
    } elseif ($new !== $new2) {
        $pass_msg = '<div class="msg-err">❌ رمز جدید و تکرار آن یکسان نیستند.</div>';
    } else {
        $wpdb->update($tc, array('password' => password_hash($new, PASSWORD_DEFAULT)), array('id' => $customer->id));
        $pass_msg = '<div class="msg-ok">✅ رمز عبور با موفقیت تغییر کرد.</div>';
    }
}

// Submit review
$rev_msg = '';
if (isset($_POST['submit_review'])) {
    $wpdb->insert($tr, array(
        'customer_id' => $customer->id,
        'customer_name' => $customer->full_name,
        'rating' => intval($_POST['rating']),
        'review_text' => sanitize_textarea_field($_POST['review_text']),
        'project_type' => sanitize_text_field($_POST['project_type']),
        'approved' => 0,
    ));
    $rev_msg = '<div class="msg-ok">✅ نظر شما ثبت شد و پس از تایید نمایش داده می‌شود. سپاسگزاریم!</div>';
}

$projects = $wpdb->get_results($wpdb->prepare("SELECT * FROM $tp WHERE customer_id = %d ORDER BY updated_at DESC", $customer->id));
$my_reviews = $wpdb->get_results($wpdb->prepare("SELECT * FROM $tr WHERE customer_id = %d ORDER BY created_at DESC", $customer->id));

$statuses_flow = array('ثبت اولیه','بازدید و اندازه‌گیری','طراحی و تایید','تولید در کارخانه','ارسال','نصب','تکمیل شده');

get_header(); ?>

<style>
.dash-hero {
    padding: 130px 50px 40px;
    background: linear-gradient(135deg, rgba(232,213,160,0.4), rgba(255,253,247,0.7)),
                url('https://images.unsplash.com/photo-1588854337221-4cf9fa96059c?auto=format&fit=crop&w=1920&q=80') center/cover;
    text-align: center;
}
.dash-hero h1 {
    font-size: 2.8rem;
    color: var(--color-accent-dark);
    margin-bottom: 8px;
}
.dash-hero .welcome {
    font-family: var(--font-fa);
    font-size: 1.1rem;
    color: var(--color-text);
    font-weight: 700;
}

.dash-wrap {
    max-width: 1200px;
    margin: 40px auto 100px;
    padding: 0 30px;
    display: grid;
    grid-template-columns: 280px 1fr;
    gap: 30px;
    direction: rtl;
}

.dash-sidebar {
    background: rgba(255,253,247,0.95);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 25px;
    box-shadow: 0 15px 40px rgba(139,105,20,0.15);
    height: fit-content;
    position: sticky;
    top: 130px;
}

.avatar {
    width: 90px; height: 90px;
    background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
    border-radius: 50%;
    color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-family: var(--font-display);
    font-size: 2.2rem;
    font-weight: 700;
    margin: 0 auto 15px;
    box-shadow: 0 10px 25px rgba(201,169,97,0.5);
}
.sb-name {
    font-family: var(--font-fa);
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--color-text);
    text-align: center;
    margin-bottom: 4px;
}
.sb-phone {
    text-align: center;
    font-family: var(--font-en);
    font-size: 0.85rem;
    color: var(--color-accent-dark);
    direction: ltr;
    margin-bottom: 20px;
}

.discount-card {
    background: linear-gradient(135deg, #fff8dc, #f5e6a3);
    border: 2px dashed var(--color-accent-dark);
    border-radius: 12px;
    padding: 15px;
    text-align: center;
    margin-bottom: 20px;
}
.discount-card .d-label {
    font-family: var(--font-fa);
    font-size: 0.8rem;
    color: var(--color-accent-dark);
    font-weight: 700;
    margin-bottom: 6px;
}
.discount-card .d-code {
    font-family: var(--font-en);
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--color-text);
    letter-spacing: 2px;
    padding: 4px 10px;
    background: #fff;
    border-radius: 6px;
    display: inline-block;
}
.discount-card .d-percent {
    font-family: var(--font-fa);
    font-size: 0.85rem;
    color: var(--color-accent-dark);
    margin-top: 8px;
    font-weight: 700;
}
.discount-card.empty {
    background: #f5f5f5;
    border-color: #ccc;
    color: #888;
    font-size: 0.85rem;
    font-family: var(--font-fa);
}

.sb-menu {
    display: flex;
    flex-direction: column;
    gap: 6px;
}
.sb-menu button {
    background: transparent;
    border: 1px solid transparent;
    padding: 12px 15px;
    border-radius: 10px;
    font-family: var(--font-fa);
    font-size: 0.95rem;
    color: var(--color-text);
    cursor: pointer;
    text-align: right;
    transition: all 0.3s;
}
.sb-menu button:hover, .sb-menu button.active {
    background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
    color: #fff;
}
.sb-logout {
    display: block;
    margin-top: 15px;
    text-align: center;
    padding: 10px;
    background: #fce4e4;
    color: #c0392b !important;
    border-radius: 10px;
    font-family: var(--font-fa);
    text-decoration: none;
    font-weight: 700;
}
.sb-logout:hover { background: #e74c3c; color: #fff !important; }

.dash-main {
    background: rgba(255,253,247,0.95);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 35px;
    box-shadow: 0 15px 40px rgba(139,105,20,0.15);
    min-height: 500px;
}

.dash-section { display: none; }
.dash-section.active { display: block; }

.dash-section h2 {
    font-family: var(--font-fa);
    font-size: 1.5rem;
    color: var(--color-accent-dark);
    margin-bottom: 20px;
    padding-bottom: 12px;
    border-bottom: 2px dashed var(--color-accent);
}

/* Projects */
.project-card {
    background: linear-gradient(135deg, #fff, #faf7f0);
    border: 1px solid var(--glass-border);
    border-right: 4px solid var(--color-accent);
    border-radius: 14px;
    padding: 20px;
    margin-bottom: 20px;
    box-shadow: 0 6px 20px rgba(0,0,0,0.06);
}
.project-card h3 {
    font-family: var(--font-fa);
    font-size: 1.2rem;
    color: var(--color-text);
    margin-bottom: 8px;
}
.project-meta {
    font-family: var(--font-fa);
    font-size: 0.85rem;
    color: #666;
    margin-bottom: 15px;
}

.status-flow {
    display: flex;
    justify-content: space-between;
    gap: 5px;
    margin: 20px 0;
    flex-wrap: wrap;
}
.status-step {
    flex: 1;
    min-width: 90px;
    text-align: center;
    padding: 8px 4px;
    background: #f0f0f0;
    border-radius: 8px;
    font-family: var(--font-fa);
    font-size: 0.72rem;
    color: #999;
    font-weight: 600;
    position: relative;
}
.status-step.done {
    background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
    color: #fff;
}
.status-step.current {
    background: linear-gradient(135deg, #4caf50, #2e7d32);
    color: #fff;
    box-shadow: 0 6px 15px rgba(46,125,50,0.4);
    animation: pulse 1.5s infinite;
}
@keyframes pulse {
    0%,100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.price-info {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 10px;
    margin-top: 15px;
    font-family: var(--font-fa);
    font-size: 0.9rem;
}
.price-info div {
    background: #fff8dc;
    padding: 10px 12px;
    border-radius: 8px;
    border-right: 3px solid var(--color-accent);
}
.contract-btn {
    display: inline-block;
    background: var(--color-accent-dark);
    color: #fff !important;
    padding: 10px 22px;
    border-radius: 10px;
    font-family: var(--font-fa);
    font-weight: 700;
    text-decoration: none;
    margin-top: 12px;
    transition: transform 0.3s;
}
.contract-btn:hover { transform: translateY(-3px); background: var(--color-text); }

.empty-state {
    text-align: center;
    padding: 60px 20px;
    color: #999;
    font-family: var(--font-fa);
}

/* Forms */
.dash-form .form-row { margin-bottom: 15px; }
.dash-form label {
    display: block;
    font-family: var(--font-fa);
    font-size: 0.9rem;
    font-weight: 600;
    margin-bottom: 6px;
}
.dash-form input, .dash-form textarea, .dash-form select {
    width: 100%;
    padding: 12px 15px;
    background: #fff;
    border: 1px solid var(--glass-border);
    border-radius: 10px;
    color: var(--color-text) !important;
    font-family: var(--font-fa);
    font-size: 1rem;
    direction: rtl;
}
.dash-form textarea { min-height: 80px; resize: vertical; }
.dash-form button {
    padding: 13px 30px;
    background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
    color: #fff;
    border: none;
    border-radius: 10px;
    font-family: var(--font-fa);
    font-size: 1rem;
    font-weight: 700;
    cursor: pointer;
    transition: transform 0.3s;
}
.dash-form button:hover { transform: translateY(-3px); box-shadow: 0 10px 25px rgba(201,169,97,0.4); }

.msg-ok {
    background: #e8f5e9;
    color: #2e7d32;
    padding: 12px;
    border-radius: 8px;
    margin-bottom: 15px;
    font-family: var(--font-fa);
    text-align: center;
    font-weight: 600;
}
.msg-err {
    background: #fce4e4;
    color: #c0392b;
    padding: 12px;
    border-radius: 8px;
    margin-bottom: 15px;
    font-family: var(--font-fa);
    text-align: center;
    font-weight: 600;
}

.rating-stars {
    display: flex;
    gap: 8px;
    justify-content: center;
    margin: 15px 0;
}
.rating-stars input { display: none; }
.rating-stars label {
    font-size: 2.5rem;
    color: #ddd;
    cursor: pointer;
    transition: color 0.3s;
    margin: 0;
}
.rating-stars input:checked ~ label,
.rating-stars label:hover,
.rating-stars label:hover ~ label { color: var(--color-accent); }

.my-review-card {
    background: #faf7f0;
    padding: 15px;
    border-radius: 10px;
    margin-bottom: 10px;
    border-right: 3px solid var(--color-accent);
}
.my-review-card .stars { color: var(--color-accent); font-size: 1.1rem; }
.my-review-card .approved-badge {
    display: inline-block;
    background: #4caf50;
    color: #fff;
    padding: 3px 10px;
    border-radius: 12px;
    font-size: 0.75rem;
    margin-right: 8px;
}
.my-review-card .pending-badge {
    display: inline-block;
    background: #ff9800;
    color: #fff;
    padding: 3px 10px;
    border-radius: 12px;
    font-size: 0.75rem;
    margin-right: 8px;
}

@media (max-width: 900px) {
    .dash-wrap { grid-template-columns: 1fr; }
    .dash-sidebar { position: static; }
    .status-step { min-width: 60px; font-size: 0.65rem; }
}
</style>

<section class="dash-hero">
    <h1>🎨 داشبورد شخصی</h1>
    <div class="welcome">خوش آمدید، <?php echo esc_html($customer->full_name); ?> عزیز</div>
</section>

<div class="dash-wrap">

    <!-- SIDEBAR -->
    <aside class="dash-sidebar">
        <div class="avatar"><?php echo mb_substr($customer->full_name, 0, 1); ?></div>
        <div class="sb-name"><?php echo esc_html($customer->full_name); ?></div>
        <div class="sb-phone"><?php echo esc_html($customer->phone); ?></div>

        <?php if (!empty($customer->discount_code) && $customer->discount_percent > 0): ?>
            <div class="discount-card">
                <div class="d-label">🎁 کد تخفیف اختصاصی شما</div>
                <div class="d-code"><?php echo esc_html($customer->discount_code); ?></div>
                <div class="d-percent"><?php echo intval($customer->discount_percent); ?>٪ تخفیف</div>
            </div>
        <?php else: ?>
            <div class="discount-card empty">
                هنوز کد تخفیفی ندارید.<br>پس از اولین سفارش، به شما اختصاص می‌یابد.
            </div>
        <?php endif; ?>

        <nav class="sb-menu">
            <button class="tab-btn active" data-tab="projects">📋 پروژه‌های من</button>
            <button class="tab-btn" data-tab="profile">👤 اطلاعات شخصی</button>
            <button class="tab-btn" data-tab="password">🔒 تغییر رمز عبور</button>
            <button class="tab-btn" data-tab="review">⭐ ثبت نظر</button>
        </nav>
        <a href="?logout=1" class="sb-logout" onclick="return confirm('خارج شوید؟')">🚪 خروج</a>
    </aside>

    <!-- MAIN -->
    <main class="dash-main">

        <!-- Projects -->
        <div class="dash-section active" id="tab-projects">
            <h2>📋 پروژه‌های من</h2>
            <?php if (empty($projects)): ?>
                <div class="empty-state">
                    <p style="font-size:1.1rem;">هنوز پروژه‌ای برای شما ثبت نشده است.</p>
                    <p style="margin-top:10px;">پس از ثبت اولین سفارش، اطلاعات پروژه‌تان اینجا نمایش داده می‌شود.</p>
                    <a href="<?php echo home_url('/order/'); ?>" class="contract-btn" style="margin-top:20px;">🚀 ثبت سفارش جدید</a>
                </div>
            <?php else: foreach ($projects as $p): ?>
                <div class="project-card">
                    <h3><?php echo esc_html($p->project_name); ?></h3>
                    <div class="project-meta">
                        🏷️ <?php echo esc_html($p->service_type); ?> |
                        📅 آخرین بروزرسانی: <?php echo esc_html($p->updated_at); ?>
                    </div>

                    <div class="status-flow">
                        <?php
                        $current_idx = array_search($p->status, $statuses_flow);
                        foreach ($statuses_flow as $i => $s):
                            $cls = '';
                            if ($i < $current_idx) $cls = 'done';
                            elseif ($i == $current_idx) $cls = 'current';
                        ?>
                            <div class="status-step <?php echo $cls; ?>"><?php echo $s; ?></div>
                        <?php endforeach; ?>
                    </div>

                    <div class="price-info">
                        <div><strong>💰 مبلغ کل:</strong> <?php echo number_format($p->total_price); ?> تومان</div>
                        <div><strong>✅ پرداخت شده:</strong> <?php echo number_format($p->paid_amount); ?> تومان</div>
                    </div>

                    <?php if (!empty($p->notes)): ?>
                        <div style="margin-top:12px;padding:10px;background:#fff;border-radius:8px;font-family:var(--font-fa);font-size:0.9rem;">
                            📝 <strong>یادداشت:</strong> <?php echo esc_html($p->notes); ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($p->contract_url)): ?>
                        <a href="<?php echo esc_url($p->contract_url); ?>" target="_blank" class="contract-btn">📄 مشاهده قرارداد PDF</a>
                    <?php endif; ?>
                </div>
            <?php endforeach; endif; ?>
        </div>

        <!-- Profile -->
        <div class="dash-section" id="tab-profile">
            <h2>👤 اطلاعات شخصی</h2>
            <form method="post" class="dash-form">
                <div class="form-row">
                    <label>نام و نام خانوادگی</label>
                    <input type="text" name="full_name" value="<?php echo esc_attr($customer->full_name); ?>" required>
                </div>
                <div class="form-row">
                    <label>شماره موبایل (غیرقابل ویرایش)</label>
                    <input type="tel" value="<?php echo esc_attr($customer->phone); ?>" disabled style="background:#f5f5f5;">
                </div>
                <div class="form-row">
                    <label>ایمیل</label>
                    <input type="email" name="email" value="<?php echo esc_attr($customer->email); ?>">
                </div>
                <div class="form-row">
                    <label>آدرس</label>
                    <textarea name="address" placeholder="آدرس محل سکونت..."><?php echo esc_textarea($customer->address); ?></textarea>
                </div>
                <button type="submit" name="update_profile">💾 ذخیره تغییرات</button>
            </form>
        </div>

        <!-- Password -->
        <div class="dash-section" id="tab-password">
            <h2>🔒 تغییر رمز عبور</h2>
            <?php echo $pass_msg; ?>
            <form method="post" class="dash-form">
                <div class="form-row">
                    <label>رمز عبور فعلی</label>
                    <input type="password" name="old_password" required>
                </div>
                <div class="form-row">
                    <label>رمز عبور جدید (حداقل ۶ کاراکتر)</label>
                    <input type="password" name="new_password" required>
                </div>
                <div class="form-row">
                    <label>تکرار رمز جدید</label>
                    <input type="password" name="new_password2" required>
                </div>
                <button type="submit" name="change_password">🔐 تغییر رمز</button>
            </form>
        </div>

        <!-- Review -->
        <div class="dash-section" id="tab-review">
            <h2>⭐ ثبت نظر و تجربه</h2>
            <?php echo $rev_msg; ?>
            <form method="post" class="dash-form">
                <div class="form-row">
                    <label>نوع پروژه</label>
                    <select name="project_type" required>
                        <option value="کابینت آشپزخانه">کابینت آشپزخانه</option>
                        <option value="کمد دیواری">کمد دیواری</option>
                        <option value="کلوزت">کلوزت</option>
                        <option value="بازسازی">بازسازی</option>
                        <option value="سایر">سایر</option>
                    </select>
                </div>
                <div class="form-row">
                    <label>امتیاز شما</label>
                    <div class="rating-stars">
                        <input type="radio" name="rating" value="5" id="s5" checked><label for="s5">★</label>
                        <input type="radio" name="rating" value="4" id="s4"><label for="s4">★</label>
                        <input type="radio" name="rating" value="3" id="s3"><label for="s3">★</label>
                        <input type="radio" name="rating" value="2" id="s2"><label for="s2">★</label>
                        <input type="radio" name="rating" value="1" id="s1"><label for="s1">★</label>
                    </div>
                </div>
                <div class="form-row">
                    <label>متن نظر شما</label>
                    <textarea name="review_text" required placeholder="تجربه خود از همکاری با دکوتک را با ما در میان بگذارید..." rows="4"></textarea>
                </div>
                <button type="submit" name="submit_review">📝 ثبت نظر</button>
            </form>

            <?php if (!empty($my_reviews)): ?>
                <h2 style="margin-top:40px;">📚 نظرات قبلی من</h2>
                <?php foreach ($my_reviews as $r): ?>
                    <div class="my-review-card">
                        <?php if ($r->approved): ?>
                            <span class="approved-badge">✅ تایید شده</span>
                        <?php else: ?>
                            <span class="pending-badge">⏳ در انتظار تایید</span>
                        <?php endif; ?>
                        <span class="stars"><?php echo str_repeat('★', intval($r->rating)); ?></span>
                        <div style="margin-top:8px;color:#666;font-size:0.85rem;"><?php echo esc_html($r->project_type); ?> | <?php echo esc_html($r->created_at); ?></div>
                        <p style="margin-top:8px;"><?php echo esc_html($r->review_text); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

    </main>
</div>

<script>
document.querySelectorAll('.tab-btn').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        document.querySelectorAll('.dash-section').forEach(s => s.classList.remove('active'));
        btn.classList.add('active');
        document.getElementById('tab-' + btn.dataset.tab).classList.add('active');
    });
});
</script>

<?php get_footer(); ?>