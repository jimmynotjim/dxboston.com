<!doctype html>

<!--[if lt IE 7]> <html class="no-js lt-ie10 lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie10 lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie10 lt-ie9" lang="en"> <![endif]-->
<!--[if IE 9]> <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="initial-scale=1">
  <title><?php wp_title( '' ); ?></title>

  <link rel="icon" href="<?php echo CHILD_SS_URI; ?>/assets/img/favicon.ico">

  <?php if ( defined( 'TYPEKIT' ) ) : // Typkit Code ?>
    <script type="text/javascript">
      TypekitConfig = {
        kitId: '<?php echo TYPEKIT; ?>'
      };
      (function() {
        var tk = document.createElement('script');
        tk.src = '//use.typekit.com/' + TypekitConfig.kitId + '.js';
        tk.type = 'text/javascript';
        tk.async = 'true';
        tk.onload = tk.onreadystatechange = function() {
          var rs = this.readyState;
          if (rs && rs !== 'complete' && rs !== 'loaded') return;
          try { Typekit.load(TypekitConfig); } catch (e) {}
        };
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(tk, s);
      })();
    </script>
  <?php endif; ?>

  <?php if ( defined( 'HFJ_ACCOUNT' ) ) : // H&FJ Code ?>
    <link rel="stylesheet" type="text/css" href="//cloud.typography.com/<?php echo HFJ_ACCT; ?>/<?php echo HFJ_PROJECT; ?>/css/fonts.css" />
  <?php endif; ?>

  <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,400,700,200italic,400italic' rel='stylesheet' type='text/css'>

  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-52642210-1', 'auto');
    ga('send', 'pageview');

  </script>

  <?php wp_head(); ?>

</head>

<body <?php body_class(); ?> >

  <header role="banner" class="site-header wrapper">

    <nav role="navigation" class="nav main-nav">
      <ul class="menu secondary-menu">
        <li class="search"><?php /*<a href="#" class="icon search-icon">Search</a>*/ ?></li>
        <li class="register"><a href="http://dxb2014.eventbrite.com/" class="btn--register">Register</a></li>
      </ul>
      <a href="#" class="nav-toggle" aria-hidden="false">Menu</a>
      <?php wp_nav_menu( array( 'menu' => 'Main-Navigation','container' => false, 'menu_class' => 'menu primary-menu' ) ); ?>
    </nav>

  </header>

  <div class="site-sub-header wrapper">
    <a href="<?php echo WWW_URL; ?>" class="site-logo">DxBoston.com</a>
    <?php
      if ( is_single() ) :

        if ( is_singular( 'speakers' ) ) :

          $terms_array    = array();
          $terms          = get_the_terms( $post->ID, 'speaker-type' );

          foreach( $terms as $term ) {
            $terms_array[] = $term;
          }

          $section = $terms_array[0]->name;

        elseif ( is_singular( 'team' ) ) :

          $section = 'Volunteer';

        elseif ( is_singular( 'sessions' ) ) :

          $date = get_post_meta( $post->ID, '_cmb_session_start_timestamp' );
          $year = date( 'Y', $date[0] );

          $section = $year . ' Session';

        else :

          $section = 'Community';

        endif;

      elseif ( is_404() ) :

        $section = '404';

      else :

        $term_array = array();
        $terms      = get_the_terms( $post->ID, 'page-sections' );

        if ( $terms ) :

          foreach( $terms as $term ) {
            $terms_array[] = $term->name;
          }

          $section = $terms_array[0];

        else :

          $section = '';

        endif;

      endif;
    ?>
    <?php if ( !is_front_page() ) { ?><p class="section-heading"><?php echo $section; ?></p><?php } ?>
  </div>
