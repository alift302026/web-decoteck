<?php
/* Template Name: Login */

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
    global $wpdb;
    $t = $wpdb->prefix . 'decoteck_customers';

    $phone = sanitize_text_field($_POST['phone']);
    $password = $_POST['password'];

    if (empty($phone) || empty($password)) {
        $error = 'لطفاً شماره موبایل و رمز عبور را وارد کنید.';
    } else {
        $customer = $wpdb->get_row($wpdb->prepare("SELECT * FROM $t WHERE phone = %s", $phone));
        if (!$customer) {
            $error = 'کاربری با این شماره موبایل ثبت‌نام نکرده است.';
        } elseif (!password_verify($password, $customer->password)) {
            $error = 'رمز عبور اشتباه است.';
        } else {
            $_SESSION['decoteck_customer_id'] = $customer->id;
            echo '<script>window.location.href="' . home_url('/dashboard/') . '"</script>';
            exit;
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
                url('https://images.unsplash.com/photo-1615529182904-14819c35db37?auto=format&fit=crop&w=1920&q=80') center/cover;
}
.auth-hero h1 { font-size: 3rem; color: var(--color-accent-dark); margin-bottom: 12px; }
.auth-hero p { font-family: var(--font-fa); font-size: 1.05rem; opacity: 0.85; direction: rtl; }

.auth-container { max-width: 480px; margin: 40px auto 100px; padding: 0 20px; }

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
    direction: ltr;
    text-align: right;
    transition: border-color 0.3s;
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
.auth-btn:hover { transform: translateY(-3px); box-shadow: 0 12px 30px rgba(201,169,97,0.4); }

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

.auth-footer {
    text-align: center;
    margin-top: 20px;
    font-family: var(--font-fa);
    font-size: 0.9rem;
    color: var(--color-text);
}
.auth-footer a { color: var(--color-accent-dark); font-weight: 700; text-decoration: none; }
.auth-footer a:hover { text-decoration: underline; }
</style>

<section class="auth-hero">
    <h1>Login</h1>
    <p>ورود به حساب کاربری دکوتک</p>
</section>

<div class="auth-container">
    <div class="auth-box">
        <h2>🔐 ورود به حساب</h2>

        <?php if ($error): ?>
            <div class="auth-msg error">❌ <?php echo $error; ?></div>
        <?php endif; ?>

        <form method="post">
            <div class="form-row">
                <label>شماره موبایل</label>
                <input type="tel" name="phone" required placeholder="09123456789" maxlength="11">
            </div>

            <div class="form-row">
                <label>رمز عبور</label>
                <input type="password" name="password" required placeholder="رمز عبور خود را وارد کنید">
            </div>

            <button type="submit" name="login" class="auth-btn">🚪 ورود به حساب</button>
        </form>

        <div class="auth-footer">
            هنوز ثبت‌نام نکرده‌اید؟
            <a href="<?php echo home_url('/signup/'); ?>">ثبت‌نام کنید</a>
        </div>
    </div>
</div>

<?php get_footer(); ?>