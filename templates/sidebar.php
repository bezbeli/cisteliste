<?php //dynamic_sidebar('sidebar-primary'); ?>


<?php  if ( 'parties' == get_post_type() ) { ?>

	<h4>Donacije</h4>

<table class="table table-bordered">
	<tr>
		<td><strong>Registrovane donacije 2010. - 2013.</strong></td>
	</tr>
	<tr>
		<td><?php echo get_post_meta( $post->ID, 'ukupno_registrovanih_donacija', true ); ?></td>
	</tr>
	<tr>
		<td><strong>Izdvajanja za partije iz budžeta 2010. - 2014.</strong></td>
	</tr>
	<tr>
		<td><?php echo get_post_meta( $post->ID, 'budžetska_izdvajanje_partije_2010_2014', true ); ?></td>
	</tr>
</table>
	
<h4>Sankcije</h4>

<table class="table table-bordered">
	<tr>
		<td><strong>Izrečene sankcije u periodu 2010. - 2013.</strong></td>
	</tr>
	<tr>
		<td><?php echo get_post_meta( $post->ID, 'sankcije_partije', true ); ?></td>
	</tr>
</table>

<h4>Troškovi kampanja</h4>

<table class="table table-bordered">
	<tr>
		<td><strong>Opći/Opšti izbori 2010 godine</strong></td>
	</tr>
	<tr>
		<td><?php echo get_post_meta( $post->ID, 'troškovi_kampanja_partije_2010', true ); ?></td>
	</tr>

	<tr>
		<td><strong>Opći/Opšti izbori 2012 godine</strong></td>
	</tr>
	<tr>
		<td><?php echo get_post_meta( $post->ID, 'troškovi_kampanja_partije_2012', true ); ?></td>
	</tr>

</table>
<?php } ?>



<?php //dynamic_sidebar('sidebar-primary'); ?>


<?php  if ( 'candidates' == get_post_type() ) { ?>

<strong>Partije kroz karijeru:</strong><br />
<?php echo get_post_meta( $post->ID, 'broj_partija_clanstvo', true ); ?><br /><br />

<strong>Nazivi partija kroz karijeru:</strong><br />
<?php echo get_post_meta( $post->ID, 'nazivi_partija_clanstvo', true ); ?><br /><br />









<?php while (have_posts()) : the_post(); ?>
	<h4>Biografija</h4>
    <div class="entry-content">
      <?php the_content(); ?>
    </div>
<?php endwhile; ?>

<strong>Eksterni link:</strong> <a href="<?php echo get_post_meta( $post->ID, 'imovinski_karton_link', true ); ?>">Imovinski karton</a>









<?php } ?>