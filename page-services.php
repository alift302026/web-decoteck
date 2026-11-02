<?php
/* Template Name: Services */
get_header(); ?>

<style>
.inner-hero {
    padding: 200px 50px 100px;
    text-align: center;
    background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.7)),
                url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1920&q=80') center/cover;
}
.inner-hero h1 { font-size: 4rem; letter-spacing: 4px; margin-bottom: 15px; }
.inner-hero p { font-family: var(--font-fa); font-size: 1.1rem; opacity: 0.8; }

.services-full {
    padding: 100px 50px;
    max-width: 1300px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 40px;
}
.srv-box {
    padding: 50px 30px;
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 16px;
    text-align: center;
    transition: all 0.5s;
}
.srv-box:hover {
    transform: translateY(-10px);
    border-color: rgba(255,255,255,0.4);
    background: rgba(255,255,255,0.06);
}
.srv-box .icon { width: 60px; height: 60px; margin: 0 auto 25px; color: #f5f1ea; }
.srv-box h3 { font-size: 1.8rem; margin-bottom: 15px; }
.srv-box p { font-family: var(--font-fa); direction: rtl; font-size: 1rem; line-height: 2; opacity: 0.8; }
</style>

<section class="inner-hero">
    <h1>Our Services</h1>
    <p>خدمات تخصصی طراحی و اجرای دکوراسیون داخلی</p>
</section>

<section class="services-full">

    <div class="srv-box">
        <svg class="icon" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.5">
            <rect x="6" y="10" width="52" height="20"/><rect x="6" y="34" width="52" height="24"/>
            <line x1="32" y1="10" x2="32" y2="30"/><line x1="6" y1="30" x2="58" y2="30"/>
        </svg>
        <h3>Cabinets</h3>
        <p>طراحی و ساخت کابینت آشپزخانه در سبک‌های نئوکلاسیک، مدرن، هایگلاس و ممبران با متریال درجه یک.</p>
    </div>

    <div class="srv-box">
        <svg class="icon" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.5">
            <rect x="10" y="6" width="44" height="52"/><line x1="32" y1="6" x2="32" y2="58"/>
            <circle cx="28" cy="32" r="1.2" fill="currentColor"/><circle cx="36" cy="32" r="1.2" fill="currentColor"/>
        </svg>
        <h3>Wardrobe</h3>
        <p>کمد دیواری با درب‌های ریلی، لولایی و آکاردئونی، طراحی داخلی بهینه بر اساس نیاز شما.</p>
    </div>

    <div class="srv-box">
        <svg class="icon" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.5">
            <path d="M8 58 L8 20 L32 8 L56 20 L56 58 Z"/><rect x="24" y="34" width="16" height="24"/>
        </svg>
        <h3>Closet</h3>
        <p>اتاق لباس اختصاصی (کلوزت) با متریال لوکس، نورپردازی حرفه‌ای و طبقه‌بندی هوشمند.</p>
    </div>

    <div class="srv-box">
        <svg class="icon" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.5">
            <rect x="8" y="12" width="48" height="34"/><path d="M8 46 L32 58 L56 46"/>
        </svg>
        <h3>3D Design</h3>
        <p>طراحی سه‌بعدی فتوریالیستیک از فضای شما قبل از اجرا، برای تصمیم‌گیری دقیق.</p>
    </div>

    <div class="srv-box">
        <svg class="icon" viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.5">
            <circle cx="32" cy="32" r="26"/><path d="M32 16 L32 32 L42 42"/>
        </svg>
        <h3>Consulting</h3>
        <p>مشاوره تخصصی رایگان توسط تیم طراحان دکوتک برای بهترین چیدمان و انتخاب متریال.</p>
    </div>

</section>

<?php get_footer(); ?>