<?php
/* Template Name: CNC Doors */

$cnc_models = array(
    array('name'=>'مدل کلاسیک 01', 'code'=>'CNC-C01', 'style'=>'Classic', 'img'=>'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80'),
    array('name'=>'مدل نئوکلاسیک 02', 'code'=>'CNC-N02', 'style'=>'Neoclassic', 'img'=>'https://images.unsplash.com/photo-1556909114-f6e7ad7d3136?auto=format&fit=crop&w=800&q=80'),
    array('name'=>'مدل مدرن 03', 'code'=>'CNC-M03', 'style'=>'Modern', 'img'=>'https://images.unsplash.com/photo-1556909172-54557c7e4fb7?auto=format&fit=crop&w=800&q=80'),
    array('name'=>'مدل حجاری 04', 'code'=>'CNC-E04', 'style'=>'Engraved', 'img'=>'https://images.unsplash.com/photo-1600566753086-00f18fe6ba68?auto=format&fit=crop&w=800&q=80'),
    array('name'=>'مدل لوکس 05', 'code'=>'CNC-L05', 'style'=>'Luxury', 'img'=>'https://images.unsplash.com/photo-1615529182904-14819c35db37?auto=format&fit=crop&w=800&q=80'),
    array('name'=>'مدل مینیمال 06', 'code'=>'CNC-Mi06', 'style'=>'Minimal', 'img'=>'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=800&q=80'),
    array('name'=>'مدل سلطنتی 07', 'code'=>'CNC-R07', 'style'=>'Royal', 'img'=>'https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?auto=format&fit=crop&w=800&q=80'),
    array('name'=>'مدل فرانسوی 08', 'code'=>'CNC-F08', 'style'=>'French', 'img'=>'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=800&q=80'),
    array('name'=>'مدل هندسی 09', 'code'=>'CNC-G09', 'style'=>'Geometric', 'img'=>'https://images.unsplash.com/photo-1600607687644-c7171b42498f?auto=format&fit=crop&w=800&q=80'),
    array('name'=>'مدل گلدار 10', 'code'=>'CNC-Fl10', 'style'=>'Floral', 'img'=>'https://images.unsplash.com/photo-1584622650111-993a426fbf0a?auto=format&fit=crop&w=800&q=80'),
    array('name'=>'مدل عربی 11', 'code'=>'CNC-A11', 'style'=>'Arabic', 'img'=>'https://images.unsplash.com/photo-1600489000022-c2086d79f9d4?auto=format&fit=crop&w=800&q=80'),
    array('name'=>'مدل ایرانی 12', 'code'=>'CNC-P12', 'style'=>'Persian', 'img'=>'https://images.unsplash.com/photo-1567016432779-094069958ea5?auto=format&fit=crop&w=800&q=80'),
);

get_header(); ?>

<style>
.cnc-hero {
    padding: 130px 50px 60px;
    text-align: center;
    background: linear-gradient(rgba(255,253,247,0.7), rgba(255,250,235,0.85)),
                url('https://images.unsplash.com/photo-1552321554-5fefe8c9ef14?auto=format&fit=crop&w=1920&q=80') center/cover;
}
.cnc-hero h1 { font-size: 3.5rem; color: var(--color-accent-dark); margin-bottom: 15px; }
.cnc-hero p { font-family: var(--font-fa); font-size: 1.1rem; opacity: 0.85; direction: rtl; }

.cnc-filters {
    display: flex;
    justify-content: center;
    gap: 12px;
    padding: 40px 20px 20px;
    flex-wrap: wrap;
}
.cnc-filters button {
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
.cnc-filters button:hover, .cnc-filters button.active {
    background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
    color: #fff;
    border-color: var(--color-accent-dark);
    box-shadow: 0 6px 20px rgba(201,169,97,0.4);
}

.cnc-grid {
    max-width: 1400px;
    margin: 0 auto;
    padding: 20px 40px 120px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 30px;
}
.cnc-card {
    background: rgba(255,253,247,0.9);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(139,105,20,0.15);
    transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
    cursor: pointer;
    position: relative;
}
.cnc-card.hide { display: none; }
.cnc-card:hover {
    transform: translateY(-12px);
    border-color: var(--color-accent);
    box-shadow: 0 25px 50px rgba(201,169,97,0.4);
}

.cnc-img-wrap {
    height: 280px;
    overflow: hidden;
    position: relative;
}
.cnc-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.8s;
}
.cnc-card:hover .cnc-img-wrap img { transform: scale(1.1); }

.cnc-code-badge {
    position: absolute;
    top: 15px;
    right: 15px;
    background: rgba(0,0,0,0.65);
    color: #fff;
    padding: 5px 12px;
    border-radius: 20px;
    font-family: var(--font-en);
    font-size: 0.75rem;
    font-weight: 600;
    letter-spacing: 1px;
    backdrop-filter: blur(6px);
}

.cnc-info {
    padding: 22px 25px;
}
.cnc-info h3 {
    font-family: var(--font-fa);
    font-size: 1.2rem;
    font-weight: 700;
    color: var(--color-text);
    margin-bottom: 8px;
    direction: rtl;
}
.cnc-style {
    display: inline-block;
    background: linear-gradient(135deg, rgba(232,213,160,0.3), rgba(201,169,97,0.2));
    color: var(--color-accent-dark);
    padding: 4px 12px;
    border-radius: 15px;
    font-family: var(--font-display);
    font-size: 0.75rem;
    letter-spacing: 1px;
    font-weight: 600;
}

.cnc-order-btn {
    display: block;
    margin-top: 15px;
    padding: 10px;
    text-align: center;
    background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
    color: #fff;
    border-radius: 10px;
    font-family: var(--font-fa);
    font-size: 0.9rem;
    font-weight: 600;
    text-decoration: none;
    transition: transform 0.3s;
}
.cnc-order-btn:hover { transform: scale(1.03); }

@media (max-width: 700px) {
    .cnc-hero h1 { font-size: 2.2rem; }
    .cnc-grid { grid-template-columns: 1fr; padding: 20px 15px 60px; }
}
</style>

<section class="cnc-hero">
    <h1>CNC Door Designs</h1>
    <p>مدل‌های اختصاصی درب کابینت و کمد با تکنولوژی CNC — بیش از ۱۰۰ طرح متنوع</p>
</section>

<div class="cnc-filters">
    <button class="active" data-filter="all">همه</button>
    <button data-filter="Classic">کلاسیک</button>
    <button data-filter="Neoclassic">نئوکلاسیک</button>
    <button data-filter="Modern">مدرن</button>
    <button data-filter="Luxury">لوکس</button>
    <button data-filter="Minimal">مینیمال</button>
    <button data-filter="Persian">ایرانی</button>
</div>

<section class="cnc-grid">
    <?php foreach ($cnc_models as $m): ?>
        <div class="cnc-card" data-style="<?php echo $m['style']; ?>">
            <div class="cnc-img-wrap">
                <img src="<?php echo $m['img']; ?>" alt="<?php echo $m['name']; ?>">
                <span class="cnc-code-badge"><?php echo $m['code']; ?></span>
            </div>
            <div class="cnc-info">
                <h3><?php echo $m['name']; ?></h3>
                <span class="cnc-style"><?php echo $m['style']; ?></span>
                <a href="<?php echo home_url('/order/'); ?>?model=<?php echo $m['code']; ?>" class="cnc-order-btn">
                    درخواست این مدل
                </a>
            </div>
        </div>
    <?php endforeach; ?>
</section>

<script>
document.querySelectorAll('.cnc-filters button').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.cnc-filters button').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const filter = btn.dataset.filter;
        document.querySelectorAll('.cnc-card').forEach(card => {
            if (filter === 'all' || card.dataset.style === filter) card.classList.remove('hide');
            else card.classList.add('hide');
        });
    });
});
</script>

<?php get_footer(); ?>