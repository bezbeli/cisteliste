<?php
/*
Template Name: Partije
*/
?>

<div class="row">
	<div class="col-md-12">
		<div class="home-box paper">
<?php
$args = array(
	'post_type'		=> 'parties',
	'orderby'		=> 'title',
	'posts_per_page'	=> '4',
	'order'			=> 'DESC',
	'meta_key'		=> 'broj_ponovljenih',
	'orderby'		=> 'meta_value_num',
			);
$custom_query = new WP_Query( $args ); ?>

<div class="row">
<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
<div class="col-md-3">
	<div class="home-circle-wrapper paper">
		<div class="circle"><span><?php echo get_post_meta( $post->ID, 'procenat_ponovljenih_kanidata', true ); ?></span></div>
		<div style="min-height:5em"><a href="<?php echo get_permalink(); ?>"><strong><?php echo roots_title(); ?></strong></a></div>
		<div class="border-top"><h2><span class="glyphicon glyphicon-user"></span> <?php echo get_post_meta( $post->ID, 'broj_novih', true ); ?></h2><small>Broj novih kandidata</small></div>
		<div class="border-top"><h2><span class="glyphicon glyphicon-user"></span> <?php echo get_post_meta( $post->ID, 'broj_ponovljenih', true ); ?></h2><small>Broj ponovljenih kandidata</small></div>
		<div class="border-top"><h2><span class="glyphicon glyphicon-user"></span> <?php echo get_post_meta( $post->ID, 'broj_kandidata', true ); ?></h2><small>Ukupan broj kandidata</small></div>
	</div>
</div>
<?php endwhile; ?>
</div>
		</div>
	</div> 
</div>
<?php wp_reset_query(); ?>

<?php
$args = array(
	'post_type'		=> 'parties',
	'orderby'		=> 'title',
	'order'			=> 'DESC',
	'meta_key'		=> 'broj_ponovljenih',
	'orderby'		=> 'meta_value_num',
	'offset'			=> '4',
	'posts_per_page'	=> '-1',
);

$custom_query = new WP_Query( $args ); ?>
<div class="table-responsive paper">
	<div style="padding:30px 30px 10px; margin-bottom:20px">
		<table class="table" id="partije">
		<tr>
			<td>Partija</td>
			<td style="text-align:center;"><small>Broj novih kandidata</small></td>
			<td style="text-align:center;"><small>Broj ponovljenih kandidata</small></td>
			<td style="text-align:center;"><small>Ukupan broj kandidata</small></td>
			<td style="text-align:center;"><small>Procenat ponovljenih kandidata</small></td>
		</tr>
		<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
		<tr>
			<td><a href="<?php echo get_permalink(); ?>"><?php echo roots_title(); ?></a></td>
			<td style="text-align:center;"><h3><?php echo get_post_meta( $post->ID, 'broj_novih', true ); ?></h3></td>
			<td style="text-align:center;"><h3><?php echo get_post_meta( $post->ID, 'broj_ponovljenih', true ); ?></h3></td>
			<td style="text-align:center;"><h3><?php echo get_post_meta( $post->ID, 'broj_kandidata', true ); ?></h3></td>
			<td style="text-align:center;"><h3><?php echo get_post_meta( $post->ID, 'procenat_ponovljenih_kanidata', true ); ?></h3></td>
		</tr>
		<?php endwhile; ?>
		</table>
	</div>
</div>
<?php wp_reset_query(); ?>