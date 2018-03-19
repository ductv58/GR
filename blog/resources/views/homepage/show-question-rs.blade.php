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
<div class="show-question-rs container-fluid">
    <div class="container">
        <div class="row">
            <div class="rs-content col-md-12">
                <div class="row">
                    <div class="rs-content-title col-md-12">
                        <div class="tutorial">
                            <img src="/images/pin.png" alt="pin">
                            <span class="answer-border-top"></span>
                            <p>Sau đây là các câu hỏi bạn sẽ cần trả lời để chúng tôi có thể đưa ra tư vấn cho bạn.</br>
                            Kết quả tư vấn phụ thuộc vào việc bạn hiểu con người bạn bao nhiêu phần, nên hãy đánh giá thật cẩn
                            thận bản thân nhé.</br>
                            Mỗi câu hỏi sẽ có 5 mức đánh giá, bạn trả lời bằng cách lựa chọn mức đánh giá mà bạn cho là phù hợp nhất.
                            </p>
                            <span class="answer-border-bot"></span>
                        </div>
                        <h2>SẴN SÀNG TƯ VẤN</h2>
                    </div>
                    <div class="rs-question col-md-12">
                        <div class="row">
                            <div class="col-md-4 rs-question-left">
                                <img src="/images/math.jpg" alt="math">
                            </div>
                            <div class="col-md-8 rs-question-right">
                                <h4>CÂU 1:</h4>
                                <p>Bạn thích toán học? bạn thích những con số?</p>
                                <h4>Đánh giá :</h4>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="rs-question col-md-12">
                        <div class="row">
                            <div class="col-md-4 rs-question-left">
                                <img src="/images/cntt.jpg" alt="math">
                            </div>
                            <div class="col-md-8 rs-question-right">
                                <h4>CÂU 2:</h4>
                                <p>Bạn thích thú với máy tính và phần mềm? </p>
                                <h4>Đánh giá :</h4>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="rs-question col-md-12">
                        <div class="row">
                            <div class="col-md-4 rs-question-left">
                                <img src="/images/idea.jpg" alt="math">
                            </div>
                            <div class="col-md-8 rs-question-right">
                                <h4>CÂU 3:</h4>
                                <p>Sự sáng tạo có làm bạn hứng thú?</p>
                                <h4>Đánh giá :</h4>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="rs-question col-md-12">
                        <div class="row">
                            <div class="col-md-4 rs-question-left">
                                <img src="/images/stronger.jpg" alt="math">
                            </div>
                            <div class="col-md-8 rs-question-right">
                                <h4>CÂU 4:</h4>
                                <p>Bạn có thể chịu được áp lực công việc cao?</p>
                                <h4>Đánh giá :</h4>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="global-btn post-answer-btn">
                            <a href="{{ route('homepage.recommender') }}">GỬI CÂU TRẢ LỜI
                                <span class="ti-arrow-right"></span>
                            </a>
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
</script>
</body>

</html>