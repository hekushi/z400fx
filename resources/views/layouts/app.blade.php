@php
    $setting = DB::table('sitesetting')->first();
@endphp


<!DOCTYPE html>
<html lang="ja">
<head>
<title>OneTech</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="OneTech shop project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/bootstrap4/bootstrap.min.css') }}">
<link href="{{ asset('public/frontend/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css') }}" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.css') }} ">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.theme.default.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/plugins/slick-1.8.0/slick.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/main_styles.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/responsive.css') }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
{{-- <link rel="stylesheet" type="text/css" href="{{ asset('public/frontend/styles/customstyle.css') }}"> --}}

<!-- chart -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

<link rel="stylesheet" href="sweetalert2.min.css">

<script src="https://js.stripe.com/v3/"></script>

<style>
    #ctaarea {
      position:relative
    }


    .good {
      position: absolute;
      top: 90%;
      left: 19%;
      transform: translate(-50%, -50%);

    }

    #ctaarea2 {
      position:relative
    }


    .good2 {
      position: absolute;
      top: 30%;
      left: 19%;
      transform: translate(-50%, -50%);

    }

    .insta_btn2{/*ボタンの下地*/
  color: #FFF;/*文字・アイコン色*/
  border-radius: 7px;/*角丸に*/
  position: relative;
  display: inline-block;
  height: 50px;/*高さ*/
  width: 190px;/*幅*/
  text-align: center;/*中身を中央寄せ*/
  font-size: 25px;/*文字のサイズ*/
  line-height: 50px;/*高さと合わせる*/
  background: -webkit-linear-gradient(135deg, #427eff 0%, #f13f79 70%) no-repeat;
  background: linear-gradient(135deg, #427eff 0%, #f13f79 70%) no-repeat;/*グラデーション①*/
  overflow: hidden;/*はみ出た部分を隠す*/
  text-decoration:none;/*下線は消す*/
}

.insta_btn2:before{/*グラデーション②*/
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;/*全体を覆う*/
  height: 100%;/*全体を覆う*/
  background: -webkit-linear-gradient(15deg, #ffdb2c, rgb(249, 118, 76) 25%, rgba(255, 77, 64, 0) 50%) no-repeat;
  background: linear-gradient(15deg, #ffdb2c, rgb(249, 118, 76) 25%, rgba(255, 77, 64, 0) 50%) no-repeat;
}

.insta_btn2 .fa-instagram{/*アイコン*/
  font-size: 35px;/*アイコンサイズ*/
  position: relative;
  top: 4px;/*アイコン位置の微調整*/
}

.insta_btn2 span {/*テキスト*/
  display:inline-block;
  position: relative;
  transition: .5s
}

.insta_btn2:hover span{/*ホバーで一周回転*/
  -webkit-transform: rotateX(360deg);
  -ms-transform: rotateX(360deg);
  transform: rotateX(360deg);
}
  </style>


</head>

<body>
 {{-- <!-- ======= Header ======= -->
 <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center bg-dark">

      <h1 class="logo mr-auto pt-5"><a href="{{ url('/')}}">サイトNAME</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        
      </nav><!-- .nav-menu -->

      <div class="cart_icon">
        <a href="{{ route('show.cart') }}">
          <img src="{{ asset('public/frontend/images/cart.png')}}" alt="">
        <div class="cart_count"><span>{{ Cart::count() }}</span></div>
    </div>
    <div class="cart_content">
        <div class="cart_text">Cart</div>
        <div class="cart_price">￥{{ Cart::subtotal() }}</div>
    </div></a>
    </div>
  </header><!-- End Header --> --}}


<div class="super_container">
    
    <!-- Header -->
    
    <header class="header">

        <!-- Top Bar -->



        <!-- Header Main -->

        <div class="header_main">
            <div class="container">
                <div class="row">

                    <!-- Logo -->
                    

@php
    $category = DB::table('categories')->get();
@endphp


                    <!-- Search -->
                    

                    <!-- Wishlist -->
                    <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                            <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                    @guest

                    @else
                        
                @php
                    $wishlist = DB::table('wishlists')->where('user_id',Auth::id())->get();
                @endphp





                                <div class="wishlist_icon"><img src="{{ asset('public/frontend/images/heart.png')}}" alt=""></div>
                                <div class="wishlist_content">
                                    <div class="wishlist_text"><a href="#">Wishlist</a></div>
                                    <div class="wishlist_count">{{count($wishlist)}}</div>
                                </div>
                            </div>
                    @endguest
                            <!-- Cart -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
        


    <!-- Characteristics -->

@yield('content')

    <!-- Footer -->

    @php
    $setting = DB::table('sitesetting')->first();
    @endphp

    <footer class="footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 footer_col">
                    <div class="footer_column footer_contact">
                        <div class="logo_container">
                            <div class="logo"><a href="#">{{$setting->company_name}}</a></div>
                        </div>
                        <div class="footer_title">Got Question? Call Us 24/7</div>
                        <div class="footer_phone">{{$setting->phone_two}}</div>
                        <div class="footer_contact_text">
                            <p>{{$setting->company_address}}</p>
                        </div>
                        <div class="footer_social">
                            <ul>
                                <li><a href="{{$setting->facebook}}"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="{{$setting->twitter}}"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="{{$setting->youtube}}"><i class="fab fa-youtube"></i></a></li>
                                <li><a href="{{$setting->company_address}}"><i class="fab fa-google"></i></a></li>
                               
                                
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 offset-lg-2">
                    
                </div>

                <div class="col-lg-2">
                    
                </div>

                <div class="col-lg-2">
                    
                </div>

            </div>
        </div>
    </footer>

    <!-- Copyright -->

    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col">
                    
                    <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                        <div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
</div>
                        <div class="logos ml-sm-auto">
                            <ul class="logos_list">
                                <li><a href="#"><img src="{{ asset('public/frontend/images/logos_1.png')}}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('public/frontend/images/logos_2.png')}}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('public/frontend/images/logos_3.png')}}" alt=""></a></li>
                                <li><a href="#"><img src="{{ asset('public/frontend/images/logos_4.png')}}" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Order Traking Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Your Status Code</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form method="post" action="{{ route('order.traking')}}">
                @csrf
                <div class="modal-body">
                    <label> Status Code</label>
                    <input type="text" name="code" required="" class="form-control" placeholder="Your Order Status Code">        
                </div>
                 
                 <button class="btn btn-danger" type="submit">Track Now </button>  


            </form>
        </div>
        
      </div>
    </div>
  </div>

<script src="{{ asset('public/frontend/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('public/frontend/styles/bootstrap4/popper.js')}}"></script>
<script src="{{ asset('public/frontend/styles/bootstrap4/bootstrap.min.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/greensock/TweenMax.min.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/greensock/TimelineMax.min.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/scrollmagic/ScrollMagic.min.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/greensock/animation.gsap.min.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/greensock/ScrollToPlugin.min.jsplugins/greensock/ScrollToPlugin.min.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/OwlCarousel2-2.2.1/owl.carousel.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/slick-1.8.0/slick.js')}}"></script>
<script src="{{ asset('public/frontend/plugins/easing/easing.js')}}"></script>
<script src="{{ asset('public/frontend/js/custom.js')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{ asset('public/frontend/js/product_custom.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    <script src="{{ asset('https://unpkg.com/sweetalert/dist/sweetalert.min.js')}}"></script>
    
    



    <script>
        @if(Session::has('messege'))
          var type="{{Session::get('alert-type','info')}}"
          switch(type){
              case 'info':
                   toastr.info("{{ Session::get('messege') }}");
                   break;
              case 'success':
                  toastr.success("{{ Session::get('messege') }}");
                  break;
              case 'warning':
                 toastr.warning("{{ Session::get('messege') }}");
                  break;
              case 'error':
                  toastr.error("{{ Session::get('messege') }}");
                  break;
          }
        @endif
     </script>  


<script>  
    $(document).on("click", "#return", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
           swal({
             title: "Are you Want to Return?",
             text: "Once Teturn this will return your money!",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
           .then((willDelete) => {
             if (willDelete) {
                  window.location.href = link;
             } else {
               swal("Cancel!");
             }
           });
       });
</script>
     
</body>

</html>