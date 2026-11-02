<?php
/* Template Name: Contact */

// پردازش فرم تماس
$success = false;
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['contact_phone'])) {
    global $wpdb;
    $table = $wpdb->prefix . 'decoteck_orders';

    $wpdb->query("CREATE TABLE IF NOT EXISTS $table (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(120),
        phone VARCHAR(30),
        service VARCHAR(120),
        note TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    )");

    $wpdb->insert($table, array(
        'name'    => sanitize_text_field($_POST['contact_name']),
        'phone'   => sanitize_text_field($_POST['contact_phone']),
        'service' => 'Contact Form',
        'note'    => sanitize_textarea_field($_POST['contact_message']),
    ));
    $success = true;
}

get_header(); ?>

<style>
.contact-hero {
    padding: 130px 50px 60px;
    text-align: center;
    background: linear-gradient(rgba(255,253,247,0.75), rgba(255,250,235,0.85)),
                url('https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=1920&q=80') center/cover;
}
.contact-hero h1 { font-size: 3.5rem; color: var(--color-accent-dark); margin-bottom: 15px; }
.contact-hero p { font-family: var(--font-fa); font-size: 1.1rem; opacity: 0.85; direction: rtl; }

.contact-container {
    max-width: 1400px;
    margin: 0 auto;
    padding: 60px 40px;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
}

/* INFO SIDE */
.contact-info {
    background: rgba(255,253,247,0.95);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 15px 40px rgba(139,105,20,0.15);
}
.info-title {
    font-family: var(--font-fa);
    font-size: 1.6rem;
    color: var(--color-accent-dark);
    margin-bottom: 10px;
    font-weight: 700;
    direction: rtl;
    text-align: right;
}
.info-sub {
    font-family: var(--font-fa);
    font-size: 0.95rem;
    color: var(--color-text);
    opacity: 0.75;
    direction: rtl;
    text-align: right;
    margin-bottom: 30px;
    line-height: 2;
}

.info-block {
    display: flex;
    align-items: flex-start;
    gap: 15px;
    padding: 18px;
    background: rgba(255,253,247,0.7);
    border: 1px solid rgba(201,169,97,0.25);
    border-radius: 14px;
    margin-bottom: 15px;
    direction: rtl;
    transition: all 0.3s;
}
.info-block:hover {
    border-color: var(--color-accent);
    transform: translateX(-5px);
    box-shadow: 0 8px 20px rgba(201,169,97,0.2);
}

.info-icon {
    width: 42px; height: 42px;
    background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    flex-shrink: 0;
}
.info-icon svg { width: 22px; height: 22px; }

.info-text .lbl {
    font-family: var(--font-fa);
    font-size: 0.8rem;
    color: var(--color-accent-dark);
    font-weight: 700;
    margin-bottom: 4px;
}
.info-text .val {
    font-family: var(--font-fa);
    font-size: 0.95rem;
    color: var(--color-text);
    line-height: 1.8;
    font-weight: 500;
}
.info-text .val a {
    color: var(--color-text);
    text-decoration: none;
    transition: color 0.3s;
}
.info-text .val a:hover { color: var(--color-accent-dark); }
.info-text .val.ltr { direction: ltr; text-align: left; }

/* SOCIAL iOS */
.socials-title {
    font-family: var(--font-fa);
    font-size: 1rem;
    color: var(--color-accent-dark);
    font-weight: 700;
    margin: 25px 0 15px;
    text-align: right;
    direction: rtl;
}
.socials-ios {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    justify-content: flex-end;
    direction: rtl;
}
.social-btn {
    width: 55px; height: 55px;
    border-radius: 16px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    text-decoration: none;
    box-shadow: 0 6px 18px rgba(0,0,0,0.25),
                inset 0 1px 0 rgba(255,255,255,0.3);
    transition: transform 0.3s;
    position: relative;
}
.social-btn:hover { transform: translateY(-5px) scale(1.1); }
.social-btn svg { width: 26px; height: 26px; }
.ios-instagram { background: linear-gradient(135deg,#f09433,#e6683c,#dc2743,#cc2366,#bc1888); }
.ios-whatsapp  { background: linear-gradient(135deg,#25D366,#128C7E); }
.ios-telegram  { background: linear-gradient(135deg,#0088cc,#00aced); }
.ios-bale      { background: linear-gradient(135deg,#4caf50,#2e7d32); }
.ios-eitaa     { background: linear-gradient(135deg,#ff9800,#f57c00); }

/* FORM SIDE */
.contact-form-wrap {
    background: rgba(255,253,247,0.95);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    padding: 40px;
    box-shadow: 0 15px 40px rgba(139,105,20,0.15);
}

.contact-form h3 {
    font-family: var(--font-fa);
    font-size: 1.5rem;
    color: var(--color-accent-dark);
    margin-bottom: 25px;
    text-align: right;
    direction: rtl;
    border-bottom: 2px dashed var(--color-accent);
    padding-bottom: 12px;
}
.contact-form input,
.contact-form textarea {
    width: 100%;
    padding: 14px 18px;
    background: #fff;
    border: 1px solid var(--glass-border);
    border-radius: 12px;
    color: var(--color-text);
    font-family: var(--font-fa);
    font-size: 1rem;
    margin-bottom: 16px;
    direction: rtl;
    transition: border-color 0.3s;
}
.contact-form input:focus,
.contact-form textarea:focus {
    outline: none;
    border-color: var(--color-accent);
    box-shadow: 0 0 0 3px rgba(201,169,97,0.15);
}
.contact-form textarea { min-height: 120px; resize: vertical; }
.contact-form button {
    width: 100%;
    padding: 16px;
    background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
    color: #fff;
    border: none;
    border-radius: 12px;
    font-family: var(--font-fa);
    font-size: 1.1rem;
    font-weight: 700;
    letter-spacing: 1px;
    cursor: pointer;
    transition: all 0.3s;
}
.contact-form button:hover {
    transform: translateY(-3px);
    box-shadow: 0 15px 30px rgba(201,169,97,0.4);
}
.success-msg {
    background: rgba(76,175,80,0.15);
    border: 2px solid #4caf50;
    color: #2e7d32;
    padding: 18px;
    border-radius: 12px;
    text-align: center;
    font-family: var(--font-fa);
    font-size: 1rem;
    font-weight: 600;
    margin-bottom: 25px;
    direction: rtl;
}

/* MAP */
.map-wrap {
    max-width: 1400px;
    margin: 40px auto 100px;
    padding: 0 40px;
}
.map-title {
    text-align: center;
    margin-bottom: 30px;
}
.map-title h2 {
    font-family: var(--font-display);
    font-size: 2.5rem;
    color: var(--color-accent-dark);
    margin-bottom: 8px;
}
.map-title p {
    font-family: var(--font-fa);
    color: var(--color-text);
    opacity: 0.8;
}
.map-container {
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 50px rgba(139,105,20,0.25);
    border: 3px solid var(--color-accent);
    height: 450px;
}
.map-container iframe {
    width: 100%;
    height: 100%;
    border: 0;
    filter: sepia(15%) saturate(1.1);
}

@media (max-width: 900px) {
    .contact-container { grid-template-columns: 1fr; padding: 40px 20px; }
    .contact-hero h1 { font-size: 2.2rem; }
    .map-container { height: 350px; }
    .map-wrap { padding: 0 15px; }
}
</style>

<section class="contact-hero">
    <h1>Get in Touch</h1>
    <p>ارتباط با تیم دکوتک — همیشه در دسترس شما</p>
</section>

<section class="contact-container">

    <!-- INFO SIDE -->
    <div class="contact-info">
        <div class="info-title">📞 راه‌های ارتباطی</div>
        <div class="info-sub">تیم پشتیبانی دکوتک آماده پاسخگویی به شماست. با ما در ارتباط باشید.</div>

        <!-- تلفن -->
        <div class="info-block">
            <div class="info-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                    <path d="M22 16.9v3a2 2 0 01-2.2 2 19.8 19.8 0 01-8.6-3.1 19.5 19.5 0 01-6-6 19.8 19.8 0 01-3.1-8.7A2 2 0 014.1 2h3a2 2 0 012 1.7c.1.9.3 1.8.6 2.6a2 2 0 01-.5 2.1L8 9.6a16 16 0 006 6l1.2-1.2a2 2 0 012.1-.5c.8.3 1.7.5 2.6.6a2 2 0 011.7 2z"/>
                </svg>
            </div>
            <div class="info-text">
                <div class="lbl">شماره‌های تماس</div>
                <div class="val ltr">
                    <a href="tel:09195512979">0919 551 2979</a><br>
                    <a href="tel:09197288439">0919 728 8439</a>
                </div>
            </div>
        </div>

        <!-- ایمیل -->
        <div class="info-block">
            <div class="info-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                    <path d="M4 4h16c1 0 2 1 2 2v12c0 1-1 2-2 2H4c-1 0-2-1-2-2V6c0-1 1-2 2-2z"/>
                    <path d="M22 6l-10 7L2 6"/>
                </svg>
            </div>
            <div class="info-text">
                <div class="lbl">ایمیل</div>
                <div class="val ltr"><a href="mailto:studio@decoteck.com">studio@decoteck.com</a></div>
            </div>
        </div>

        <!-- آدرس دفتر -->
        <div class="info-block">
            <div class="info-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                    <path d="M21 10c0 7-9 13-9 13S3 17 3 10a9 9 0 0118 0z"/>
                    <circle cx="12" cy="10" r="3"/>
                </svg>
            </div>
            <div class="info-text">
                <div class="lbl">دفتر مرکزی</div>
                <div class="val">تهران، خیابان ولیعصر، بالاتر از میدان ونک، پلاک ۱۲۳۴، طبقه ۳</div>
            </div>
        </div>

        <!-- کارخانه -->
        <div class="info-block">
            <div class="info-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                    <path d="M2 20V10l8-5v15M2 20h20V10l-8-5v15"/>
                    <rect x="6" y="14" width="3" height="4"/>
                    <rect x="15" y="14" width="3" height="4"/>
                </svg>
            </div>
            <div class="info-text">
                <div class="lbl">کارخانه</div>
                <div class="val">تهران، جاده مخصوص کرج، کیلومتر ۱۵، شهرک صنعتی، بلوک ۷</div>
            </div>
        </div>

        <!-- ساعت کاری -->
        <div class="info-block">
            <div class="info-icon">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round">
                    <circle cx="12" cy="12" r="10"/>
                    <path d="M12 6v6l4 2"/>
                </svg>
            </div>
            <div class="info-text">
                <div class="lbl">ساعت کاری</div>
                <div class="val">
                    شنبه تا چهارشنبه: ۹:۰۰ الی ۱۸:۰۰<br>
                    پنجشنبه: ۹:۰۰ الی ۱۴:۰۰<br>
                    جمعه: تعطیل
                </div>
            </div>
        </div>

        <!-- شبکه‌های اجتماعی iOS -->
        <div class="socials-title">🌐 در شبکه‌های اجتماعی</div>
        <div class="socials-ios">
            <a href="#" class="social-btn ios-instagram" title="Instagram">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.2c3.2 0 3.6 0 4.8.1 1.2.1 1.8.2 2.2.4.6.2 1 .5 1.4.9.4.4.7.9.9 1.4.2.4.3 1 .4 2.2.1 1.2.1 1.6.1 4.8s0 3.6-.1 4.8c-.1 1.2-.2 1.8-.4 2.2-.2.6-.5 1-.9 1.4-.4.4-.9.7-1.4.9-.4.2-1 .3-2.2.4-1.2.1-1.6.1-4.8.1s-3.6 0-4.8-.1c-1.2-.1-1.8-.2-2.2-.4-.6-.2-1-.5-1.4-.9-.4-.4-.7-.9-.9-1.4-.2-.4-.3-1-.4-2.2C2.2 15.6 2.2 15.2 2.2 12s0-3.6.1-4.8c.1-1.2.2-1.8.4-2.2.2-.6.5-1 .9-1.4.4-.4.9-.7 1.4-.9.4-.2 1-.3 2.2-.4C8.4 2.2 8.8 2.2 12 2.2z"/><circle cx="12" cy="12" r="4.5"/><circle cx="18.4" cy="5.6" r="1.4"/></svg>
            </a>
            <a href="#" class="social-btn ios-whatsapp" title="WhatsApp">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M17.5 14.4c-.3-.1-1.7-.9-2-1-.3-.1-.5-.1-.7.1-.2.3-.7 1-.9 1.1-.2.2-.3.2-.6.1-.3-.1-1.2-.4-2.3-1.4-.9-.8-1.4-1.7-1.6-2-.2-.3 0-.5.1-.6.1-.1.3-.3.4-.5.1-.2.2-.3.2-.5.1-.2 0-.4 0-.5s-.7-1.7-1-2.3c-.3-.6-.5-.5-.7-.5h-.6c-.2 0-.5.1-.8.4-.3.3-1 1-1 2.4 0 1.4 1 2.8 1.2 3 .1.2 2 3.1 4.9 4.3.7.3 1.2.5 1.6.6.7.2 1.3.2 1.8.1.6-.1 1.7-.7 2-1.4.2-.7.2-1.2.2-1.4-.1-.1-.3-.2-.6-.3zM12 0C5.4 0 0 5.4 0 12c0 2.1.5 4.1 1.5 5.8L0 24l6.3-1.6c1.7.9 3.7 1.5 5.7 1.5 6.6 0 12-5.4 12-12S18.6 0 12 0z"/></svg>
            </a>
            <a href="#" class="social-btn ios-telegram" title="Telegram">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 0C5.4 0 0 5.4 0 12s5.4 12 12 12 12-5.4 12-12S18.6 0 12 0zm5.6 8.2l-1.9 9c-.1.7-.5.8-1.1.5l-3-2.2-1.5 1.4c-.2.2-.3.3-.6.3l.2-3 5.4-4.9c.2-.2 0-.3-.3-.1L8.1 13l-2.9-.9c-.6-.2-.6-.6.1-.9l11.5-4.4c.5-.2 1 .1.8.9z"/></svg>
            </a>
            <a href="#" class="social-btn ios-bale" title="Bale">
                <svg viewBox="0 0 24 24" fill="currentColor"><path d="M12 2 L2 22 L12 18 L22 22 Z"/></svg>
            </a>
            <a href="#" class="social-btn ios-eitaa" title="Eitaa">
                <svg viewBox="0 0 24 24" fill="currentColor"><circle cx="12" cy="12" r="10"/></svg>
            </a>
        </div>
    </div>

    <!-- FORM SIDE -->
    <div class="contact-form-wrap">
        <?php if ($success): ?>
            <div class="success-msg">✓ پیام شما با موفقیت ارسال شد. کارشناسان ما به‌زودی با شما تماس می‌گیرند.</div>
        <?php endif; ?>

        <form class="contact-form" method="post">
            <h3>📩 ارسال پیام سریع</h3>
            <input type="text" name="contact_name" placeholder="نام و نام خانوادگی">
            <input type="tel" name="contact_phone" placeholder="شماره تماس *" required>
            <textarea name="contact_message" placeholder="پیام شما..." required></textarea>
            <button type="submit">ارسال پیام</button>
        </form>
    </div>

</section>

<!-- MAP -->
<div class="map-wrap">
    <div class="map-title">
        <h2>Find Us on Map</h2>
        <p>موقعیت دفتر مرکزی دکوتک</p>
    </div>
    <div class="map-container">
        <iframe
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3239.6519086444547!2d51.40556!3d35.7580!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzXCsDQ1JzI4LjgiTiA1McKwMjQnMjAuMCJF!5e0!3m2!1sen!2s!4v1234567890"
            allowfullscreen=""
            loading="lazy"
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>

<?php get_footer(); ?>