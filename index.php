<?php
/**
 *
 * Index page
 *
 * @package WordPress
 **/

get_header();
?>

<!-- News posts -->
<section>
<h2>NEWS</h2>
<?php
$args = array(
	'post_type'      => 'news',
	'posts_per_page' => 3,
);
$the_query = new WP_Query( $args );
if ( $the_query->have_posts() ) :
	while ( $the_query->have_posts() ) :
		$the_query->the_post();
?>
	<?php echo esc_html( get_post_time( 'Y年m月d日' ) ); ?>
	<a href="<?php the_permalink(); ?>">
		<?php the_title(); ?>
	</a>
	<?php
endwhile;
endif;
?>
</section>

<!-- Posts -->

<h2>POSTS</h2>
<p>テキストテキストテキストテキスト</p>
<?php
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
?>
<ul>
	<li><?php echo get_the_date(); ?></li>
	<li><?php the_category(); ?></li>
	<li><?php the_tags(); ?></li>
</ul>
	<?php the_post_thumbnail(); ?>
	<?php the_content( '読む' ); ?>
<?php
endwhile;
endif;
?>
<?php
get_footer();
