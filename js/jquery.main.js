$(document).ready(function(){
	slider();
	latestTrendSlider();
	tabs();


});


function slider() {
	$('.slider').slick({
		prevArrow:'<button class="slick-prev slick-arrow slick-disabled" aria-label="Previous" type="button" aria-disabled="true" style=""><i class="fas fa-arrow-left"></i></button>',
	nextArrow:'<button class="slick-next slick-arrow slick-disabled" aria-label="Next" type="button" aria-disabled="true" style=""><i class="fas fa-arrow-right"></i></button>'
	});
}

function latestTrendSlider() {
	$('.leatest-trends').slick({
  dots: true,
  infinite: false,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 2,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ],
  nextArrow:'<button class="slick-next slick-arrow" aria-label="Next" type="button" style="" aria-disabled="false"><i class="fas fa-arrow-right"></i></button>',
    prevArrow:'<button class="slick-prev slick-arrow slick-disabled" aria-label="Previous" type="button" aria-disabled="true" style=""><i class="fas fa-arrow-left"></i></button>'
});
}

function tabs() {
	var tabNavHolder = $('.js-tabs__header');
	var tabNavLinks = tabNavHolder.find('.js-tabs__title');

	var target = $('.js-tabs__content').find('.tab-content');
	target.hide();
	$('#tab1').show();

	tabNavLinks.each(function(index,element) {
		$(element).click(function(e) {
			var siblings = $(element).parent().siblings().find('a').removeClass('active');
			$(element).addClass('active')
			e.preventDefault();
			var href = $(element).attr('href');
			$(href).siblings().hide();
			$(href).show();
		});
	});
}