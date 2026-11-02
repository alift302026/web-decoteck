<?php
// Show reviews slider before footer
if (function_exists('decoteck_reviews_slider')) {
    decoteck_reviews_slider();
}
?>

<footer class="site-footer">
    <div class="footer-container">
        <div class="footer-col footer-brand">
            
                    <p>دکوتک — طراحی و اجرای دکوراسیون داخلی لوکس با متریال درجه یک</p>
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
                <li>📞 <a href="tel:09195512979">0919 551 2979</a></li>
                <li>📞 <a href="tel:09197288439">0919 728 8439</a></li>
                <li>📧 <a href="mailto:studio@decoteck.com">studio@decoteck.com</a></li>
                <li>🏢 تهران، خیابان ولیعصر</li>
            </ul>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© <?php echo date('Y'); ?> DECOTECK — تمامی حقوق محفوظ است</p>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>