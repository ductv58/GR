<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Recommender</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ mix('/homepage/css/app.css') }}">
</head>

<body>
<script>
  window.fbAsyncInit = function () {
    ee
    FB.init({
      appId: '1541324475987083',
      xfbml: true,
      version: 'v2.6'
    });
  };

  (function (d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {
      return;
    }
    js = d.createElement(s);
    js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
</script>
<header class="event-header">
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#nav-bar"
                        aria-expanded="true">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar bar-left "></span>
                    <span class="icon-bar bar-right"></span>
                </button>
                <a href="{{ route('homepage.home') }}">
                    <img src="/images/images.png" alt="">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="nav-bar">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="{{route('homepage.home')}}">Trang Chủ</a>
                    </li>
                    <li>
                        <a href="{{ route('homepage.list-branch') }}">Ngành Học</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guard('user')->check() == null)
                        <li class="signup-btn">
                            <a href="{{ route('homepage.register') }}">ĐĂNG KÝ
                                <span class="ti-arrow-right"></span>
                            </a>
                        </li>
                        <li class="signin-btn">
                            <a href="{{ route('homepage.login') }}">ĐĂNG NHẬP
                                <span class="ti-arrow-right"></span>
                            </a>
                        </li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false" aria-haspopup="true">
                                {{ Auth::guard('user')->user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li>
                                    <a href="{{ route('homepage.logout') }}">LogOut</a>
                                </li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="detail-branch-top container-fluid">
    <img src="/images/Rectangle 2.jpg" alt="">
</div>
<div class="detail-branch-content container-fluid">
    <div class="container">
        <div class="row">
            <div class="detail-branch-title col-md-12">
                <h2>CHI TIẾT NGÀNH</h2>
            </div>
            <div class="col-md-12 description-branch">
                <p class="branch-name"><span class="branch-name-strong">Về ngành: </span><i>{{ $branch->name }}</i></p>
                <p class="info-branch">{{ $branch->description }}</p>
                <p style="color: #99041c">Bạn có thể xem nhiều thông tin hơn thông qua kênh tuyển sinh của trường đại học Bách Khoa Hà Nội tại
                    <a href="{{ $branch->link }}" target="_blank">đây</a>.</p>
            </div>
        </div>
    </div>
</div>
<div class="rating-branch container-fluid">
    <div class="container">
        <h4>Bạn có yêu thích Ngành này không?</h4>
        <section class='rating-widget'>
            <!-- Rating Stars Box -->
            <div class='rating-stars'>
                <ul id='stars'>
                    <li class='star' title='Poor' data-value='1'>
                        <i class='fa fa-star fa-fw'></i>
                    </li>
                    <li class='star' title='Fair' data-value='2'>
                        <i class='fa fa-star fa-fw'></i>
                    </li>
                    <li class='star' title='Good' data-value='3'>
                        <i class='fa fa-star fa-fw'></i>
                    </li>
                    <li class='star' title='Excellent' data-value='4'>
                        <i class='fa fa-star fa-fw'></i>
                    </li>
                    <li class='star' title='WOW!!!' data-value='5'>
                        <i class='fa fa-star fa-fw'></i>
                    </li>
                </ul>
            </div>
            <div class='success-box'>
                <div class='clearfix'></div>
                <img alt='tick image' width='32' src='https://i.imgur.com/3C3apOp.png'/>
                <div class='text-message'></div>
                <div class='clearfix'></div>
            </div>
        </section>
    </div>
</div>
<footer class="footer">
    <div class="container-fluid relative">
        <div class="row">
            <div class="top-footer">
                <div class="col-sm-12"></div>
            </div>
        </div>
        <button class="btn-scroll-top">
            <span class="ti-angle-double-up"></span>
        </button>
        {{--<div class="check-auth">--}}
        {{--<img src="/images/checkAuth.jpg" alt="">--}}
        {{--</div>--}}
        <a class="btn-messenger">
            <img src="/images/mess.png" alt="facebook messenger">
        </a>
        <div class="facebook-messenger fb-page">
            <div class="container messages">
                <div class="content fb-mess" id="app">
                    <botman-tinker></botman-tinker>
                </div>
            </div>
        </div>
        <a class="close">
            <img src="/images/close.png" alt="facebook messenger close">
        </a>
        <div class="container">
            <div class="footer-content">
                <img class="margin-top-70 img-responsive" src="/images/images.jpg" alt="">
                <div class="row">
                    <div class="col-md-4 col-sm-8">
                        <h4 class="text-green">LIÊN HỆ VỚI CHÚNG TÔI</h4>
                        <div class="row">
                            <div class="col-sm-3 col-xs-3">
                                <ul class="text-green contact">
                                    <li>Email:</li>
                                    <li>Hotline:</li>
                                    <li>Địa chỉ:</li>
                                    <li><br></li>
                                    <li>Fanpage:</li>
                                </ul>
                            </div>
                            <div class="col-sm-9 col-xs-9">
                                <ul class="text-dark-green contact">
                                    <li>20131073@student.hust.edu.vn</li>
                                    <li>0165-920-3240</li>
                                    <li>Tầng 6, Nhà B1 <br>
                                        Đại Học Bách Khoa Hà Nội
                                    </li>
                                    <li>fb.com/MypageMavuong</li>
                                </ul>
                            </div>
                        </div>
                        <div class="socials">
                            <a href="#" class="text-dark-green">
                                <span class="ti-youtube"></span>
                            </a>
                            <a href="#" class="text-dark-green">
                                <span class="ti-twitter-alt"></span>
                            </a>
                            <a href="#" class="text-dark-green">
                                <span class="ti-facebook"></span>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-4">
                        <h4 class="text-green">SITEMAP</h4>
                        <ul class="sitemap">
                            <li><a href="">Trang chủ</a></li>
                            <li><a href="{{ route('homepage.list-branch') }}">Ngành Học</a></li>
                            <li><a href="#">Tư Vấn</a></li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <h4 class="text-green">LIKE FANPAGE ĐỂ NHẬN CÁC THÔNG TIN</h4>
                        <div class="facebook-page margin-top-20">
                            <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FMypageMavuong-145045536174883%2F&tabs=timeline&width=500&height=236&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1541324475987083"
                                    style="border:none;overflow:hidden" scrolling="no"
                                    frameborder="0" allowTransparency="true"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="copyright">
                <div class="col-sm-12">
                    <p class="text-center">Copyright 2018 20131073. All right reserved - Designed by <a
                                href="http://haposoft.com/vi">20131073</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="{{ mix('/homepage/js/app.js') }}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
  $(document).ready(function () {

    /* 1. Visualizing things on Hover - See next part for action on click */
    $('#stars li').on('mouseover', function () {
      let onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

      // Now highlight all the stars that's not after the current hovered star
      $(this).parent().children('li.star').each(function (e) {
        if (e < onStar) {
          $(this).addClass('hover');
        }
        else {
          $(this).removeClass('hover');
        }
      });

    }).on('mouseout', function () {
      $(this).parent().children('li.star').each(function (e) {
        $(this).removeClass('hover');
      });
    });


    /* 2. Action to perform on click */
    $('#stars li').on('click', function () {
      let onStar = parseInt($(this).data('value'), 10); // The star currently selected
      let stars = $(this).parent().children('li.star');

      for (i = 0; i < stars.length; i++) {
        $(stars[i]).removeClass('selected');
      }

      for (i = 0; i < onStar; i++) {
        $(stars[i]).addClass('selected');
      }

      // JUST RESPONSE (Not needed)
      let ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
      let data = {
        '_token':'{{ csrf_token() }}',
        'rate' : ratingValue
      }
      $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : '{{ URL::route('homepage.detail-branch', $branch->id) }}', // the url where we want to POST
        data        : data, // our data object
        dataType    : 'json', // what type of data do we expect back from the server
        encode      : true,
      })

    });


  });


  function responseMessage(msg) {
    $('.success-box').fadeIn(200);
    $('.success-box div.text-message').html("<span>" + msg + "</span>");
  }
</script>
<script>
  let didScroll;
  let lastScrollTop = 0;
  let delta = 5;
  let navbarHeight = $('header').outerHeight();
  $(window).scroll(function (event) {
    didScroll = true;
  });

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
        @if(\Request::route()->getName() == "homepage.home")
        if ($(window).width() >= 768) {
          $('nav').removeClass('nav-down').addClass('nav-up');
        }
        @else
        if (st > 200) {
          $('nav').removeClass('nav-down').addClass('nav-up');
        }
        @endif
    } else {
      // Scroll Up
        @if(\Request::route()->getName() == "homepage.home")
        if ($(window).width() >= 768) {
          if (st + $(window).height() < $(document).height()) {
            $('nav').removeClass('nav-up').addClass('nav-down');
          }
          if (st < 5) {
            if ($('nav').hasClass('nav-down')) {
              $('nav').removeClass('nav-down').addClass('nav-up');
              setTimeout(function () {
                $('nav').removeClass('nav-up')
              }, 200)
            } else {
              $('nav').removeClass('nav-up')
            }
          }
        }
        @else
        $('nav').removeClass('nav-up');
        @endif
    }
    lastScrollTop = st;
  }

  $(document).ready(function () {
    $('.btn-messenger').click(function () {
      $(this).css("display", "none");
      $('.facebook-messenger').css("display", "block");
      $('.close').css("display", "block");
    });
  });
  $(document).ready(function () {
    $('.close').click(function () {
      $(this).css("display", "none");
      $('.facebook-messenger').css("display", "none");
      $('.btn-messenger').css("display", "block");
    });
  });
  $('.ChatInput').keypress(function (e) {
    let messages = $('.ChatLog');
    if (e.which == 13) {
      messages.animate({
        scrollTop: messages.get(0).scrollHeight
      }, 2000)
    }
  })
</script>
</body>

</html>