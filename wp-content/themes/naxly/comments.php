<?php
/**
 * Comments Main File.
 *
 * @package NAXLY
 * @author  Theme Kalia
 * @version 1.0
 */
?>
<?php
if ( post_password_required() ) {
	return;
}
?>
<?php $count = wp_count_comments(get_the_ID()); ?>

<?php if ( have_comments() ) : ?>
	
    <div class="inner-comment-box comments-area post-comments" id="comments">
	
    <div class="group-title">
    	<h3><?php esc_html_e('Comments', 'naxly'); ?></h3>
    </div>
    
    <div class="comment-box">
		<?php
			wp_list_comments( array(
				'style'       => 'div',
				'short_ping'  => true,
				'avatar_size' => 70,
				'callback'    => 'naxly_list_comments',
			) );
        ?>
    </div>
    
	<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
    <nav class="navigation comment-navigation" role="navigation">
        <h1 class="screen-reader-text section-heading">
            <?php esc_html_e( 'Comment navigation', 'naxly' ); ?>
        </h1>
        <div class="nav-previous">
            <?php previous_comments_link( esc_html__( '&larr; Older Comments', 'naxly' ) ); ?>
        </div>
        <div class="nav-next">
            <?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'naxly' ) ); ?>
        </div>
    </nav><!-- .comment-navigation -->
    <?php endif; ?>
    
	<?php if ( ! comments_open() && get_comments_number() ) : ?>
    <p class="no-comments">
        <?php esc_html_e( 'Comments are closed.', 'naxly' ); ?>
    </p>
	<?php endif; ?>

</div>
<?php endif; ?>

<?php naxly_comment_form(); ?>