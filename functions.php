<?php
// ===== Theme Setup =====
function decoteck_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'decoteck_setup');

// ===== Enqueue =====
function decoteck_scripts() {
    wp_enqueue_style('decoteck-style', get_stylesheet_uri(), array(), time());
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@300;400;500&family=Inter:wght@300;400&family=Vazirmatn:wght@300;400;500;700&display=swap', array(), null);
    wp_enqueue_script('decoteck-main', get_template_directory_uri() . '/main.js', array(), time(), true);
}
add_action('wp_enqueue_scripts', 'decoteck_scripts');

// ===== CPT Projects =====
function decoteck_register_projects() {
    register_post_type('project', array(
        'labels' => array('name'=>'Projects','singular_name'=>'Project'),
        'public' => true, 'has_archive' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports' => array('title','editor','thumbnail','excerpt'),
        'rewrite' => array('slug'=>'projects'),
        'show_in_rest' => true,
    ));
}
add_action('init', 'decoteck_register_projects');

// ===== Update Prices =====
function decoteck_update_prices_v2() {
    if (get_option('decoteck_prices_version') !== '2.0') {
        update_option('decoteck_prices', array(
            'cabinet_mdf' => 34000000,
            'cabinet_highgloss' => 36000000,
            'cabinet_membrane' => 35000000,
            'cabinet_neoclassic' => 39500000,
            'wardrobe_mdf' => 28000000,
            'wardrobe_highgloss' => 30000000,
            'wardrobe_neoclassic' => 33000000,
            'wardrobe_mirror' => 31000000,
            'closet_standard' => 35000000,
            'design_fee' => 1500000,
        ));
        update_option('decoteck_prices_version', '2.0');
    }
}
add_action('init', 'decoteck_update_prices_v2');

// ===================================================
// CUSTOMER SYSTEM
// ===================================================

function decoteck_create_customer_tables() {
    global $wpdb;
    $charset = $wpdb->get_charset_collate();

    $t1 = $wpdb->prefix . 'decoteck_customers';
    $sql1 = "CREATE TABLE IF NOT EXISTS $t1 (
        id INT AUTO_INCREMENT PRIMARY KEY,
        full_name VARCHAR(120),
        phone VARCHAR(20) UNIQUE,
        password VARCHAR(255),
        email VARCHAR(120),
        address TEXT,
        discount_code VARCHAR(50),
        discount_percent INT DEFAULT 0,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    ) $charset;";

    $t2 = $wpdb->prefix . 'decoteck_projects';
    $sql2 = "CREATE TABLE IF NOT EXISTS $t2 (
        id INT AUTO_INCREMENT PRIMARY KEY,
        customer_id INT,
        project_name VARCHAR(200),
        service_type VARCHAR(100),
        status VARCHAR(50) DEFAULT 'ثبت اولیه',
        total_price BIGINT DEFAULT 0,
        paid_amount BIGINT DEFAULT 0,
        contract_url VARCHAR(500),
        notes TEXT,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    ) $charset;";

    $t3 = $wpdb->prefix . 'decoteck_reviews';
    $sql3 = "CREATE TABLE IF NOT EXISTS $t3 (
        id INT AUTO_INCREMENT PRIMARY KEY,
        customer_id INT,
        customer_name VARCHAR(120),
        rating INT DEFAULT 5,
        review_text TEXT,
        project_type VARCHAR(100),
        approved TINYINT DEFAULT 0,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP
    ) $charset;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql1); dbDelta($sql2); dbDelta($sql3);
}
add_action('after_switch_theme', 'decoteck_create_customer_tables');
add_action('init', 'decoteck_create_customer_tables');

function decoteck_start_session() {
    if (!session_id()) session_start();
}
add_action('init', 'decoteck_start_session', 1);

function decoteck_get_current_customer() {
    if (empty($_SESSION['decoteck_customer_id'])) return null;
    global $wpdb;
    $t = $wpdb->prefix . 'decoteck_customers';
    return $wpdb->get_row($wpdb->prepare("SELECT * FROM $t WHERE id = %d", $_SESSION['decoteck_customer_id']));
}

// ============================================
// ADMIN MENUS
// ============================================
function decoteck_admin_menus() {
    add_menu_page('سفارشات','Orders','manage_options','decoteck-orders','decoteck_orders_page','dashicons-cart',3);
    add_menu_page('قیمت‌ها','Prices','manage_options','decoteck-prices','decoteck_prices_page','dashicons-money-alt',4);
    add_menu_page('مشتریان','Customers','manage_options','decoteck-customers','decoteck_customers_page','dashicons-groups',5);
    add_menu_page('پروژه‌ها','Client Projects','manage_options','decoteck-cprojects','decoteck_cprojects_page','dashicons-clipboard',6);
    add_menu_page('نظرات','Reviews','manage_options','decoteck-reviews','decoteck_reviews_page','dashicons-star-filled',7);
}
add_action('admin_menu', 'decoteck_admin_menus');

function decoteck_orders_page() {
    global $wpdb;
    $table = $wpdb->prefix . 'decoteck_orders';
    if (isset($_GET['delete'])) { $wpdb->delete($table, array('id' => intval($_GET['delete']))); }
    $orders = $wpdb->get_results("SELECT * FROM $table ORDER BY created_at DESC");
    echo '<div class="wrap"><h1>📞 سفارشات</h1>';
    if (empty($orders)) echo '<p>هنوز سفارشی نیست.</p>';
    else {
        echo '<table class="wp-list-table widefat fixed striped"><thead><tr><th>#</th><th>نام</th><th>شماره</th><th>خدمات</th><th>یادداشت</th><th>تاریخ</th><th>عملیات</th></tr></thead><tbody>';
        foreach ($orders as $o) {
            echo '<tr><td>'.$o->id.'</td><td>'.esc_html($o->name).'</td><td>'.esc_html($o->phone).'</td><td>'.esc_html($o->service).'</td><td>'.esc_html($o->note).'</td><td>'.esc_html($o->created_at).'</td>';
            echo '<td><a href="tel:'.esc_attr($o->phone).'" class="button button-primary">تماس</a> <a href="?page=decoteck-orders&delete='.$o->id.'" class="button" onclick="return confirm(\'حذف؟\')">حذف</a></td></tr>';
        }
        echo '</tbody></table>';
    }
    echo '</div>';
}

function decoteck_prices_page() {
    if (isset($_POST['save_prices'])) {
        $new_prices = array();
        foreach ($_POST['prices'] as $key => $val) $new_prices[$key] = intval(str_replace(',', '', $val));
        update_option('decoteck_prices', $new_prices);
        echo '<div class="notice notice-success"><p>✅ ذخیره شد.</p></div>';
    }
    $prices = get_option('decoteck_prices');
    $labels = array(
        'cabinet_mdf'=>'کابینت MDF (متر)','cabinet_highgloss'=>'کابینت هایگلاس (متر)',
        'cabinet_membrane'=>'کابینت ممبران (متر)','cabinet_neoclassic'=>'کابینت نئوکلاسیک (متر)',
        'wardrobe_mdf'=>'کمد MDF (متر)','wardrobe_highgloss'=>'کمد هایگلاس (متر)',
        'wardrobe_neoclassic'=>'کمد نئوکلاسیک (متر)','wardrobe_mirror'=>'کمد آینه (متر)',
        'closet_standard'=>'کلوزت','design_fee'=>'طراحی سه‌بعدی',
    );
    echo '<div class="wrap"><h1>💰 قیمت‌ها</h1><form method="post" style="background:#fff;padding:30px;border-radius:12px;max-width:800px;"><table class="form-table">';
    foreach ($labels as $key => $label) {
        echo '<tr><th><strong>'.$label.'</strong></th><td><input type="text" name="prices['.$key.']" value="'.number_format($prices[$key] ?? 0).'" style="width:250px;direction:ltr;text-align:right;"> تومان</td></tr>';
    }
    echo '</table><input type="submit" name="save_prices" class="button button-primary button-large" value="💾 ذخیره"></form></div>';
}

function decoteck_customers_page() {
    global $wpdb;
    $t = $wpdb->prefix . 'decoteck_customers';
    if (isset($_POST['update_discount'])) {
        $wpdb->update($t, array('discount_code'=>sanitize_text_field($_POST['discount_code']),'discount_percent'=>intval($_POST['discount_percent'])), array('id'=>intval($_POST['customer_id'])));
    }
    if (isset($_GET['delete'])) $wpdb->delete($t, array('id'=>intval($_GET['delete'])));
    $customers = $wpdb->get_results("SELECT * FROM $t ORDER BY created_at DESC");
    echo '<div class="wrap"><h1>👥 مشتریان</h1><table class="wp-list-table widefat fixed striped"><thead><tr><th>#</th><th>نام</th><th>شماره</th><th>ایمیل</th><th>کد تخفیف</th><th>درصد</th><th>عملیات</th></tr></thead><tbody>';
    if (empty($customers)) echo '<tr><td colspan="7" style="text-align:center;">هنوز مشتری ثبت‌نام نکرده.</td></tr>';
    else foreach ($customers as $c) {
        echo '<tr><form method="post"><td>'.$c->id.'</td><td>'.esc_html($c->full_name).'</td><td>'.esc_html($c->phone).'</td><td>'.esc_html($c->email).'</td>';
        echo '<td><input type="hidden" name="customer_id" value="'.$c->id.'"><input type="text" name="discount_code" value="'.esc_attr($c->discount_code).'" style="width:100px;"></td>';
        echo '<td><input type="number" name="discount_percent" value="'.intval($c->discount_percent).'" min="0" max="100" style="width:60px;">%</td>';
        echo '<td><button type="submit" name="update_discount" class="button button-primary">💾</button> <a href="?page=decoteck-customers&delete='.$c->id.'" class="button" onclick="return confirm(\'حذف؟\')">×</a></td></form></tr>';
    }
    echo '</tbody></table></div>';
}

function decoteck_cprojects_page() {
    global $wpdb;
    $tp = $wpdb->prefix . 'decoteck_projects';
    $tc = $wpdb->prefix . 'decoteck_customers';
    $statuses = array('ثبت اولیه','بازدید و اندازه‌گیری','طراحی و تایید','تولید در کارخانه','ارسال','نصب','تکمیل شده');
    if (isset($_POST['add_project'])) {
        $wpdb->insert($tp, array(
            'customer_id'=>intval($_POST['customer_id']),
            'project_name'=>sanitize_text_field($_POST['project_name']),
            'service_type'=>sanitize_text_field($_POST['service_type']),
            'status'=>sanitize_text_field($_POST['status']),
            'total_price'=>intval(str_replace(',','',$_POST['total_price'])),
            'paid_amount'=>intval(str_replace(',','',$_POST['paid_amount'])),
            'contract_url'=>esc_url_raw($_POST['contract_url']),
            'notes'=>sanitize_textarea_field($_POST['notes']),
        ));
    }
    if (isset($_POST['update_project'])) {
        $wpdb->update($tp, array(
            'status'=>sanitize_text_field($_POST['status']),
            'total_price'=>intval(str_replace(',','',$_POST['total_price'])),
            'paid_amount'=>intval(str_replace(',','',$_POST['paid_amount'])),
            'contract_url'=>esc_url_raw($_POST['contract_url']),
            'notes'=>sanitize_textarea_field($_POST['notes']),
        ), array('id'=>intval($_POST['project_id'])));
    }
    if (isset($_GET['delete'])) $wpdb->delete($tp, array('id'=>intval($_GET['delete'])));
    $projects = $wpdb->get_results("SELECT p.*, c.full_name, c.phone FROM $tp p LEFT JOIN $tc c ON p.customer_id = c.id ORDER BY p.updated_at DESC");
    $customers = $wpdb->get_results("SELECT id, full_name, phone FROM $tc ORDER BY full_name");
    ?>
    <div class="wrap"><h1>📋 پروژه‌های مشتریان</h1>
    <div style="background:#fff;padding:25px;border-radius:12px;margin:20px 0;"><h2>➕ افزودن پروژه</h2>
    <form method="post"><table class="form-table">
    <tr><th>مشتری</th><td><select name="customer_id" required><option value="">انتخاب...</option>
    <?php foreach ($customers as $c) echo '<option value="'.$c->id.'">'.esc_html($c->full_name.' - '.$c->phone).'</option>'; ?>
    </select></td></tr>
    <tr><th>نام پروژه</th><td><input type="text" name="project_name" required style="width:400px;"></td></tr>
    <tr><th>نوع خدمات</th><td><input type="text" name="service_type" style="width:300px;"></td></tr>
    <tr><th>وضعیت</th><td><select name="status"><?php foreach ($statuses as $s) echo '<option>'.$s.'</option>'; ?></select></td></tr>
    <tr><th>مبلغ کل</th><td><input type="text" name="total_price" style="width:200px;"></td></tr>
    <tr><th>پرداخت شده</th><td><input type="text" name="paid_amount" style="width:200px;"></td></tr>
    <tr><th>لینک قرارداد PDF</th><td><input type="url" name="contract_url" style="width:500px;"></td></tr>
    <tr><th>توضیحات</th><td><textarea name="notes" rows="3" style="width:500px;"></textarea></td></tr>
    </table><input type="submit" name="add_project" class="button button-primary button-large" value="➕ افزودن"></form></div>
    <h2>📁 لیست پروژه‌ها</h2>
    <?php foreach ($projects as $p): ?>
    <div style="background:#fff;padding:20px;border-radius:10px;margin:12px 0;border-right:4px solid #c9a961;">
        <form method="post"><input type="hidden" name="project_id" value="<?php echo $p->id; ?>">
        <h3><?php echo esc_html($p->project_name); ?> — <?php echo esc_html($p->full_name); ?></h3>
        <p>📞 <?php echo esc_html($p->phone); ?> | 🏷️ <?php echo esc_html($p->service_type); ?></p>
        <div style="display:grid;grid-template-columns:1fr 1fr 1fr;gap:15px;">
            <div><label><strong>وضعیت:</strong></label><select name="status" style="width:100%;">
            <?php foreach ($statuses as $s): ?><option value="<?php echo $s; ?>" <?php selected($p->status, $s); ?>><?php echo $s; ?></option><?php endforeach; ?>
            </select></div>
            <div><label><strong>مبلغ:</strong></label><input type="text" name="total_price" value="<?php echo number_format($p->total_price); ?>" style="width:100%;"></div>
            <div><label><strong>پرداختی:</strong></label><input type="text" name="paid_amount" value="<?php echo number_format($p->paid_amount); ?>" style="width:100%;"></div>
        </div>
        <div style="margin-top:10px;"><label><strong>لینک PDF:</strong></label><input type="url" name="contract_url" value="<?php echo esc_attr($p->contract_url); ?>" style="width:100%;"></div>
        <div style="margin-top:10px;"><label><strong>یادداشت:</strong></label><textarea name="notes" rows="2" style="width:100%;"><?php echo esc_textarea($p->notes); ?></textarea></div>
        <div style="margin-top:10px;"><button type="submit" name="update_project" class="button button-primary">💾 به‌روز</button>
        <a href="?page=decoteck-cprojects&delete=<?php echo $p->id; ?>" class="button" onclick="return confirm('حذف؟')">🗑</a></div>
        </form>
    </div>
    <?php endforeach; ?>
    </div>
    <?php
}

function decoteck_reviews_page() {
    global $wpdb;
    $t = $wpdb->prefix . 'decoteck_reviews';
    if (isset($_GET['approve'])) $wpdb->update($t, array('approved'=>1), array('id'=>intval($_GET['approve'])));
    if (isset($_GET['unapprove'])) $wpdb->update($t, array('approved'=>0), array('id'=>intval($_GET['unapprove'])));
    if (isset($_GET['delete'])) $wpdb->delete($t, array('id'=>intval($_GET['delete'])));
    $reviews = $wpdb->get_results("SELECT * FROM $t ORDER BY created_at DESC");
    echo '<div class="wrap"><h1>⭐ نظرات</h1>';
    if (empty($reviews)) echo '<p>هنوز نظری نیست.</p>';
    foreach ($reviews as $r) {
        $bg = $r->approved ? '#e8f5e9' : '#fff';
        $bc = $r->approved ? '#4caf50' : '#c9a961';
        echo '<div style="background:'.$bg.';padding:20px;border-radius:10px;margin:12px 0;border-right:4px solid '.$bc.';">';
        echo '<strong>'.esc_html($r->customer_name).'</strong> — '.str_repeat('⭐', intval($r->rating));
        echo ' <span style="color:#888;font-size:0.85em;">| '.esc_html($r->project_type).' | '.esc_html($r->created_at).'</span>';
        echo '<p>'.esc_html($r->review_text).'</p>';
        if (!$r->approved) echo '<a href="?page=decoteck-reviews&approve='.$r->id.'" class="button button-primary">✅ تایید</a> ';
        else echo '<a href="?page=decoteck-reviews&unapprove='.$r->id.'" class="button">❌ مخفی</a> ';
        echo '<a href="?page=decoteck-reviews&delete='.$r->id.'" class="button" onclick="return confirm(\'حذف؟\')">🗑</a></div>';
    }
    echo '</div>';
}

// ===================================================
// HOMEPAGE REVIEWS SLIDER (Bottom of every page)
// ===================================================
function decoteck_reviews_slider() {
    global $wpdb;
    $t = $wpdb->prefix . 'decoteck_reviews';
    $reviews = $wpdb->get_results("SELECT * FROM $t WHERE approved = 1 ORDER BY created_at DESC LIMIT 10");
    if (empty($reviews)) return;
    ?>
    <section class="reviews-slider-section">
        <div class="rev-slider-title">
            <span>❝ نظرات مشتریان ❞</span>
            <h2>Client Testimonials</h2>
        </div>
        <div class="rev-slider-track">
            <div class="rev-slider-inner">
                <?php for ($i=0; $i<2; $i++): ?>
                    <?php foreach ($reviews as $r): ?>
                        <div class="rev-slide-card">
                            <div class="rev-slide-head">
                                <div class="rev-slide-avatar"><?php echo esc_html(mb_substr($r->customer_name, 0, 1)); ?></div>
                                <div>
                                    <div class="rev-slide-name"><?php echo esc_html($r->customer_name); ?></div>
                                    <div class="rev-slide-stars"><?php echo str_repeat('★', intval($r->rating)); ?></div>
                                </div>
                            </div>
                            <div class="rev-slide-tag"><?php echo esc_html($r->project_type); ?></div>
                            <p class="rev-slide-text"><?php echo esc_html(mb_substr($r->review_text, 0, 180)); ?><?php if(mb_strlen($r->review_text) > 180) echo '...'; ?></p>
                        </div>
                    <?php endforeach; ?>
                <?php endfor; ?>
            </div>
        </div>
    </section>
    <?php
}