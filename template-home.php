<?php
/*
Template Name: Home
*/
?>

<div class="row">
	<div class="col-md-12">
		<div class="home-box paper">
<?php
$args = array(
	'post_type'        => 'parties',
	'orderby'          => 'title',
	'posts_per_page'   => '4',
	'order'            => 'DESC',
	'meta_key'         => 'broj_ponovljenih',
	'orderby'          => 'meta_value_num',
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

<div class="row">
	<div class="col-md-6">
		<div class="home-box paper">
			<h2>Partije sa najviše negativnih revizorskih izvještaja</h2>
			<?php
			$args = array(
				'post_type'		=> 'parties',
				'orderby'		=> 'title',
				'posts_per_page'	=> '4',
				'order'			=> 'DESC',
				'meta_key'		=> 'broj_negativnih_revizorskih_izvjestaja',
				'orderby'		=> 'meta_value_num',
			);
			$custom_query = new WP_Query( $args ); ?>
			<div class="table-responsive">
			<table class="table" id="partije">
			<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
			<tr>
				<td style="vertical-align:middle"><a href="<?php echo get_permalink(); ?>"><?php echo roots_title(); ?></a></td>
				<td style="text-align:right; white-space: nowrap;"><h2><span class="glyphicon glyphicon-thumbs-down"></span> <?php echo get_post_meta( $post->ID, 'broj_negativnih_revizorskih_izvjestaja', true ); ?></h2></td>
			</tr>
			<?php endwhile; ?>
			</table>
			</div>
			<?php wp_reset_query(); ?>
		</div>
	</div>

	<div class="col-md-6">
		<div class="home-box paper">
			<h2>Partije sa najvišim procentom neispunjenih obećanja</h2>

			<?php
			$args = array(
				'post_type'		=> 'parties',
				'orderby'		=> 'title',
				'posts_per_page'	=> '4',
				'order'			=> 'DESC',
				'meta_key'		=> 'election_promise_broken',
				'orderby'		=> 'meta_value_num',
			);
			$custom_query = new WP_Query( $args ); ?>
			<div class="table-responsive">
			<table class="table" id="partije">
			<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
			<tr>
				<td style="vertical-align:middle"><a href="<?php echo get_permalink(); ?>"><?php echo roots_title(); ?></a></td>
				<td style="text-align:right; white-space:nowrap"><h2><span class="glyphicon glyphicon-thumbs-down"></span> <?php echo get_post_meta( $post->ID, 'election_promise_broken', true ); ?></h2></td>
			</tr>
			<?php endwhile; ?>
			</table>
			</div>
			<?php wp_reset_query(); ?>
		</div>
	</div>

</div>

<div class="row">
		<div class="col-md-4">
		<div class="home-box paper">
			<h4>Funkcioneri sa najvišim procentom neispunjenih obećanja</h4>
			<?php
			$args = array(
				'post_type'		=> 'candidates',
				'orderby'		=> 'title',
				'posts_per_page'	=> '9',
				'order'			=> 'DESC',
				'meta_key'		=> 'neispunjena_obecanja',
				'orderby'		=> 'meta_value_num',
			);
			$custom_query = new WP_Query( $args ); ?>
			<div class="table-responsive">
			<table class="table" id="partije">
			<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
			<tr>
				<td style="vertical-align:middle"><span class="glyphicon glyphicon-user"></span> <a href="<?php echo get_permalink(); ?>"><?php echo roots_title(); ?></a></td>
				<td style="text-align:right; white-space: nowrap;"><h4><span class="glyphicon glyphicon-thumbs-down"></span> <?php echo get_post_meta( $post->ID, 'neispunjena_obecanja', true ); ?></h4></td>
			</tr>
			<?php endwhile; ?>
			</table>
			</div>
			<?php wp_reset_query(); ?>
		</div>
	</div>

	<div class="col-md-4">
	<div class="home-box paper">
	<h4>Funkcioneri sa najvećim brojem negativnih revizorskih izvještaja</h4>

<?php	$args = array(
		'post_type'		=>	'candidates',
		'orderby'		=>	'title',
		'posts_per_page'	=>	'-1',
		'order'			=>	'DESC',
		'meta_query'		=>	array(
		'relation'		=>	'OR',
						array(
							// 'key' => 'revizorski_izvjestaji_2011',
							'value' => 'Negativan',
							'compare' => 'LIKE'
						),
         ),

			);
$custom_query = new WP_Query( $args ); ?>
<div class="table-responsive">
			<table class="table" id="partije">
 
<?php while ( $custom_query->have_posts() ) : $custom_query->the_post();

 	$ocjena=0;
 	if (get_post_meta( $post->ID, 'revizorski_izvjestaji_2011', true )=="Negativan") {
 		$ocjena++;
 	}
 	if (get_post_meta( $post->ID, 'revizorski_izvjestaji_2012', true )=="Negativan") {
 		$ocjena++;
 	}
 	if (get_post_meta( $post->ID, 'revizorski_izvjestaji_2013', true )=="Negativan") {
 		$ocjena++;
 	}
	$najgori[roots_title()] = array(
					'ocjena' =>	$ocjena,
					'ID' =>		$post->ID,
					);
	endwhile;

		$najgoriodnajgorih = array();
		foreach ($najgori as $key => $row){
			$najgoriodnajgorih[$key] = $row['najgoriodnajgorih'];
			}
		
		array_multisort($najgoriodnajgorih, $najgori, SORT_DESC);

			$i=0;
		foreach ($najgori as $key => $value) {
			$i++;
			if ($i <= 9) {
			echo '<tr>';
				echo '<td style="vertical-align:middle"><span class="glyphicon glyphicon-user"></span> <a href="' . get_permalink($value[ID]) . '">' . get_the_title($value[ID]) . '</a></td>';
				echo '<td style="text-align: right; white-space: nowrap;"><h4><span class="glyphicon glyphicon-thumbs-down"></span> ' . $value[ocjena] . '</h4></td>';
			echo '</tr>';
			}
		}
 ?>
			</table>
		</div>
<?php wp_reset_query(); ?>
	</div>
</div>

<div class="col-md-4">
	<div class="home-box paper">
	<h4>Funkcioneri sa najmanjim procentom prisustva na sjednicama</h4>

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
	$bar[roots_title()] = array(
					'dolasci' =>	round($dolasci, 2),
					'ID' =>		$post->ID,
					);
	endwhile;

		$foo = array();
		foreach ($bar as $key => $row){
			$foo[$key] = $row['foo'];
			}
		
		array_multisort($bar, SORT_ASC);

			$i=0;
		foreach ($bar as $key => $value) {
			$i++;
			if ($i <= 9 ) {
			echo '<tr>';
				echo '<td style="vertical-align:middle"><span class="glyphicon glyphicon-user"></span> <a href="' . get_permalink($value[ID]) . '">' . get_the_title($value[ID]) . '</a></td>';
				echo '<td style="text-align: right; white-space: nowrap;"><h4><span class="glyphicon glyphicon-thumbs-down"></span> ' . $value[dolasci] . '%</h4></td>';
			echo '</tr>';
			}
		}
			// echo '<pre>';
			// print_r($bar);
			// echo '<pre>';
 ?>
			</table>
		</div>
<?php wp_reset_query(); ?>
	</div>
</div>

</div>

