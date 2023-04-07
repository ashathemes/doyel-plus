<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Doyel Plus
 */
if ( ! is_singular( ) ) : ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php if ( has_post_thumbnail () ): ?>
	    <?php doyel_post_thumbnail(); ?>
	<?php endif; ?>
	<div class="bsingle-content <?php if( has_post_thumbnail () ): ?> m-top<?php endif; ?> <?php if( ! has_post_thumbnail () ): ?>m-margin<?php endif; ?>">
		<div class="admin">
			<?php doyel_posted_by(); ?>
		</div>
		<?php
			the_title( '<h3><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
		?>
		<?php the_excerpt(); ?>
		<div class="meta-info">
			<ul>
				<li><?php doyel_plus_category(); ?></li>
				<li><?php doyel_plus_posted_on(); ?></li>
				<li><?php doyel_plus_comments(); ?></li>
			</ul>
		</div>
	</div>
</article>	
<?php else: ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php doyel_post_thumbnail(); ?>
	<div class="single-content">
		<header class="entry-header">
			<?php
			if ( is_singular() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );

			endif; 

			if ( 'post' === get_post_type() ) : ?>
				<div class="footer-meta">

					<?php 
						doyel_posted_by();
						doyel_posted_on(); 
					?>
				</div>
			<?php endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php

			if(is_single( )){
				the_content(
					sprintf(
						wp_kses(
							/* translators: %s: Name of current post. Only visible to screen readers */
							__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'doyel-plus' ),
							array(
								'span' => array(
									'class' => array(),
								),
							)
						),
						wp_kses_post( get_the_title() )
					)
				);
			}
			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'doyel-plus' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
		<?php if ( is_singular() ) : ?>
			<footer class="entry-footer">
				<?php doyel_entry_footer(); ?>
			</footer><!-- .entry-footer -->
		<?php endif; ?>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
<?php endif; ?>