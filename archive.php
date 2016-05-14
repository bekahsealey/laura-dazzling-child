<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package dazzling
 */

get_header(); ?>
		<section id="primary" class="content-area col-sm-12 col-md-8 <?php echo of_get_option( 'site_layout' ); ?>">
			<main id="main" class="site-main" role="main">

			<?php if ( have_posts() ) : ?>

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

							elseif ( is_post_type_archive( 'lauras_podcasts' ) ) :
								_e( 'Podcasts', 'dazzling' );

							elseif ( is_post_type_archive( 'lauras_testimonials' ) ) :
								_e( 'Testimonials', 'dazzling' );

							elseif ( is_post_type_archive( 'lauras_qanda' ) ) :
								_e( 'Q & A\'s', 'dazzling' );

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

					<?php if ( is_post_type_archive( 'lauras_podcasts' ) ) { ?>
						<div class="description entry-content">
						<p>Life is hard and full of lessons. Along life’s journey lie the opportunities to learn, grow, and become more than you thought possible. As a wife, a mother of three, and an entrepreneur at heart, Laura has lived a life full of many lessons and is passionate to share them with you.  Some hard, some easy…all important to the continual growth and expansion of mind, body and spirit. (Don't worry, it's fun! I promise!)</p>
						<p>Now, Laura is taking what she has learned and wants to help you look for the truth of your own life, and help inspire you to take action where you feel stuck. This podcast (with a side of spunk) will help you shake things up, create awareness, and motivate you to move, grow, and change your life to what you truly want it to be! FUN!!  Twice a month Laura, with the help of special guests and their own lessons, will bring you raw and candid discussions that will be sure to spark a flame in you and awaken your inner child to come out and be heard! Take it from those who are learning the lessons on life’s journey!</p> 
						<p>This is Laura’s Life Lessons Podcast</p>
						</div>
						<?php } ?>
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				<?php dazzling_paging_nav(); ?>

			<?php else : ?>

				<?php get_template_part( 'content', 'none' ); ?>

			<?php endif; ?>

			</main><!-- #main -->
		</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
