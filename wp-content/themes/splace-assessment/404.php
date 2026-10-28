<?php if (!defined('ABSPATH')) { exit; } get_header(); ?>
<main id="main-content" class="container py-5"><h1>Page not found</h1><p>The page may have moved. <a href="<?php echo esc_url(home_url('/')); ?>">Return home</a> or <a href="<?php echo esc_url(get_post_type_archive_link('splace_job')); ?>">browse jobs</a>.</p></main><?php get_footer(); ?>
