<?php
///----Blog widgets---
//Popular Post 
class Naxly_Popular_Post extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Naxly_Popular_Post', /* Name */esc_html__('Naxly Popular Post','naxly'), array( 'description' => esc_html__('Show the Popular Post', 'naxly' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        
        <!-- Popular Posts -->
        <div class="sidebar-post">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="post-inner">
                <?php $query_string = 'posts_per_page='.$instance['number'];
					if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
					 
					$this->posts($query_string);
				?>
            </div>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Popular Post', 'naxly');
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'naxly'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'naxly'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'naxly'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'naxly'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('categories')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php while( $query->have_posts() ): $query->the_post(); ?>
            <div class="post">
                <div class="post-date"><p><?php echo get_the_date('d');?></p><span><?php echo get_the_date('M');?></span></div>
                <div class="file-box"><i class="far fa-folder-open"></i><p><?php the_category(' '); ?></p></div>
                <h5><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php the_title(); ?></a></h5>
            </div>
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

//Our Project
class Naxly_Our_Projects extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Naxly_Our_Projects', /* Name */esc_html__('Naxly Our Projects','naxly'), array( 'description' => esc_html__('Show the Our Projects', 'naxly' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!-- instagram -->
        <div class="sidebar-instagram">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="widget-content">
                <ul class="image-list clearfix">
                    <li class="clearfix">
                        <?php 
							$args = array('post_type' => 'naxly_project', 'showposts'=>$instance['number']);
							if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'project_cat','field' => 'id','terms' => (array)$instance['cat']));
							 
							$this->posts($args);
						?>
                    </li>
                </ul>
            </div>
        </div>
		
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Our Projects';
		$number = ( $instance ) ? esc_attr($instance['number']) : 6;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('Our Projects', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'naxly'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'naxly'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'naxly'), 'selected'=>$cat, 'taxonomy' => 'project_cat', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
		
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
            <?php while( $query->have_posts() ): $query->the_post(); 
				global $post ; 
			?>
            <figure class="image"><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'project_link', true ));?>"><?php the_post_thumbnail('naxly_105x105'); ?></a></figure>
            <?php endwhile; ?>
                
        <?php endif;
		wp_reset_postdata();
    }
}

//Subscribe Form
class Naxly_Subscribe_Form extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Naxly_Subscribe_Form', /* Name */esc_html__('Naxly Subscribe Form','naxly'), array( 'description' => esc_html__('Show the Subscribe Form', 'naxly' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="sidebar-subscribe">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="widget-content">
                    <p><?php echo wp_kses_post($instance['content']); ?></p>
                    <form action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8" class="subscribe-form">
                        <div class="form-group">
                            <i class="far fa-envelope"></i>
                            <input type="hidden" id="uri3" name="uri" value="<?php echo wp_kses_post($instance['id']); ?>">
                            <input type="email" name="email" placeholder="<?php esc_html_e('Email Address...', 'naxly'); ?>" required="">
                            <button type="submit"><i class="fas fa-rss"></i><?php esc_html_e('Subscribe', 'naxly'); ?></button>
                        </div>
                    </form>
                </div>
            </div>
        
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		$instance['id'] = $new_instance['id'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'About Company';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$id = ($instance) ? esc_attr($instance['id']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('Subscribe Us', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'naxly'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('id')); ?>"><?php esc_html_e('Enter FeedBurner ID:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('themeforest', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('id')); ?>" name="<?php echo esc_attr($this->get_field_name('id')); ?>" type="text" value="<?php echo esc_attr($id); ?>" />
        </p>
               
                
		<?php 
	}
	
}


///----footer widgets---
//Contact Us
class Naxly_Contact_Us extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Naxly_Contact_Us', /* Name */esc_html__('Naxly Contact Us','naxly'), array( 'description' => esc_html__('Show the information about company', 'naxly' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="contact-widget">
                
				<?php echo wp_kses_post($before_title.$title.$after_title); ?>
                
                <div class="widget-content">
                    <div class="box">
                        <h5><?php echo wp_kses_post($instance['subtitle']); ?></h5>
                        <p><?php echo wp_kses_post($instance['address']); ?></p>
                    </div>
                    <div class="box">
                        <h5><?php echo wp_kses_post($instance['subtitle1']); ?></h5>
                        <ul class="clearfix">
                            <li><i class="flaticon-music"></i><a href="tel:<?php echo esc_url($instance['phone_no']); ?>"><?php echo wp_kses_post($instance['phone_no']); ?></a></li>
                            <li><i class="flaticon-gmail"></i><a href="mailto:<?php echo esc_url($instance['email_address']); ?>"><?php echo wp_kses_post($instance['email_address']); ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['subtitle'] = $new_instance['subtitle'];
		$instance['address'] = $new_instance['address'];
		$instance['subtitle1'] = $new_instance['subtitle1'];
		$instance['phone_no'] = $new_instance['phone_no'];
		$instance['email_address'] = $new_instance['email_address'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Contact Us';
		$subtitle = ($instance) ? esc_attr($instance['subtitle']) : '';
		$address = ($instance) ? esc_attr($instance['address']) : '';
		$subtitle1 = ($instance) ? esc_attr($instance['subtitle1']) : '';
		$phone_no = ($instance) ? esc_attr($instance['phone_no']) : '';
		$email_address = ($instance) ? esc_attr($instance['email_address']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('Contact Us', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('subtitle')); ?>"><?php esc_html_e('Enter Sub Title:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('Office Location', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('subtitle')); ?>" name="<?php echo esc_attr($this->get_field_name('subtitle')); ?>" type="text" value="<?php echo esc_attr($subtitle); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'naxly'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" ><?php echo wp_kses_post($address); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('subtitle1')); ?>"><?php esc_html_e('Enter Sub Title:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('Quick Contact', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('subtitle1')); ?>" name="<?php echo esc_attr($this->get_field_name('subtitle1')); ?>" type="text" value="<?php echo esc_attr($subtitle1); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_no')); ?>"><?php esc_html_e('Phone Number:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('+00 555 67 890', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_no')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_no')); ?>" type="text" value="<?php echo esc_attr($phone_no); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_address')); ?>"><?php esc_html_e('Email Addess:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('supportteam@info.com', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email_address')); ?>" name="<?php echo esc_attr($this->get_field_name('email_address')); ?>" type="text" value="<?php echo esc_attr($email_address); ?>" />
        </p>
               
                
		<?php 
	}
	
}

//About Company
class Naxly_About_Company extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Naxly_About_Company', /* Name */esc_html__('Naxly About Company','naxly'), array( 'description' => esc_html__('Show the About Company', 'naxly' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="about-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="widget-content">
                    <div class="box">
                        <figure class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($instance['widget_logo_img']); ?>" alt="<?php esc_attr_e('Awesome Image', 'naxly'); ?>"></a></figure>
                        <div class="text">
                            <p><?php echo wp_kses_post($instance['content']); ?></p>
                        </div>
                    </div>
                    <div class="subscribe-box">
                        <form action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8">
                            <div class="form-group">
                                <input type="hidden" id="uri2" name="uri" value="<?php echo wp_kses_post($instance['id']); ?>">
                                <input type="email" name="email" placeholder="<?php esc_html_e('Email Address...', 'naxly'); ?>" required="">
                                <button type="submit" class="theme-btn style-one"><?php esc_html_e('Subscribe', 'naxly'); ?></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['widget_logo_img'] = $new_instance['widget_logo_img'];
		$instance['content'] = $new_instance['content'];
		$instance['id'] = $new_instance['id'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'About Company';
		$widget_logo_img = ($instance) ? esc_attr($instance['widget_logo_img']) : 'http://el.commonsupport.com/newwp/naxly/wp-content/uploads/2020/03/footer-logo.png';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$id = ($instance) ? esc_attr($instance['id']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('About Company', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('widget_logo_img')); ?>"><?php esc_html_e('Logo Image Url:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_logo_img')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_logo_img')); ?>" type="text" value="<?php echo esc_attr($widget_logo_img); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'naxly'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('id')); ?>"><?php esc_html_e('Enter FeedBurner ID:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('themeforest', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('id')); ?>" name="<?php echo esc_attr($this->get_field_name('id')); ?>" type="text" value="<?php echo esc_attr($id); ?>" />
        </p>
               
                
		<?php 
	}
	
}


///----footer Two widgets---
//Trending Post 
class Naxly_Trending_Post extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Naxly_Trending_Post', /* Name */esc_html__('Naxly Trending Post','naxly'), array( 'description' => esc_html__('Show the Trending Post', 'naxly' )) );
	}
 

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        
        <!-- Trending Posts -->
        <div class="post-widget">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="widget-content">
                <?php $query_string = 'posts_per_page='.$instance['number'];
					if( $instance['cat'] ) $query_string .= '&cat='.$instance['cat'];
					 
					$this->posts($query_string);
				?>
            </div>
        </div>
        
		<?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ( $instance ) ? esc_attr($instance['title']) : esc_html__('Trending Post', 'naxly');
		$number = ( $instance ) ? esc_attr($instance['number']) : 2;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
			
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title: ', 'naxly'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('No. of Posts:', 'naxly'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
       
    	<p>
            <label for="<?php echo esc_attr($this->get_field_id('categories')); ?>"><?php esc_html_e('Category', 'naxly'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'naxly'), 'selected'=>$cat, 'class'=>'widefat', 'name'=>$this->get_field_name('categories')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($query_string)
	{
		
		$query = new WP_Query($query_string);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
			<?php while( $query->have_posts() ): $query->the_post(); ?>
            <div class="post">
                <div class="post-date"><p><?php echo get_the_date('d');?></p><span><?php echo get_the_date('M');?></span></div>
                <div class="file-box"><i class="far fa-folder-open"></i><p><?php the_category(' '); ?></p></div>
                <h5><a href="<?php echo esc_url(get_the_permalink(get_the_id()));?>"><?php the_title(); ?></a></h5>
            </div>
            <?php endwhile; ?>
            
        <?php endif;
		wp_reset_postdata();
    }
}

//Latest Works
class Naxly_Latest_Works extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Naxly_Latest_Works', /* Name */esc_html__('Naxly Latest Works','naxly'), array( 'description' => esc_html__('Show the Latest Works', 'naxly' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!-- Gallery -->
        <div class="gallery-widget">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="widget-content">
                <ul class="list clearfix">
                    <?php 
						$args = array('post_type' => 'naxly_project', 'showposts'=>$instance['number']);
						if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'project_cat','field' => 'id','terms' => (array)$instance['cat']));
						 
						$this->posts($args);
					?>
                </ul>
            </div>
        </div>
		
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Latest Work';
		$number = ( $instance ) ? esc_attr($instance['number']) : 8;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('Latest Work', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'naxly'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'naxly'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'naxly'), 'selected'=>$cat, 'taxonomy' => 'project_cat', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
		
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
            <?php while( $query->have_posts() ): $query->the_post(); 
				global $post ; 
			?>
            <li>
                <figure class="image-box">
                    <?php the_post_thumbnail('naxly_85x85'); ?>
                    <a href="<?php echo esc_url(get_post_meta( get_the_id(), 'project_link', true ));?>"><i class="flaticon-hyperlink"></i></a>
                </figure>
            </li>
            <?php endwhile; ?>
                
        <?php endif;
		wp_reset_postdata();
    }
}


///----footer Three widgets---
//About Company Two
class Naxly_About_Company_Two extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Naxly_About_Company_Two', /* Name */esc_html__('Naxly About Company Two','naxly'), array( 'description' => esc_html__('Show the About Company Two', 'naxly' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="about-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="widget-content">
                    <div class="text">
                        <p><?php echo wp_kses_post($instance['content']); ?></p>
                    </div>
                    <figure class="footer-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($instance['widget_logo_img']); ?>" alt="<?php esc_attr_e('Awesome Image', 'naxly'); ?>"></a></figure>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = $new_instance['content'];
		$instance['widget_logo_img'] = $new_instance['widget_logo_img'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'About Company';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$widget_logo_img = ($instance) ? esc_attr($instance['widget_logo_img']) : 'http://el.commonsupport.com/newwp/naxly/wp-content/uploads/2020/04/footer-logo-3.png';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('About Company', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'naxly'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('widget_logo_img')); ?>"><?php esc_html_e('Logo Image Url:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_logo_img')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_logo_img')); ?>" type="text" value="<?php echo esc_attr($widget_logo_img); ?>" />
        </p>
               
                
		<?php 
	}
	
}

//Footer Services
class Naxly_Footer_Services extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Naxly_Footer_Services', /* Name */esc_html__('Naxly Footer Services','naxly'), array( 'description' => esc_html__('Show the Footer Services', 'naxly' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget); ?>
		
        <!--Start Single sidebar-->
        <div class="links-widget">
            <?php echo wp_kses_post($before_title.$title.$after_title); ?>
            <div class="widget-content">
               <ul class="clearfix">
				   <?php 
                        $args = array('post_type' => 'naxly_service', 'showposts'=>$instance['number']);
                        if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'service_cat','field' => 'id','terms' => (array)$instance['cat']));
                         
                        $this->posts($args);
                    ?>
                </ul>
            </div>
        </div>
        
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Useful Links';
		$number = ( $instance ) ? esc_attr($instance['number']) : 5;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('Useful Links', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'naxly'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'naxly'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'naxly'), 'selected'=>$cat, 'taxonomy' => 'service_cat', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
		
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
            <?php while( $query->have_posts() ): $query->the_post(); 
				global $post ; 
			?>
            <li><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'ext_url', true ));?>"><?php the_title(); ?></a></li>
            <?php endwhile; ?>
                
        <?php endif;
		wp_reset_postdata();
    }
}

//Contact Us Two
class Naxly_Contact_Us_Two extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Naxly_Contact_Us_Two', /* Name */esc_html__('Naxly Contact Us Two','naxly'), array( 'description' => esc_html__('Show the information about company', 'naxly' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="contact-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="widget-content">
                    <ul class="clearfix"> 
                        <?php if($instance['phone_no']): ?>
                        <li>
                            <span><?php esc_html_e('Phone:', 'naxly'); ?></span>
                            <a href="tel:<?php echo esc_url($instance['phone_no']); ?>"><?php echo wp_kses_post($instance['phone_no']); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php if($instance['email_address']): ?>
                        <li>
                            <span><?php esc_html_e('Email:', 'naxly'); ?></span>
                            <a href="<?php echo esc_url($instance['email_address']); ?>"><?php echo wp_kses_post($instance['email_address']); ?></a>
                        </li>
                        <?php endif; ?>
                        <?php if($instance['address']): ?>
                        <li>
                            <span><?php esc_html_e('Address:', 'naxly'); ?></span>
                            <?php echo wp_kses_post($instance['address']); ?>
                        </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['phone_no'] = $new_instance['phone_no'];
		$instance['email_address'] = $new_instance['email_address'];
		$instance['address'] = $new_instance['address'];
		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Contact';
		$phone_no = ($instance) ? esc_attr($instance['phone_no']) : '';
		$email_address = ($instance) ? esc_attr($instance['email_address']) : '';
		$address = ($instance) ? esc_attr($instance['address']) : '';
		
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('Contact', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_no')); ?>"><?php esc_html_e('Phone Number:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('+00-555-67-890', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_no')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_no')); ?>" type="text" value="<?php echo esc_attr($phone_no); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_address')); ?>"><?php esc_html_e('Email Addess:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('info@example.com', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email_address')); ?>" name="<?php echo esc_attr($this->get_field_name('email_address')); ?>" type="text" value="<?php echo esc_attr($email_address); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'naxly'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" ><?php echo wp_kses_post($address); ?></textarea>
        </p>
        
               
                
		<?php 
	}
	
}

//Subscribe Form Two
class Naxly_Subscribe_Form_Two extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Naxly_Subscribe_Form_Two', /* Name */esc_html__('Naxly Subscribe Form Two','naxly'), array( 'description' => esc_html__('Show the Subscribe Form Two', 'naxly' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="subscribe-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="widget-content">
                    <div class="subscribe-form">
                        <form action="http://feedburner.google.com/fb/a/mailverify" accept-charset="utf-8" method="post">
                            <div class="form-group">
                                <input type="hidden" id="uri4" name="uri" value="<?php echo wp_kses_post($instance['id']); ?>">
                                <input type="email" name="email" placeholder="<?php esc_html_e('Email Address...', 'naxly'); ?>" required="">
                                <button type="submit" class="theme-btn style-six"><?php esc_html_e('Subscribe', 'naxly'); ?></button>
                            </div>
                        </form>
                    </div>
                    <?php if( $instance['show'] ): ?>
                    <ul class="social-links clearfix">
                        <?php echo wp_kses_post(naxly_get_social_icons()); ?>
                    </ul>
                    <?php endif; ?>
                </div>
            </div>
            
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['id'] = $new_instance['id'];
		$instance['show'] = $new_instance['show'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Subscribe';
		$id = ($instance) ? esc_attr($instance['id']) : '';
		$show = ( $instance ) ? esc_attr($instance['show']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('Subscribe Us', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('id')); ?>"><?php esc_html_e('Enter FeedBurner ID:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('themeforest', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('id')); ?>" name="<?php echo esc_attr($this->get_field_name('id')); ?>" type="text" value="<?php echo esc_attr($id); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'naxly'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>
               
                
		<?php 
	}
	
}


///----footer Four widgets---
//About Company Three
class Naxly_About_Company_Three extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Naxly_About_Company_Three', /* Name */esc_html__('Naxly About Company Three','naxly'), array( 'description' => esc_html__('Show the About Company Three', 'naxly' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		//$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="logo-widget">
                <figure class="footer-logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url($instance['widget_logo_img']); ?>" alt="<?php esc_attr_e('Awesome Image', 'naxly'); ?>"></a></figure>
                <div class="copyright">
                    <p><?php echo wp_kses_post($instance['content']); ?></p>
                </div>
                <?php if( $instance['show'] ): ?>
                <ul class="social-links clearfix">
                    <?php echo wp_kses_post(naxly_get_social_icons()); ?>
                </ul>
                <?php endif; ?>
                
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['widget_logo_img'] = $new_instance['widget_logo_img'];
		$instance['content'] = $new_instance['content'];
		$instance['show'] = $new_instance['show'];
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$widget_logo_img = ($instance) ? esc_attr($instance['widget_logo_img']) : 'http://el.commonsupport.com/newwp/naxly/wp-content/uploads/2020/04/footer-logo-4.png';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		$show = ( $instance ) ? esc_attr($instance['show']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('widget_logo_img')); ?>"><?php esc_html_e('Logo Image Url:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('Image Url', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('widget_logo_img')); ?>" name="<?php echo esc_attr($this->get_field_name('widget_logo_img')); ?>" type="text" value="<?php echo esc_attr($widget_logo_img); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'naxly'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('show')); ?>"><?php esc_html_e('Show Social Icons:', 'naxly'); ?></label>
			<?php $selected = ( $show ) ? ' checked="checked"' : ''; ?>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('show')); ?>"<?php echo esc_attr($selected); ?> name="<?php echo esc_attr($this->get_field_name('show')); ?>" type="checkbox" value="true" />
        </p>
               
                
		<?php 
	}
	
}

//Contact Us Three
class Naxly_Contact_Us_Three extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Naxly_Contact_Us_Three', /* Name */esc_html__('Naxly Contact Us Three','naxly'), array( 'description' => esc_html__('Show the information about company', 'naxly' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="contact-widget">
                <?php echo wp_kses_post($before_title.$title.$after_title); ?>
                <div class="widget-content">
                    <ul class="info-list clearfix">
                        <li><i class="flaticon-music"></i><a href="tel:<?php echo esc_url($instance['phone_no']); ?>"><?php echo wp_kses_post($instance['phone_no']); ?></a></li>
                        <li><i class="flaticon-gmail"></i><a href="mailto:<?php echo esc_url($instance['email_address']); ?>"><?php echo wp_kses_post($instance['email_address']); ?></a></li>
                        <li><i class="flaticon-world"></i><?php echo wp_kses_post($instance['address']); ?></li>
                    </ul>
                </div>
            </div>
            
        <?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['phone_no'] = $new_instance['phone_no'];
		$instance['email_address'] = $new_instance['email_address'];
		$instance['address'] = $new_instance['address'];
		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Contact';
		$phone_no = ($instance) ? esc_attr($instance['phone_no']) : '';
		$email_address = ($instance) ? esc_attr($instance['email_address']) : '';
		$address = ($instance) ? esc_attr($instance['address']) : '';
		
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('Contact', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('phone_no')); ?>"><?php esc_html_e('Phone Number:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('+00-555-67-890', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('phone_no')); ?>" name="<?php echo esc_attr($this->get_field_name('phone_no')); ?>" type="text" value="<?php echo esc_attr($phone_no); ?>" />
        </p> 
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('email_address')); ?>"><?php esc_html_e('Email Addess:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('info@example.com', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('email_address')); ?>" name="<?php echo esc_attr($this->get_field_name('email_address')); ?>" type="text" value="<?php echo esc_attr($email_address); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('address')); ?>"><?php esc_html_e('Address:', 'naxly'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('address')); ?>" name="<?php echo esc_attr($this->get_field_name('address')); ?>" ><?php echo wp_kses_post($address); ?></textarea>
        </p>
        
               
                
		<?php 
	}
	
}


///----Service Sidebar widgets---
//Services SideBar
class Naxly_services_sidebar extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Naxly_services_sidebar', /* Name */esc_html__('Naxly Services Sidebar','naxly'), array( 'description' => esc_html__('Show the Services Sidebar', 'naxly' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget); ?>
		
        <!--Start Single sidebar-->
        <ul class="sidebar-categories clearfix">
        	<?php 
				$args = array('post_type' => 'naxly_service', 'showposts'=>$instance['number']);
				if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'service_cat','field' => 'id','terms' => (array)$instance['cat']));
				 
				$this->posts($args);
			?>
        </ul>
        
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$number = ( $instance ) ? esc_attr($instance['number']) : 7;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'naxly'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'naxly'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'naxly'), 'selected'=>$cat, 'taxonomy' => 'service_cat', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
		
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
            <?php while( $query->have_posts() ): $query->the_post(); 
				global $post ; 
			?>
            <li><a href="<?php echo esc_url(get_post_meta( get_the_id(), 'ext_url', true ));?>"><h5><?php the_title(); ?></h5><i class="flaticon-arrow"></i></a></li>
            <?php endwhile; ?>
                
        <?php endif;
		wp_reset_postdata();
    }
}

//Our Brochures
class Naxly_Brochures extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Naxly_Brochures', /* Name */esc_html__('Naxly Our Brochures','naxly'), array( 'description' => esc_html__('Show the info Our Brochures', 'naxly' )) );
	}
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
            <!--Start Single sidebar-->
            <div class="sidebar-file">
                <ul class="download-option clearfix">
                    <li>
                        <div class="icon-box"><a href="<?php echo esc_url($instance['pdf_file_link']); ?>"><i class="flaticon-download"></i></a></div>
                        <div class="box">
                            <figure class="image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon-6.png" alt=""></figure>
                            <h5><?php echo wp_kses_post($instance['pdf_file_title']); ?></h5>
                            <span><?php echo wp_kses_post($instance['pdf_file_size']); ?></span>
                        </div>
                    </li>
                    <li>
                        <div class="icon-box"><a href="<?php echo esc_url($instance['word_file_link']); ?>"><i class="flaticon-download"></i></a></div>
                        <div class="box">
                            <figure class="image"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/icon-7.png" alt=""></figure>
                            <h5><?php echo wp_kses_post($instance['word_file_title']); ?></h5>
                            <span><?php echo wp_kses_post($instance['word_file_size']); ?></span>
                        </div>
                    </li>
                </ul>
            </div>
            
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['pdf_file_title'] = $new_instance['pdf_file_title'];
		$instance['pdf_file_link'] = $new_instance['pdf_file_link'];
		$instance['pdf_file_size'] = $new_instance['pdf_file_size'];
		$instance['word_file_title'] = $new_instance['word_file_title'];
		$instance['word_file_link'] = $new_instance['word_file_link'];
		$instance['word_file_size'] = $new_instance['word_file_size'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$pdf_file_title = ($instance) ? esc_attr($instance['pdf_file_title']) : '';
		$pdf_file_link = ($instance) ? esc_attr($instance['pdf_file_link']) : '';
		$pdf_file_size = ($instance) ? esc_attr($instance['pdf_file_size']) : '';
		$word_file_title = ($instance) ? esc_attr($instance['word_file_title']) : '';
		$word_file_link = ($instance) ? esc_attr($instance['word_file_link']) : '';
		$word_file_size = ($instance) ? esc_attr($instance['word_file_size']) : '';
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pdf_file_title')); ?>"><?php esc_html_e('PDF Title:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('Research Report.pdf', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('pdf_file_title')); ?>" name="<?php echo esc_attr($this->get_field_name('pdf_file_title')); ?>" type="text" value="<?php echo esc_attr($pdf_file_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pdf_file_link')); ?>"><?php esc_html_e('PDF Link:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('pdf_file_link')); ?>" name="<?php echo esc_attr($this->get_field_name('pdf_file_link')); ?>" type="text" value="<?php echo esc_attr($pdf_file_link); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('pdf_file_size')); ?>"><?php esc_html_e('File Size:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('65 KB', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('pdf_file_size')); ?>" name="<?php echo esc_attr($this->get_field_name('pdf_file_size')); ?>" type="text" value="<?php echo esc_attr($pdf_file_size); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('word_file_title')); ?>"><?php esc_html_e('Word File Title:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('Service Details.txt', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('word_file_title')); ?>" name="<?php echo esc_attr($this->get_field_name('word_file_title')); ?>" type="text" value="<?php echo esc_attr($word_file_title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('word_file_link')); ?>"><?php esc_html_e('External Link:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('#', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('word_file_link')); ?>" name="<?php echo esc_attr($this->get_field_name('word_file_link')); ?>" type="text" value="<?php echo esc_attr($word_file_link); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('word_file_size')); ?>"><?php esc_html_e('File Size:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('48 KB', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('word_file_size')); ?>" name="<?php echo esc_attr($this->get_field_name('word_file_size')); ?>" type="text" value="<?php echo esc_attr($word_file_size); ?>" />
        </p>
                
		<?php 
	}
	
}

//Our Award
class Naxly_Our_Award extends WP_Widget
{
	
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Naxly_Our_Award', /* Name */esc_html__('Naxly Our Award','naxly'), array( 'description' => esc_html__('Show the Our Award', 'naxly' )) );
	}

	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget);?>
      		
			<!--Footer Column-->
            <div class="sidebar-award">
                <h3><?php echo wp_kses_post($instance['title']); ?></h3>
                <figure class="award-image"><img src="<?php echo esc_url($instance['award_img']); ?>" alt="<?php esc_attr_e('Awesome Image', 'naxly'); ?>"></figure>
                <p><?php echo wp_kses_post($instance['content']); ?></p>
            </div>
            
		<?php
		
		echo wp_kses_post($after_widget);
	}
	
	
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['award_img'] = $new_instance['award_img'];
		$instance['content'] = $new_instance['content'];
		
		
		return $instance;
	}

	/** @see WP_Widget::form */
	function form($instance)
	{
		$title = ($instance) ? esc_attr($instance['title']) : 'Award Winning Service';
		$award_img = ($instance) ? esc_attr($instance['award_img']) : '';
		$content = ($instance) ? esc_attr($instance['content']) : '';
		
		
		?>
        
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Enter Title:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('Award Winning Service', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('award_img')); ?>"><?php esc_html_e('Award Image Url:', 'naxly'); ?></label>
            <input placeholder="<?php esc_attr_e('Award Image Url', 'naxly');?>" class="widefat" id="<?php echo esc_attr($this->get_field_id('award_img')); ?>" name="<?php echo esc_attr($this->get_field_name('award_img')); ?>" type="text" value="<?php echo esc_attr($award_img); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php esc_html_e('Content:', 'naxly'); ?></label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('content')); ?>" name="<?php echo esc_attr($this->get_field_name('content')); ?>" ><?php echo wp_kses_post($content); ?></textarea>
        </p>
               
		<?php 
	}
	
}

//Testimonials Widget
class Naxly_Testimonials_Widget extends WP_Widget
{
	/** constructor */
	function __construct()
	{
		parent::__construct( /* Base ID */'Naxly_Testimonials_Widget', /* Name */esc_html__('Naxly Testimonials Widget','naxly'), array( 'description' => esc_html__('Show the Testimonials Widget', 'naxly' )) );
	}
 
	/** @see WP_Widget::widget */
	function widget($args, $instance)
	{
		extract( $args );
		
		echo wp_kses_post($before_widget); ?>
		
        <!--Start Testimonials Widget-->
        <div class="sidebar-testimonial">
            <div class="testimonial-carousel-5 owl-carousel owl-theme owl-nav-none owl-dots-none">
                <?php 
					$args = array('post_type' => 'naxly_testimonials', 'showposts'=>$instance['number']);
					if( $instance['cat'] ) $args['tax_query'] = array(array('taxonomy' => 'testimonials_cat','field' => 'id','terms' => (array)$instance['cat']));
					 
					$this->posts($args);
				?>
            </div>
        </div>
        
        <?php echo wp_kses_post($after_widget);
	}
 
 
	/** @see WP_Widget::update */
	function update($new_instance, $old_instance)
	{
		$instance = $old_instance;
		
		$instance['number'] = $new_instance['number'];
		$instance['cat'] = $new_instance['cat'];
		
		return $instance;
	}
	/** @see WP_Widget::form */
	function form($instance)
	{
		$number = ( $instance ) ? esc_attr($instance['number']) : 3;
		$cat = ( $instance ) ? esc_attr($instance['cat']) : '';?>
		
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('number')); ?>"><?php esc_html_e('Number of posts: ', 'naxly'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('number')); ?>" name="<?php echo esc_attr($this->get_field_name('number')); ?>" type="text" value="<?php echo esc_attr( $number ); ?>" />
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('cat')); ?>"><?php esc_html_e('Category', 'naxly'); ?></label>
            <?php wp_dropdown_categories( array('show_option_all'=>esc_html__('All Categories', 'naxly'), 'selected'=>$cat, 'taxonomy' => 'testimonials_cat', 'class'=>'widefat', 'name'=>$this->get_field_name('cat')) ); ?>
        </p>
            
		<?php 
	}
	
	function posts($args)
	{
		
		$query = new WP_Query($args);
		if( $query->have_posts() ):?>
        
           	<!-- Title -->
            <?php 
				global $post ; 
				while( $query->have_posts() ): $query->the_post(); 
				$client_image = get_post_meta( get_the_id(), 'client_image', true );
			?>
            <div class="content-box">
                <div class="upper-box">
                    <figure class="logo-image"><img src="<?php echo esc_url($client_image['url']);?>" alt="<?php esc_attr_e('Awesome Image', 'naxly'); ?>"></figure>
                    <div class="rating-box clearfix">
                        <ul class="rating clearfix">
                            <?php
							$ratting = get_post_meta( get_the_id(), 'testimonial_rating', true ); 
							for ($x = 1; $x <= 5; $x++) {
								if($x <= $ratting) echo '<li><i class="fa fa-star"></i></li>'; else echo '<li><i class="fa fa-star-half-alt"></i></li>'; 
								}
							?>
                        </ul>
                    </div>
                </div>
                <div class="text">
                    <p><?php echo wp_kses(naxly_trim(get_the_content(), 25), true);?></p>
                </div>
                <div class="author-info">
                    <figure class="author-image"><?php the_post_thumbnail('naxly_70x70'); ?></figure>
                    <h4><?php the_title(); ?></h4>
                    <span class="designation"><?php echo (get_post_meta( get_the_id(), 'test_designation', true ));?></span>
                </div>
            </div>
            <?php endwhile; ?>
                
        <?php endif;
		wp_reset_postdata();
    }
}
