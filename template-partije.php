<?php
/*
Template Name: Partije
*/
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'page'); ?>
<?php endwhile; ?>

<?php
$args = array(
	'post_type'		=> 'parties',
	'orderby'		=> 'title',
	'posts_per_page'	=> '-1',
	'order'			=> 'DESC',
	'meta_key'		=> 'broj_ponovljenih',
	'orderby'		=> 'meta_value_num',
	// 'meta_query' => array(
	// 	array(
	// 		'taxonomy'  => 'category',
	// 		'field'     => 'slug',
	// 		'terms'     => array('izdvojeno'),
	// 		),
	// 	),
);
$custom_query = new WP_Query( $args ); ?>
<div class="table-responsive">
<table class="table table-bordered" id="partije">
<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
<tr>
	<th colspan="4"><a href="<?php echo get_permalink(); ?>"><?php echo roots_title(); ?></a></th>
</tr>
<tr>
	<td style="text-align:center;"><small>Broj novih kandidata</small></td>
	<td style="text-align:center;"><small>Broj ponovljenih kandidata</small></td>
	<td style="text-align:center;"><small>Ukupan broj kandidata</small></td>
	<td style="text-align:center;"><small>Procenat ponovljenih kandidata</small></td>
</tr>
<tr>
	<td style="text-align:center;"><h2><?php echo get_post_meta( $post->ID, 'broj_novih', true ); ?></h2></td>
	<td style="text-align:center;"><h2><?php echo get_post_meta( $post->ID, 'broj_ponovljenih', true ); ?></h2></td>
	<td style="text-align:center;"><h2><?php echo get_post_meta( $post->ID, 'broj_kandidata', true ); ?></h2></td>
	<td style="text-align:center;"><h2><?php echo get_post_meta( $post->ID, 'procenat_ponovljenih_kanidata', true ); ?></h2></td>
</tr>
<tr>
	<td colspan="4" style="text-align:right;"><a href="<?php echo get_permalink(); ?>"><small>Saznajte više o ovoj partiji</small></a></td>
</tr>
<tr>
	<td colspan="4">&nbsp;</td>
</tr>
<?php endwhile; ?>
</table>
</div>
<?php wp_reset_query(); ?>