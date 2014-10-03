<?php get_template_part('templates/content', 'single'); ?>

<?php

$custom_fields = get_post_custom();
// echo '<div class="js-masonry">';

if ( in_array(array("701"), $custom_fields)) {
    	array_push($custom_fields[president_bih], "702");
} elseif (in_array(array("702"), $custom_fields)) {
    	array_push($custom_fields[president_bih], "701");
}

echo '<ul class="nav nav-tabs" role="tablist">';
	$i=0;
	foreach ( $custom_fields as $field_key => $field_values ) {
		$field_values = array_filter($field_values);
		if (!empty($field_values)) {
			if ($i==0) {
			echo '<li class="active"><a href="#' . $field_key . '" role="tab" data-toggle="tab">' . $field_values[0] . '</a></li>'."\n";
			} else {
			echo '<li><a href="#' . $field_key . '" role="tab" data-toggle="tab">' . $field_values[0] . '</a></li>'."\n";
			}
		}
	$i++;
	}
echo '</ul>';


	// echo "<pre style='font-size:10px;'>";
	// 	print_r($custom_fields);
	// echo "</pre>";
echo '<div class="tab-content">';

foreach ( $custom_fields as $field_key => $field_values ) {



	foreach ( $field_values as $key => $value )
		if ($value && $field_key != 'municipality_ID' && $field_key != '_edit_lock') {
		echo '<div class="tab-pane"'. 'id="'. $field_key .'">'."\n";
					
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
					echo '<h1 class="space-below">';
					the_title();
					echo '</h1>';
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
				echo '<div class="row">';
				foreach ($partije as $key => $value) {
					echo '<div class="partija col-md-3">' ;
					// echo get_post_meta( $post->ID, 'election_id', true ) . '<br />';
					echo "<strong>" . $key . "</strong>";
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
						// echo '<br />';
						// echo $parliament_logic_drugi_dom;
						// echo '<br />';
						// echo $government_logic;
						// edit_post_link(' - Edit');
					echo '</div>'."\n";
				} else {
					echo '<div class="zastupnik">';
						echo get_post_meta( $post->ID, 'list_number', true ) . ' ';
						echo get_the_title( );
						// echo '<br />';
						// echo $parliament_logic_drugi_dom;
						// echo '<br />';
						// echo $government_logic;
						// edit_post_link(' - Edit');
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
				// echo '</div>';

wp_reset_query();

?>
</div>

