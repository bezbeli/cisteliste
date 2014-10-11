<div class="container">

<header>
	<h1 class="entry-title"><?php the_title(); ?></h1>
</header>

<?php

$custom_fields = get_post_custom();

unset(	$custom_fields[municipality_ID],
	$custom_fields[_edit_lock],
	$custom_fields[_edit_last]
	);

if ( in_array(array("701"), $custom_fields)) {
    	$custom_fields[president_bih_hr] = array('702');
 }

echo '<ul class="nav nav-tabs" role="tablist">';

$i=0;
foreach ( $custom_fields as $field_key => $field_values ) {
	$field_values = array_filter($field_values);
	if (!empty($field_values)) {
		$i++;
		if ($i==1) {
			$klasa='active';
		} else {
			$klasa='';
		}
		echo '<li class="'.$klasa.'"><a href="#' . $field_key . '" role="tab" data-toggle="tab">Izborna jedinica: <strong>' . $field_values[0] . '</strong></a></li>'."\n";
	}
}
echo '</ul>';

echo '<div class="tab-content">';

$j=0;
$k=0;
foreach ( $custom_fields as $field_key => $field_values ) {
	$field_values = array_filter($field_values);
	if (!empty($field_values)) {
		$j++;
		if ($j==1) {
			$klasa='tab-pane active';
		} else {
			$klasa='tab-pane';
		}
		foreach ( $field_values as $key => $value ){
					$k++;
			echo '<div class="'.$klasa.'"'. 'id="'. $field_key .'">'."\n";
						$args = array(
							'post_type' => 'izborne_utrke',
							'meta_query' => array(
								array(
									'key'  => 'election_id',
									'value'  => $value
									),
								),
						 );

						$query_election_name = new WP_Query( $args );
						while ( $query_election_name->have_posts() ) : $query_election_name->the_post();
						echo '<h2 class="space-below">';
						the_title();
						echo '</h2>';
						endwhile;

			$election_id = $value;
				$args = array(
					'post_type'=>'candidates',
					'orderby'=>'title',
					'posts_per_page'=>'-1',
					'order'=>'DESC',
					'meta_query' => array(
						array(
							'key'  => 'election_id',
							'value'  => $value,
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
						echo '<div class="partija item paper-tab">' ;
						// echo get_post_meta( $post->ID, 'election_id', true ) . '<br />';
						echo "<h5>" . $key . "</h5>";
						// echo '</div>'."\n";
						$args = array(
							'post_type'=>'candidates',
							'orderby'=>'meta_value_num',
							'posts_per_page'=>'-1',
							'order'=>'DESC',
							'meta_query' => array(
							'relation' => 'AND',
								array(
									'key'  => 'election_id',
									'value'  => $election_id,
									),
								array(
									'key'  => 'party_id',
									'value'  => $value,
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
							echo get_post_meta( $post->ID, 'list_number', true ) . ' ';
							echo '<a href="' . get_permalink() . '">';
							echo get_the_title( );
							echo '</a>';
						echo '</div>'."\n";
					} else {
						echo '<div class="zastupnik">';
							echo get_post_meta( $post->ID, 'list_number', true ) . ' ';
							echo get_the_title( );
						echo '</div>'."\n";
					}
					endwhile;

					echo '</div>'."\n";
					}
					echo '</div>'."\n";
					// echo "</pre>";
					echo '</div>'."\n";
		}
	}
}
wp_reset_query(); ?>

</div>
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
