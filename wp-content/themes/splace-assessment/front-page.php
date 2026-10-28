<?php
if (!defined('ABSPATH')) { exit; }
get_header();
$properties = [
    ['17 Carter Villas, Brockenhurst', '£1,600 PCM', 'Let Agreed', 'agreed', 2, 0, 'Other', 'Now', 'living-room.svg', 'Illustration of a bright living room'],
    ['56 Dumpton Cross, Exeter', '£1,400 PCM', 'To Let', '', 4, 4, 'House', 'November 6, 2022', 'house.svg', 'Illustration of a detached house with a garden'],
    ['118 Kingsdale Ford, Sherborne', '£290,000', 'For Sale', '', 5, 1, 'House', 'For Sale', 'bedroom.svg', 'Illustration of a bedroom with blue accents'],
];
?>
<main id="main-content">
<section class="container py-5" id="properties" aria-labelledby="property-heading">
<h1 class="section-title" id="property-heading">Our Featured Listing</h1>
<div class="row g-4">
<?php foreach ($properties as $p) : ?>
<div class="col-12 col-md-6 col-lg-4"><article class="property-card">
<div class="property-photo"><img src="<?php echo esc_url(get_template_directory_uri() . '/assets/' . $p[8]); ?>" alt="<?php echo esc_attr($p[9]); ?>" width="600" height="400" fetchpriority="high">
<div class="property-price"><strong><?php echo esc_html($p[1]); ?></strong><span class="property-status <?php echo esc_attr($p[3]); ?>"><?php echo esc_html($p[2]); ?></span></div></div>
<div class="property-body"><h2><?php echo esc_html($p[0]); ?></h2>
<div class="property-meta"><span><?php echo esc_html($p[4]); ?> Bedrooms</span><span><?php echo esc_html($p[5]); ?> Bathrooms</span><span><?php echo esc_html($p[6]); ?></span></div>
<div class="property-bottom"><button class="favorite" type="button" aria-pressed="false" aria-label="<?php echo esc_attr('Save ' . $p[0] . ' to favorites'); ?>"><i class="fa-regular fa-heart" aria-hidden="true"></i></button><span class="availability"><i class="fa-regular fa-calendar me-2" aria-hidden="true"></i>Available: <?php echo esc_html($p[7]); ?></span></div>
</div></article></div>
<?php endforeach; ?>
</div><p class="demo-note">Assessment demo listings. Illustrations are bundled placeholders for the reference photographs.</p>
</section>
<section class="reviews" id="reviews" aria-labelledby="review-heading"><div class="container">
<div class="reviews-heading"><h2 id="review-heading">Google</h2><p>Reviews <span aria-label="5 out of 5 stars">★★★★★</span></p></div>
<div class="review-slider" role="region" aria-roledescription="carousel" aria-label="Demonstration customer reviews">
<div class="review-window"><div class="review-track" id="review-track">
<?php
$authors = ['Phil Mitchel', 'Karl Pilkington', 'Simon Pegg', 'Alex Morgan', 'Jamie Taylor', 'Sam Wilson'];
$reviews = [
    'The team kept us informed throughout the process. Every question was answered clearly, and arranging a viewing was straightforward.',
    'Friendly, professional service from the first call to the final paperwork. We appreciated the regular updates and attention to detail.',
    'A smooth experience with a helpful team. They listened to what we needed and made the next steps easy to understand.',
    'Our questions were handled promptly, and the communication was excellent. We felt supported throughout the entire process.',
    'The property information was clear and the viewing was well organised. A reliable team that was easy to work with.',
    'Helpful advice and a straightforward process. Thank you for making the experience feel manageable from beginning to end.',
];
foreach ($authors as $i => $author) : ?>
<div class="review-slide" role="group" aria-roledescription="slide" aria-label="<?php echo esc_attr(($i + 1) . ' of 6'); ?>">
<figure class="m-0"><blockquote class="review-quote"><div class="stars" aria-label="5 out of 5 stars"><i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i><i class="fa-solid fa-star" aria-hidden="true"></i></div><p><?php echo esc_html($reviews[$i]); ?></p></blockquote><figcaption class="review-author"><i class="fa-brands fa-google me-1" aria-hidden="true"></i><?php echo esc_html($author); ?></figcaption></figure>
</div>
<?php endforeach; ?>
</div></div>
<div class="review-controls"><button type="button" data-review-prev aria-label="Previous reviews" aria-controls="review-track">&#8592;</button><div class="d-flex gap-2" data-review-dots></div><button type="button" data-review-next aria-label="Next reviews" aria-controls="review-track">&#8594;</button></div>
<p class="visually-hidden" data-review-status aria-live="polite" aria-atomic="true"></p>
</div><p class="demo-note">Six fictional reviews for assessment demonstration; not live Google reviews.</p>
</div></section>
</main>
<?php get_footer(); ?>
