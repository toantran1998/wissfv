<?php

/**
 * Blog Content Template
 *
 * @package    WordPress
 * @subpackage NAXLY
 * @author     Theme Kalia
 * @version    1.0
 */

if ( class_exists( 'Naxly_Resizer' ) ) {
	$img_obj = new Naxly_Resizer();
} else {
	$img_obj = array();
}
$allowed_tags = wp_kses_allowed_html('post');
?>

<?php
	global $post;
    $post_thumbnail_id = get_post_thumbnail_id($post->ID);
    $post_thumbnail_url = wp_get_attachment_url($post_thumbnail_id);
?>

<?php
    $format = get_post_format(get_the_id());
    if ($format == 'quote') :
?>

<div class="news-block-two wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
    <div class="inner-box">
        <figure class="image-box">
            <img src="<?php echo esc_url($post_thumbnail_url);?>" alt="<?php esc_attr_e('Awesome Image', 'naxly'); ?>">
            <a href="<?php echo esc_url($post_thumbnail_url);?>" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-zoom"></i></a>
            <div class="btn-box"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php esc_html_e('Read More', 'naxly'); ?><span><?php esc_html_e('+', 'naxly'); ?></span></a></div>
        </figure>
    </div>
</div>

<?php else: ?>
<div <?php post_class(); ?>>
    <div class="news-block-one wow fadeInUp" data-wow-delay="00ms" data-wow-duration="1500ms">
        <div class="inner-box">
            <?php if( has_post_thumbnail() ):?>
            <figure class="image-box m-b30">
                <?php the_post_thumbnail('naxly_1170x250'); ?>
                <a href="<?php echo esc_url($post_thumbnail_url);?>" class="lightbox-image" data-fancybox="gallery"><i class="flaticon-zoom"></i></a>
            </figure>
            <?php endif;?>
            <div class="lower-content">
                <div class="title-box">
                    <?php if ( $data->get( 'archive_post_date', true ) ): ?>
                    
                    <?php endif;?>
                    <?php if( has_category() ):?>
                    <div class="file-box"><i class="far fa-folder-open"></i><p><?php the_category(', '); ?></p></div>
                    <?php endif;?>
                    <div class="file-box"><i class="far fa-calendar"></i><p><?php echo wp_kses( get_the_date(), true ); ?></p></div>
                    <h3><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>"><?php the_title(); ?></a></h3>
                </div>
                <div class="text">
                    <?php the_excerpt(); ?>
                </div>
                <div class="link"><a href="<?php echo esc_url( the_permalink( get_the_id() ) );?>" class="btn-style-four"><?php esc_html_e('Read More', 'naxly'); ?><span><?php esc_html_e('+', 'naxly'); ?></span></a></div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>