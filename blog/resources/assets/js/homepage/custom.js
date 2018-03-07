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
  $('#calendar').fullCalendar({
    locale: 'vi',
    header: false,
    dayNames: ['Chủ nhật', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7'],
    dayNamesShort: ['Chủ nhật', 'Thứ 2', 'Thứ 3', 'Thứ 4', 'Thứ 5', 'Thứ 6', 'Thứ 7'],
    monthNames: [
      'Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6',
      'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'
    ],
    timeFormat: "HH:mm",
    showNonCurrentDates: true,
    fixedWeekCount: false,
    contentHeight: "auto",
    eventClick: function (event) {
      if (event.url) {
        let detailCourse = 'course';
        window.open(`${detailCourse}/${event.url}`);
        return false;
      }
    }
  });
});
