<?php
/* Template Name: Signup */

$error = '';
$success = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['signup'])) {
    global $wpdb;
    $t = $wpdb->prefix . 'decoteck_customers';

    $full_name = sanitize_text_field($_POST['full_name']);
    $phone = sanitize_text_field($_POST['phone']);
    $email = sanitize_email($_POST['email']);
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    // Validate
    if (empty($full_name) || empty($phone) || empty($password)) {
        $error = 'لطفاً همه فیلدهای اجباری را پر کنید.';
    } elseif (!preg_match('/^09\d{9}$/', $phone)) {
        $error = 'شماره موبایل نامعتبر است. (مثلاً 09123456789)';
    } elseif (strlen($password) < 6) {
        $error = 'رمز عبور باید حداقل ۶ کاراکتر باشد.';
    } elseif ($password !== $password2) {
        $error = 'رمز عبور و تکرار آن یکسان نیستند.';
    } else {
        // Check if phone already exists
        $exists = $wpdb->get_var($wpdb->prepare("SELECT id FROM $t WHERE phone = %s", $phone));
        if ($exists) {
            $error = 'این شماره موبایل قبلاً ثبت‌نام شده است. لطفاً وارد شوید.';
        } else {
            // Register
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $wpdb->insert($t, array(
                'full_name' => $full_name,
                'phone' => $phone,
                'email' => $email,
                'password' => $hashed,
            ));
            $customer_id = $wpdb->insert_id;
            $_SESSION['decoteck_customer_id'] = $customer_id;
            $success = 'ثبت‌نام با موفقیت انجام شد. در حال انتقال به داشبورد...';
            echo '<script>setTimeout(()=>{window.location.href="' . home_url('/dashboard/') . '"}, 1500);</script>';
        }
    }
}

// Already logged in? Redirect
if (!empty($_SESSION['decoteck_customer_id'])) {
    echo '<script>window.location.href="' . home_url('/dashboard/') . '"</script>';
    exit;
}

get_header(); ?>

<style>
.auth-hero {
    padding: 130px 50px 40px;
    text-align: center;
    background: linear-gradient(rgba(255,253,247,0.85), rgba(255,250,235,0.9)),
                url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1920&q=80') center/cover;
}
.auth-hero h1 { font-size: 3rem; color: var(--color-accent-dark); margin-bottom: 12px; }
.auth-hero p { font-family: var(--font-fa); font-size: 1.05rem; opacity: 0.85; direction: rtl; }

.auth-container {
    max-width: 480px;
    margin: 40px auto 100px;
    padding: 0 20px;
}

.auth-box {
    background: rgba(255,253,247,0.98);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 40px 35px;
    box-shadow: 0 20px 50px rgba(139,105,20,0.2);
    direction: rtl;
}

.auth-box h2 {
    font-family: var(--font-fa);
    font-size: 1.6rem;
    color: var(--color-accent-dark);
    text-align: center;
    margin-bottom: 25px;
    padding-bottom: 15px;
    border-bottom: 2px dashed var(--color-accent);
}

.auth-box .form-row { margin-bottom: 16px; }
.auth-box label {
    display: block;
    font-family: var(--font-fa);
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--color-text);
    margin-bottom: 6px;
}
.auth-box input {
    width: 100%;
    padding: 13px 16px;
    background: #fff;
    border: 1px solid var(--glass-border);
    border-radius: 10px;
    color: var(--color-text) !important;
    font-family: var(--font-fa);
    font-size: 1rem;
    direction: rtl;
    transition: border-color 0.3s;
}
.auth-box input[type="tel"], .auth-box input[type="email"], .auth-box input[type="password"] {
    direction: ltr;
    text-align: right;
}
.auth-box input:focus {
    outline: none;
    border-color: var(--color-accent);
    box-shadow: 0 0 0 3px rgba(201,169,97,0.2);
}

.auth-btn {
    width: 100%;
    padding: 15px;
    background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
    color: #fff;
    border: none;
    border-radius: 12px;
    font-family: var(--font-fa);
    font-size: 1.05rem;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s;
    margin-top: 8px;
    letter-spacing: 1px;
}
.auth-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 30px rgba(201,169,97,0.4);
}

.auth-msg {
    padding: 14px 16px;
    border-radius: 10px;
    margin-bottom: 20px;
    text-align: center;
    font-family: var(--font-fa);
    font-size: 0.95rem;
    font-weight: 600;
}
.auth-msg.error { background: #fce4e4; color: #c0392b; border: 1px solid #e74c3c; }
.auth-msg.success { background: #e8f5e9; color: #2e7d32; border: 1px solid #4caf50; }

.auth-footer {
    text-align: center;
    margin-top: 20px;
    font-family: var(--font-fa);
    font-size: 0.9rem;
    color: var(--color-text);
}
.auth-footer a {
    color: var(--color-accent-dark);
    font-weight: 700;
    text-decoration: none;
}
.auth-footer a:hover { text-decoration: underline; }

.hint {
    font-size: 0.75rem;
    color: #888;
    margin-top: 4px;
    font-family: var(--font-fa);
}
</style>

<section class="auth-hero">
    <h1>Sign Up</h1>
    <p>ثبت‌نام در دکوتک — شروع پروژه رویایی شما</p>
</section>

<div class="auth-container">
    <div class="auth-box">
        <h2>🎉 ایجاد حساب کاربری</h2>

        <?php if ($error): ?>
            <div class="auth-msg error">❌ <?php echo $error; ?></div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="auth-msg success">✅ <?php echo $success; ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="form-row">
                <label>نام و نام خانوادگی *</label>
                <input type="text" name="full_name" required placeholder="مثلاً: علی رضایی" value="<?php echo esc_attr($_POST['full_name'] ?? ''); ?>">
            </div>

            <div class="form-row">
                <label>شماره موبایل *</label>
                <input type="tel" name="phone" required placeholder="09123456789" maxlength="11" value="<?php echo esc_attr($_POST['phone'] ?? ''); ?>">
                <div class="hint">این شماره برای ورود شما استفاده می‌شود.</div>
            </div>

            <div class="form-row">
                <label>ایمیل (اختیاری)</label>
                <input type="email" name="email" placeholder="you@example.com" value="<?php echo esc_attr($_POST['email'] ?? ''); ?>">
            </div>

            <div class="form-row">
                <label>رمز عبور *</label>
                <input type="password" name="password" required placeholder="حداقل ۶ کاراکتر">
            </div>

            <div class="form-row">
                <label>تکرار رمز عبور *</label>
                <input type="password" name="password2" required placeholder="رمز را دوباره وارد کنید">
            </div>

            <button type="submit" name="signup" class="auth-btn">🚀 ثبت‌نام</button>
        </form>

        <div class="auth-footer">
            حساب کاربری دارید؟
            <a href="<?php echo home_url('/login/'); ?>">وارد شوید</a>
        </div>
    </div>
</div>

<?php get_footer(); ?>