<?php
/*
Template Name: Opštine
*/
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<?php
$args = array(
	'post_type'=>'municipalities',
	'orderby'=>'title',
	'posts_per_page'=>'-1',
	'order'=>'ASC',
	// 'tax_query' => array(
	// 	array(
	// 		'taxonomy'  => 'category',
	// 		'field'     => 'slug',
	// 		'terms'     => array('izdvojeno'),
	// 		),
	// 	),
);
$custom_query = new WP_Query( $args ); ?>
<ul>
<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
<li class="opstina">
	<a href="<?php echo get_permalink(); ?>"><?php echo roots_title(); ?></a>
</li>
<?php endwhile; ?>
</ul>

<?php wp_reset_query(); ?>