jQuery(document).ready(function($){
    // start code slic 
    let nos_realisation_slide = $('.product-list-slick').slick({
        arrows:false,
        dots : false,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay:false,
    });
    // triger auto play
    let is_play = false;
    // Button click event to start autoplay
    $('.play-button').on('click', function() {
        // Access the Slick instance and trigger autoplay
        if(!is_play){
            $('.product-list-slick').slick('slickPlay');
            let src = $(this).find('img').attr('src');
            src = src.replace("play.svg","pause.svg");
            $(this).find('img').attr('src',src);
            $(this).find('span').text('Pause');
            is_play = true;
        }else{
            $('.product-list-slick').slick('slickPause');
            let src = $(this).find('img').attr('src');
            src = src.replace("pause.svg","play.svg");
            $(this).find('img').attr('src',src);
            $(this).find('span').text('Play');
            is_play = false;
        }
    });

    // Update current slide index on slide change
    $('.product-list-slick').on('afterChange', function(event, slick, currentSlide){
        $(".nos-realisaion .product-list-nav ul li").eq(currentSlide).find("button").addClass('active').parent().siblings('li').find('button').removeClass('active');
    });

    // slide to projet
    $(".nos-realisaion .product-list-nav ul li button").on('click',function(e){
        let index_slide = $(this).parent().index();
        nos_realisation_slide.slick('slickGoTo', index_slide);
    })
})