<!doctype html>
<html <?php language_attributes(); ?>>
<head><meta charset="<?php bloginfo('charset'); ?>"><meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"><?php wp_head(); ?></head>
<body <?php body_class(); ?>><?php wp_body_open(); ?>
<a class="skip-link" href="#main-content">رفتن به محتوای اصلی</a>
<header class="site-header" id="site-header"><div class="container header-inner">
<a class="brand" href="<?php echo esc_url(home_url('/')); ?>" aria-label="دکوتک، صفحه اصلی"><span class="brand-en">DECOTECK</span><span class="brand-fa">دکوتک | طراحی و اجرای فضا</span></a>
<button class="menu-toggle" type="button" aria-expanded="false" aria-controls="primary-nav" aria-label="باز کردن منو"><span></span></button>
<nav class="primary-nav" id="primary-nav" aria-label="منوی اصلی">
<?php if (has_nav_menu('primary')) { wp_nav_menu(array('theme_location'=>'primary','container'=>false,'items_wrap'=>'%3$s','fallback_cb'=>false)); } else { ?>
<a href="<?php echo esc_url(home_url('/services/')); ?>">خدمات</a><a href="<?php echo esc_url(home_url('/gallery/')); ?>">گالری پروژه‌ها</a><a href="<?php echo esc_url(home_url('/calculator/')); ?>">محاسبه قیمت</a><a href="<?php echo esc_url(home_url('/hardware/')); ?>">یراق‌آلات</a><a href="<?php echo esc_url(home_url('/contact/')); ?>">تماس با ما</a>
<?php } ?></nav>
<a class="header-cta" href="<?php echo esc_url(home_url('/order/')); ?>">شروع سفارش <span aria-hidden="true">↗</span></a>
</div></header>
