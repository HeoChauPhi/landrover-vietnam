(function($) {
  function navigation() {
    $('.menu-icon').click(function() {
      $('ul.main-nav').slideToggle('fast');
    });

    var parent_item = $('ul.main-nav li.menu-item-has-children > a');
    parent_item.append('<i class="fa fa-angle-down submenu-icon"></i>');
    $('.submenu-icon').click(function(){
      var this_parent = $(this).parent('a');
      $(this).toggleClass('fa-angle-down fa-angle-up');
      this_parent.next('ul.nav-drop').slideToggle('fast');
      return false;
    });
  }

  function showCat() {
    var catparent = $('.listcat li.has-subterm > a');
    catparent.append('<i class="fa fa-angle-down subcatitem-icon"></i>');
    $('.subcatitem-icon').click(function(){
      var this_parent = $(this).parent('a');
      $(this).toggleClass('fa-angle-down fa-angle-up');
      this_parent.next('ul.subterm').slideToggle('fast');
      return false;
    });
  }

  function featureSlick() {
    $('.feature .block-slider').slick({
      dots: true,
      infinite: true,
      speed: 500,
      fade: true,
      cssEase: 'linear',
      adaptiveHeight: true,
      autoplay: true,
      autoplaySpeed: 3000,
    });

    $('.car-image').hover(
      function() {
        $(this).slick({
          dots: false,
          infinite: true,
          speed: 300,
          fade: true,
          cssEase: 'linear',
          adaptiveHeight: true,
          autoplay: true,
          autoplaySpeed: 500,
          arrows: false,
        })
      },

      function() {
        $(this).slick('unslick');
      }
    )
  }

  function slickGallery() {
    $('.main-slick').slick({
      adaptiveHeight: true,
      infinite: true,
      fade: true,
      arrows: false,
      //autoplay: true,
      asNavFor: '.sub-slick',
      lazyLoad: 'ondemand'
      //speed: 300  
    });
    
    $('.sub-slick').slick({
      asNavFor: '.main-slick',
      arrows: true,
      slidesToScroll: 1,
      //autoplay: true,
      //speed: 300,
      focusOnSelect: true,
      infinite: true,
      slidesToShow: 4
    });
  }

  function colorboxImage() {
    $(".car-colorbox").colorbox({rel:'group1'});
  }

  function matchHeight() {
    $('.block-cat').each(function() {
      $(this).find('.post-cars .car-title').matchHeight();
      $(this).find('.post-cars .car-content').matchHeight();
    })
  }

  $(document).ready(function() {
    // Call to function
    navigation();
    showCat();
    featureSlick();
    slickGallery();
    colorboxImage();
    matchHeight();
  });

  $(window).load(function() {
    // Call to function
  });

  $(window).resize(function() {
    // Call to function
    matchHeight();
  });
})(jQuery);