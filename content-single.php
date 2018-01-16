<?php
/**
 * @package dazzling
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header page-header">

		<?php the_post_thumbnail( 'dazzling-featured', array( 'class' => 'thumbnail' )); ?>

		<h1 class="entry-title "><?php the_title(); ?></h1>

		<div class="entry-meta">
			<?php dazzling_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">


				<?php if (in_category( 'classes' )){ ?>
					<div class="entry-content">
				<dl>
				<dt>Description: </dt>
				<dd><?php the_content(); ?></dd>
				<dt>Cost: </dt>
<dd>Intro classes are $5/person</dd>
<dd>All speciality classes are $10/</dd>
<dd>Group discounts available upon request</dd>

<dt>Time:</dt>
<dd>Each class runs 1 ½ - 2 hours in length</dd>

<dt>Scheduling:</dt>
<dd>Classes as scheduled on request. If you are interested in hosting or having Laura speak at an event, please contact her via email or phone. She is available for corporate meetings, lunch and learn sessions, in-home gatherings, and one-on-one sessions.</dd>
</dl>
</div>
<?php } else { ?>

		<?php the_content(); ?>
<?php } ?>
		<?php
			wp_link_pages( array(
				'before'            => '<div class="page-links">'.__( 'Pages:', 'dazzling' ),
				'after'             => '</div>',
				'link_before'       => '<span>',
				'link_after'        => '</span>',
				'pagelink'          => '%',
				'echo'              => 1
       		) );
    	?>
	</div><!-- .entry-content -->
	<?php
		$postType = get_post_type();
		if ($postType == 'podcast') { ?>
	<div class="entry-content">

			<p>Music and podcast production by:</p>
			<dl>
			<dt>Logan Dier</dt>
			<dd>SevenDollarMic Productions and Entertainment</dd>

			<dd>Logan is a freelance audio engineer and composer</dd>
			<dd>For more information please contact </dd>
			<dd>(920) 265-2943</dd>
			<dd><?php echo antispambot( '88ButtonsBooking@gmail.com' ); ?></dd>
	</div>

	<?php } ?>

	<footer class="entry-meta">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'dazzling' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'dazzling' ) );

			if ( ! dazzling_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = '<i class="fa fa-folder-open-o"></i> %2$s. <i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">'. __( 'permalink', 'dazzling' ) .'</a>.';
				} else {
					$meta_text = '<i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">'. __( 'permalink', 'dazzling' ) .'</a>.';
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = '<i class="fa fa-folder-open-o"></i> %1$s <i class="fa fa-tags"></i> %2$s. <i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">'. __( 'permalink', 'dazzling' ) .'</a>.';
				} else {
					$meta_text = '<i class="fa fa-folder-open-o"></i> %1$s. <i class="fa fa-link"></i> <a href="%3$s" rel="bookmark">'. __( 'permalink', 'dazzling' ) .'</a>.';
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>

		<?php edit_post_link( __( 'Edit', 'dazzling' ), '<i class="fa fa-pencil-square-o"></i><span class="edit-link">', '</span>' ); ?>
		<?php dazzling_setPostViews(get_the_ID()); ?>

		<hr class="section-divider">
	</footer><!-- .entry-meta -->
</article><!-- #post-## -->
