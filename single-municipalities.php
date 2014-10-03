<?php get_template_part('templates/content', 'single'); ?>

<div id="container">
<?php

$custom_fields = get_post_custom();
// echo '<div class="js-masonry">';


if ( in_array(array("701"), $custom_fields)) {
    	array_push($custom_fields[president_bih], "702");
} elseif (in_array(array("702"), $custom_fields)) {
    	array_push($custom_fields[president_bih], "701");
}

	// echo "<pre style='font-size:10px;'>";
	// 	print_r($custom_fields);
	// echo "</pre>";

foreach ( $custom_fields as $field_key => $field_values ) {



	foreach ( $field_values as $key => $value )
		if ($value && $field_key != 'municipality_ID' && $field_key != '_edit_lock') {
		echo '<div class="item utrka col-md-3">';
					
					// if ($value == '701' || $value == '702' ) {
					// 	$value = array('701','702'); 
					// }

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
					echo '<h5>';
					the_title();
					echo '</h5>';
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
				// echo "<pre style='font-size:11px;'>";
				// print_r($partije);
				// echo "</pre>";
				echo '<ul>';
				foreach ($partije as $key => $value) {
					echo '<li class="partija">' ;
					// echo get_post_meta( $post->ID, 'election_id', true ) . '<br />';
					echo $key;
					echo '</li>';
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
				echo '<ul>';


				while ( $query_kandidate->have_posts() ) : $query_kandidate->the_post();

				$parliament_logic_drugi_dom = get_post_meta( $post->ID, 'parliament_logic_drugi_dom', true );
				$government_logic = get_post_meta( $post->ID, 'government_logic', true );

				if (get_the_content( ) || $parliament_logic_drugi_dom || $government_logic) {
					echo '<li class="zastupnik">';
						echo get_post_meta( $post->ID, 'list_number', true ) . ' ';
						echo '<a href="' . get_permalink() . '">';
						echo get_the_title( );
						echo '</a>';
						// echo '<br />';
						// echo $parliament_logic_drugi_dom;
						// echo '<br />';
						// echo $government_logic;
						// edit_post_link(' - Edit');
					echo '</li>';
				} else {
					echo '<li class="zastupnik">';
						echo get_post_meta( $post->ID, 'list_number', true ) . ' ';
						echo get_the_title( );
						// echo '<br />';
						// echo $parliament_logic_drugi_dom;
						// echo '<br />';
						// echo $government_logic;
						// edit_post_link(' - Edit');
					echo '</li>';
				}
				endwhile;

				echo '</ul>';
				}
				echo '</ul>';
				// echo "</pre>";
				echo '</div>';

		}
}
				// echo '</div>';

wp_reset_query();

?>
</div>

