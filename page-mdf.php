<?php
/* Template Name: MDF Materials */

$mdf_brands = array(
    'A' => array( // طلایی
        array('name'=>'AGT',       'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/AGT.jpg'),
        array('name'=>'فرامید',    'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/فرامید-.jpg'),
        array('name'=>'پویا',      'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/پویا.jpg'),
        array('name'=>'پاک چوب',   'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/پاکچوب.jpg'),
        array('name'=>'پانوتک',    'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/پانوتک.jpg'),
        array('name'=>'یلدیز',     'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/AGT.jpg'),
        array('name'=>'نقطه',      'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/نقطه.jpg'),
        array('name'=>'فومنات',    'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/فومنات.jpg'),
    ),
    'B' => array( // نقره‌ای
        array('name'=>'ایزوفام',   'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/ایزوفام.jpg'),
        array('name'=>'کینگ گلاس', 'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/کینگ-گلاس.jpeg'),
        array('name'=>'تیسان',     'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/تیسان.jpg'),
    ),
    'C' => array( // برنزی
        array('name'=>'پارس',      'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/پارس-نئوپان.jpg'),
        array('name'=>'آرین سینا', 'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/آرین-سینا.jpg'),
        array('name'=>'آریا',      'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/آرتا.jpg'),
        array('name'=>'آسا',       'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/آسا.jpg'),
    ),
);

get_header(); ?>

<style>
.mdf-hero {
    padding: 200px 50px 60px;
    text-align: center;
    background: linear-gradient(rgba(255,253,247,0.7), rgba(255,250,235,0.85)),
                url('https://images.unsplash.com/photo-1611873101970-dfa544c23494?auto=format&fit=crop&w=1920&q=80') center/cover;
}
.mdf-hero h1 { font-size: 3.5rem; color: var(--color-accent-dark); margin-bottom: 15px; }
.mdf-hero p { font-family: var(--font-fa); font-size: 1.1rem; opacity: 0.85; }

.grade-section {
    max-width: 1300px;
    margin: 0 auto;
    padding: 60px 40px 100px;
    display: flex;
    flex-direction: column;
    gap: 60px;
}

.grade-block {
    background: rgba(255,253,247,0.7);
    border-radius: 24px;
    padding: 40px 30px;
    border: 2px solid;
    box-shadow: 0 15px 50px rgba(0,0,0,0.08);
    position: relative;
    overflow: hidden;
}

.grade-block.grade-a {
    border-color: #d4af37;
    background: linear-gradient(135deg, rgba(255,248,220,0.8), rgba(255,253,247,0.9));
}
.grade-block.grade-b {
    border-color: #b8b8b8;
    background: linear-gradient(135deg, rgba(245,245,245,0.8), rgba(255,253,247,0.9));
}
.grade-block.grade-c {
    border-color: #cd7f32;
    background: linear-gradient(135deg, rgba(255,238,220,0.8), rgba(255,253,247,0.9));
}

.grade-header {
    display: flex;
    align-items: center;
    gap: 25px;
    margin-bottom: 35px;
    padding-bottom: 25px;
    border-bottom: 1px dashed rgba(0,0,0,0.15);
}

.grade-badge {
    width: 90px; height: 90px;
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-family: var(--font-display);
    font-size: 3rem; font-weight: 700;
    color: #fff;
    position: relative;
    box-shadow: 0 10px 30px rgba(0,0,0,0.25);
    flex-shrink: 0;
}
.grade-badge.a {
    background: linear-gradient(135deg, #ffd700, #d4af37, #b8860b);
    box-shadow: 0 10px 30px rgba(212,175,55,0.6), inset 0 2px 8px rgba(255,255,255,0.5);
    animation: goldShine 3s ease-in-out infinite;
}
.grade-badge.b {
    background: linear-gradient(135deg, #e8e8e8, #b8b8b8, #909090);
    box-shadow: 0 10px 30px rgba(180,180,180,0.5), inset 0 2px 8px rgba(255,255,255,0.4);
}
.grade-badge.c {
    background: linear-gradient(135deg, #e8a565, #cd7f32, #8b5a2b);
    box-shadow: 0 10px 30px rgba(205,127,50,0.5), inset 0 2px 8px rgba(255,255,255,0.3);
}

@keyframes goldShine {
    0%,100% { filter: brightness(1); }
    50%     { filter: brightness(1.25); }
}

.grade-info h2 {
    font-family: var(--font-display);
    font-size: 2.2rem;
    color: var(--color-text);
    margin-bottom: 5px;
}
.grade-info .grade-label {
    font-family: var(--font-fa);
    font-size: 1rem;
    color: var(--color-accent-dark);
    font-weight: 600;
}
.grade-a .grade-label { color: #b8860b; }
.grade-b .grade-label { color: #808080; }
.grade-c .grade-label { color: #8b5a2b; }

.brands-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(160px, 1fr));
    gap: 20px;
}

.brand-card {
    background: #fff;
    padding: 20px 15px;
    border-radius: 14px;
    text-align: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.08);
    transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    cursor: pointer;
    border: 2px solid transparent;
}
.grade-a .brand-card:hover { border-color: #d4af37; box-shadow: 0 15px 35px rgba(212,175,55,0.4); }
.grade-b .brand-card:hover { border-color: #b8b8b8; box-shadow: 0 15px 35px rgba(180,180,180,0.4); }
.grade-c .brand-card:hover { border-color: #cd7f32; box-shadow: 0 15px 35px rgba(205,127,50,0.4); }

.brand-card:hover {
    transform: translateY(-8px) scale(1.05);
}

.brand-card img {
    width: 80px;
    height: 80px;
    object-fit: contain;
    margin: 0 auto 12px;
    border-radius: 8px;
    padding: 4px;
    background: #fff;
}

.brand-card .name {
    font-family: var(--font-fa);
    font-size: 0.95rem;
    font-weight: 700;
    color: var(--color-text);
}

@media (max-width: 700px) {
    .mdf-hero h1 { font-size: 2.2rem; }
    .grade-header { flex-direction: column; text-align: center; gap: 15px; }
    .grade-badge { width: 70px; height: 70px; font-size: 2.2rem; }
    .grade-info h2 { font-size: 1.6rem; }
    .brand-card img { width: 60px; height: 60px; }
}
</style>

<section class="mdf-hero">
    <h1>MDF Materials</h1>
    <p>معرفی برندهای متریال MDF بر اساس درجه کیفیت — انتخاب هوشمند برای پروژه لوکس شما</p>
</section>

<section class="grade-section">

    <!-- GRADE A -->
    <div class="grade-block grade-a">
        <div class="grade-header">
            <div class="grade-badge a">A</div>
            <div class="grade-info">
                <h2>Grade A — Premium</h2>
                <div class="grade-label">درجه یک — طلایی — بالاترین کیفیت</div>
            </div>
        </div>
        <div class="brands-list">
            <?php foreach ($mdf_brands['A'] as $brand): ?>
                <div class="brand-card">
                    <img src="<?php echo $brand['logo']; ?>" alt="<?php echo $brand['name']; ?>">
                    <div class="name"><?php echo $brand['name']; ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- GRADE B -->
    <div class="grade-block grade-b">
        <div class="grade-header">
            <div class="grade-badge b">B</div>
            <div class="grade-info">
                <h2>Grade B — Standard</h2>
                <div class="grade-label">درجه دو — نقره‌ای — کیفیت استاندارد</div>
            </div>
        </div>
        <div class="brands-list">
            <?php foreach ($mdf_brands['B'] as $brand): ?>
                <div class="brand-card">
                    <img src="<?php echo $brand['logo']; ?>" alt="<?php echo $brand['name']; ?>">
                    <div class="name"><?php echo $brand['name']; ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- GRADE C -->
    <div class="grade-block grade-c">
        <div class="grade-header">
            <div class="grade-badge c">C</div>
            <div class="grade-info">
                <h2>Grade C — Economic</h2>
                <div class="grade-label">درجه سه — برنزی — مقرون به صرفه</div>
            </div>
        </div>
        <div class="brands-list">
            <?php foreach ($mdf_brands['C'] as $brand): ?>
                <div class="brand-card">
                    <img src="<?php echo $brand['logo']; ?>" alt="<?php echo $brand['name']; ?>">
                    <div class="name"><?php echo $brand['name']; ?></div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</section>

<?php get_footer(); ?>