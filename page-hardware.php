<?php
/* Template Name: Hardware */

$hardware_items = array(
    array('title'=>'لولا گازور',                'icon'=>'hinge',    'desc'=>'لولاهای گازور کابینت با کیفیت اروپایی'),
    array('title'=>'جک و آرام بند کابینت',       'icon'=>'jack',     'desc'=>'جک‌های آرام بند برای بستن نرم درب'),
    array('title'=>'ریل کابینت و کشو',           'icon'=>'rail',     'desc'=>'ریل‌های تاندم و کوارتز درجه یک'),
    array('title'=>'دستگیره',                    'icon'=>'handle',   'desc'=>'دستگیره‌های مدرن و کلاسیک'),
    array('title'=>'مکانیزیم و یراق درب ریلی',   'icon'=>'sliding',  'desc'=>'یراق آلات درب ریلی کمد'),
    array('title'=>'پایه کابینت',                'icon'=>'leg',      'desc'=>'پایه‌های تنظیمی کابینت'),
    array('title'=>'چرخ میز و کابینت',           'icon'=>'wheel',    'desc'=>'چرخ‌های ثابت و متحرک'),
    array('title'=>'انواع مگنت کابینت',          'icon'=>'magnet',   'desc'=>'مگنت‌های نگهدارنده درب'),
    array('title'=>'قفل کمدی',                   'icon'=>'lock',     'desc'=>'قفل‌های ایمنی کمد و کابینت'),
    array('title'=>'چسب چوب و فوری و آکواریوم',  'icon'=>'glue',     'desc'=>'انواع چسب صنعتی و ساختمانی'),
    array('title'=>'لولا کابینت',                'icon'=>'hinge2',   'desc'=>'لولاهای استاندارد کابینت'),
    array('title'=>'ریل کابینت',                 'icon'=>'rail2',    'desc'=>'ریل‌های چرخشی و کشویی'),
    array('title'=>'دستگیره کابینت',             'icon'=>'handle2',  'desc'=>'دستگیره‌های تخصصی کابینت'),
    array('title'=>'انواع جک کابینت',            'icon'=>'jack2',    'desc'=>'جک‌های هیدرولیک و گازی'),
    array('title'=>'مکانیزیم و قرقره',           'icon'=>'pulley',   'desc'=>'قرقره‌های صنعتی و یراق'),
    array('title'=>'پایه کابینت',                'icon'=>'leg2',     'desc'=>'پایه‌های تنظیمی رنگی'),
    array('title'=>'مگنت',                       'icon'=>'magnet2',  'desc'=>'مگنت‌های قوی نگهدارنده'),
    array('title'=>'انواع قفل',                  'icon'=>'lock2',    'desc'=>'قفل‌های امنیتی متنوع'),
    array('title'=>'چرخ ثابت و گردان',           'icon'=>'wheel2',   'desc'=>'چرخ‌های صنعتی و اداری'),
);

function hardware_icon($type) {
    $icons = array(
        'hinge'    => '<rect x="8" y="20" width="48" height="24" rx="2"/><circle cx="20" cy="32" r="4"/><circle cx="44" cy="32" r="4"/>',
        'jack'     => '<rect x="10" y="26" width="44" height="12" rx="2"/><line x1="20" y1="26" x2="20" y2="16"/><line x1="44" y1="26" x2="44" y2="16"/>',
        'rail'     => '<rect x="6" y="26" width="52" height="12" rx="1"/><line x1="6" y1="32" x2="58" y2="32"/><circle cx="16" cy="32" r="2" fill="currentColor"/><circle cx="48" cy="32" r="2" fill="currentColor"/>',
        'handle'   => '<rect x="12" y="28" width="40" height="8" rx="4"/><circle cx="18" cy="32" r="1.5" fill="currentColor"/><circle cx="46" cy="32" r="1.5" fill="currentColor"/>',
        'sliding'  => '<rect x="6" y="14" width="24" height="36" rx="1"/><rect x="34" y="14" width="24" height="36" rx="1"/><line x1="6" y1="50" x2="58" y2="50"/>',
        'leg'      => '<rect x="26" y="8" width="12" height="8"/><line x1="32" y1="16" x2="32" y2="52"/><rect x="22" y="52" width="20" height="4"/>',
        'wheel'    => '<circle cx="32" cy="34" r="16"/><circle cx="32" cy="34" r="6"/><rect x="26" y="14" width="12" height="8"/>',
        'magnet'   => '<path d="M14 20 L14 40 Q14 52 32 52 Q50 52 50 40 L50 20"/><line x1="14" y1="28" x2="24" y2="28"/><line x1="40" y1="28" x2="50" y2="28"/>',
        'lock'     => '<rect x="14" y="28" width="36" height="26" rx="2"/><path d="M22 28 L22 20 Q22 12 32 12 Q42 12 42 20 L42 28"/><circle cx="32" cy="40" r="3"/>',
        'glue'     => '<path d="M22 8 L42 8 L42 22 L46 22 L46 56 L18 56 L18 22 L22 22 Z"/><line x1="22" y1="30" x2="42" y2="30"/>',
        'hinge2'   => '<rect x="8" y="24" width="24" height="16" rx="1"/><rect x="32" y="24" width="24" height="16" rx="1"/><circle cx="32" cy="32" r="3"/>',
        'rail2'    => '<line x1="8" y1="24" x2="56" y2="24"/><line x1="8" y1="40" x2="56" y2="40"/><circle cx="16" cy="32" r="4"/><circle cx="48" cy="32" r="4"/>',
        'handle2'  => '<path d="M12 32 Q12 22 22 22 L42 22 Q52 22 52 32 Q52 42 42 42 L22 42 Q12 42 12 32"/>',
        'jack2'    => '<rect x="14" y="30" width="36" height="8" rx="1"/><circle cx="18" cy="34" r="2" fill="currentColor"/><circle cx="46" cy="34" r="2" fill="currentColor"/><line x1="24" y1="30" x2="24" y2="18"/>',
        'pulley'   => '<circle cx="32" cy="24" r="10"/><circle cx="32" cy="24" r="3"/><line x1="32" y1="34" x2="32" y2="54"/><path d="M22 24 L14 32"/><path d="M42 24 L50 32"/>',
        'leg2'     => '<rect x="28" y="6" width="8" height="10"/><rect x="26" y="16" width="12" height="40"/><rect x="22" y="56" width="20" height="4"/>',
        'magnet2'  => '<path d="M18 16 L18 40 Q18 48 32 48 Q46 48 46 40 L46 16 L36 16 L36 40 Q36 42 32 42 Q28 42 28 40 L28 16 Z"/>',
        'lock2'    => '<circle cx="32" cy="34" r="18"/><path d="M24 34 L24 26 Q24 20 32 20 Q40 20 40 26 L40 34"/><circle cx="32" cy="34" r="3"/>',
        'wheel2'   => '<circle cx="32" cy="32" r="18"/><circle cx="32" cy="32" r="8"/><line x1="32" y1="14" x2="32" y2="24"/><line x1="32" y1="40" x2="32" y2="50"/><line x1="14" y1="32" x2="24" y2="32"/><line x1="40" y1="32" x2="50" y2="32"/>',
    );
    return isset($icons[$type]) ? $icons[$type] : $icons['hinge'];
}

get_header(); ?>

<style>
.hw-hero {
    padding: 130px 50px 60px;
    text-align: center;
    background: linear-gradient(rgba(255,253,247,0.75), rgba(255,250,235,0.85)),
                url('https://images.unsplash.com/photo-1607472586893-edb57bdc0e39?auto=format&fit=crop&w=1920&q=80') center/cover;
}
.hw-hero h1 { font-size: 3.5rem; color: var(--color-accent-dark); margin-bottom: 15px; }
.hw-hero p { font-family: var(--font-fa); font-size: 1.1rem; opacity: 0.85; direction: rtl; }

.hw-grid {
    max-width: 1400px;
    margin: 0 auto;
    padding: 60px 40px 120px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
    gap: 25px;
}
.hw-card {
    background: rgba(255,253,247,0.85);
    border: 1px solid var(--glass-border);
    border-radius: 18px;
    padding: 30px 20px;
    text-align: center;
    box-shadow: 0 6px 20px rgba(139,105,20,0.12);
    transition: all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
    cursor: pointer;
    position: relative;
    overflow: hidden;
}
.hw-card::before {
    content: '';
    position: absolute; inset: 0;
    background: linear-gradient(135deg, transparent 40%, rgba(232,213,160,0.15) 50%, transparent 60%);
    transform: translateX(-100%);
    transition: transform 0.6s;
}
.hw-card:hover::before { transform: translateX(100%); }
.hw-card:hover {
    transform: translateY(-10px) scale(1.03);
    border-color: var(--color-accent);
    box-shadow: 0 20px 45px rgba(201,169,97,0.4);
    background: rgba(255,255,255,1);
}

.hw-icon {
    width: 70px; height: 70px;
    margin: 0 auto 20px;
    color: var(--color-accent-dark);
    background: linear-gradient(135deg, rgba(255,248,220,0.6), rgba(232,213,160,0.3));
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: transform 0.4s;
}
.hw-card:hover .hw-icon {
    transform: rotate(-8deg) scale(1.1);
    color: var(--color-accent);
    background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
    color: #fff;
}
.hw-icon svg { width: 42px; height: 42px; }

.hw-title {
    font-family: var(--font-fa);
    font-size: 1.05rem;
    font-weight: 700;
    color: var(--color-text);
    margin-bottom: 10px;
    direction: rtl;
}
.hw-desc {
    font-family: var(--font-fa);
    font-size: 0.85rem;
    color: var(--color-accent-dark);
    line-height: 1.7;
    opacity: 0.8;
    direction: rtl;
}
.hw-badge {
    position: absolute;
    top: 15px; left: 15px;
    background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
    color: #fff;
    font-family: var(--font-fa);
    font-size: 0.65rem;
    font-weight: 700;
    padding: 3px 8px;
    border-radius: 20px;
    letter-spacing: 0.5px;
}

@media (max-width: 700px) {
    .hw-hero h1 { font-size: 2.2rem; }
    .hw-grid { grid-template-columns: repeat(auto-fit, minmax(150px, 1fr)); padding: 40px 20px; }
    .hw-card { padding: 20px 12px; }
}
</style>

<section class="hw-hero">
    <h1>Hardware Collection</h1>
    <p>مجموعه کامل یراق آلات کابینت و کمد دیواری با کیفیت درجه یک</p>
</section>

<section class="hw-grid">
    <?php foreach ($hardware_items as $item): ?>
        <div class="hw-card">
            <span class="hw-badge">دکوتک</span>
            <div class="hw-icon">
                <svg viewBox="0 0 64 64" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round">
                    <?php echo hardware_icon($item['icon']); ?>
                </svg>
            </div>
            <div class="hw-title"><?php echo $item['title']; ?></div>
            <div class="hw-desc"><?php echo $item['desc']; ?></div>
        </div>
    <?php endforeach; ?>
</section>

<?php get_footer(); ?>