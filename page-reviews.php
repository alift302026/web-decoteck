<?php
/* Template Name: Reviews */

global $wpdb;
$tr = $wpdb->prefix . 'decoteck_reviews';
$reviews = $wpdb->get_results("SELECT * FROM $tr WHERE approved = 1 ORDER BY created_at DESC");

// Average Rating
$avg = 0;
$total = count($reviews);
if ($total > 0) {
    $sum = 0;
    foreach ($reviews as $r) $sum += intval($r->rating);
    $avg = round($sum / $total, 1);
}

// Count by rating
$stars_count = array(5=>0, 4=>0, 3=>0, 2=>0, 1=>0);
foreach ($reviews as $r) $stars_count[intval($r->rating)]++;

$customer = decoteck_get_current_customer();

get_header(); ?>

<style>
.rev-hero {
    padding: 130px 50px 60px;
    text-align: center;
    background: linear-gradient(rgba(255,253,247,0.75), rgba(255,250,235,0.85)),
                url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?auto=format&fit=crop&w=1920&q=80') center/cover;
}
.rev-hero h1 { font-size: 3.5rem; color: var(--color-accent-dark); margin-bottom: 15px; }
.rev-hero p { font-family: var(--font-fa); font-size: 1.1rem; opacity: 0.85; direction: rtl; }

.rev-summary {
    max-width: 1000px;
    margin: 40px auto 20px;
    padding: 40px 30px;
    background: rgba(255,253,247,0.95);
    border: 1px solid var(--glass-border);
    border-radius: 20px;
    box-shadow: 0 15px 40px rgba(139,105,20,0.15);
    display: grid;
    grid-template-columns: 200px 1fr;
    gap: 40px;
    direction: rtl;
    align-items: center;
}

.avg-box { text-align: center; }
.avg-num {
    font-family: var(--font-display);
    font-size: 5rem;
    font-weight: 700;
    color: var(--color-accent-dark);
    line-height: 1;
}
.avg-max {
    font-family: var(--font-fa);
    font-size: 1rem;
    color: #888;
    margin-bottom: 8px;
}
.avg-stars { color: var(--color-accent); font-size: 1.5rem; margin-bottom: 8px; }
.avg-total {
    font-family: var(--font-fa);
    font-size: 0.9rem;
    color: var(--color-accent-dark);
    font-weight: 600;
}

.rating-bars { display: flex; flex-direction: column; gap: 10px; }
.bar-row {
    display: grid;
    grid-template-columns: 60px 1fr 60px;
    gap: 10px;
    align-items: center;
    font-family: var(--font-fa);
    font-size: 0.9rem;
}
.bar-track {
    height: 12px;
    background: #f0f0f0;
    border-radius: 6px;
    overflow: hidden;
}
.bar-fill {
    height: 100%;
    background: linear-gradient(90deg, var(--color-accent-dark), var(--color-accent));
    border-radius: 6px;
    transition: width 0.6s;
}
.bar-count { text-align: left; color: #666; font-size: 0.85rem; }

.rev-grid {
    max-width: 1300px;
    margin: 30px auto 100px;
    padding: 0 30px;
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 25px;
}

.rev-card {
    background: rgba(255,253,247,0.95);
    border: 1px solid var(--glass-border);
    border-right: 4px solid var(--color-accent);
    border-radius: 16px;
    padding: 25px;
    direction: rtl;
    box-shadow: 0 8px 25px rgba(139,105,20,0.12);
    transition: all 0.4s;
    position: relative;
}
.rev-card:hover {
    transform: translateY(-8px);
    border-color: var(--color-accent-dark);
    box-shadow: 0 20px 40px rgba(201,169,97,0.3);
}
.rev-card::before {
    content: '"';
    position: absolute;
    top: 10px;
    left: 20px;
    font-family: var(--font-display);
    font-size: 5rem;
    color: var(--color-accent);
    opacity: 0.2;
    line-height: 1;
}

.rev-head {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 15px;
    padding-bottom: 12px;
    border-bottom: 1px dashed rgba(201,169,97,0.4);
}
.rev-avatar {
    width: 48px; height: 48px;
    background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
    border-radius: 50%;
    color: #fff;
    display: flex; align-items: center; justify-content: center;
    font-family: var(--font-display);
    font-size: 1.4rem;
    font-weight: 700;
    flex-shrink: 0;
}
.rev-user { flex: 1; }
.rev-name {
    font-family: var(--font-fa);
    font-size: 1rem;
    font-weight: 700;
    color: var(--color-text);
    margin-bottom: 2px;
}
.rev-date {
    font-family: var(--font-fa);
    font-size: 0.75rem;
    color: #999;
}
.rev-rating {
    color: var(--color-accent);
    font-size: 1rem;
    letter-spacing: 2px;
}

.rev-tag {
    display: inline-block;
    background: linear-gradient(135deg, rgba(232,213,160,0.4), rgba(201,169,97,0.2));
    color: var(--color-accent-dark);
    padding: 3px 12px;
    border-radius: 12px;
    font-family: var(--font-fa);
    font-size: 0.75rem;
    font-weight: 700;
    margin-bottom: 12px;
}

.rev-text {
    font-family: var(--font-fa);
    font-size: 0.95rem;
    color: var(--color-text);
    line-height: 2;
    opacity: 0.9;
}

.rev-cta {
    max-width: 800px;
    margin: 20px auto 60px;
    padding: 40px 30px;
    text-align: center;
    background: linear-gradient(135deg, rgba(255,248,220,0.7), rgba(232,213,160,0.4));
    border: 2px dashed var(--color-accent);
    border-radius: 20px;
    direction: rtl;
}
.rev-cta h3 {
    font-family: var(--font-fa);
    font-size: 1.4rem;
    color: var(--color-accent-dark);
    margin-bottom: 12px;
}
.rev-cta p {
    font-family: var(--font-fa);
    font-size: 1rem;
    color: var(--color-text);
    margin-bottom: 20px;
    line-height: 1.9;
}
.rev-cta a {
    display: inline-block;
    padding: 14px 35px;
    background: linear-gradient(135deg, var(--color-accent), var(--color-accent-dark));
    color: #fff;
    text-decoration: none;
    border-radius: 12px;
    font-family: var(--font-fa);
    font-weight: 700;
    transition: transform 0.3s;
}
.rev-cta a:hover { transform: translateY(-3px); box-shadow: 0 15px 30px rgba(201,169,97,0.4); }

.empty-state {
    text-align: center;
    padding: 80px 20px;
    color: #999;
    font-family: var(--font-fa);
    font-size: 1.1rem;
}

@media (max-width: 700px) {
    .rev-hero h1 { font-size: 2.2rem; }
    .rev-summary { grid-template-columns: 1fr; gap: 20px; padding: 25px 20px; }
    .avg-num { font-size: 3.5rem; }
    .rev-grid { padding: 0 15px; }
}
</style>

<section class="rev-hero">
    <h1>Client Reviews</h1>
    <p>نظرات و تجربیات مشتریان دکوتک — اعتماد شما، افتخار ماست</p>
</section>

<?php if ($total > 0): ?>
<div class="rev-summary">
    <div class="avg-box">
        <div class="avg-num"><?php echo $avg; ?></div>
        <div class="avg-max">از ۵</div>
        <div class="avg-stars"><?php echo str_repeat('★', round($avg)) . str_repeat('☆', 5 - round($avg)); ?></div>
        <div class="avg-total">📊 <?php echo $total; ?> نظر ثبت شده</div>
    </div>
    <div class="rating-bars">
        <?php for ($i = 5; $i >= 1; $i--):
            $pct = $total > 0 ? ($stars_count[$i] / $total * 100) : 0;
        ?>
            <div class="bar-row">
                <div><?php echo $i; ?> ⭐</div>
                <div class="bar-track"><div class="bar-fill" style="width: <?php echo $pct; ?>%;"></div></div>
                <div class="bar-count"><?php echo $stars_count[$i]; ?> نفر</div>
            </div>
        <?php endfor; ?>
    </div>
</div>
<?php endif; ?>

<div class="rev-cta">
    <h3>💬 نظر شما برای ما ارزشمند است</h3>
    <?php if ($customer): ?>
        <p>سلام <strong><?php echo esc_html($customer->full_name); ?></strong> عزیز، تجربه خود از دکوتک را در داشبورد شخصی‌تان ثبت کنید.</p>
        <a href="<?php echo home_url('/dashboard/'); ?>">✍️ ثبت نظر جدید</a>
    <?php else: ?>
        <p>برای ثبت نظر، ابتدا وارد حساب کاربری‌تان شوید یا ثبت‌نام کنید.</p>
        <a href="<?php echo home_url('/login/'); ?>">🔐 ورود / ثبت‌نام</a>
    <?php endif; ?>
</div>

<div class="rev-grid">
    <?php if (empty($reviews)): ?>
        <div class="empty-state" style="grid-column: 1 / -1;">
            <p>هنوز نظری ثبت نشده است.</p>
            <p style="margin-top:10px;">شما اولین نفر باشید که تجربه خود را با ما به اشتراک می‌گذارید!</p>
        </div>
    <?php else: foreach ($reviews as $r): ?>
        <div class="rev-card">
            <div class="rev-head">
                <div class="rev-avatar"><?php echo mb_substr($r->customer_name, 0, 1); ?></div>
                <div class="rev-user">
                    <div class="rev-name"><?php echo esc_html($r->customer_name); ?></div>
                    <div class="rev-date"><?php echo date('Y-m-d', strtotime($r->created_at)); ?></div>
                </div>
                <div class="rev-rating"><?php echo str_repeat('★', intval($r->rating)); ?></div>
            </div>
            <div class="rev-tag">🏷️ <?php echo esc_html($r->project_type); ?></div>
            <div class="rev-text"><?php echo esc_html($r->review_text); ?></div>
        </div>
    <?php endforeach; endif; ?>
</div>

<?php get_footer(); ?>