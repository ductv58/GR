$(document).ready(function () {

  let toTop = $('.btn-scroll-top');
  $(document).scroll(() => {
    if ($(this).scrollTop() > 980) {
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

function initMap() {
  let content = `
  <div class="logo-in-map text-center">
<img src="../images/logo.png" alt="">
<img src="../images/HapoJC.png" alt=""
    </div>
    <div class="content-in-map">
<span class="icon-location-pin"></span><p>Tầng 6,23 Tô Vĩnh Diện</p>
<span class="icon-screen-smartphone"></span><p>01235 123 9898</p>
<span class="icon-envelope-open"></span><p>hapojc@haposoft.com</p>
</div>`

  let hapo = {lat: 21.000126, lng: 105.821461}
  let map = new google.maps.Map(document.getElementById('map'), {
    center: hapo,
    zoom: 16
  });
  let marker = new google.maps.Marker({
    position: hapo,
    map: map,
    animation: google.maps.Animation.DROP
  });
  let infoWindow = new google.maps.InfoWindow({
    content: content,
    width: 307
  });
  marker.addListener('click', () => {
    infoWindow.open(map, marker);
  })
}

setInterval(function () {
  if (didScroll) {
    hasScrolled();
    didScroll = false;
  }
}, 250);

function hasScrolled() {
  let st = $(this).scrollTop();


  if (Math.abs(lastScrollTop - st) <= delta)
    return;


  if (st > lastScrollTop && st > navbarHeight) {
    // Scroll Down
    $('nav').removeClass('nav-down').addClass('nav-up');
  } else {
    // Scroll Up
    if (st + $(window).height() < $(document).height()) {
      $('nav').removeClass('nav-up').addClass('nav-down');
      $('.logo').attr('src', '../images/logo-replace.png');
    }
    if (st == 0) {
      $('nav').removeClass('nav-up').removeClass('nav-down');
      $('.logo').attr('src', '../images/logo-white.png');
    }
  }
  lastScrollTop = st;
}



