<?php if (!defined('ABSPATH')) { exit; } get_header(); ?>
<main id="main-content" class="container py-5">
<a href="<?php echo esc_url(get_post_type_archive_link('splace_job')); ?>">&larr; All jobs</a>
<?php while (have_posts()) : the_post(); ?><article <?php post_class('job-card mt-4'); ?>>
<h1 class="page-heading mb-4"><?php the_title(); ?></h1><?php splace_job_details(); ?>
<div class="entry-content"><?php the_content(); wp_link_pages(); ?></div>
</article><?php endwhile; ?></main><?php get_footer(); ?>
