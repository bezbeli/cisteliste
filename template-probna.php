<?php
/*
Template Name: Probna
*/
?>



<div class="col-md-4">
	<div class="home-box paper">
	<h4>Funkcioneri sa najvećim brojem negativnih revizorskih izvještaja</h4>

<?php	$args = array(
		'post_type'		=>	'candidates',
		'posts_per_page'	=>	'-1',
		'meta_query'		=>	array(
						array(
							'key' => 'prisustvo_sjednicama',
							'value' => '',
							'compare' => '!='
						),
		 ),

			);
$custom_query = new WP_Query( $args ); ?>
<div class="table-responsive">
			<table class="table" id="partije">
 
<?php while ( $custom_query->have_posts() ) : $custom_query->the_post();

$dolasci = get_post_meta( $post->ID, 'prisustvo_sjednicama', true );
	$najgori[roots_title()] = array(
					'dolasci' =>	round($dolasci, 2),
					'ID' =>		$post->ID,
					);
	endwhile;

		$najgoriodnajgorih = array();
		foreach ($najgori as $key => $row){
			$najgoriodnajgorih[$key] = $row['najgoriodnajgorih'];
			}
		
		array_multisort($najgori, SORT_ASC);

			$i=0;
		foreach ($najgori as $key => $value) {
			$i++;
			if ($i <= 9 ) {
			echo '<tr>';
				echo '<td style="vertical-align:middle"><span class="glyphicon glyphicon-user"></span> <a href="' . get_permalink($value[ID]) . '">' . get_the_title($value[ID]) . '</a></td>';
				echo '<td><h4><span class="glyphicon glyphicon-thumbs-down"></span> ' . $value[dolasci] . '%</h4></td>';
			echo '</tr>';
			}
		}
			// echo '<pre>';
			// print_r($najgori);
			// echo '<pre>';
 ?>
			</table>
		</div>
<?php wp_reset_query(); ?>
	</div>
</div>