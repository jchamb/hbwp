<?php
/**
 * @package Pictorico
 */

$format = get_post_format();
$formats = get_theme_support( 'post-formats' );
$postclass = '';

if ( has_post_thumbnail() || get_header_image() )
	$postclass = 'has-thumbnail';

if ( has_post_thumbnail() )
	$thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'pictorico-single' );
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( $postclass ); ?>>

	<header class="entry-header">
		<?php if ( has_post_thumbnail() || get_header_image() ) : ?>
			<?php if ( has_post_thumbnail() ) : ?>
				<div class="entry-thumbnail" style="background-image: url(<?php echo esc_url( $thumbnail[0] ); ?>);"></div>
			<?php else : ?>
				<div class="header-image" style="background-image: url(<?php header_image(); ?>)"></div>
			<?php endif; ?>
		<?php endif; ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header><!-- .entry-header -->
	<div class="entry-meta">
		<?php if ( $format && in_array( $format, $formats[0] ) ): ?>
			<a class="entry-format" href="<?php echo esc_url( get_post_format_link( $format ) ); ?>" title="<?php echo esc_attr( sprintf( __( 'All %s posts', 'pictorico' ), get_post_format_string( $format ) ) ); ?>"><?php echo get_post_format_string( $format ); ?></a><span class="sep"> &bull; </span>
		<?php endif; ?>
		<?php pictorico_posted_on(); ?>
	</div><!-- .entry-meta -->
	<div class="entry-content">
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'pictorico' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
			/* translators: used between list items, there is a space after the comma */
			$category_list = get_the_category_list( __( ', ', 'pictorico' ) );

			/* translators: used between list items, there is a space after the comma */
			$tag_list = get_the_tag_list( '', __( ', ', 'pictorico' ) );

			if ( ! pictorico_categorized_blog() ) {
				// This blog only has 1 category so we just need to worry about tags in the meta text
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'pictorico' );
				} else {
					$meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'pictorico' );
				}

			} else {
				// But this blog has loads of categories so we should probably display them here
				if ( '' != $tag_list ) {
					$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'pictorico' );
				} else {
					$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'pictorico' );
				}

			} // end check for categories on this blog

			printf(
				$meta_text,
				$category_list,
				$tag_list,
				get_permalink()
			);
		?>

		<?php edit_post_link( __( 'Edit', 'pictorico' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
