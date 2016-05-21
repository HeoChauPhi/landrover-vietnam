(function($) {
  function navigation() {
    $('.menu-icon').click(function() {
      $('ul.main-nav').slideToggle('fast');
    });

    var parent_item = $('ul.main-nav li.menu-item-has-children > a');
    parent_item.append('<i class="fa fa-angle-down submenu-icon"></i>');
    $('.submenu-icon').click(function(){
      var this_parent = $(this).parent('a');
      this_parent.next('ul.nav-drop').slideToggle('fast');
      return false;
    });
  }

  $(document).ready(function() {
    // Call to function
    navigation();
  });

  $(window).load(function() {
    // Call to function
  });

  $(window).resize(function() {
    // Call to function
  });
})(jQuery);