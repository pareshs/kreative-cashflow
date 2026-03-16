<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header style="background:#2E3440;padding:20px 0;position:fixed;top:0;left:0;right:0;z-index:1000;">
<div style="max-width:1280px;margin:0 auto;padding:0 40px;display:flex;justify-content:space-between;align-items:center;">
<a href="<?php echo home_url(); ?>" style="font-family:var(--kc-font-serif);font-size:1.5rem;color:white;text-decoration:none;">
<strong>Kreative</strong> <span style="color:#C9A84C;">Cashflow</span>
</a>
<?php wp_nav_menu(array('theme_location'=>'primary','container'=>false,'menu_class'=>'nav-menu')); ?>
</div>
</header>

<main style="margin-top:70px;">
