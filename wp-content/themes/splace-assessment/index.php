<?php if (!defined('ABSPATH')) { exit; } get_header(); ?>
<main id="main-content" class="container py-5">
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article <?php post_class('mb-5'); ?>><?php if (is_singular()) : ?><h1><?php the_title(); ?></h1><?php else : ?><h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2><?php endif; ?><div class="entry-content"><?php the_content(); wp_link_pages(); ?></div></article>
<?php endwhile; the_posts_pagination(); else : ?><h1>Nothing found</h1><p>Please try another page.</p><?php endif; ?>
</main><?php get_footer(); ?>
