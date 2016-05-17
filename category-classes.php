<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package dazzling
 */

get_header(); ?>
		<div id="primary" class="content-area  col-sm-12 col-md-12">
			<main id="main" class="site-main" role="main">

				<header class="page-header">
					<h1 class="page-title">
						<?php
							if ( is_category() ) :
								single_cat_title();

							elseif ( is_tag() ) :
								single_tag_title();

							elseif ( is_author() ) :
								printf( __( 'Author: %s', 'dazzling' ), '<span class="vcard">' . get_the_author() . '</span>' );

							elseif ( is_day() ) :
								printf( __( 'Day: %s', 'dazzling' ), '<span>' . get_the_date() . '</span>' );

							elseif ( is_month() ) :
								printf( __( 'Month: %s', 'dazzling' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'dazzling' ) ) . '</span>' );

							elseif ( is_year() ) :
								printf( __( 'Year: %s', 'dazzling' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'dazzling' ) ) . '</span>' );

							elseif ( is_tax( 'post_format', 'post-format-aside' ) ) :
								_e( 'Asides', 'dazzling' );

							elseif ( is_tax( 'post_format', 'post-format-gallery' ) ) :
								_e( 'Galleries', 'dazzling');

							elseif ( is_tax( 'post_format', 'post-format-image' ) ) :
								_e( 'Images', 'dazzling');

							elseif ( is_tax( 'post_format', 'post-format-video' ) ) :
								_e( 'Videos', 'dazzling' );

							elseif ( is_tax( 'post_format', 'post-format-quote' ) ) :
								_e( 'Quotes', 'dazzling' );

							elseif ( is_tax( 'post_format', 'post-format-link' ) ) :
								_e( 'Links', 'dazzling' );

							elseif ( is_tax( 'post_format', 'post-format-status' ) ) :
								_e( 'Statuses', 'dazzling' );

							elseif ( is_tax( 'post_format', 'post-format-audio' ) ) :
								_e( 'Audios', 'dazzling' );

							elseif ( is_tax( 'post_format', 'post-format-chat' ) ) :
								_e( 'Chats', 'dazzling' );

							else :
								_e( 'Archives', 'dazzling' );

							endif;
						?>
					</h1>
					<?php
						// Show an optional term description.
						$term_description = term_description();
						if ( ! empty( $term_description ) ) :
							printf( '<div class="taxonomy-description">%s</div>', $term_description );
						endif;
					?>
				</header><!-- .page-header -->
				<div class="entry-content cfa">
				<dl class="col-md-6 cfa-text">
				<dt>Cost: </dt>
<dd>Intro classes are $5/person</dd>
<dd>All speciality classes are $10/</dd>
<dd>Group discounts available upon request</dd>

<dt>Time:</dt>
<dd>Each class runs 1 ½ - 2 hours in length</dd>
</dl>

				<dl class="col-md-6 cfa-text">
<dt>Scheduling:</dt>
<dd>Classes as scheduled on request. If you are interested in hosting or having Laura speak at an event, please contact her via email or phone. She is available for corporate meetings, lunch and learn sessions, in-home gatherings, and one-on-one sessions.</dd>
</dl>
</div>
			<?php if ( have_posts() ) : ?>
				<?php if (is_category( 'classes' )){
					$args = array ( 'category_name' => 'classes', 'posts_per_archive_page' => -1, 'order' => 'ASC');
$the_query = new WP_Query( $args );
// The Loop
while ( $the_query->have_posts() ) :
	$the_query->the_post(); ?>
	
					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', 'classes' );
					?>

<?php endwhile;

/* Restore original Post Data 
 * NB: Because we are using new WP_Query we aren't stomping on the 
 * original $wp_query and it does not need to be reset.
*/
wp_reset_postdata();
}
 ?>
 			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->
<?php get_footer(); ?>
