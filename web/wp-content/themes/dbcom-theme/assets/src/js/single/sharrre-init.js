jQuery(document).ready( function($) {
  $('.twitter-share').sharrre({
    share: { twitter: true },
    enableHover: false,
    enableTracking: false,
    buttons: { twitter: { via: 'dxboston' } },
    template: '<a class="btn--social btn--twitter" href="#">Tweet</a>',
    click: function(api) {
      api.openPopup('twitter');
    }
  });

  $('.fb-share').sharrre({
    share: { facebook: true },
    enableHover: false,
    enableTracking: false,
    template: '<a class="btn--social btn--facebook" href="#">Like</a>',
    click: function(api) {
      api.openPopup('facebook');
    }
  });
});
