(function($) {
  function headerFixed() {
    var headertop = $('#header');
    var offset = headertop.position();
    $(window).scroll(function () {
      if ($(this).scrollTop() > offset.top) {
        headertop.addClass('fixed');
      } else {
        headertop.removeClass('fixed');
      }
    });
  }

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
      arrows: true,
      autoplay: true,
      asNavFor: '.sub-slick',
      lazyLoad: 'ondemand',
      speed: 500
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

  function popupFooter() {
    var header = $('#header');
    var offset = header.offset().top;
    var heightheader = header.outerHeight(true);
    var heightmenu = $('#main-navigation').outerHeight(true);
    var window_scroll = heightheader + offset - heightmenu;
    $(window).scroll(function () {
      if ($(this).scrollTop() > window_scroll) {
        $('.block-popup-footer').addClass('showpopup');
      } else {
        $('.block-popup-footer').removeClass('showpopup');
      }
    });

    var widthpopup = $('.block-popup-footer').outerWidth(true);
    $('.icon-popup').click(function() {
      $('.block-popup-footer').toggleClass('close');
      if($('.block-popup-footer').hasClass('close')) {
        $('.block-popup-footer.close').css({'left': - widthpopup});
      } else {
        $('.block-popup-footer').css({'left': 0});
      }

      $(this).toggleClass('fa-times fa-chevron-right');
    });
  }

  $(document).ready(function() {
    // Call to function
    headerFixed();
    navigation();
    showCat();
    featureSlick();
    slickGallery();
    //colorboxImage();
    matchHeight();
    popupFooter();
  });

  $(window).load(function() {
    // Call to function
  });

  $(window).resize(function() {
    // Call to function
    matchHeight();
  });
})(jQuery);
