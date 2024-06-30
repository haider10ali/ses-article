document.addEventListener("DOMContentLoaded", function () {
  jQuery(document).ready(function ($) {
    $(".ses__news__posts__coursel").on('init', function(event, slick){
      $(".ses__news__posts__coursel").css('visibility', 'visible');
    }).slick({
      slidesToShow: 3,
      slidesToScroll: 3,
      dots: true,
      autoplay: true,
      autoplaySpeed: 2000,
      pauseOnHover: true,
      arrows: true,
      prevArrow: '<button type="button" class="slick-prev">Previous</button>',
      nextArrow: '<button type="button" class="slick-next">Next</button>',
      responsive: [
        {
          breakpoint: 1024,
          settings: {
            slidesToShow: 2,
          },
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
          },
        },
      ],
    });
  });
});
