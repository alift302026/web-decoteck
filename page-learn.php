<?php
/* Template Name: Learn */

// دسته‌بندی آموزش‌ها
$learn_videos = array(
    array(
        'title' => 'انتخاب متریال کابینت',
        'cat' => 'cabinet',
        'duration' => '12:34',
        'thumb' => 'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?auto=format&fit=crop&w=800&q=80',
        'video' => '', // لینک ویدیو یوتیوب یا mp4
        'desc' => 'راهنمای کامل انتخاب بهترین متریال برای کابینت آشپزخانه شما',
    ),
    array(
        'title' => 'اصول طراحی کمد دیواری',
        'cat' => 'design',
        'duration' => '08:15',
        'thumb' => 'https://images.unsplash.com/photo-1595428774223-ef52624120d2?auto=format&fit=crop&w=800&q=80',
        'video' => '',
        'desc' => 'نکات کلیدی طراحی کمد دیواری برای بهترین استفاده از فضا',
    ),
    array(
        'title' => 'نصب صحیح لولا گازور',
        'cat' => 'installation',
        'duration' => '05:42',
        'thumb' => 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80',
        'video' => '',
        'desc' => 'آموزش گام به گام نصب لولا گازور روی درب کابینت',
    ),
    array(
        'title' => 'تفاوت MDF و نئوپان',
        'cat' => 'cabinet',
        'duration' => '15:20',
        'thumb' => 'https://images.unsplash.com/photo-1611873101970-dfa544c23494?auto=format&fit=crop&w=800&q=80',
        'video' => '',
        'desc' => 'مقایسه کامل متریال MDF و نئوپان و کاربردهای هرکدام',
    ),
    array(
        'title' => 'طراحی سه بعدی کابینت',
        'cat' => 'design',
        'duration' => '22:10',
        'thumb' => 'https://images.unsplash.com/photo-1615529182904-14819c35db37?auto=format&fit=crop&w=800&q=80',
        'video' => '',
        'desc' => 'آموزش نرم افزارهای طراحی 3D برای کابینت‌ساز',
    ),
    array(
        'title' => 'نگهداری از کابینت هایگلاس',
        'cat' => 'maintenance',
        'duration' => '06:48',
        'thumb' => 'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=800&q=80',
        'video' => '',
        'desc' => 'روش صحیح نگهداری و تمیز کردن کابینت‌های هایگلاس',
    ),
);

get_header(); ?>

<style>
.learn-hero {
    padding: 130px 50px 60px;
    text-align: center;
    background: linear-gradient(rgba(255,253,247,0.75), rgba(255,250,235,0.85)),
                url('https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=1920&q=80') center/cover;
}
.learn-hero h1 { font-size: 3.5rem; color: var(--color-accent-dark); margin-bottom: 15px; }
.learn-hero p { font-family: var(--font-fa); font-size: 1.1rem; opacity: 0.85; direction: rtl; }

.learn-filters {
    display: flex;
    justify-content: center;
    gap: 12px;
    padding: 40px 20px 30px;
    flex-wrap: wrap;
}
.learn-filters button {
    padding: 10px 22px;
    background: rgba(255,253,247,0.9);
    border: 1px solid var(--glass-border);
    border-radius: 30px;
    font-family: var(--font-fa);
    font-size: 0.9rem;
    font-weight: 600;
    color: var(--color-text);
    cursor: pointer;
    transition: all 0.3s;
}
.learn-filters button:hover, .learn-filters button.active {
    background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
    color: #fff;
    border-color: var(--color-accent-dark);
    box-shadow: 0 6px 20px rgba(201,169,97,0.4);
}

.learn-grid {
    max-width: 1400px;
    margin: 0 auto;
    padding: 20px 40px 100px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 30px;
}
.learn-card {
    background: rgba(255,253,247,0.95);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(139,105,20,0.15);
    transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    cursor: pointer;
}
.learn-card.hide { display: none; }
.learn-card:hover {
    transform: translateY(-10px);
    border-color: var(--color-accent);
    box-shadow: 0 25px 55px rgba(201,169,97,0.4);
}

.learn-thumb {
    position: relative;
    height: 220px;
    overflow: hidden;
}
.learn-thumb img {
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.8s;
}
.learn-card:hover .learn-thumb img { transform: scale(1.1); }

.play-btn {
    position: absolute;
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    width: 70px; height: 70px;
    background: rgba(255,255,255,0.95);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-accent-dark);
    box-shadow: 0 10px 30px rgba(0,0,0,0.4);
    transition: all 0.4s;
}
.learn-card:hover .play-btn {
    background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
    color: #fff;
    transform: translate(-50%, -50%) scale(1.15);
}
.play-btn svg { width: 28px; height: 28px; margin-left: 4px; }

.duration-badge {
    position: absolute;
    bottom: 12px;
    right: 12px;
    background: rgba(0,0,0,0.75);
    color: #fff;
    padding: 4px 10px;
    border-radius: 12px;
    font-family: var(--font-en);
    font-size: 0.8rem;
    font-weight: 600;
    backdrop-filter: blur(6px);
}

.learn-info {
    padding: 22px 25px;
}
.learn-info h3 {
    font-family: var(--font-fa);
    font-size: 1.15rem;
    font-weight: 700;
    color: var(--color-text);
    margin-bottom: 10px;
    direction: rtl;
}
.learn-info p {
    font-family: var(--font-fa);
    font-size: 0.9rem;
    color: var(--color-accent-dark);
    line-height: 1.8;
    opacity: 0.85;
    direction: rtl;
}

/* Upload Section for Admin */
.upload-notice {
    max-width: 900px;
    margin: 60px auto 0;
    padding: 40px;
    background: linear-gradient(135deg, rgba(232,213,160,0.2), rgba(255,253,247,0.7));
    border: 2px dashed var(--color-accent);
    border-radius: 20px;
    text-align: center;
}
.upload-notice h3 {
    font-family: var(--font-fa);
    font-size: 1.4rem;
    color: var(--color-accent-dark);
    margin-bottom: 15px;
}
.upload-notice p {
    font-family: var(--font-fa);
    font-size: 1rem;
    color: var(--color-text);
    line-height: 2;
    direction: rtl;
    margin-bottom: 15px;
}
.upload-notice code {
    background: rgba(0,0,0,0.05);
    padding: 3px 8px;
    border-radius: 6px;
    font-family: monospace;
    color: var(--color-accent-dark);
}

@media (max-width: 700px) {
    .learn-hero h1 { font-size: 2.2rem; }
    .learn-grid { grid-template-columns: 1fr; padding: 20px 15px 60px; }
}
</style>

<section class="learn-hero">
    <h1>Learning Center</h1>
    <p>مرکز آموزش دکوتک — ویدیوها و مقالات تخصصی طراحی و ساخت کابینت</p>
</section>

<div class="learn-filters">
    <button class="active" data-filter="all">همه</button>
    <button data-filter="cabinet">کابینت</button>
    <button data-filter="design">طراحی</button>
    <button data-filter="installation">نصب</button>
    <button data-filter="maintenance">نگهداری</button>
</div>

<section class="learn-grid">
    <?php foreach ($learn_videos as $v): ?>
        <div class="learn-card" data-cat="<?php echo $v['cat']; ?>">
            <div class="learn-thumb">
                <img src="<?php echo $v['thumb']; ?>" alt="<?php echo $v['title']; ?>">
                <div class="play-btn">
                    <svg viewBox="0 0 24 24" fill="currentColor">
                        <path d="M8 5v14l11-7z"/>
                    </svg>
                </div>
                <span class="duration-badge"><?php echo $v['duration']; ?></span>
            </div>
            <div class="learn-info">
                <h3><?php echo $v['title']; ?></h3>
                <p><?php echo $v['desc']; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<?php if (current_user_can('manage_options')): ?>
<div class="upload-notice">
    <h3>📹 راهنمای آپلود ویدیو</h3>
    <p>برای اضافه کردن ویدیوی جدید، فایل <code>page-learn.php</code> را باز کن و در آرایه <code>$learn_videos</code> یک ردیف جدید اضافه کن.</p>
    <p>ویدیوهای شما به دلیل حجم بالا، بهتر است در آپارات یا یوتیوب آپلود شوند و لینک embed در فیلد <code>video</code> قرار گیرد.</p>
</div>
<?php endif; ?>

<script>
document.querySelectorAll('.learn-filters button').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.learn-filters button').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const filter = btn.dataset.filter;
        document.querySelectorAll('.learn-card').forEach(card => {
            if (filter === 'all' || card.dataset.cat === filter) card.classList.remove('hide');
            else card.classList.add('hide');
        });
    });
});
</script>

<?php get_footer(); ?>