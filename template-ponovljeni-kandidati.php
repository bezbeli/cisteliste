<?php
/*
Template Name: Ponovljeni kandidati
*/
?>

<?php
	$args = array(
		'post_type'=>'candidates',
		'orderby'=>'title',
		'posts_per_page'=>'-1',
		'order'=>'DESC',
		'meta_query' => array(
			array(
				'key'	=> 'period_na_funkciji',
				'value'	=> '',
				'compare' => '!='
				),
			),
	);
	$custom_query = new WP_Query( $args );

	$partije = array();

	while ( $custom_query->have_posts() ) : $custom_query->the_post();
		$id_partije = get_post_meta( $post->ID, 'party_id', true );
		$naziv_partije = get_post_meta( $post->ID, 'naziv_partije_glasacki_listic', true );
		$partije[$naziv_partije] = $id_partije;
	endwhile;

	$partije = array_unique($partije);
	echo '<div class="masonac">';
	foreach ($partije as $key => $value) {
		echo '<div class="gutter-sizer"></div>';
		echo '<div class="partija item paper">' ;
		// echo get_post_meta( $post->ID, 'election_id', true ) . '<br />';
		echo "<h5>" . $key . "</h5>";
		// echo '</div>'."\n";
		$args = array(
			'post_type'=>'candidates',
			'orderby'=>'title',
			'posts_per_page'=>'-1',
			'order'=>'ASC',
			'meta_query' => array(
			'relation' => 'AND',
				array(
					'key'	=> 'period_na_funkciji',
					'value'	=> '',
					'compare' => '!='
					),
				array(
					'key'	=> 'party_id',
					'value'	=> $value,
					),
				),
		);

	$query_kandidate = new WP_Query( $args );
	// echo '<div>'."\n";


	while ( $query_kandidate->have_posts() ) : $query_kandidate->the_post();

	$parliament_logic_drugi_dom = get_post_meta( $post->ID, 'parliament_logic_drugi_dom', true );
	$government_logic = get_post_meta( $post->ID, 'government_logic', true );

	if (get_the_content( ) || $parliament_logic_drugi_dom || $government_logic) {
		echo '<div class="zastupnik">';
			// echo get_post_meta( $post->ID, 'list_number', true ) . ' ';
			echo '<a href="' . get_permalink() . '">';
			echo get_the_title( );
			echo '</a>';
		echo '</div>'."\n";
	} else {
		echo '<div class="zastupnik">';
			// echo get_post_meta( $post->ID, 'list_number', true ) . ' ';
			echo get_the_title( );
		echo '</div>'."\n";
	}
	endwhile;

	echo '</div>'."\n";
	}
	echo '</div>'."\n";
	// echo "</pre>";
	echo '</div>'."\n";

wp_reset_query(); ?>

</div>

<script>

$(document).ready(function () {
	$(window).trigger("resize");
});

$('a[data-toggle=tab]').on('shown.bs.tab', function (e) {
		$(window).trigger("resize");
});
$(window).resize(function(){
		$this = $('.masonac');
		$this.masonry({
			 "gutter": ".gutter-sizer",
			itemSelector: '.item'
		});
});

</script>
