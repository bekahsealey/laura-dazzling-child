<?php
/**
 * Template Name: Front Page
 *
 * This is the template that displays full width front page without sidebar
 *
 * @package laura-dazzling-child
 */

get_header(); ?>
	<div id="primary" class="content-area col-sm-12 col-md-12">
		<?php $args = array(
			'post_type' => 'lauras_testimonials',
			'orderby'        => 'rand',
			'posts_per_page' => '1',
			);
		$my_query = new WP_Query( $args );
		if ( $my_query->have_posts() ) { 
			while ( $my_query->have_posts() ) {
				$my_query->the_post();
				$do_not_duplicate = get_the_ID();
				the_post_thumbnail( 'thumbnail' );
				the_content();
			}
		}
		wp_reset_postdata();
		?>
		<main id="main" class="site-main" role="main">
			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

			<?php endwhile; // end of the loop. ?>
			
		</main><!-- #main -->
		<?php $args = array(
			'post_type' => 'lauras_testimonials',
			'post__not_in' => array( $do_not_duplicate ),
			'orderby'        => 'rand',
			'posts_per_page' => '1',
			);
		$my_query = new WP_Query( $args );
		if ( $my_query->have_posts() ) { 
			while ( $my_query->have_posts() ) {
				$my_query->the_post();
				the_post_thumbnail( 'thumbnail' );
				the_content();
			}
		}
		?>

<?php $args = array(
	'post_type' => 'lauras_podcasts',
	'posts_per_page' => '5',
	);
$my_query = new WP_Query( $args );
	if ( $my_query->have_posts() ) {
		while ( $my_query->have_posts() ) {
			$my_query->the_post();
			the_title();
		}
	}
?>	

<?php $args = array(
	'post_type' => 'lauras_qanda',
	'posts_per_page' => '5',
	);
$my_query = new WP_Query( $args );
	if ( $my_query->have_posts() ) {
		while ( $my_query->have_posts() ) {
			$my_query->the_post();
			the_title();
			the_excerpt();
		}
	}
?>

	</div><!-- #primary -->

<?php get_footer(); ?>
