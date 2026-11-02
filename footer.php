<?php
// Show reviews slider before footer
if (function_exists('decoteck_reviews_slider')) {
    decoteck_reviews_slider();
}
?>

<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-col footer-brand">
            <p>دکوتک — طراحی و اجرای دکوراسیون داخلی و کابینت</p>
            <div class="decoteck-social-links" aria-label="شبکه‌های اجتماعی دکوتک">
                <a href="https://www.instagram.com/cabinetdecoteck" target="_blank" rel="noopener noreferrer" aria-label="اینستاگرام دکوتک">اینستاگرام</a>
                <a href="https://t.me/decoteckcabinet" target="_blank" rel="noopener noreferrer" aria-label="کانال تلگرام دکوتک">تلگرام</a>
                <a href="https://wa.me/989195512979?text=%D8%B3%D9%84%D8%A7%D9%85%D8%8C%20%D8%A8%D8%B1%D8%A7%DB%8C%20%D8%B7%D8%B1%D8%A7%D8%AD%DB%8C%20%D9%88%20%D8%A7%D8%AC%D8%B1%D8%A7%DB%8C%20%DA%A9%D8%A7%D8%A8%DB%8C%D9%86%D8%AA%20%D9%88%20%D8%AF%DA%A9%D9%88%D8%B1%D8%A7%D8%B3%DB%8C%D9%88%D9%86%20%D8%AF%DA%A9%D9%88%D8%AA%DA%A9%20%D9%85%D8%B4%D8%A7%D9%88%D8%B1%D9%87%20%D9%85%DB%8C%E2%80%8C%D8%AE%D9%88%D8%A7%D8%B3%D8%AA%D9%85." target="_blank" rel="noopener noreferrer" aria-label="مشاوره واتساپ دکوتک">واتساپ</a>
            </div>
        </div>

        <div class="footer-col">
            <h4>لینک‌های سریع</h4>
            <ul>
                <li><a href="<?php echo home_url('/services/'); ?>">خدمات</a></li>
                <li><a href="<?php echo home_url('/gallery/'); ?>">گالری</a></li>
                <li><a href="<?php echo home_url('/calculator/'); ?>">محاسبه‌گر قیمت</a></li>
                <li><a href="<?php echo home_url('/order/'); ?>">ثبت سفارش</a></li>
                <li><a href="<?php echo home_url('/about/'); ?>">درباره ما</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>خدمات ما</h4>
            <ul>
                <li><a href="<?php echo home_url('/services/'); ?>">کابینت آشپزخانه</a></li>
                <li><a href="<?php echo home_url('/services/'); ?>">کمد دیواری</a></li>
                <li><a href="<?php echo home_url('/services/'); ?>">کلوزت</a></li>
                <li><a href="<?php echo home_url('/hardware/'); ?>">یراق آلات</a></li>
                <li><a href="<?php echo home_url('/mdf/'); ?>">متریال MDF</a></li>
            </ul>
        </div>

        <div class="footer-col">
            <h4>تماس با ما</h4>
            <ul class="footer-contact">
                <li>📞 <a href="tel:+989195512979">0919 551 2979</a></li>
                <li>📧 <a href="mailto:studio@decoteck.com">studio@decoteck.com</a></li>
                <li>🏢 تهران، خیابان ولیعصر</li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© <?php echo date('Y'); ?> DECOTECK — تمامی حقوق محفوظ است</p>
    </div>
</footer>

<details class="decoteck-contact-widget">
    <summary aria-label="تماس فوری با دکوتک">
        <span class="decoteck-widget-icon" aria-hidden="true">☏</span>
        <span class="decoteck-widget-label">تماس فوری</span>
    </summary>
    <div class="decoteck-contact-panel" dir="rtl">
        <strong>چطور راهنمایی‌تان کنیم؟</strong>
        <p>برای مشاوره طراحی و اجرای کابینت و دکوراسیون با ما در ارتباط باشید.</p>
        <a class="decoteck-contact-action whatsapp" href="https://wa.me/989195512979?text=%D8%B3%D9%84%D8%A7%D9%85%D8%8C%20%D8%A8%D8%B1%D8%A7%DB%8C%20%D8%B7%D8%B1%D8%A7%D8%AD%DB%8C%20%D9%88%20%D8%A7%D8%AC%D8%B1%D8%A7%DB%8C%20%DA%A9%D8%A7%D8%A8%DB%8C%D9%86%D8%AA%20%D9%88%20%D8%AF%DA%A9%D9%88%D8%B1%D8%A7%D8%B3%DB%8C%D9%88%D9%86%20%D8%AF%DA%A9%D9%88%D8%AA%DA%A9%20%D9%85%D8%B4%D8%A7%D9%88%D8%B1%D9%87%20%D9%85%DB%8C%E2%80%8C%D8%AE%D9%88%D8%A7%D8%B3%D8%AA%D9%85." target="_blank" rel="noopener noreferrer">گفت‌وگو در واتساپ</a>
        <a class="decoteck-contact-action phone" href="tel:+989195512979">تماس تلفنی · 0919 551 2979</a>
        <a class="decoteck-contact-action instagram" href="https://www.instagram.com/cabinetdecoteck" target="_blank" rel="noopener noreferrer">اینستاگرام</a>
        <a class="decoteck-contact-action telegram" href="https://t.me/decoteckcabinet" target="_blank" rel="noopener noreferrer">کانال تلگرام</a>
    </div>
</details>

<?php wp_footer(); ?>
</body>
</html>