<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
	    <header>
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>




<?php
$party_id = get_post_meta( $post->ID, 'naziv_partije', true );
$args = array(
	'post_type'		=> 'parties',
	'meta_query'		=> array(
		array(
			'meta_key'  => 'party_name_comp',
			'value'     => $party_id,
			),
		),
);
$custom_query = new WP_Query( $args ); ?>
<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
	
	<a href="<?php echo get_permalink(); ?>"><?php echo roots_title(); ?></a><br /><br />
<?php endwhile; 
wp_reset_query();
?>













<strong>Naziv institucije:</strong><br />
<?php echo get_post_meta( $post->ID, 'naziv_institucije', true ); ?><br /><br />

<strong>Naziv funkcije:</strong><br />
<?php echo get_post_meta( $post->ID, 'naziv_funkcije_2010_2014', true ); ?><br /><br />

<strong>Broj osvojenih glasova:</strong><br />
<?php echo get_post_meta( $post->ID, 'broj_osvojenih_glasova', true ); ?>




<h4>Procenat ispunjenosti obećanja partija</h4>

<?php echo get_post_meta( $post->ID, 'election_promise_description', true ); ?>

<table class="table table-bordered centered">

	<tr>
		<th>Ispunjena obećanja:</th>
		<th>Djelimično ispunjena obećanja:</th>
		<th>Neispunjena obećanja:</th>
	</tr>
	<tr>
		<td><h2><?php echo get_post_meta( $post->ID, 'ispunjena_obecanja', true ); ?></h2></td>
		<td><h2><?php echo get_post_meta( $post->ID, 'djelimicno_ispunjena_obecanja', true ); ?></h2></td>
		<td><h2><?php echo get_post_meta( $post->ID, 'neispunjena_obecanja', true ); ?></h2></td>
	</tr>
</table>


<h4>Ocjena revizorskog izvještaja za instituciju</h4>
<table class="table table-bordered centered">
	<tr>
		<td>
			2011.
		</td>
		<td>
			2012.
		</td>
		<td>
			2013.
		</td>
	</tr>
	<tr>
		<td><?php echo get_post_meta( $post->ID, 'revizorski_izvjestaji_2011', true ); ?></td>
		<td><?php echo get_post_meta( $post->ID, 'revizorski_izvjestaji_2012', true ); ?></td>
		<td><?php echo get_post_meta( $post->ID, 'revizorski_izvjestaji_2013', true ); ?></td>
	</tr>
</table>


<h4><?php echo get_post_meta( $post->ID, 'naziv_paramenta_drugi_dom', true ); ?></h4>

<table class="table table-bordered ce">
	<tr>
		<td>Prisustvo sjednicama*</td>
		<td>Broj postavljenih poslaničkih pitanja</td>
		<td>Broj pokrenutih poslaničkih inicijativa</td>
		<td>Broj predloženih zakona</td>
	</tr>
	<tr>
		<td><?php echo get_post_meta( $post->ID, 'prisustvo_sjednicama_drugi_dom', true ); ?></td>
		<td><?php echo get_post_meta( $post->ID, 'broj_postavljenih_pitanja_drugi_dom', true ); ?></td>
		<td><?php echo get_post_meta( $post->ID, 'broj_pokrenutih_inicijativa_drugi_dom', true ); ?></td>
		<td><?php echo get_post_meta( $post->ID, 'broj_predlozenih_zakona_drugi_dom', true ); ?></td>
	</tr>
</table>

<h4><?php echo get_post_meta( $post->ID, 'naziv_paramenta', true ); ?></h4>

<table class="table table-bordered">
	<tr>
		<td>Prisustvo sjednicama parlamenta*</td>
		<td>Broj postavljenih poslaničkih pitanja</td>
		<td>Broj pokrenutih poslaničkih inicijativa</td>
		<td>Broj predloženih zakona</td>
	</tr>
	<tr>
		<td><?php echo get_post_meta( $post->ID, 'prisustvo_sjednicama', true ); ?></td>
		<td><?php echo get_post_meta( $post->ID, 'broj_postavljenih_pitanja', true ); ?></td>
		<td><?php echo get_post_meta( $post->ID, 'broj_pokrenutih_inicijativa', true ); ?></td>
		<td><?php echo get_post_meta( $post->ID, 'broj_predlozenih_zakona', true ); ?></td>
	</tr>
</table>

<h4><?php echo get_post_meta( $post->ID, 'naziv_vlade', true ); ?></h4>

<table class="table table-bordered">
	<tr>
		<td>Prisustvo sjednicama vlade*</td>
		<td>Broj predloženih mjera</td>
		<td>Broj predloženih zakona</td>
		<td>Broj zaprimljenih pitanja</td>
	</tr>
	<tr>
		<td><?php echo get_post_meta( $post->ID, 'prisustvo_sjednicama_vlade', true ); ?></td>
		<td><?php echo get_post_meta( $post->ID, 'vlada_izradjene_mjere', true ); ?></td>
		<td><?php echo get_post_meta( $post->ID, 'vlada_broj_predlozenih_zakona', true ); ?></td>
		<td><?php echo get_post_meta( $post->ID, 'vlada_broj_zaprimljenih_pitanja', true ); ?></td>
	</tr>
</table>

<small>*Podaci se odnose na period 2011. - 2013.</small>

<h4>Ostali kandidati sa liste</h4>
<?php 
$election_id = get_post_meta( $post->ID, 'election_id', true );
$party_id = get_post_meta( $post->ID, 'party_id', true );
// echo $post->ID;

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
					'value'  => $party_id,
					),
				),
		);

	$query_kandidate = new WP_Query( $args );
	echo '<ul>';
	while ( $query_kandidate->have_posts() ) : $query_kandidate->the_post();
		echo '<li class="zastupnik">';
			// echo ' &#9617; ';
			echo get_post_meta( $post->ID, 'list_number', true ) . '  - ';
			echo '<a href="' . get_permalink() . '">';
			echo get_the_title( );
			echo '</a>';
			// edit_post_link(' - Edit');
		echo '</li>';

	endwhile;
	echo '</ul>';
 ?>







    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
  </article>
<?php endwhile; ?>

<?php wp_reset_query(); ?>
