<div class="sidebar-wrapper paper">
	
	<?php  if ( 'parties' == get_post_type() ) { ?>
	
	<h4>Donacije</h4>
	
	<table class="table table-bordered">
		<tr>
			<td><strong>Registrovane donacije 2010. - 2013.</td>
		</tr>
		<tr>
			<td><h3><?php echo get_post_meta( $post->ID, 'ukupno_registrovanih_donacija', true ); ?></h3></td>
		</tr>
		<tr>
			<td>Izdvajanja za partije iz budžeta 2010. - 2014.</td>
		</tr>
		<tr>
			<td><h3><?php echo get_post_meta( $post->ID, 'budžetska_izdvajanje_partije_2010_2014', true ); ?></h3></td>
		</tr>
	</table>
		
	<h4>Sankcije</h4>
	
	<table class="table table-bordered">
		<tr>
			<td>Izrečene sankcije u periodu 2010. - 2013.</td>
		</tr>
		<tr>
			<td><h3><?php echo get_post_meta( $post->ID, 'sankcije_partije', true ); ?></h3></td>
		</tr>
	</table>
	
	<h4>Troškovi kampanja</h4>
	
	<table class="table table-bordered">
		<tr>
			<td>Opći/Opšti izbori 2010 godine</td>
		</tr>
		<tr>
			<td><h3><?php echo get_post_meta( $post->ID, 'troškovi_kampanja_partije_2010', true ); ?></h3></td>
		</tr>
	
		<tr>
			<td>Lokalni izbori 2012. godine</td>
		</tr>
		<tr>
			<td><h3><?php echo get_post_meta( $post->ID, 'troškovi_kampanja_partije_2012', true ); ?></h3></td>
		</tr>
	
	</table>
	<?php } ?>
	
	
	
	
	<?php  if ( 'candidates' == get_post_type() ) { ?>
	
	<?php if(get_post_meta( $post->ID, 'broj_partija_clanstvo', true )){ ?>
	<strong>Partije kroz karijeru:</strong><br />
	<?php echo get_post_meta( $post->ID, 'broj_partija_clanstvo', true ); ?><br /><br />
	<?php } ?>
	
	
	
	
	<?php if(get_post_meta( $post->ID, 'nazivi_partija_clanstvo', true )){ ?>
	<strong>Nazivi partija kroz karijeru:</strong><br />
	<?php echo get_post_meta( $post->ID, 'nazivi_partija_clanstvo', true ); ?><br /><br />
	<?php } ?>
	
	
	
	
	<?php while (have_posts()) : the_post(); ?>
		<h4>Biografija</h4>
	    <div class="entry-content">
	      <?php the_content(); ?>
	    </div>
	<?php endwhile; ?>
	
	
	<?php if(get_post_meta( $post->ID, 'imovinski_karton_link', true )){ ?>
	<strong>Eksterni link:</strong> <a href="<?php echo get_post_meta( $post->ID, 'imovinski_karton_link', true ); ?>">Imovinski karton</a>
	<?php } ?>
	

	
	<?php } ?>

	<?php if (in_category( 'analize' ) || is_page('vise-o-programu' )) { ?>

		<h2>Analize</h2>
	
	<?php
	$args = array(
		'post_type'		=> 'post',
		'orderby'		=> 'date',
		'posts_per_page'	=> '4',
		'post__not_in'		=> array($post->ID),
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
		while ( $analize->have_posts() ) : $analize->the_post();
		
		echo '<h4>';
		echo '<a href="';
		echo get_permalink();
		echo '">';
		the_title();
		echo '</a>';
		echo '</h4>';
		the_excerpt();
		
		endwhile;
	?>
	
	<?php } ?>
</div>

<?php wp_reset_query(); ?>