<div class="container">
<?php if (!in_category( 'analize' )) {?>
		
	<div class="home-box paper">
		<h2 id="analize">Analize</h2>
	
	<?php
	$args = array(
		'post_type'		=> 'post',
		'orderby'		=> 'date',
		'posts_per_page'	=> '4',
		'order'			=> 'DESC',
		'tax_query' => array(
			array(
				'taxonomy'  => 'category',
				'field'     => 'slug',
				'terms'     => array('analize'),
				),
			),
	);
	$analize = new WP_Query( $args ); 
	echo '<div class="row">';
		while ( $analize->have_posts() ) : $analize->the_post();
		echo '<div class="col-md-4">';
		echo '<h4>';
		echo '<a href="';
		echo get_permalink();
		echo '">';
		the_title();
		echo '</a>';
		echo '</h4>';
		the_excerpt();
		echo '</div>';
		endwhile;
	echo '</div>'
	?>
	
	</div>
	
<?php } ?>


	<div class="home-box paper" style="padding-bottom:30px;">

	<div class="row">	
		<div class="col-md-1">Partneri</div>
		<div class="col-md-2"><a href="http://zastone.ba/"><img class="img-responsive" src="http://cisteliste.ba/images/zastone_logo.png" alt=""></a></div>
		<div class="col-md-2"><a href="http://ti-bih.org/"><img class="img-responsive" src="http://cisteliste.ba/images/transparency_international_logo.png" alt=""></a></div>
		<div class="col-md-2 col-md-offset-5 text-right"><a href="http://cisteliste.ba/download/data_download.zip">Data download</a></div>
	</div>
	</div>
</div>

<footer class="container content-info" role="contentinfo">
	<?php dynamic_sidebar('sidebar-footer'); ?>
</footer>

<?php wp_footer(); ?>