import Swiper from 'swiper';


if( $(".recetas-slider-content .swiper-slide").length != 0 && $(".recetas-slider-content .swiper-slide").length <= 6 ) {
  $('.recetas-slider-content .swiper-wrapper').addClass( "disabled" );
  $('.recetas-slider-content .swiper-pagination').addClass( "disabled" );
  $('.recetas-slider-content .swiper-button-content').addClass( "disabled" );
}

var recipesSlider = new Swiper('.recetas-slider-content', {
	// Optional parameters
	loop: true,
	spaceBetween: 0,
	centeredSlides: true,
	breakpoints: {
		320: {
			slidesPerView: 2,
			slidesPerGroup: 1,
			spaceBetween: 0,
			navigation: false,
			loop: true,
		},
		1024: {
			slidesPerView: 6,
			spaceBetween: 0,
			slidesPerGroup: 6,
			centeredSlides: false,
			loop: false,
			// Navigation arrows
			navigation: {
				nextEl: '.recetas-slider-content .swiper-button-next',
				prevEl: '.recetas-slider-content .swiper-button-prev',
			},
		},
	}


});


var bannerSlider = new Swiper('.recetas-banner-content', {
  // Optional parameters
  loop: false,
  slidesPerView: 1,
  spaceBetween: 0,
  centeredSlides: true,
  navigation: false,

  // If we need pagination
  pagination: {
    el: '.recetas-banner-content .swiper-pagination',
  },

  // Navigation arrows
  // navigation: {
  //   nextEl: '.recetas-banner-content .swiper-button-next',
  //   prevEl: '.recetas-banner-content .swiper-button-prev',
  // },

});


var productsSlider = new Swiper('.productos-familia-slider-content', {
  // Optional parameters
  loop: true,
  slidesPerView: 'auto',
  spaceBetween: 0,
  centeredSlides: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

	breakpoints: {
		250: {
			slidesPerView: 2,
			spaceBetween: 0,
			navigation: false,
		},
		1024: {
			slidesPerView: 6,
			spaceBetween: 0,
			centeredSlides: false,
			navigation: {
				nextEl: '.productos-familia-slider-content .swiper-button-next',
				prevEl: '.productos-familia-slider-content .swiper-button-prev',
			},
		},
	}

});





if( $(".productos-slider-content .swiper-slide").length != 0 && $(".productos-slider-content .swiper-slide").length <= 6 ) {
  $('.productos-slider-content .swiper-wrapper').addClass( "disabled" );
  $('.productos-slider-content .swiper-pagination').addClass( "disabled" );
  $('.productos-slider-content .swiper-button-content').addClass( "disabled" );
}

var productsSlider = new Swiper('.productos-slider-content', {
  // Optional parameters
  loop: false,
  slidesPerView: 6,
  spaceBetween: 0,
  centeredSlides: true,

  // If we need pagination
  pagination: {
    el: '.swiper-pagination',
  },

  breakpoints: {
    320: {
      slidesPerView: 2,
      spaceBetween: 0,
      navigation: false,
    },
    1024: {
      slidesPerView: 6,
      spaceBetween: 0,
      centeredSlides: true,
      navigation: {
        nextEl: '.productos-slider-content .swiper-button-next',
        prevEl: '.productos-slider-content .swiper-button-prev',
      },
    },
  }


});



var productsSlider = new Swiper('.recetas-header-slider-content', {
  // Optional parameters
  loop: true,
  slidesPerView: 1,
  spaceBetween: 0,
  centeredSlides: true,

  // If we need pagination
  pagination: {
    el: '.recetas-header-slider-content .swiper-pagination',
  },

  // Navigation arrows
  navigation: {
    nextEl: '.recetas-header-slider-content .swiper-button-next',
    prevEl: '.recetas-header-slider-content .swiper-button-prev',
  },

});
