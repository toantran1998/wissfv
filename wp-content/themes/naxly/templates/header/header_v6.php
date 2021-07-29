<?php
$options = naxly_WSH()->option();
$allowed_html = wp_kses_allowed_html( 'post' );

$image_logo3 = $options->get( 'image_normal_logo3' );
$logo_dimension3 = $options->get( 'normal_logo_dimension3' );

$image_logo12 = $options->get( 'image_normal_logo12' );
$logo_dimension12 = $options->get( 'normal_logo_dimension12' );

$image_logo13 = $options->get( 'image_normal_logo13' );
$logo_dimension13 = $options->get( 'normal_logo_dimension13' );

$logo_type = '';
$logo_text = '';
$logo_typography = '';
?>

<!-- search-popup -->
<div id="search-popup" class="search-popup">
    <div class="close-search"><span><?php esc_html_e('Close', 'naxly'); ?></span></div>
    <div class="popup-inner">
        <div class="overlay-layer"></div>
        <div class="search-form">
            <?php get_template_part('searchform1')?>
        </div>
    </div>
</div>
<!-- search-popup end -->

<!-- main header -->
<header class="main-header style-one">
    <div class="auto-container">
        <div class="row clearfix">
            <div class="col-lg-3 col-md-12 col-sm-12 logo-column">
                <div class="logo-box">
                    <figure class="logo"><?php echo naxly_logo( $logo_type, $image_logo12, $logo_dimension12, $logo_text, $logo_typography ); ?></figure>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 col-sm-12 outer-column">
                <div class="outer-box <?php if(! $options->get('show_topbar_6') ) echo 'm-t20';?>">
                    <?php if( $options->get('show_topbar_6') ):?>
                    <div class="header-top clearfix">
                        <div class="top-right pull-right clearfix">
                            <?php if( $options->get('header_v6_phone') ):?>
                            <div class="support"><i class="flaticon-music"></i><span><?php esc_html_e('Start your project today', 'naxly'); ?></span><a href="tel:<?php echo esc_url($options->get( 'header_v6_phone' ));?>"><?php echo wp_kses($options->get( 'header_v6_phone' ), $allowed_html);?></a></div>
                            <?php endif;?>
                            
                            <?php
								$icons = $options->get( 'header_v6_social_share' );
								if ( ! empty( $icons ) ) :
							?> 
                            <ul class="social-links clearfix">
                                <?php
								foreach ( $icons as $h_icon ) :
									$header_social_icons = json_decode( urldecode( naxly_set( $h_icon, 'data' ) ) );
									if ( naxly_set( $header_social_icons, 'enable' ) == '' ) {
										continue;
									}
									$icon_class = explode( '-', naxly_set( $header_social_icons, 'icon' ) );
									?>
									<li><a href="<?php echo esc_url(naxly_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(naxly_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(naxly_set( $header_social_icons, 'color' )); ?>"><i class="fab <?php echo esc_attr( naxly_set( $header_social_icons, 'icon' ) ); ?>"></i></a></li>
								<?php endforeach; ?>
                            </ul>
                            <?php endif; ?>
                            
                            <?php if( $options->get('header_v6_search_icon') ):?>
                            <div class="search-box-outer">
                                <form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="post" class="search-btn">
                                    <button type="button" class="search-toggler"><i class="flaticon-search"></i><?php esc_html_e('Search', 'naxly'); ?></button>
                                </form>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="header-upper clearfix">
                        <div class="menu-area pull-right clearfix">
                            <!--Mobile Navigation Toggler-->
                            <div class="mobile-nav-toggler">
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                                <i class="icon-bar"></i>
                            </div>
                            <nav class="main-menu navbar-expand-md navbar-light">
                                <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                                    <ul class="navigation clearfix">
                                        <?php wp_nav_menu( array( 'theme_location' => 'main_menu', 'container_id' => 'navbar-collapse-1',
											'container_class'=>'navbar-collapse collapse navbar-right',
											'menu_class'=>'nav navbar-nav',
											'fallback_cb'=>false, 
											'items_wrap' => '%3$s', 
											'container'=>false,
											'depth'=>'3',
											'walker'=> new Bootstrap_walker()  
										) ); ?>
                                    </ul>
                                </div>
                            </nav>
                            
                            <?php if( $options->get('header_v6_btn_show') ):?>
                   			<div class="btn-box">
                                <a href="<?php echo esc_url($options->get('header_v6_btn_link'));?>" class="theme-btn style-one"><?php echo wp_kses($options->get('header_v6_btn_title'), $allowed_html);?></a>
                            </div>
                            <?php endif;?>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="auto-container clearfix">
            <figure class="logo-box"><img src="<?php echo esc_url( get_template_directory_uri(). '/assets/images/logo-6.png' ); ?>" alt="<?php esc_attr_e( 'Awesome Image', 'naxly' );?>"></figure>
            <div class="menu-area">
                <nav class="main-menu clearfix">
                    <!--Keep This Empty / Menu will come through Javascript-->
                </nav>
                
                <?php if( $options->get('header_v6_btn_show') ):?>
                <div class="btn-box">
                    <a href="<?php echo esc_url($options->get('header_v6_btn_link'));?>" class="theme-btn style-one"><?php echo wp_kses($options->get('header_v6_btn_title'), $allowed_html);?></a>
                </div>
                <?php endif;?>
                
            </div>
        </div>
    </div>
</header>
<!-- main-header end -->

<!-- Mobile Menu  -->
<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>
    
    <nav class="menu-box">
        <div class="nav-logo"><?php echo naxly_logo( $logo_type, $image_logo3, $logo_dimension3, $logo_text, $logo_typography ); ?></div>
        <div class="menu-outer"><!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header--></div>
        <div class="contact-info">
            <?php if( $options->get('contact_info_title_v1') ):?><h4><?php echo wp_kses( $options->get('contact_info_title_v1'), $allowed_html );?></h4><?php endif; ?>
            <ul>
                <?php if( $options->get('header_v1_address') ):?><li><?php echo wp_kses( $options->get( 'header_v1_address' ), $allowed_html );?></li><?php endif; ?>
                <?php if( $options->get('header_v1_phone2') ):?><li><a href="tel:<?php echo esc_url( $options->get( 'header_v1_phone2' ));?>"><?php echo wp_kses( $options->get( 'header_v1_phone2' ), $allowed_html );?></a></li><?php endif; ?>
                <?php if( $options->get('header_v1_email') ):?><li><a href="mailto:<?php echo esc_url( $options->get( 'header_v1_email' ));?>"><?php echo wp_kses( $options->get( 'header_v1_email' ), $allowed_html );?></a></li><?php endif; ?>
            </ul>
        </div>
        
		<?php
			$icons = $options->get( 'header_v1_social_share2' );
			if ( ! empty( $icons ) ) :
		?>
        <div class="social-links">
            <ul class="clearfix">
                <?php
				foreach ( $icons as $h_icon ) :
					$header_social_icons = json_decode( urldecode( naxly_set( $h_icon, 'data' ) ) );
					if ( naxly_set( $header_social_icons, 'enable' ) == '' ) {
						continue;
					}
					$icon_class = explode( '-', naxly_set( $header_social_icons, 'icon' ) );
					?>
					<li><a href="<?php echo esc_url(naxly_set( $header_social_icons, 'url' )); ?>" style="background-color:<?php echo esc_attr(naxly_set( $header_social_icons, 'background' )); ?>; color: <?php echo esc_attr(naxly_set( $header_social_icons, 'color' )); ?>"><span class="fab <?php echo esc_attr( naxly_set( $header_social_icons, 'icon' ) ); ?>"></span></a></li>
				<?php endforeach; ?>
            </ul>
        </div>
        <?php endif;?>
    </nav>
</div><!-- End Mobile Menu -->