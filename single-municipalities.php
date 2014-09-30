<?php get_template_part('templates/content', 'single'); ?>

<!-- Nav tabs -->
<!-- <ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#home" role="tab" data-toggle="tab">Home</a></li>
  <li><a href="#profile" role="tab" data-toggle="tab">Profile</a></li>
  <li><a href="#messages" role="tab" data-toggle="tab">Messages</a></li>
  <li><a href="#settings" role="tab" data-toggle="tab">Settings</a></li>
</ul> -->

<!-- Tab panes -->
<!-- <div class="tab-content">
  <div class="tab-pane active" id="home">qeqwe qee qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe </div>
  <div class="tab-pane" id="profile">..qweqeqevqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe ..qweqeqevqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe ..qweqeqevqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe ..qweqeqevqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe ..qweqeqevqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe ..qweqeqevqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe ..qweqeqevqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe ..qweqeqevqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe </div>
  <div class="tab-pane" id="messages">.qeqweqwqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe ..qeqweqwqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe ..qeqweqwqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe ..qeqweqwqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe ..qeqweqwqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe ..qeqweqwqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe ..qeqweqwqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe ..qeqweqwqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe .</div>
  <div class="tab-pane" id="settings">..qweqweqwsqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqw.qweqweqwsqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqw.qweqweqwsqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqw.qweqweqwsqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqw.qweqweqwsqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqw.qweqweqwsqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqw.qweqweqwsqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqw.qweqweqwsqeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe qeqwe qeqe </div>
</div> -->

<?php

$custom_fields = get_post_custom();

foreach ( $custom_fields as $field_key => $field_values ) {
	foreach ( $field_values as $key => $value )
		if ($value && $field_key != 'municipality_ID' && $field_key != '_edit_lock') {
		echo '<h3>' . $field_key . ': ' . $value . '</h3>';
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
				// $termsPartyName = get_the_terms( $post->ID, 'party_name' );

					// foreach ( $termsPartyName as $term ) {
					// 	$partije[] = $term->term_id;
					// }
					$partije[] = get_post_meta( $post->ID, 'naziv_partije', true );
					// echo get_post_meta( $post->ID, 'naziv_partije', true );


			endwhile;

				// echo "<pre style='font-size:11px;'>";
				$partije = array_unique($partije);
				// print_r($partije);
				// echo "</pre>";
				echo '<ul>';
				foreach ($partije as $key => $value) {
					echo '<li>' ;
					echo $value;
					echo '</li>';
					$args = array(
						'post_type'=>'candidates',
						'orderby'=>'meta_value_num',
						'posts_per_page'=>'-1',
						'order'=>'ASC',
						'meta_query' => array(
						'relation' => 'AND',
							array(
								'key'  => 'election_id',
								'value'  => $election_id,
								),
							array(
								'key'  => 'naziv_partije',
								'value'  => $value,
								),
							),
					);

				$query_kandidate = new WP_Query( $args );
				echo '<ul>';
				while ( $query_kandidate->have_posts() ) : $query_kandidate->the_post();
					echo '<li class="zastupnik">';
						echo '<a href="' . get_permalink() . '">';
						echo get_the_title( );
						echo '</a>';
						echo ' - ';
						echo get_post_meta( $post->ID, 'list_number', true );
						// edit_post_link(' - Edit');
					echo '</li>';

				endwhile;
				echo "kraj liste";
				echo '</ul>';
				}
				echo '</ul>';
				// echo "</pre>";

		}
}




?>

