<?php
$logo_url = 'http://decoteck.local/wp-content/uploads/2026/08/decoteck1-1.png';
$url_services = home_url('/services/');
$url_gallery  = home_url('/gallery/');
$url_contact  = home_url('/contact/');
$url_about    = home_url('/about/');
$url_order    = home_url('/order/');
$url_learn    = home_url('/learn/');
$url_hardware = home_url('/hardware/');
$url_cnc      = home_url('/cnc-doors/');
$url_mdf      = home_url('/mdf/');
$url_calc     = home_url('/calculator/');
$url_login    = home_url('/login/');
$url_signup   = home_url('/signup/');
$url_dash     = home_url('/dashboard/');

$current_customer = function_exists('decoteck_get_current_customer') ? decoteck_get_current_customer() : null;

$persian_months = array('فروردین','اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان','آذر','دی','بهمن','اسفند');
function gregorian_to_jalali($gy, $gm, $gd) {
    $g_d_m = array(0,31,59,90,120,151,181,212,243,273,304,334);
    $gy2 = ($gm > 2) ? ($gy + 1) : $gy;
    $days = 355666 + (365 * $gy) + ((int)(($gy2 + 3) / 4)) - ((int)(($gy2 + 99) / 100)) + ((int)(($gy2 + 399) / 400)) + $gd + $g_d_m[$gm - 1];
    $jy = -1595 + (33 * ((int)($days / 12053)));
    $days %= 12053;
    $jy += 4 * ((int)($days / 1461));
    $days %= 1461;
    if ($days > 365) { $jy += (int)(($days - 1) / 365); $days = ($days - 1) % 365; }
    if ($days < 186) { $jm = 1 + (int)($days / 31); $jd = 1 + ($days % 31); }
    else { $jm = 7 + (int)(($days - 186) / 30); $jd = 1 + (($days - 186) % 30); }
    return array($jy, $jm, $jd);
}
$now = getdate();
list($jy, $jm, $jd) = gregorian_to_jalali($now['year'], $now['mon'], $now['mday']);
$persian_date = $jd . ' ' . $persian_months[$jm-1] . ' ' . $jy;
$gregorian_date = date('d M Y');
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<nav class="mega-nav">

    <div class="date-badge">
        <div class="row"><span class="lbl">شمسی</span><span class="val fa"><?php echo $persian_date; ?></span></div>
        <div class="row"><span class="lbl">میلادی</span><span class="val en"><?php echo $gregorian_date; ?></span></div>
    </div>

    <?php if ($current_customer): ?>
        <div class="mega-item user-badge" data-menu>
            <span class="title">👤 <?php echo esc_html(mb_substr($current_customer->full_name, 0, 15)); ?></span>
            <div class="mega-dropdown">
                <a class="mega-leaf" href="<?php echo $url_dash; ?>">🎨 داشبورد من</a>
                <a class="mega-leaf" href="<?php echo $url_dash; ?>?logout=1" onclick="return confirm('خارج شوید؟')">🚪 خروج</a>
            </div>
        </div>
    <?php else: ?>
        <div class="mega-item login-badge" data-menu>
            <span class="title">🔐 ورود / ثبت‌نام</span>
            <div class="mega-dropdown">
                <a class="mega-leaf" href="<?php echo $url_login; ?>">🚪 ورود</a>
                <a class="mega-leaf" href="<?php echo $url_signup; ?>">✍️ ثبت‌نام</a>
            </div>
        </div>
    <?php endif; ?>

    <div class="mega-item" data-menu>
        <span class="title">خدمات</span>
        <div class="mega-dropdown">
            <a class="mega-leaf" href="<?php echo $url_services; ?>">کابینت</a>
            <a class="mega-leaf" href="<?php echo $url_services; ?>">کمد دیواری</a>
            <a class="mega-leaf" href="<?php echo $url_services; ?>">کلوزت</a>
            <a class="mega-leaf" href="<?php echo $url_services; ?>">طراحی سه‌بعدی</a>
            <a class="mega-leaf" href="<?php echo $url_services; ?>">مشاوره</a>
        </div>
    </div>

    <div class="mega-item" data-menu>
        <span class="title">گالری</span>
        <div class="mega-dropdown">
            <a class="mega-leaf" href="<?php echo $url_gallery; ?>">کابینت هایگلاس</a>
            <a class="mega-leaf" href="<?php echo $url_gallery; ?>">کابینت MDF</a>
            <a class="mega-leaf" href="<?php echo $url_gallery; ?>">کابینت نئوکلاسیک</a>
            <a class="mega-leaf" href="<?php echo $url_gallery; ?>">کابینت ممبران</a>
            <a class="mega-leaf" href="<?php echo $url_gallery; ?>">کمد دیواری</a>
            <a class="mega-leaf" href="<?php echo $url_gallery; ?>">اتاق کودک</a>
            <a class="mega-leaf" href="<?php echo $url_gallery; ?>">تخت و سیسمونی</a>
            <a class="mega-leaf" href="<?php echo $url_gallery; ?>">جاکفشی</a>
            <a class="mega-leaf" href="<?php echo $url_gallery; ?>">کلوزت</a>
        </div>
    </div>

    <div class="mega-item">
        <a href="<?php echo $url_hardware; ?>" class="title" style="text-decoration:none;">یراق آلات</a>
    </div>

    <div class="mega-item">
        <a href="<?php echo $url_cnc; ?>" class="title" style="text-decoration:none;">مدل درب‌های CNC</a>
    </div>

    <div class="mega-item" data-menu>
        <span class="title">متریال MDF</span>
        <div class="mega-dropdown mdf-tree">
            <div class="mdf-grade-row">
                <a class="mdf-grade grade-a-btn" href="<?php echo $url_mdf; ?>#a"><span class="g-letter">A</span><span class="g-name">طلایی</span></a>
                <a class="mdf-grade grade-b-btn" href="<?php echo $url_mdf; ?>#b"><span class="g-letter">B</span><span class="g-name">نقره‌ای</span></a>
                <a class="mdf-grade grade-c-btn" href="<?php echo $url_mdf; ?>#c"><span class="g-letter">C</span><span class="g-name">برنزی</span></a>
            </div>
            <div class="mdf-brands-col">
                <div class="mdf-col grade-a-col">
                    <div class="col-title">A - Premium</div>
                    <a class="mega-leaf tight" href="<?php echo $url_mdf; ?>">AGT</a>
                    <a class="mega-leaf tight" href="<?php echo $url_mdf; ?>">فرامید</a>
                    <a class="mega-leaf tight" href="<?php echo $url_mdf; ?>">پویا</a>
                    <a class="mega-leaf tight" href="<?php echo $url_mdf; ?>">پاک چوب</a>
                    <a class="mega-leaf tight" href="<?php echo $url_mdf; ?>">پانوتک</a>
                    <a class="mega-leaf tight" href="<?php echo $url_mdf; ?>">یلدیز</a>
                    <a class="mega-leaf tight" href="<?php echo $url_mdf; ?>">نقطه</a>
                    <a class="mega-leaf tight" href="<?php echo $url_mdf; ?>">فومنات</a>
                </div>
                <div class="mdf-col grade-b-col">
                    <div class="col-title">B - Standard</div>
                    <a class="mega-leaf tight" href="<?php echo $url_mdf; ?>">ایزوفام</a>
                    <a class="mega-leaf tight" href="<?php echo $url_mdf; ?>">کینگ گلاس</a>
                    <a class="mega-leaf tight" href="<?php echo $url_mdf; ?>">تیسان</a>
                </div>
                <div class="mdf-col grade-c-col">
                    <div class="col-title">C - Economic</div>
                    <a class="mega-leaf tight" href="<?php echo $url_mdf; ?>">پارس</a>
                    <a class="mega-leaf tight" href="<?php echo $url_mdf; ?>">آرین سینا</a>
                    <a class="mega-leaf tight" href="<?php echo $url_mdf; ?>">آریا</a>
                    <a class="mega-leaf tight" href="<?php echo $url_mdf; ?>">آسا</a>
                </div>
            </div>
        </div>
    </div>

    <div class="mega-item" data-menu>
        <span class="title">محاسبه‌گر قیمت</span>
        <div class="mega-dropdown">
            <a class="mega-leaf" href="<?php echo $url_calc; ?>">قیمت کابینت</a>
            <a class="mega-leaf" href="<?php echo $url_calc; ?>">قیمت کمد دیواری</a>
        </div>
    </div>

    <div class="mega-item" data-menu>
        <span class="title">ثبت سفارش</span>
        <div class="mega-dropdown">
            <a class="mega-leaf" href="tel:09195512979">تماس فوری</a>
            <a class="mega-leaf" href="<?php echo $url_order; ?>">فرم سفارش آنلاین</a>
        </div>
    </div>

    <div class="mega-item" data-menu>
        <span class="title">آموزش</span>
        <div class="mega-dropdown">
            <a class="mega-leaf" href="<?php echo $url_learn; ?>">آموزش کابینت</a>
            <a class="mega-leaf" href="<?php echo $url_learn; ?>">آموزش طراحی</a>
            <a class="mega-leaf" href="<?php echo $url_learn; ?>">ویدیوهای پروژه</a>
        </div>
    </div>

    <div class="mega-item" data-menu>
        <span class="title">تماس با ما</span>
        <div class="mega-dropdown">
            <a class="mega-leaf" href="<?php echo $url_contact; ?>">صفحه تماس کامل</a>
            <a class="mega-leaf" href="tel:+989195512979">0919 551 2979</a>
            <a class="mega-leaf" href="https://wa.me/989195512979?text=%D8%B3%D9%84%D8%A7%D9%85%D8%8C%20%D8%A8%D8%B1%D8%A7%DB%8C%20%D8%B7%D8%B1%D8%A7%D8%AD%DB%8C%20%D9%88%20%D8%A7%D8%AC%D8%B1%D8%A7%DB%8C%20%DA%A9%D8%A7%D8%A8%DB%8C%D9%86%D8%AA%20%D9%88%20%D8%AF%DA%A9%D9%88%D8%B1%D8%A7%D8%B3%DB%8C%D9%88%D9%86%20%D8%AF%DA%A9%D9%88%D8%AA%DA%A9%20%D9%85%D8%B4%D8%A7%D9%88%D8%B1%D9%87%20%D9%85%DB%8C%E2%80%8C%D8%AE%D9%88%D8%A7%D8%B3%D8%AA%D9%85." target="_blank" rel="noopener noreferrer">مشاوره فوری واتساپ</a>
        </div>
    </div>

    <div class="mega-item" data-menu>
        <span class="title">همه چیز از ما</span>
        <div class="mega-dropdown">
            <a class="mega-leaf" href="<?php echo $url_about; ?>">درباره ما</a>
            <a class="mega-leaf" href="<?php echo $url_about; ?>">تیم دکوتک</a>
            <a class="mega-leaf" href="<?php echo $url_about; ?>">افتخارات</a>
        </div>
    </div>

    <div class="mega-item" data-menu>
        <span class="title">بازسازی</span>
        <div class="mega-dropdown">
            <a class="mega-leaf" href="<?php echo $url_about; ?>">بازسازی کامل</a>
            <a class="mega-leaf" href="<?php echo $url_about; ?>">روف گاردن</a>
            <a class="mega-leaf" href="<?php echo $url_about; ?>">طراحی دکوراسیون داخلی</a>
        </div>
    </div>

    <a href="<?php echo home_url(); ?>" class="logo-home-btn" title="صفحه اصلی">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 12L12 3l9 9"/>
            <path d="M5 10v10h14V10"/>
            <path d="M10 20v-6h4v6"/>
        </svg>
        <span class="home-label">خانه</span>
    </a>

</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const items = document.querySelectorAll('.mega-item[data-menu]');
    items.forEach(item => {
        let timer;
        item.addEventListener('mouseenter', () => {
            clearTimeout(timer);
            items.forEach(i => i.classList.remove('open'));
            item.classList.add('open');
        });
        item.addEventListener('mouseleave', () => {
            timer = setTimeout(() => item.classList.remove('open'), 400);
        });
    });
});
</script>