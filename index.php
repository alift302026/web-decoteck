<?php
// ============================================
// TILE IMAGES CONFIG
// ============================================
$cabinet_tiles = array(
    'http://decoteck.local/wp-content/uploads/2026/08/610278d22d69d874da4b2356a94e0758.jpg',
    'http://decoteck.local/wp-content/uploads/2026/08/610278d22d69d874da4b2356a94e0758.jpg',
    'http://decoteck.local/wp-content/uploads/2026/08/610278d22d69d874da4b2356a94e0758.jpg',
);
$wardrobe_tiles = array(
    'https://images.unsplash.com/photo-1595428774223-ef52624120d2?auto=format&fit=crop&w=800&q=80',
    'https://images.unsplash.com/photo-1616627052149-22c4f8a6f9e5?auto=format&fit=crop&w=800&q=80',
    'https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=800&q=80',
);
$factory_tiles = array(
    'https://images.unsplash.com/photo-1565793298595-6a879b1d9492?auto=format&fit=crop&w=800&q=80',
    'https://images.unsplash.com/photo-1581094794329-c8112a89af12?auto=format&fit=crop&w=800&q=80',
    'https://images.unsplash.com/photo-1504328345606-18bbc8c9d7d1?auto=format&fit=crop&w=800&q=80',
);
$clients_tiles = array(
    'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=800&q=80',
    'https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=800&q=80',
    'https://images.unsplash.com/photo-1615529182904-14819c35db37?auto=format&fit=crop&w=800&q=80',
);

// ============================================
// BRANDS with LOGOS
// ============================================
$brands = array(
    array('name'=>'AGT',        'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/AGT.jpg'),
    array('name'=>'فرامید',     'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/فرامید-.jpg'),
    array('name'=>'ایزوفام',    'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/ایزوفام.jpg'),
    array('name'=>'پویا',       'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/پویا.jpg'),
    array('name'=>'پارس',       'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/پارس-نئوپان.jpg'),
    array('name'=>'پاک چوب',    'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/پاکچوب.jpg'),
    array('name'=>'آرین سینا',  'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/آرین-سینا.jpg'),
    array('name'=>'آرتا',       'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/آرتا.jpg'),
    array('name'=>'پانوتک',     'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/پانوتک.jpg'),
    array('name'=>'آسا',        'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/آسا.jpg'),
    array('name'=>'نقطه',       'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/نقطه.jpg'),
    array('name'=>'نوین چوب',   'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/نوین-چوب.jpg'),
    array('name'=>'ایشیک',      'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/ایشیک.jpg'),
    array('name'=>'کینگ گلاس',  'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/کینگ-گلاس.jpeg'),
    array('name'=>'فومنات',     'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/فومنات.jpg'),
    array('name'=>'دکو پنل',    'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/دکوپنل.jpg'),
    array('name'=>'تیسان',      'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/تیسان.jpg'),
    array('name'=>'گلستان',     'logo'=>'http://decoteck.local/wp-content/uploads/2026/08/بازار-چوب-22.jpg'),
);
?>
<?php get_header(); ?>

<!-- HERO -->
<section class="hero">
        <a href="<?php echo home_url(); ?>" class="floating-logo" title="صفحه اصلی">
        <img src="http://decoteck.local/wp-content/uploads/2026/08/decoteck1-1.png" alt="DECOTECK">
        <span class="wave"></span>
    </a>
    <nav class="nav-menu center-cards">

        <a href="#projects" class="glass-card" data-tilt>
            <span class="card-lines"></span>
            <span class="page-flip p1" style="background-image:url('<?php echo $cabinet_tiles[0]; ?>');"></span>
            <span class="page-flip p2" style="background-image:url('<?php echo $cabinet_tiles[1]; ?>');"></span>
            <span class="page-flip p3" style="background-image:url('<?php echo $cabinet_tiles[2]; ?>');"></span>
            <span class="card-icon">
                <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                    <rect x="6" y="10" width="52" height="20" rx="1"/>
                    <rect x="6" y="34" width="52" height="24" rx="1"/>
                    <line x1="32" y1="10" x2="32" y2="30"/>
                    <line x1="20" y1="34" x2="20" y2="58"/>
                    <line x1="44" y1="34" x2="44" y2="58"/>
                    <circle cx="29" cy="20" r="1" fill="currentColor"/>
                    <circle cx="35" cy="20" r="1" fill="currentColor"/>
                    <line x1="17" y1="44" x2="17" y2="48"/>
                    <line x1="23" y1="44" x2="23" y2="48"/>
                    <line x1="41" y1="44" x2="41" y2="48"/>
                    <line x1="47" y1="44" x2="47" y2="48"/>
                    <line x1="6" y1="30" x2="58" y2="30"/>
                </svg>
            </span>
            <span class="card-label">Cabinets</span>
            <span class="card-sub">کابینت آشپزخانه</span>
        </a>

        <a href="#services" class="glass-card" data-tilt>
            <span class="card-lines"></span>
            <span class="page-flip p1" style="background-image:url('<?php echo $wardrobe_tiles[0]; ?>');"></span>
            <span class="page-flip p2" style="background-image:url('<?php echo $wardrobe_tiles[1]; ?>');"></span>
            <span class="page-flip p3" style="background-image:url('<?php echo $wardrobe_tiles[2]; ?>');"></span>
            <span class="card-icon">
                <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                    <rect x="10" y="6" width="44" height="52" rx="1"/>
                    <line x1="32" y1="6" x2="32" y2="58"/>
                    <circle cx="28" cy="32" r="1.2" fill="currentColor"/>
                    <circle cx="36" cy="32" r="1.2" fill="currentColor"/>
                    <line x1="10" y1="22" x2="54" y2="22"/>
                </svg>
            </span>
            <span class="card-label">Wardrobe</span>
            <span class="card-sub">کمد دیواری</span>
        </a>

        <a href="#about" class="glass-card" data-tilt>
            <span class="card-lines"></span>
            <span class="page-flip p1" style="background-image:url('<?php echo $factory_tiles[0]; ?>');"></span>
            <span class="page-flip p2" style="background-image:url('<?php echo $factory_tiles[1]; ?>');"></span>
            <span class="page-flip p3" style="background-image:url('<?php echo $factory_tiles[2]; ?>');"></span>
            <span class="card-icon">
                <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                    <path d="M4 56 L4 30 L20 30 L20 22 L36 30 L36 22 L52 30 L52 22 L60 22 L60 56 Z"/>
                    <rect x="10" y="42" width="6" height="8"/>
                    <rect x="24" y="42" width="6" height="8"/>
                    <rect x="40" y="42" width="6" height="8"/>
                    <rect x="52" y="42" width="6" height="8"/>
                </svg>
            </span>
            <span class="card-label">Factory</span>
            <span class="card-sub">کارخانه</span>
        </a>

        <a href="#contact" class="glass-card" data-tilt>
            <span class="card-lines"></span>
            <span class="page-flip p1" style="background-image:url('<?php echo $clients_tiles[0]; ?>');"></span>
            <span class="page-flip p2" style="background-image:url('<?php echo $clients_tiles[1]; ?>');"></span>
            <span class="page-flip p3" style="background-image:url('<?php echo $clients_tiles[2]; ?>');"></span>
            <span class="card-icon">
                <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                    <circle cx="32" cy="22" r="9"/>
                    <path d="M12 56 C12 44 22 38 32 38 C42 38 52 44 52 56"/>
                    <circle cx="14" cy="26" r="5" opacity="0.7"/>
                    <circle cx="50" cy="26" r="5" opacity="0.7"/>
                </svg>
            </span>
            <span class="card-label">Clients</span>
            <span class="card-sub">مشتریان ما</span>
        </a>

    </nav>

    <!-- BRANDS MARQUEE with LOGOS -->
    <div class="brands-strip">
        <div class="brands-track">
            <?php for ($i=0; $i<2; $i++): ?>
                <?php foreach ($brands as $b): ?>
                    <div class="brand-item">
                        <img src="<?php echo $b['logo']; ?>" alt="<?php echo $b['name']; ?>" class="brand-logo">
                        <span class="brand-name"><?php echo $b['name']; ?></span>
                    </div>
                <?php endforeach; ?>
            <?php endfor; ?>
        </div>
    </div>

    <div class="hero-tagline">
        <p class="en">Bespoke Luxury — Elevating Space Through Minimalist Design</p>
        <p class="fa">لوکس، مینیمال، ماندگار — طراحی داخلی حرفه‌ای</p>
    </div>
</section>

<!-- SERVICES -->
<section id="services">
    <div class="section-title">
        <span>خدمات ما</span>
        <h2>Signature Services</h2>
    </div>
    <div class="services-grid">
        <div class="service-card"><h3>Residential</h3><p>ویلا، پنت‌هاوس و املاک خصوصی با طراحی جاودانه و مینیمال.</p></div>
        <div class="service-card"><h3>Commercial</h3><p>هتل‌های بوتیک، فروشگاه‌های برند و دفاتر اجرایی با اقتدار بصری.</p></div>
        <div class="service-card"><h3>Bespoke Furniture</h3><p>مبلمان سفارشی، ساخته‌شده با همکاری استادکاران اروپا.</p></div>
    </div>
</section>

<!-- PROJECTS -->
<section id="projects" class="projects-section">
    <div class="section-title">
        <span>پروژه‌های منتخب</span>
        <h2>Featured Projects</h2>
    </div>
    <div class="projects-grid">
        <div class="project-item"><img src="https://images.unsplash.com/photo-1616486338812-3dadae4b4ace?auto=format&fit=crop&w=1200&q=80" alt=""><div class="project-overlay"><h3>Villa Serenity</h3><span>Residential — Monaco</span></div></div>
        <div class="project-item"><img src="https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1200&q=80" alt=""><div class="project-overlay"><h3>The Atelier</h3><span>Commercial — Paris</span></div></div>
        <div class="project-item"><img src="https://images.unsplash.com/photo-1600566753190-17f0baa2a6c3?auto=format&fit=crop&w=1200&q=80" alt=""><div class="project-overlay"><h3>Penthouse Noir</h3><span>Residential — Dubai</span></div></div>
        <div class="project-item"><img src="https://images.unsplash.com/photo-1615529182904-14819c35db37?auto=format&fit=crop&w=1200&q=80" alt=""><div class="project-overlay"><h3>Maison Blanche</h3><span>Hospitality — Milan</span></div></div>
    </div>
</section>

<!-- CTA -->
<section id="contact" class="cta-section">
    <div style="position:relative; z-index:2;">
        <h2>Begin Your Project</h2>
        <p>پروژه رویایی شما، با یک گفتگو شروع می‌شود.</p>
        <a href="<?php echo home_url('/order/'); ?>" class="btn-luxury">Schedule Consultation</a>
    </div>
</section>

<?php get_footer(); ?>