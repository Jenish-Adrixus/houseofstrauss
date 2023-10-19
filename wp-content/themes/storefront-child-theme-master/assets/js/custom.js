

// cookie end



$ = jQuery.noConflict(); 

jQuery(document).ready(function ($) {

  if ($('.recentproductslider').length) {
    $('.recentproductslider').slick({
      dots: false,
      infinite: true,
      slidesToShow: 4,
      speed: 1500,
      autoplay: true,
      autoplaySpeed: 2000,
      arrows: true,
      prevArrow: "<button type='button' class='slick-prev slider-arrow slider-arrow-prev'><span class='outerSvg'><svg id='arrow-point-to-right_1_' data-name='arrow-point-to-right (1)' xmlns=' width='7.57' height='13.279' viewBox='0 0 7.57 13.279'><path id='Path_4' data-name='Path 4' d='M97.411,7.3l5.71,5.71a.93.93,0,0,0,1.315-1.315L99.384,6.639l5.052-5.052A.93.93,0,0,0,103.121.272l-5.71,5.71a.93.93,0,0,0,0,1.315Z' transform='translate(-97.138 0)'/></svg></span></button>",
      nextArrow: "<button type='button' class='slick-next slider-arrow slider-arrow-next'><span class='outerSvg'><svg id='arrow-point-to-right_1_' data-name='arrow-point-to-right (1)' xmlns=' width='7.57' height='13.279' viewBox='0 0 7.57 13.279'><path id='Path_4' data-name='Path 4' d='M97.411,7.3l5.71,5.71a.93.93,0,0,0,1.315-1.315L99.384,6.639l5.052-5.052A.93.93,0,0,0,103.121.272l-5.71,5.71a.93.93,0,0,0,0,1.315Z' transform='translate(-97.138 0)'/></svg><span></button>",
    });
  }
/*~~~~~~~ * 01. Home Main Slider * ~~~~~~~~*/
if ($('.homeSlider').length) {
  $(".homeSlider").slick({
    dots: false,
    infinite: true,
    slidesToShow: 1,
    slidesToScroll: 1,
    speed: 1500,
    autoplay: false,
    autoplaySpeed: 2000,
    arrows: false,
    prevArrow: "<button type='button' class='slick-prev homeslider-arrow slider-arrow-prev'><span class='outerSvg'><svg id='arrow-point-to-right_1_' data-name='arrow-point-to-right (1)' xmlns=' width='7.57' height='13.279' viewBox='0 0 7.57 13.279'><path id='Path_4' data-name='Path 4' d='M97.411,7.3l5.71,5.71a.93.93,0,0,0,1.315-1.315L99.384,6.639l5.052-5.052A.93.93,0,0,0,103.121.272l-5.71,5.71a.93.93,0,0,0,0,1.315Z' transform='translate(-97.138 0)'/></svg></span></button>",
    nextArrow: "<button type='button' class='slick-next homeslider-arrow slider-arrow-next'><span class='outerSvg'><svg id='arrow-point-to-right_1_' data-name='arrow-point-to-right (1)' xmlns=' width='7.57' height='13.279' viewBox='0 0 7.57 13.279'><path id='Path_4' data-name='Path 4' d='M97.411,7.3l5.71,5.71a.93.93,0,0,0,1.315-1.315L99.384,6.639l5.052-5.052A.93.93,0,0,0,103.121.272l-5.71,5.71a.93.93,0,0,0,0,1.315Z' transform='translate(-97.138 0)'/></svg><span></button>",
    responsive: [{
        breakpoint: 1660,
        settings: {
          centerPadding: '260px',
        }
      },
      {
        breakpoint: 1270,
        settings: {
          centerPadding: '200px',
        }
      },
      {
        breakpoint: 1025,
        settings: {
          centerPadding: '150px',
        }
      },
      {
        breakpoint: 992,
        settings: {
          centerPadding: 0,
          dots: true,
          arrows: false
        }
      },
      {
        breakpoint: 767,
        settings: {
          centerPadding: 0,
          dots: true,
          arrows: false
        }
      }
    ]
  });
}

/*~~~~~~~ * 01. Home Main Slider end* ~~~~~~~~*/
/*~~~~~~~ * 02. testimonialslider start * ~~~~~~~~*/
$('.testimonialslider').slick({
  dots: false,
  infinite: true,
  speed: 1000,
  slidesToShow: 1,
  variableWidth: true,
  autoplay: true,
  autoplaySpeed: 1000,
  arrows: false,
});
/*~~~~~~~ * 02. testimonialslider end * ~~~~~~~~*/

/*~~~~~~~ * 03. productslider start * ~~~~~~~~*/

$(".productslider").slick({
  dots: true,
  arrows: false,
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  speed: 1500,
  autoplay: false,
  autoplaySpeed: 2000,
  prevArrow: "<button type='button' class='slick-prev slider-arrow slider-arrow-prev'><span class='outerSvg'><svg id='arrow-point-to-right_1_' data-name='arrow-point-to-right (1)' xmlns=' width='7.57' height='13.279' viewBox='0 0 7.57 13.279'><defs><style>.slider-arrow .cls-1 {fill: #232323;}</style></defs><path id='Path_4' data-name='Path 4' class='cls-1' d='M97.411,7.3l5.71,5.71a.93.93,0,0,0,1.315-1.315L99.384,6.639l5.052-5.052A.93.93,0,0,0,103.121.272l-5.71,5.71a.93.93,0,0,0,0,1.315Z' transform='translate(-97.138 0)'/></svg></span></button>",
  nextArrow: "<button type='button' class='slick-next slider-arrow slider-arrow-next'><span class='outerSvg'><svg id='arrow-point-to-right_1_' data-name='arrow-point-to-right (1)' xmlns=' width='7.57' height='13.279' viewBox='0 0 7.57 13.279'><defs><style>.slider-arrow .cls-1 {fill: #232323;}</style></defs><path id='Path_4' data-name='Path 4' class='cls-1' d='M97.411,7.3l5.71,5.71a.93.93,0,0,0,1.315-1.315L99.384,6.639l5.052-5.052A.93.93,0,0,0,103.121.272l-5.71,5.71a.93.93,0,0,0,0,1.315Z' transform='translate(-97.138 0)'/></svg><span></button>",
});

/*~~~~~~~ * 03. productslider end * ~~~~~~~~*/
/*~~~~~~~ * 04. Quantity "plus" and "minus" buttons start * ~~~~~~~~*/

if ( ! String.prototype.getDecimals ) {
  String.prototype.getDecimals = function() {
      var num = this,
          match = ('' + num).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
      if ( ! match ) {
          return 0;
      }
      return Math.max( 0, ( match[1] ? match[1].length : 0 ) - ( match[2] ? +match[2] : 0 ) );
  }
}
// Quantity "plus" and "minus" buttons
$( document.body ).on( 'click', '.plus, .minus', function() {
  var $qty        = $( this ).closest( '.quantity' ).find( '.qty'),
      currentVal  = parseFloat( $qty.val() ),
      max         = parseFloat( $qty.attr( 'max' ) ),
      min         = parseFloat( $qty.attr( 'min' ) ),
      step        = $qty.attr( 'step' );

  // Format values
  if ( ! currentVal || currentVal === '' || currentVal === 'NaN' ) currentVal = 0;
  if ( max === '' || max === 'NaN' ) max = '';
  if ( min === '' || min === 'NaN' ) min = 0;
  if ( step === 'any' || step === '' || step === undefined || parseFloat( step ) === 'NaN' ) step = 1;

  // Change the value
  if ( $( this ).is( '.plus' ) ) {
      if ( max && ( currentVal >= max ) ) {
          $qty.val( max );
      } else {
          $qty.val( ( currentVal + parseFloat( step )).toFixed( step.getDecimals() ) );
      }
  } else {
      if ( min && ( currentVal <= min ) ) {
          $qty.val( min );
      } else if ( currentVal > 0 ) {
          $qty.val( ( currentVal - parseFloat( step )).toFixed( step.getDecimals() ) );
      }
  }

  // Trigger change event
  $qty.trigger( 'change' );
});

  /*~~~~~~~ * 04. Quantity "plus" and "minus" buttons end * ~~~~~~~~*/
  


});


// Mobile Menu
document.addEventListener('DOMContentLoaded', function() {
  const mobileMenuToggle = document.querySelector('.header-menu-wrap');
  const mobileMenu = document.querySelector('.mobile-menu');

  mobileMenuToggle.addEventListener('click', function() {
      mobileMenu.classList.toggle('active');
  });
});