<?php get_header(); ?>

<?php
// Get all ACF fields
$announcement      = get_field('announcement_text');
$hero_image        = get_field('hero_banner_image');
$hero_heading      = get_field('hero_heading');
$hero_subheading   = get_field('hero_subheading');
$hero_btn_text     = get_field('hero_button_text');
$hero_btn_link     = get_field('hero_button_link');
$brand_logo_1      = get_field('brand_logo_1');
$brand_logo_2      = get_field('brand_logo_2');
$brand_logo_3      = get_field('brand_logo_3');
$brand_logo_4      = get_field('brand_logo_4');
$brand_logo_5      = get_field('brand_logo_5');
$category_id       = get_field('new_arrivals_category');

// Get image URL helper
function get_img_url($img) {
    if (!$img) return '';
    if (is_array($img)) return $img['url'];
    if (is_numeric($img)) {
        $src = wp_get_attachment_image_src($img, 'full');
        return $src ? $src[0] : '';
    }
    return $img;
}
?>

<!-- Announcement Bar -->
<div class="announcement-bar">
    <p><?php echo esc_html($announcement ?: 'Free Shipping on orders over $50!'); ?></p>
</div>

<!-- Header -->
<header class="site-header">
    <a href="<?php echo home_url(); ?>" class="logo">
        <?php bloginfo('name'); ?>
    </a>
    <span class="menu-icon">☰</span>
</header>

<!-- Hero Banner -->
<section class="hero-banner">
    <?php $img_url = get_img_url($hero_image); ?>
    <img src="<?php echo $img_url ? esc_url($img_url) : 'https://via.placeholder.com/430x450'; ?>" 
         alt="Hero Banner" loading="lazy">
    <div class="hero-content">
        <h1><?php echo esc_html($hero_heading ?: 'New Collection 2024'); ?></h1>
        <p><?php echo esc_html($hero_subheading ?: 'Discover the latest trends'); ?></p>
        <a href="<?php echo esc_url($hero_btn_link ?: '#'); ?>" class="shop-btn">
            <?php echo esc_html($hero_btn_text ?: 'Shop Now'); ?>
        </a>
    </div>
</section>

<!-- Brand Logos -->
<section class="brand-bar">
    <?php
    $logos = array($brand_logo_1, $brand_logo_2, $brand_logo_3, $brand_logo_4, $brand_logo_5);
    $found = false;
    foreach ($logos as $logo) {
        $url = get_img_url($logo);
        if ($url) {
            $found = true;
            echo '<img src="' . esc_url($url) . '" alt="Brand" class="brand-logo-img" loading="lazy">';
        }
    }
    if (!$found) {
        $brands = array('VERSACE', 'ZARA', 'GUCCI', 'PRADA', 'Calvin Klein');
        foreach ($brands as $brand) {
            echo '<span class="brand-name">' . esc_html($brand) . '</span>';
        }
    }
    ?>
</section>

<!-- New Arrivals -->
<section class="new-arrivals">
    <h2>New Arrivals</h2>
    <div class="products-grid">
        <?php
        $args = array(
            'post_type'      => 'product',
            'posts_per_page' => 2,
            'orderby'        => 'date',
            'order'          => 'DESC',
        );

        if (!empty($category_id) && is_numeric($category_id)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => intval($category_id),
                ),
            );
        }

        $query = new WP_Query($args);

        if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                $product   = wc_get_product(get_the_ID());
                $price     = $product ? $product->get_price_html() : '';
                $thumb     = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                $title     = get_the_title();
                $link      = get_permalink();
        ?>
        <div class="product-card">
            <a href="<?php echo esc_url($link); ?>">
                <img src="<?php echo esc_url($thumb); ?>" 
                     alt="<?php echo esc_attr($title); ?>" loading="lazy">
            </a>
            <h4><?php echo esc_html($title); ?></h4>
            <?php if ($price) : ?>
                <p class="price"><?php echo $price; ?></p>
            <?php endif; ?>
        </div>
        <?php
            endwhile;
            wp_reset_postdata();
        else :
        ?>
            <p>No products found.</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>