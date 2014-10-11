<div class="content-wrapper paper">
<?php while (have_posts()) : the_post(); ?>
  <article <?php post_class(); ?>>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php //get_template_part('templates/entry-meta'); ?>
    </header>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
    <footer>
      <?php wp_link_pages(array('before' => '<nav class="page-nav"><p>' . __('Pages:', 'roots'), 'after' => '</p></nav>')); ?>
    </footer>
  </article>
<?php endwhile; ?>

<strong>Predsjednik stranke: </strong><br />
<?php echo get_post_meta( $post->ID, 'party_president', true ); ?><br />

<a href="<?php echo get_post_meta( $post->ID, 'party_link', true ); ?>"><?php echo get_post_meta( $post->ID, 'party_link', true ); ?></a><br /><br />


<?php if(get_post_meta( $post->ID, 'nazivi_lista_koalicije', true )){ ?>
<h4>Izborne liste i koalicije za Izbore 2014.</h4>
<?php echo get_post_meta( $post->ID, 'nazivi_lista_koalicije', true ); ?><br /><br />
<?php } ?>




<?php if(get_post_meta( $post->ID, 'broj_kandidata', true )){ ?>
<div class="table-responsive">
	<table class="table table-bordered" id="partije">
		<tr>
			<td style="text-align:center;"><small>Broj novih kandidata</small></td>
			<td style="text-align:center;"><small>Broj ponovljenih kandidata</small></td>
			<td style="text-align:center;"><small>Ukupan broj kandidata</small></td>
			<td style="text-align:center;"><small>Procenat ponovljenih kandidata</small></td>
		</tr>
		<tr>
			<td style="text-align:center;"><h2><?php echo get_post_meta( $post->ID, 'broj_novih', true ); ?></h2></td>
			<td style="text-align:center;"><h2><?php echo get_post_meta( $post->ID, 'broj_ponovljenih', true ); ?></h2></td>
			<td style="text-align:center;"><h2><?php echo get_post_meta( $post->ID, 'broj_kandidata', true ); ?></h2></td>
			<td style="text-align:center;"><h2><?php echo get_post_meta( $post->ID, 'procenat_ponovljenih_kanidata', true ); ?></h2></td>
		</tr>
	</table>
</div>
<?php } ?>




<hr>

<?php if(get_post_meta( $post->ID, 'broj_poslanika', true )||
	get_post_meta( $post->ID, 'broj_poslanika', true )
){ ?>
<table class="table table-bordered centered">
	<tr>
		<th>Poslanička mjesta 2010 - 2014.</th>
		<th>Funkcije u mandatu 2010 - 2014.</th>
	</tr>
	<tr>
		<td>
		<h2><?php echo get_post_meta( $post->ID, 'broj_poslanika', true ); ?></h2>
		</td>
		<td>
		<h2><?php echo get_post_meta( $post->ID, 'broj_funkcionera', true ); ?></h2>
		</td>
	</tr>
</table>
<?php } ?>

<hr>

<h4>Institucije u izvršnoj vlasti u kojima je partija obnašala vlast:</h4>

<?php	
// $party_name_pivot = get_post_meta( $post->ID, 'party_name_pivot', true );
// echo $party_name_pivot;


// $args = array(
// 		'post_type'		=>	'candidates',
// 		'orderby'		=>	'title',
// 		'posts_per_page'	=>	'-1',
// 		'order'			=>	'DESC',
// 		'meta_query'		=>	array(
// 		'relation'		=>	'OR',
// 						array(
// 							'key' => 'revizorski_izvjestaji_2011',
// 							'value' => '',
// 							'compare' => '!='
// 						),
// 						array(
// 							'key' => 'prisustvo_sjednicama_vlade',
// 							'value' => '',
// 							'compare' => '!='
// 						),
// 					),
// );

// $custom_query = new WP_Query( $args ); ?>
<!-- <div class="table-responsive">
			<table class="table" id="partije">
 <ul> -->
<?php
// while ( $custom_query->have_posts() ) : $custom_query->the_post();

// if (get_post_meta( $post->ID, 'party_id', true ) == $party_name_pivot) {
// 	# code...
// 	echo '<li>';
// 	echo '<a href="';
// 	echo get_permalink();
// 	echo '">';
// 	the_title();
// 	echo '</a><br/>';
// 	echo 'Naziv institucije: ' . get_post_meta( $post->ID, 'naziv_institucije', true ) . '<br/>';
// 	echo 'Naziv funkcije: ' . get_post_meta( $post->ID, 'naziv_funkcije_2010_2014', true ) . '<br/>';
// 	echo '</li>';
// }	



// endwhile;
?>
 <!-- </ul>
</div>
<?php wp_reset_query(); ?> -->
 



<?php if(get_post_meta( $post->ID, 'naziv_institucije', true )){ ?>
<strong>Naziv institucije:</strong><br />
<?php echo get_post_meta( $post->ID, 'naziv_institucije', true ); ?><br /><br />
<?php } ?>

<?php if(get_post_meta( $post->ID, 'naziv_funkcije_2010_2014', true )){ ?>
<strong>Naziv funkcije:</strong><br />
<?php echo get_post_meta( $post->ID, 'naziv_funkcije_2010_2014', true ); ?><br /><br />
<?php } ?>



















<hr>

<?php if(get_post_meta( $post->ID, 'nazivi_institucija', true )){ ?>

<?php echo get_post_meta( $post->ID, 'nazivi_institucija', true ); ?><br />
<?php } ?>

<hr>

<?php if(get_post_meta( $post->ID, 'broj_pozitivnih_revizorskih_izvjestaja', true )||
	get_post_meta( $post->ID, 'broj_negativnih_revizorskih_izvjestaja', true )||
	get_post_meta( $post->ID, 'broj_uzdržanih_revizorskih_izvjestaja', true )
){ ?>
	<h4>Revizorski izvjestaji za sve institucije podložne reviziji u kojima  je partija bila na vlasti:</h4>
<table class="table table-bordered centered">
	
	<tr>
		<th><strong>Pozitivni:</strong></th>
		<th><strong>Negativni:</strong></th>
		<th><strong>Uzdržani i mišljenja sa rezervom:</strong></th>
	</tr>
	<tr>
		<td><?php echo get_post_meta( $post->ID, 'broj_pozitivnih_revizorskih_izvjestaja', true ); ?></td>
		<td><?php echo get_post_meta( $post->ID, 'broj_negativnih_revizorskih_izvjestaja', true ); ?></td>
		<td><?php echo get_post_meta( $post->ID, 'broj_uzdržanih_revizorskih_izvjestaja', true ); ?></td>
	</tr>
</table>
<?php } ?>

<hr>

<?php if(get_post_meta( $post->ID, 'election_promise_kept', true )||
	get_post_meta( $post->ID, 'election_promise_partially_done', true )||
	get_post_meta( $post->ID, 'election_promise_broken', true )
){ ?>
<h4>Procenat ispunjenosti obećanja partija:</h4>

<table class="table table-bordered centered">

	<tr>
		<th>Ispunjena obećanja:</th>
		<th>Djelimično ispunjena obećanja:</th>
		<th>Neispunjena obećanja:</th>
	</tr>
	<tr>
		<td><h2><?php echo get_post_meta( $post->ID, 'election_promise_kept', true ); ?></h2></td>
		<td><h2><?php echo get_post_meta( $post->ID, 'election_promise_partially_done', true ); ?></h2></td>
		<td><h2><?php echo get_post_meta( $post->ID, 'election_promise_broken', true ); ?></h2></td>
	</tr>
</table>
<?php } ?>

<br />

<?php if(get_post_meta( $post->ID, 'istinomjer_analiza', true )){ ?>
<h4>Istinomjer analiza o učinku partije (više na istinomjer.ba): </h4>
<?php echo get_post_meta( $post->ID, 'istinomjer_analiza', true ); ?><br /><br />
<?php } ?>

<hr>

<h4>Broj osnova po kojima su partije kršile zakone </h4>

<?php echo get_post_meta( $post->ID, 'ukupan_broj_kršenja_zakona_partije', true ); ?>

<!-- Nav tabs -->
<ul class="nav nav-tabs" role="tablist">
  <li class="active"><a href="#2010" role="tab" data-toggle="tab">2010</a></li>
  <li><a href="#2011" role="tab" data-toggle="tab">2011</a></li>
  <li><a href="#2012" role="tab" data-toggle="tab">2012</a></li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="2010">
	<h4>Kršenja zakona od strane partije (izvodi iz revizorskih izvještaja za 2010:)</h4>
	<?php echo get_post_meta( $post->ID, 'kršenje_zakona_partije_2010', true ); ?>
  </div>
  <div class="tab-pane" id="2011">
  	<h4>Kršenja zakona od strane partije (izvodi iz revizorskih izvještaja za 2011:)</h4>
	<?php echo get_post_meta( $post->ID, 'kršenje_zakona_partije_2011', true ); ?>
  </div>
  <div class="tab-pane" id="2012">
  	<h4>Kršenja zakona od strane partije (izvodi iz revizorskih izvještaja za 2012:)</h4>
	<?php echo get_post_meta( $post->ID, 'kršenje_zakona_partije_2012', true ); ?>
  </div>
  </div>

<hr>


<?php if(get_post_meta( $post->ID, 'spisak_koalicionih_partnera', true )){ ?>
<h4>Koalicioni partneri: </h4>
<?php echo get_post_meta( $post->ID, 'spisak_koalicionih_partnera', true ); ?><br /><br />
<?php } ?>

</div>