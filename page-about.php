<?php
/* Template Name: About */
get_header(); ?>

<style>
.inner-hero {
    padding: 200px 50px 100px;
    text-align: center;
    background: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.75)),
                url('https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=1920&q=80') center/cover;
}
.inner-hero h1 { font-size: 4rem; letter-spacing: 4px; margin-bottom: 15px; }
.inner-hero p { font-family: var(--font-fa); font-size: 1.1rem; opacity: 0.8; }

.about-story {
    max-width: 1100px; margin: 0 auto;
    padding: 100px 50px;
    text-align: center;
}
.about-story h2 { font-size: 3rem; margin-bottom: 30px; }
.about-story p {
    font-family: var(--font-fa); direction: rtl;
    font-size: 1.15rem; line-height: 2.2; opacity: 0.85;
    margin-bottom: 25px;
}

.stats {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 30px;
    max-width: 1200px;
    margin: 0 auto;
    padding: 60px 50px 100px;
}
.stat-box {
    padding: 40px 20px;
    text-align: center;
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 16px;
    transition: all 0.4s;
}
.stat-box:hover {
    transform: translateY(-8px);
    border-color: rgba(255,255,255,0.4);
    background: rgba(255,255,255,0.06);
}
.stat-box .num {
    font-family: var(--font-display);
    font-size: 3.5rem;
    color: #f5f1ea;
    margin-bottom: 10px;
}
.stat-box .lbl {
    font-family: var(--font-fa);
    font-size: 1rem;
    opacity: 0.75;
    letter-spacing: 1px;
}

.reno-section {
    padding: 100px 50px;
    background: #0f0f0f;
}
.reno-grid {
    max-width: 1300px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}
.reno-card {
    position: relative;
    height: 350px;
    overflow: hidden;
    border-radius: 14px;
    cursor: pointer;
}
.reno-card img { width: 100%; height: 100%; object-fit: cover; transition: transform 0.8s; }
.reno-card:hover img { transform: scale(1.1); }
.reno-card .overlay {
    position: absolute; inset: 0;
    background: linear-gradient(transparent, rgba(0,0,0,0.85));
    display: flex; align-items: flex-end;
    padding: 30px;
    font-family: var(--font-fa);
    direction: rtl;
    font-size: 1.4rem;
    font-weight: 500;
}

@media (max-width: 768px) {
    .stats { grid-template-columns: repeat(2, 1fr); }
    .reno-grid { grid-template-columns: 1fr; }
}
</style>

<section class="inner-hero">
    <h1>About Decoteck</h1>
    <p>همه چیز از ما — روایت دکوتک</p>
</section>

<section class="about-story">
    <h2>Our Story</h2>
    <p>دکوتک، برندی متولد از اشتیاق برای خلق فضاهای بی‌نظیر است. با بیش از یک دهه تجربه در طراحی و اجرای دکوراسیون داخلی، ما تخصص خود را در ساخت کابینت، کمد دیواری، کلوزت و بازسازی کامل فضاها به کار می‌گیریم.</p>
    <p>هر پروژه دکوتک، تلفیقی است از هنر، دقت مهندسی و متریال درجه یک از معتبرترین برندهای دنیا. ما به جزئیات می‌اندیشیم، به کیفیت متعهدیم و برای مشتریانمان چیزی فراتر از یک محصول می‌سازیم — یک تجربه لوکس.</p>
</section>

<section class="stats">
    <div class="stat-box"><div class="num">12+</div><div class="lbl">سال تجربه</div></div>
    <div class="stat-box"><div class="num">500+</div><div class="lbl">پروژه موفق</div></div>
    <div class="stat-box"><div class="num">10</div><div class="lbl">برند همکار</div></div>
    <div class="stat-box"><div class="num">98%</div><div class="lbl">رضایت مشتری</div></div>
</section>

<section class="reno-section">
    <div class="section-title">
        <span>خدمات بازسازی</span>
        <h2>Renovation Services</h2>
    </div>
    <div class="reno-grid">
        <div class="reno-card">
            <img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80" alt="">
            <div class="overlay">بازسازی کامل</div>
        </div>
        <div class="reno-card">
            <img src="https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=800&q=80" alt="">
            <div class="overlay">روف گاردن</div>
        </div>
        <div class="reno-card">
            <img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=800&q=80" alt="">
            <div class="overlay">طراحی دکوراسیون داخلی</div>
        </div>
    </div>
</section>

<?php get_footer(); ?>