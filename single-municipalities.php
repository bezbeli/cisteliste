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
				'post_type'=>'post',
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
				$termsPartyName = get_the_terms( $post->ID, 'party_name' );

					foreach ( $termsPartyName as $term ) {
						// array_push($partije, $term->name);
						$partije[] = $term->term_id;sds
					}

			endwhile;

				// echo "<pre style='font-size:11px;'>";
				$partije= array_unique($partije);
				// sort($partije);
				// print_r($partije);
				echo '<ul>';
				foreach ($partije as $key => $value) {
					echo '<li>' ;
					$term = get_term( $value, 'party_name' );
					echo $term->name;
					echo '</li>';
					$args = array(
						'post_type'=>'post',
						'orderby'=>'title',
						'posts_per_page'=>'-1',
						'order'=>'ASC',
						'relation' => 'AND',
						'meta_query' => array(
							array(
								'key'  => 'election_id',
								'value'  => $election_id,
								),
							),
						'tax_query' => array(
							array(
								'taxonomy'  => 'party_name',
								'field'  => 'id',
								'terms'  => array($value),
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
						edit_post_link(' - Edit');
					echo '</li>';

				endwhile;
				echo '</ul>';
				}
				echo '</ul>';
				// echo "</pre>";

		}
}




?>

