<?php
/**
 * Template Name: Front Page
 *
 * This is the template that displays full width front page without sidebar
 *
 * @package laura-dazzling-child
 */

get_header(); ?>
<div class="meta">
	<aside class="intro">
			<?php the_meta(); ?>
	</aside>
</div>
<div class="top-section">
	<?php dazzling_featured_slider(); ?>
	<?php dazzling_call_for_action(); ?>
	<?php dazzling_submenu(); ?>
</div>
<aside class="testimonial">	
	<div class="container">
		<?php $args = array(
			'post_type' => 'lauras_testimonials',
			'orderby'        => 'rand',
			'posts_per_page' => '1',
			);
		$my_query = new WP_Query( $args );
		if ( $my_query->have_posts() ) { 
			while ( $my_query->have_posts() ) {
				$my_query->the_post();
				$do_not_duplicate = get_the_ID(); ?>
				<div class="col-md-4"> 
				<?php the_post_thumbnail( 'testimonial' ); ?>
				</div>
				<div class="col-md-8 quote">
				<?php the_content(); ?>
				</div>
				<?php

			}
		}
		wp_reset_postdata();
		?>
	</div>
</aside>

        <div id="content" class="site-content container">

            <div class="container main-content-area"><?php

                global $post;
                if( get_post_meta($post->ID, 'site_layout', true) ){
                        $layout_class = get_post_meta($post->ID, 'site_layout', true);
                }
                else{
                        $layout_class = of_get_option( 'site_layout' );
                }
                if( is_home() && is_sticky( $post->ID ) ){
                        $layout_class = of_get_option( 'site_layout' );
                }
                ?>
                <div class="row <?php echo $layout_class; ?>">
	<div id="primary" class="content-area col-sm-12 col-md-12">
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>
			
		</main><!-- #main -->

	</div><!-- #primary -->

                </div><!-- close .row -->
            </div><!-- close .container -->
        </div><!-- close .site-content -->

<aside class="testimonial">	
	<div class="container">
		<?php $args = array(
			'post_type' => 'lauras_testimonials',
			'post__not_in' => array( $do_not_duplicate ),
			'orderby'        => 'rand',
			'posts_per_page' => '1',
		);
		$my_query = new WP_Query( $args );
		if ( $my_query->have_posts() ) { 
			while ( $my_query->have_posts() ) {
				$my_query->the_post(); ?>
				<div class="col-md-8 quote"> 
				<?php the_content(); ?>
				</div>
				<div class="col-md-4">
				<?php the_post_thumbnail( 'testimonial' ); ?>
				</div>
				<?php
			}
		}
		?>
	</div>
</aside>
<div class="featured">
	<div class="container flex flex-container between">
		<div class="module">
			<h2 class="widget-title">Podcasts</h2>
			<ul>
			<?php $args = array(
				'post_type' => 'lauras_podcasts',
				'posts_per_page' => '5',
				);
			$my_query = new WP_Query( $args );
				if ( $my_query->have_posts() ) {
					while ( $my_query->have_posts() ) { 
						$my_query->the_post();?>
					<li><a class="btn btn-lg cfa-button podcast" href="<?php echo get_permalink(); ?>">

					<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'thumbnail' ); }
					else { ; ?>
					<img class="wp-post-image" src="http://www.lauraleelotto.com/wp-content/uploads/2016/04/cropped-lll-logo-150x150.png">
					<?php } ?>
					<h4 class="title"><?php the_title(); ?></h4>
					</a></li>
					<?php
					}
				}

			?>	
			</ul>
		</div>
		<div class="module">
			<h2 class="widget-title">Q &amp; A's</h2>
		<?php $args = array(
			'post_type' => 'lauras_qanda',
			'posts_per_page' => '1',
			);
		$my_query = new WP_Query( $args );
			if ( $my_query->have_posts() ) {
				while ( $my_query->have_posts() ) {
					$my_query->the_post(); ?>
					<a href="<?php echo get_permalink(); ?>">
					<h3><?php the_title(); ?></h3>
					</a>
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail( 'module' ); }
					else { ; ?>
					<img class="wp-post-image" src="http://www.lauraleelotto.com/wp-content/uploads/2016/04/cropped-lll-logo.png">
					<?php } ?>
					<?php the_excerpt(); ?>
					<a class="btn btn-lg cfa-button" href="<?php echo get_permalink(); ?>">Read More</a>
					<?php
				}
			}
		?>
		</div>
	</div>
</div>


<?php get_footer(); ?>
