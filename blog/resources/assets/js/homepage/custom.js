$(document).ready(function () {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  let toTop = $('.btn-scroll-top');
  $(document).scroll(() => {
    if ($(this).scrollTop() > 600) {
      toTop.fadeIn('slow')
    }
    else if (($(this).scrollTop() === 0)) {
      toTop.fadeOut('slow')
    }
  });
  toTop.click(() => {
    $("html, body").animate({
      scrollTop: 0
    }, 1000);
    return false;
  });
  let owl = $(".owl-carousel");
  owl.owlCarousel({
    navigation: true,
    slideSpeed: 300,
    paginationSpeed: 400,
    smartSpeed: 1500,
    singleItem: true,
    items: 1,
    pagination: true,
    rewindSpeed: 500,
    loop: true,
    autoplay: true,
    autoplayTimeout: 5000,
    autoplayHoverPause: true
  });
  $('.btn-next').click(() => {
    owl.trigger('next.owl.carousel');
  });
  $('.btn-prev').click(() => {
    owl.trigger('prev.owl.carousel');
  });
});
