<?php if (!defined('ABSPATH')) { exit; } get_header(); ?>
<main id="main-content" class="container py-5"><h1 class="page-heading mb-4">Current Jobs</h1>
<?php if (have_posts()) : ?><div class="row g-4">
<?php while (have_posts()) : the_post(); ?><div class="col-12 col-md-6"><article <?php post_class('job-card'); ?>>
<h2 class="h4"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
<?php splace_job_details(); ?><div class="entry-content"><?php the_excerpt(); ?></div>
<a href="<?php the_permalink(); ?>">View job<span class="visually-hidden">: <?php the_title(); ?></span> &rarr;</a>
</article></div><?php endwhile; ?></div><div class="mt-4"><?php the_posts_pagination(); ?></div>
<?php else : ?><p>No job openings are currently available. Please check back soon.</p><?php endif; ?>
</main><?php get_footer(); ?>
