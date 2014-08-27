(function($) {
  var $navTrigger = $('.nav-toggle');
  var $navTarget = $('.primary-menu');
  var $parentItems = $navTarget.find('.parent-item');
  var $subTrigger = $navTarget.find('.parent-item > a');

  $navTrigger.on('click', function(e) {
    e.preventDefault();

    if ( $navTarget.hasClass('is-open-first') ) {
        $navTarget.removeClass('is-open-first');
    } else {
      if ( $navTarget.hasClass('is-open-second') ) {
        $navTarget.removeClass('is-open-second');
        setTimeout(function() {
          $parentItems.removeClass('is-active');
        }, 400);
      } else {
        $navTarget.addClass('is-open-first');
      }
    }
  });

  $subTrigger.on('click', function(e) {
    e.preventDefault();

    var $this_parent = $(this).parent();

    if ( $this_parent.hasClass('is-active') ) {
      $navTarget.addClass('is-open-first');
      $navTarget.removeClass('is-open-second');
      setTimeout(function() {
          $parentItems.removeClass('is-active');
        }, 400);
    } else {
      $('.parent-item').not($this_parent).removeClass('is-active');
      $this_parent.addClass('is-active');
      $navTarget.addClass('is-open-second');
      $navTarget.removeClass('is-open-first');
    }
  });

})(jQuery);

(function($) {
  if ( $('body').hasClass('community') ) {
    var $landing_list   = $('.landing-list');
    var $first_item     = $( $landing_list.find('.has-image')[0] );
    var $no_image_head  = $landing_list.find('.no-image').find('.landing-item__header');

    var set_height = function() {
      var preview_height = $first_item.find('img').height();
      $no_image_head.outerHeight(preview_height - 4);
    };

    $(window).resize( function() {
      set_height();
    });

    set_height();
  }
})(jQuery);
