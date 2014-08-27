  <footer class="site-footer">

    <nav role="navigation" class="nav footer-nav">
      <a href="http://dxb2014.eventbrite.com/" class="btn btn--lrg btn--full register">Register</a>
      <?php wp_nav_menu( array( 'menu' => 'Footer-Navigation','container' => false, 'menu_class' => 'menu footer-menu' ) ); ?>
      <div class="footer-buttons">
        <ul class="social nav">
          <li><a href="http://www.facebook.com/designexchangeboston" class="btn btn--social btn--facebook">facebook</a></li>
          <li><a href="https://twitter.com/dxboston" class="btn btn--social btn--twitter"><span>twitter</span></a></li>
          <li><a href="http://instagram.com/designexchangeboston" class="btn btn--social btn--instagram"><span>instagram</span></a></li>
        </ul>

        <a href="http://boston.aiga.org/" class="presented-by">
          <span>Hosted By</span>
          <img src="<?php echo CHILD_SS_URI; ?>/assets/img/aiga-logo.png" />
        </a>
      </div>
    </nav>



  </footer>

  <?php wp_footer(); ?>

  <?php if ( 'local' == WP_ENV ) : ?>
  <!-- Live Reload -->
  <script src="//localhost:35729/livereload.js"></script>
  <?php endif; ?>

</body>

</html>
