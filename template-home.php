<?php
/*
Template Name: Home
*/
?>


<div class="home-box">
	<h2>Kreiraj glasački listić</h2>

<input type="text" class="typeahead" data-provide="typeahead" data-items="4" placeholder="Opština">

<?php
$args = array(
	'post_type'		=> 'municipalities',
	'orderby'		=> 'title',
	'posts_per_page'	=> '-1',
	'order'			=> 'DESC',
);
$custom_query = new WP_Query( $args );

$opstine = array();

while ( $custom_query->have_posts() ) : $custom_query->the_post();
	$title = get_the_title();
	$permalink = get_permalink();
	$opstine[$title] =  $permalink;
 endwhile;

// echo '<pre style="font-size:10px">';
// print_r($opstine);
// echo json_encode($opstine);
// echo "</pre>";
 ?>


<script>

var data = <?php echo json_encode($opstine); ?>;

$('.typeahead').typeahead({
  minLength:1,
  updater: function (item) {
        /* navigate to the selected item */
        window.location.href = data[item];
    },
  source: function (typeahead, query) {
    var links=[];
    for (var name in data){
        links.push(name); 
    }
    return links;
    }
});	
</script>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="home-box">
			<h2>Partije po broju ponovljenih kandidata</h2>
			<?php
			$args = array(
				'post_type'		=> 'parties',
				'orderby'		=> 'title',
				'posts_per_page'	=> '4',
				'order'			=> 'DESC',
				'meta_key'		=> 'broj_ponovljenih',
				'orderby'		=> 'meta_value_num',
			);
			$custom_query = new WP_Query( $args ); ?>
			<div class="table-responsive">
			<table class="table table-bordered" id="partije">
			<tr>
				<th>Partija</th>
				<td style="text-align:center;"><small>Broj novih kandidata</small></td>
				<td style="text-align:center;"><small>Broj ponovljenih kandidata</small></td>
				<td style="text-align:center;"><small>Ukupan broj kandidata</small></td>
				<td style="text-align:center;"><small>Procenat ponovljenih kandidata</small></td>
			</tr>
			<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
			<tr>
				<td ><a href="<?php echo get_permalink(); ?>"><?php echo roots_title(); ?></a></td>
				<td style="text-align:center;"><h2><?php echo get_post_meta( $post->ID, 'broj_novih', true ); ?></h2></td>
				<td style="text-align:center;"><h2><?php echo get_post_meta( $post->ID, 'broj_ponovljenih', true ); ?></h2></td>
				<td style="text-align:center;"><h2><?php echo get_post_meta( $post->ID, 'broj_kandidata', true ); ?></h2></td>
				<td style="text-align:center;"><h2><?php echo get_post_meta( $post->ID, 'procenat_ponovljenih_kanidata', true ); ?></h2></td>
			</tr>
			<?php endwhile; ?>
			
			</table>
			</div>

			<a href="http://cisteliste.ba/partije/">Pogledajte sve partije</a>
			<?php wp_reset_query(); ?>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-8">
		<div class="home-box">
			<h3>Partije sa najviše negativnih revizorskih izvještaja i procenat neispunjenih obećanja</h3>

			<?php
			$args = array(
				'post_type'		=> 'parties',
				'orderby'		=> 'title',
				'posts_per_page'	=> '4',
				'order'			=> 'DESC',
				'meta_key'		=> 'broj_negativnih_revizorskih_izvjestaja',
				'orderby'		=> 'meta_value_num',
				// 'meta_query' => array(
				// 	array(
				// 		'taxonomy'  => 'category',
				// 		'field'     => 'slug',
				// 		'terms'     => array('izdvojeno'),
				// 		),
				// 	),
			);
			$custom_query = new WP_Query( $args ); ?>
			<div class="table-responsive">
			<table class="table" id="partije">
			<tr>
				<th>Partija</th>
				<td style="text-align:center;">Broj negativnih revizorskih izvještaja</td>
				<td style="text-align:center;">Procenat neispunjenih obećanja</td>
			</tr>
			<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
			<tr>
				<td style="vertical-align:middle"><a href="<?php echo get_permalink(); ?>"><?php echo roots_title(); ?></a></td>
				<td style="text-align:center;"><h2><?php echo get_post_meta( $post->ID, 'broj_negativnih_revizorskih_izvjestaja', true ); ?></h2></td>
				<td style="text-align:center;"><h2><?php echo get_post_meta( $post->ID, 'election_promise_broken', true ); ?></h2></td>
			</tr>
			<?php endwhile; ?>
			</table>
			</div>
			<?php wp_reset_query(); ?>
		</div>
	</div>

	<div class="col-md-4">
		<div class="home-box">
			<h3>Funkcioneri sa najvećim brojem neispunjenih obećanja</h3>
			<?php
			$args = array(
				'post_type'		=> 'candidates',
				'orderby'		=> 'title',
				'posts_per_page'	=> '4',
				'order'			=> 'DESC',
				'meta_key'		=> 'neispunjena_obecanja',
				'orderby'		=> 'meta_value_num',
			);
			$custom_query = new WP_Query( $args ); ?>
			<div class="table-responsive">
			<table class="table" id="partije">
			<tr>
				<th>Kandidat</th>
				<td style="text-align:center;">Broj neispunjenih<br />obećanja</td>
			</tr>
			<?php while ( $custom_query->have_posts() ) : $custom_query->the_post(); ?>
			<tr>
				<td style="vertical-align:middle"><a href="<?php echo get_permalink(); ?>"><?php echo roots_title(); ?></a></td>
				<td style="text-align:center;"><h2><?php echo get_post_meta( $post->ID, 'neispunjena_obecanja', true ); ?></h2></td>
			</tr>
			<?php endwhile; ?>
			</table>
			</div>
			<?php wp_reset_query(); ?>
		</div>
	</div>
</div>

<div class="home-box">
	<h2>Analize</h2>

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

<div class="home-box">
	<h2>Partneri</h2>
</div>
