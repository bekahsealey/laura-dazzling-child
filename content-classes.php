<?php
/**
 * Content template for Class posts
 *
 * @package dazzling
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'col-sm-6 col-md-6' ); ?>>
	<header class="entry-header page-header">
		<?php if ( has_post_thumbnail() ) : ?>
			<?php the_post_thumbnail( 'dazzling-featured' ); ?>
		<?php endif; ?>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h1>

	</header><!-- .entry-header -->
		<div class="click">
			<a class="plus" title="Show Description" href="#"><span>Show Description</span></a>
			<div class="entry-content hide">
				<?php the_content(); ?>
			<?php edit_post_link( __( 'Edit', 'dazzling' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>

			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"></a>


			<?php
				wp_link_pages( array(
					'before'      => '<div class="page-links">' . __( 'Pages:', 'dazzling' ),
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '%',
					'echo'        => 1,
				) );
			?>
		</div><!-- .entry-content -->
	</div><!-- .click -->

</article><!-- #post-## -->
