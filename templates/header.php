<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>"><img width="217" height="50" src="<?php echo get_template_directory_uri(); ?>/assets/img/ciste_liste_logo.png" alt="Čiste liste logo"></a>
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>
    </nav>
  </div>
</header>

<div class="container">
<div class="home-box home-baner colored-paper">
  <div class="row">

    <div class="col-md-6">

      <h2>Kreiraj glasački listić <span class="glyphicon glyphicon-search"></span></h2>
      
      <input type="text" class="typeahead" data-provide="typeahead" data-items="4" placeholder="Opština">
      
		<?php
		$args = array(
		'post_type'       =>  'municipalities',
		'orderby'         =>  'title',
		'posts_per_page'  =>  '-1',
		'order'           =>  'DESC',
		);
		$custom_query = new WP_Query( $args );
		$opstine = array();
      
		while ( $custom_query->have_posts() ) : $custom_query->the_post();
		$title = get_the_title();
		$permalink = get_permalink();
		$opstine[$title] =  $permalink;
		endwhile;
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

    <div class="col-md-6">
       <div style="font-size:22px; line-height:1.3em">Upišite naziv vaše Opštine/Općine i pogledajte kako će izgledati vaš glasački listić. Dodatno se upoznajte sa radom onih kandidata koji su u prethodnim mandatu bili na nekoj od zakonodavnih ili izvršnih funkcija.</div>
    </div>

  </div>
</div>
</div>

<?php wp_reset_query(); ?>