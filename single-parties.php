<?php get_template_part('templates/content', 'single'); ?>

<strong>Predsjednik stranke: </strong><br />
<?php echo get_post_meta( $post->ID, 'party_president', true ); ?><br />

<a href="<?php echo get_post_meta( $post->ID, 'party_link', true ); ?>"><?php echo get_post_meta( $post->ID, 'party_link', true ); ?></a><br /><br />

<h4>Izborne liste i koalicije za Izbore 2014.</h4>
<?php echo get_post_meta( $post->ID, 'nazivi_lista_koalicije', true ); ?><br /><br />

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
<!-- 	<table class="table-bordered table-condensed">
			<?php if (get_post_meta( $post->ID, '701', true )) {?><tr><td style="text-align:center;">701</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '701', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '702', true )) {?><tr><td style="text-align:center;">702</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '702', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '703', true )) {?><tr><td style="text-align:center;">703</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '703', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '600', true )) {?><tr><td style="text-align:center;">600</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '600', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '511', true )) {?><tr><td style="text-align:center;">511</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '511', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '512', true )) {?><tr><td style="text-align:center;">512</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '512', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '513', true )) {?><tr><td style="text-align:center;">513</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '513', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '514', true )) {?><tr><td style="text-align:center;">514</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '514', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '515', true )) {?><tr><td style="text-align:center;">515</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '515', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '521', true )) {?><tr><td style="text-align:center;">521</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '521', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '522', true )) {?><tr><td style="text-align:center;">522</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '522', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '523', true )) {?><tr><td style="text-align:center;">523</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '523', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '401', true )) {?><tr><td style="text-align:center;">401</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '401', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '402', true )) {?><tr><td style="text-align:center;">402</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '402', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '403', true )) {?><tr><td style="text-align:center;">403</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '403', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '404', true )) {?><tr><td style="text-align:center;">404</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '404', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '405', true )) {?><tr><td style="text-align:center;">405</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '405', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '406', true )) {?><tr><td style="text-align:center;">406</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '406', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '407', true )) {?><tr><td style="text-align:center;">407</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '407', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '408', true )) {?><tr><td style="text-align:center;">408</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '408', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '409', true )) {?><tr><td style="text-align:center;">409</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '409', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '410', true )) {?><tr><td style="text-align:center;">410</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '410', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '411', true )) {?><tr><td style="text-align:center;">411</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '411', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '412', true )) {?><tr><td style="text-align:center;">412</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '412', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '301', true )) {?><tr><td style="text-align:center;">301</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '301', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '302', true )) {?><tr><td style="text-align:center;">302</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '302', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '303', true )) {?><tr><td style="text-align:center;">303</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '303', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '304', true )) {?><tr><td style="text-align:center;">304</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '304', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '305', true )) {?><tr><td style="text-align:center;">305</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '305', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '306', true )) {?><tr><td style="text-align:center;">306</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '306', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '307', true )) {?><tr><td style="text-align:center;">307</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '307', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '308', true )) {?><tr><td style="text-align:center;">308</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '308', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '309', true )) {?><tr><td style="text-align:center;">309</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '309', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '201', true )) {?><tr><td style="text-align:center;">201</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '201', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '202', true )) {?><tr><td style="text-align:center;">202</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '202', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '203', true )) {?><tr><td style="text-align:center;">203</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '203', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '204', true )) {?><tr><td style="text-align:center;">204</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '204', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '205', true )) {?><tr><td style="text-align:center;">205</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '205', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '206', true )) {?><tr><td style="text-align:center;">206</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '206', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '207', true )) {?><tr><td style="text-align:center;">207</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '207', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '208', true )) {?><tr><td style="text-align:center;">208</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '208', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '209', true )) {?><tr><td style="text-align:center;">209</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '209', true ); ?></td></tr><?php }; ?>
			<?php if (get_post_meta( $post->ID, '210', true )) {?><tr><td style="text-align:center;">210</td><td style="text-align:center;"><?php echo get_post_meta( $post->ID, '210', true ); ?></td></tr><?php }; ?>
	</table>
 --></div>

<hr>

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

<hr>

<h4>Institucije u izvršnoj vlasti u kojima je partija obašala vlast:</h4>
<?php echo get_post_meta( $post->ID, 'nazivi_institucija', true ); ?><br />

<hr>

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

<hr>

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

<br />

<h4>Istinmjer analiza o učinku partije (više na istinomjer.ba): </h4>
<?php echo get_post_meta( $post->ID, 'istinomjer_analiza', true ); ?><br /><br />


<hr>

<h4>Broj osnova po kojima su partije kršile zakone: </h4>
<?php echo get_post_meta( $post->ID, 'ukupan_broj_kršenja_zakona_partije', true ); ?>

<h4>Kršenja zakona od strane partije (izvodi iz revizorskih izvještaja za 2010:)</h4>
<?php echo get_post_meta( $post->ID, 'kršenje_zakona_partije_2010', true ); ?>

<h4>Kršenja zakona od strane partije (izvodi iz revizorskih izvještaja za 2011:)</h4>
<?php echo get_post_meta( $post->ID, 'kršenje_zakona_partije_2011', true ); ?>

<h4>Kršenja zakona od strane partije (izvodi iz revizorskih izvještaja za 2012:)</h4>
<?php echo get_post_meta( $post->ID, 'kršenje_zakona_partije_2012', true ); ?>

<hr>

<h4>Koalicioni partneri: </h4>
<?php echo get_post_meta( $post->ID, 'spisak_koalicionih_partnera', true ); ?><br /><br />
