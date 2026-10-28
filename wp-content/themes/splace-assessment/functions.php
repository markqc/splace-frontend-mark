<?php
/** Theme setup and native Jobs administration. */
if (!defined('ABSPATH')) { exit; }
function splace_setup() {
    load_theme_textdomain('splace-assessment', get_template_directory() . '/languages');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5', ['search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script']);
    add_theme_support('automatic-feed-links');
    register_nav_menus(['primary' => __('Primary menu', 'splace-assessment')]);
}
add_action('after_setup_theme', 'splace_setup');
function splace_assets() {
    wp_enqueue_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', [], '5.3.3');
    wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css', [], '6.7.2');
    wp_enqueue_style('open-sans', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&display=swap', [], null);
    wp_enqueue_style('splace', get_stylesheet_uri(), ['bootstrap', 'font-awesome', 'open-sans'], '1.0.0');
    wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js', [], '5.3.3', true);
    wp_enqueue_script('splace', get_template_directory_uri() . '/assets/site.js', [], '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'splace_assets');
function splace_jobs_register() {
    register_post_type('splace_job', [
        'labels' => [
            'name' => __('Jobs', 'splace-assessment'), 'singular_name' => __('Job', 'splace-assessment'),
            'add_new_item' => __('Add New Job', 'splace-assessment'), 'edit_item' => __('Edit Job', 'splace-assessment'),
            'all_items' => __('All Jobs', 'splace-assessment'),
        ],
        'public' => true, 'has_archive' => 'jobs', 'rewrite' => ['slug' => 'jobs'],
        'show_in_rest' => true, 'menu_icon' => 'dashicons-businessperson',
        'supports' => ['title', 'editor', 'thumbnail', 'revisions', 'custom-fields'],
    ]);
    foreach (['salary', 'location'] as $field) {
        register_post_meta('splace_job', '_splace_' . $field, [
            'type' => 'string', 'single' => true, 'show_in_rest' => true,
            'sanitize_callback' => 'sanitize_text_field',
            'auth_callback' => static function ($allowed, $meta_key, $post_id) {
                return current_user_can('edit_post', $post_id);
            },
        ]);
    }
}
add_action('init', 'splace_jobs_register');
function splace_activate() { splace_jobs_register(); flush_rewrite_rules(); }
add_action('after_switch_theme', 'splace_activate');
function splace_job_title_placeholder($title, $post) {
    return $post->post_type === 'splace_job' ? __('Job Title', 'splace-assessment') : $title;
}
add_filter('enter_title_here', 'splace_job_title_placeholder', 10, 2);
function splace_job_metaboxes() {
    add_meta_box('splace-job-details', __('Job Details', 'splace-assessment'), 'splace_job_metabox', 'splace_job', 'normal', 'high');
}
add_action('add_meta_boxes', 'splace_job_metaboxes');
function splace_job_metabox($post) {
    wp_nonce_field('splace_save_job', 'splace_job_nonce');
    echo '<p>' . esc_html__('Use the Job Title field above as the job title. Add the job description in the editor.', 'splace-assessment') . '</p>';
    foreach (['salary' => __('Salary', 'splace-assessment'), 'location' => __('Location', 'splace-assessment')] as $key => $label) {
        echo '<p><label for="splace-' . esc_attr($key) . '"><strong>' . esc_html($label) . '</strong></label><br>';
        echo '<input class="widefat" type="text" maxlength="200" id="splace-' . esc_attr($key) . '" name="splace_' . esc_attr($key) . '" value="' . esc_attr(get_post_meta($post->ID, '_splace_' . $key, true)) . '"></p>';
    }
}
function splace_save_job($post_id) {
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) { return; }
    if (wp_is_post_revision($post_id) || !current_user_can('edit_post', $post_id)) { return; }
    if (!isset($_POST['splace_job_nonce']) || !is_string($_POST['splace_job_nonce']) || !wp_verify_nonce(sanitize_text_field(wp_unslash($_POST['splace_job_nonce'])), 'splace_save_job')) { return; }
    foreach (['salary', 'location'] as $key) {
        $input = 'splace_' . $key;
        // An absent field is not a request to clear saved data (e.g. Quick Edit).
        if (!array_key_exists($input, $_POST) || !is_string($_POST[$input])) { continue; }
        $value = sanitize_text_field(wp_unslash($_POST[$input]));
        if ($value === '') { delete_post_meta($post_id, '_splace_' . $key); }
        else { update_post_meta($post_id, '_splace_' . $key, $value); }
    }
}
add_action('save_post_splace_job', 'splace_save_job');
function splace_job_details() {
    echo '<dl class="job-details">';
    foreach (['salary' => __('Salary', 'splace-assessment'), 'location' => __('Location', 'splace-assessment')] as $key => $label) {
        $value = get_post_meta(get_the_ID(), '_splace_' . $key, true);
        echo '<dt>' . esc_html($label) . '</dt><dd>' . esc_html($value !== '' ? $value : __('Not specified', 'splace-assessment')) . '</dd>';
    }
    echo '</dl>';
}
function splace_meta_description() {
    if (is_front_page()) { $description = 'Explore featured properties and read our demonstration client reviews.'; }
    elseif (is_post_type_archive('splace_job')) { $description = 'Explore current job openings, salaries, and locations.'; }
    elseif (is_singular()) { $description = wp_trim_words(wp_strip_all_tags(get_the_excerpt()), 25, ''); }
    else { return; }
    if ($description !== '') { echo '<meta name="description" content="' . esc_attr($description) . '">' . "\n"; }
}
add_action('wp_head', 'splace_meta_description');
