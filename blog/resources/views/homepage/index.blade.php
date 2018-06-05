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
                    <li>
                        <a role="button" onclick="report()">Phản hồi</a>
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
<section class="event-slider">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="row relative">
                    <button type="button" name="button" class="btn-prev">
                        <i class="ti-arrow-left"></i>
                    </button>
                    <button type="button" name="button" class="btn-next">
                        <i class="ti-arrow-right"></i>
                    </button>
                    <div class="owl-carousel">
                        <div class="owl-slide">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="owl-text">
                                            <h2>SOICT Bách Khoa Hà Nội</h2>
                                            <p>Trường đại học Bách Khoa Hà Nội là một trong những trường hàng đầu về đào
                                                tạo kỹ sư ở Việt Nam,
                                                trong đó công nghệ thông tin luôn được xem như là ngành nói lên tên tuổi
                                                của trường.
                                            </p>
                                            <p>
                                                Trụ sở: <span
                                                        class="owl-text-change">B1 đại học Bách Khoa Hà Nội</span>
                                            </p>
                                            <a href="https://soict.hust.edu.vn/" target="_blank" class="global-btn">XEM
                                                THÊM
                                                <span class="ti-arrow-right"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-slide">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="owl-text">
                                            <h2>SOICT Bách Khoa Hà Nội</h2>
                                            <p>Trường đại học Bách Khoa Hà Nội là một trong những trường hàng đầu về đào
                                                tạo kỹ sư ở Việt Nam,
                                                trong đó công nghệ thông tin luôn được xem như là ngành nói lên tên tuổi
                                                của trường.
                                            </p>
                                            <p>
                                                Trụ sở: <span
                                                        class="owl-text-change">B1 đại học Bách Khoa Hà Nội</span>
                                            </p>
                                            <a href="https://soict.hust.edu.vn/" target="_blank" class="global-btn">XEM
                                                THÊM
                                                <span class="ti-arrow-right"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="owl-slide">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-10">
                                        <div class="owl-text">
                                            <h2>SOICT Bách Khoa Hà Nội</h2>
                                            <p>Trường đại học Bách Khoa Hà Nội là một trong những trường hàng đầu về đào
                                                tạo kỹ sư ở Việt Nam,
                                                trong đó công nghệ thông tin luôn được xem như là ngành nói lên tên tuổi
                                                của trường.
                                            </p>
                                            <p>
                                                Trụ sở: <span
                                                        class="owl-text-change">B1 đại học Bách Khoa Hà Nội</span>
                                            </p>
                                            <a href="https://soict.hust.edu.vn/" target="_blank" class="global-btn">XEM
                                                THÊM
                                                <span class="ti-arrow-right"></span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="event container-fluid">
    <div class="event-content container">
        <div class="row">
            <div class="event-content-title col-md-12">
                <h2>LỜI MỞ ĐẦU</h2>
            </div>
            <div class="event-content-question col-md-12">
                <ul>
                    <li><span class="span-icon-bk ti-crown"></span>Bạn muốn trở thành một sinh viên Bách Khoa?</li>
                    <li><span class="span-icon-it ti-mouse-alt"></span>Bạn muốn trở thành một kỹ sư công nghệ thông tin
                        trong tương lai?
                    </li>
                    <li><span class="span-icon-question ti-help"></span>Bạn thắc mắc không biết nên chọn ngành nào trong
                        số các ngành Bách Khoa đào tạo?
                    </li>
                </ul>
            </div>
            <div class="event-content-answer col-md-10">
                <img src="/images/pin.png" alt="pin">
                <span class="answer-border-top"></span>
                <p>Từng đứng trên lập trường các bạn, chúng tôi hiểu các bạn đang cần giải quyết những vấn đề xoay quanh
                    đó. Do đó chúng tôi tạo ra trang
                    web này hy vọng sẽ giúp các bạn phần nào giải quyết được những vấn đề đang trăn trở.
                </p>
                <span class="answer-border-bot"></span>
            </div>
        </div>
    </div>
</div>
<section class="branch" id="branch">
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="branch-title col-md-12">
                    <h2>CÓ THỂ BẠN QUAN TÂM</h2>
                </div>
                <div class="branch-content col-md-12">
                    <div class="row">
                        @foreach($branchs as $branch)
                            <div class="branch-top col-md-4">
                                <div class="branch-top-hover">
                                    <div class="branch-top-border">
                                        <img src="/images/{{ $branch->avatar }}" alt="">
                                        <h2>{{ $branch->name }}</h2>
                                        <p>{{ str_limit($branch->description, 250 , ' ...') }}</p>
                                    </div>
                                    <a href="{{ route('homepage.detail-branch', $branch->id) }}"><p class="branch-btn">
                                            Xem thêm<span class="ti-arrow-right"></span></p></a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
                <img class="margin-top-70 img-responsive" src="" alt="">
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
<div class="container-fluid">
    <div class="modal fade" id="report" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Hãy cho chúng tôi biết nhận xét của bạn đối với trang web này!</h4>
                </div>
                {!! Form::open() !!}
                <div class="modal-body">
                    {!! Form::textarea('content', null, ['class' => 'form-control','id' => 'content','placeholder' => 'Nhập nội dung!']) !!}
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary"
                            onclick="postReport()">OK
                    </button>
                </div>
                {!! Form::close() !!}
            </div>

        </div>
    </div>
</div>
@include('homepage.report.confirm-report')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="{{ mix('/homepage/js/app.js') }}"></script>
<script>
  function report() {
    $('#report').modal('show')
  }

  function postReport() {
    let content = $("#content").val();
    let data = {
      '_token': '{{ csrf_token() }}',
      'content': content
    }
    $.ajax({
      type: 'POST', // define the type of HTTP verb we want to use (POST for our form)
      url: "{{ URL::route('homepage.report') }}", // the url where we want to POST
      data: data, // our data object
      dataType: 'json', // what type of data do we expect back from the server
      encode: true,
      success: (function (res) {
        $('#report').modal('hide');
        $('#confirmReport').modal('show');
      })
    })
  }

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