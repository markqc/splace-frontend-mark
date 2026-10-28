<?php if (!defined('ABSPATH')) { exit; } ?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head><meta charset="<?php bloginfo('charset'); ?>"><meta name="viewport" content="width=device-width, initial-scale=1"><?php wp_head(); ?></head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<a class="skip-link" href="#main-content"><?php esc_html_e('Skip to content', 'splace-assessment'); ?></a>
<header><nav class="navbar navbar-expand-lg bg-white border-bottom" aria-label="<?php esc_attr_e('Main navigation', 'splace-assessment'); ?>">
<div class="container py-2">
<a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#primaryNav" aria-controls="primaryNav" aria-expanded="false" aria-label="<?php esc_attr_e('Toggle navigation', 'splace-assessment'); ?>"><span class="navbar-toggler-icon"></span></button>
<div class="collapse navbar-collapse" id="primaryNav"><ul class="navbar-nav ms-auto">
<li class="nav-item"><a class="nav-link" href="<?php echo esc_url(home_url('/#properties')); ?>">Properties</a></li>
<li class="nav-item"><a class="nav-link" href="<?php echo esc_url(home_url('/#reviews')); ?>">Reviews</a></li>
<li class="nav-item"><a class="nav-link" href="<?php echo esc_url(get_post_type_archive_link('splace_job')); ?>">Jobs</a></li>
</ul></div></div></nav></header>
