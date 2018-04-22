<!DOCTYPE html>
<html lang="vi">

<head>
    <title>Recommender</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ mix('/homepage/css/app.css') }}">
</head>

<body>
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
                <a href="{{ route('homepage.index') }}">
                    <img src="/images/images.png" alt="">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="nav-bar">
                <ul class="nav navbar-nav navbar-left">
                    <li>
                        <a href="{{route('homepage.index')}}">Trang Chủ</a>
                    </li>
                    <li>
                        <a href="{{route('homepage.index')}}">Ngành Học</a>
                    </li>
                    <li>
                        <a href="{{ route('homepage.show_question_rs') }}">Tư Vấn</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li class="signup-btn">
                        <a href="#">ĐĂNG KÝ
                            <span class="ti-arrow-right"></span>
                        </a>
                    </li>
                    <li class="signin-btn">
                        <a href="#">ĐĂNG NHẬP
                            <span class="ti-arrow-right"></span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
<div class="recommender container-fluid">
    <div class="container">
        <div class="row">
            <div class="recommender-content col-md-12">
                <div class="row">
                    <div class="recommender-content-title col-md-12">
                        <h2>KẾT QUẢ TƯ VẤN</h2>
                    </div>
                    <div class="recommender-branch col-md-12">
                        <div class="row">
                            <div class="col-md-4 recommender-branch-left">
                                <img src="/images/branchcnpm.jpg" alt="math">
                            </div>
                            <div class="col-md-8 recommender-branch-right">
                                <h4>CÔNG NGHỆ PHẦN MỀM</h4>
                                <p>là sự áp dụng một cách tiếp cận có hệ thống, có kỷ luật, và định lượng được cho việc phát triển, sử dụng và bảo trì phần mềm.
                                    Ngành học kỹ nghệ phần mềm bao trùm kiến thức, các công cụ ...</p>
                                <div class="global-btn view-branch">
                                    <a href="#">XEM THÊM
                                        <span class="ti-arrow-right"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="recommender-branch col-md-12">
                        <div class="row">
                            <div class="col-md-4 recommender-branch-left">
                                <img src="/images/httt.jpg" alt="math">
                            </div>
                            <div class="col-md-8 recommender-branch-right">
                                <h4>HỆ THỐNG THÔNG TIN</h4>
                                <p>là sự áp dụng một cách tiếp cận có hệ thống, có kỷ luật, và định lượng được cho việc phát triển, sử dụng và bảo trì phần mềm.
                                    Ngành học kỹ nghệ phần mềm bao trùm kiến thức, các công cụ ...</p>
                                <div class="global-btn view-branch">
                                    <a href="#">XEM THÊM
                                        <span class="ti-arrow-right"></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="recommender-branch col-md-12 margin-bot-60">
                        <div class="row">
                            <div class="col-md-4 recommender-branch-left">
                                <img src="/images/slibar.jpg" alt="math">
                            </div>
                            <div class="col-md-8 recommender-branch-right">
                                <h4>KHOA HỌC MÁY TÍNH</h4>
                                <p>là sự áp dụng một cách tiếp cận có hệ thống, có kỷ luật, và định lượng được cho việc phát triển, sử dụng và bảo trì phần mềm.
                                    Ngành học kỹ nghệ phần mềm bao trùm kiến thức, các công cụ ...</p>
                                <div class="global-btn view-branch">
                                    <a href="#">XEM THÊM
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
                            <li><a href="#">Ngành Học</a></li>
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
        @if(\Request::route()->getName() == "homepage.index")
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
        @if(\Request::route()->getName() == "homepage.index")
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
</script>
</body>

</html>