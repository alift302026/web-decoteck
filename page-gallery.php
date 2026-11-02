<?php
/* Template Name: Gallery */
get_header();

$gallery_items = array(
    array('cat'=>'hi-gloss','title'=>'کابینت هایگلاس','img'=>'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80'),
    array('cat'=>'mdf','title'=>'کابینت MDF','img'=>'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=800&q=80'),
    array('cat'=>'neoclassic','title'=>'کابینت نئوکلاسیک','img'=>'http://decoteck.local/wp-content/uploads/2026/08/610278d22d69d874da4b2356a94e0758.jpg'),
    array('cat'=>'membrane','title'=>'کابینت ممبران','img'=>'https://images.unsplash.com/photo-1615529182904-14819c35db37?auto=format&fit=crop&w=800&q=80'),
    array('cat'=>'wardrobe','title'=>'کمد دیواری','img'=>'https://images.unsplash.com/photo-1595428774223-ef52624120d2?auto=format&fit=crop&w=800&q=80'),
    array('cat'=>'kids','title'=>'اتاق کودک','img'=>'https://images.unsplash.com/photo-1616627052149-22c4f8a6f9e5?auto=format&fit=crop&w=800&q=80'),
    array('cat'=>'baby','title'=>'تخت و سیسمونی','img'=>'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=800&q=80'),
    array('cat'=>'shoe','title'=>'جاکفشی','img'=>'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?auto=format&fit=crop&w=800&q=80'),
    array('cat'=>'closet','title'=>'کلوزت','img'=>'https://images.unsplash.com/photo-1600607687939-ce8a6c25118c?auto=format&fit=crop&w=800&q=80'),
);
?>

<style>
.inner-hero {
    padding: 200px 50px 100px;
    text-align: center;
    background: linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.75)),
                url('https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=1920&q=80') center/cover;
}
.inner-hero h1 { font-size: 4rem; letter-spacing: 4px; margin-bottom: 15px; }
.inner-hero p { font-family: var(--font-fa); font-size: 1.1rem; opacity: 0.8; }

.gallery-filters {
    text-align: center; padding: 50px 20px 30px;
    display: flex; flex-wrap: wrap; justify-content: center; gap: 12px;
}
.gallery-filters button {
    background: transparent; color: #f5f1ea;
    border: 1px solid rgba(255,255,255,0.25);
    padding: 10px 22px; border-radius: 30px;
    font-family: var(--font-fa); font-size: 0.9rem;
    cursor: pointer; transition: all 0.3s;
}
.gallery-filters button:hover, .gallery-filters button.active {
    background: #f5f1ea; color: #0a0a0a;
}

.gallery-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 20px; padding: 20px 50px 100px;
    max-width: 1600px; margin: 0 auto;
}
.gal-item {
    position: relative; height: 350px; overflow: hidden;
    border-radius: 12px; cursor: pointer;
}
.gal-item img {
    width: 100%; height: 100%; object-fit: cover;
    transition: transform 0.8s;
}
.gal-item:hover img { transform: scale(1.1); }
.gal-item .cap {
    position: absolute; bottom: 0; left: 0; right: 0;
    padding: 25px 20px;
    background: linear-gradient(transparent, rgba(0,0,0,0.9));
    font-family: var(--font-fa); direction: rtl;
    font-size: 1.15rem; font-weight: 500;
}
.gal-item.hide { display: none; }
</style>

<section class="inner-hero">
    <h1>Gallery</h1>
    <p>گالری کامل نمونه‌کارهای دکوتک</p>
</section>

<div class="gallery-filters">
    <button class="active" data-filter="all">همه</button>
    <button data-filter="hi-gloss">هایگلاس</button>
    <button data-filter="mdf">MDF</button>
    <button data-filter="neoclassic">نئوکلاسیک</button>
    <button data-filter="membrane">ممبران</button>
    <button data-filter="wardrobe">کمد دیواری</button>
    <button data-filter="kids">اتاق کودک</button>
    <button data-filter="baby">سیسمونی</button>
    <button data-filter="shoe">جاکفشی</button>
    <button data-filter="closet">کلوزت</button>
</div>

<section class="gallery-grid">
    <?php foreach ($gallery_items as $item): ?>
        <div class="gal-item" data-cat="<?php echo $item['cat']; ?>">
            <img src="<?php echo $item['img']; ?>" alt="<?php echo $item['title']; ?>">
            <div class="cap"><?php echo $item['title']; ?></div>
        </div>
    <?php endforeach; ?>
</section>

<script>
document.querySelectorAll('.gallery-filters button').forEach(btn => {
    btn.addEventListener('click', () => {
        document.querySelectorAll('.gallery-filters button').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
        const filter = btn.dataset.filter;
        document.querySelectorAll('.gal-item').forEach(item => {
            if (filter === 'all' || item.dataset.cat === filter) item.classList.remove('hide');
            else item.classList.add('hide');
        });
    });
});
</script>

<?php get_footer(); ?>