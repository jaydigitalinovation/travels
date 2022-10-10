<!DOCTYPE html>
<html>
<head>
	<title>Travels</title>
	<link rel="stylesheet" type="text/css" href="/css/home1.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="/image/logo.png">

</head>
<body style="overflow-x: hidden;">
    <div class="main_header">
    	<div class="container">
    		<div class="head_inner">
    			<div class="row">
    				<div class="col-lg-6 col-md-6 col-4">
    					<div class=head_icon>
    						<ul>
								<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li><a href="#"><i class="fab fa-instagram"></i></a></li>
						    </ul>
    					</div>
    				</div>
    				<div class="col-lg-6 col-md-6 col-8">
    					<div class="head_email">
    						<a href="mailto:info@example.com"><i class="fas fa-envelope-open-text"></i>
                            <span>info@example.com</span></a>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="manu_header" id="dynamic">
    	<div class="container">
    		<div class="row">
    			<div class="col-lg-4 col-md-6 col-6">
    				<div class="manu_logo">
    					<a href="index.html">
    						<img src="image/logo.webp">
    					</a>
    				</div>
    			</div>
				<div class="col-lg-8 col-md-6 col-6">
					<div class="main_manu">
						<ul>
							<li><a href="{{url('/')}}">Home</a></li>
                            <li><a href="{{url('/about')}}">About Us</a></li>
                            <li><a href="{{url('/service')}}">Services</a></li>
                            <li class="dropdown"><a href="#">Packages<span><i class="fas fa-sort-down"></i></span> </a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{url('/demestic')}}">Domestic</a></li>
                                    <li><a href="{{url('/international')}}">International</a></li>
                                </ul>
                            </li>
                            <li><a href="{{url('/gallary')}}">Gallery</a></li>
                            <li><a href="{{url('/contact')}}">Contact Us</a></li>
						</ul>
					</div>
                    <div class="mobile_manu">
                        <div id="menu-button">
                            <div id="line-1"></div>
                            <div id="line-2"></div>
                            <div id="line-3"></div>
                        </div>
                        <div id="menu">
                            <ul>
                                <li><a href="index.html">Home</a></li>
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="service.html">Services</a></li>
                                <li class="dropdown"><a href="#">Packages<span><i class="fas fa-sort-down"></i></span> </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="domestic.html">Domestic</a></li>
                                        <li><a href="international.html">International</a></li>
                                    </ul>
                                </li>
                                <li><a href="gallery.html">Gallery</a></li>
                                <li><a href="contact.html">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
				</div>
    		</div>
    	</div>
    </div>

    @yield('content')


    <div class="footer">
        <div class="container">
            <div class="newsletter">
                <div class="news_1">
                    <h6>KEEP IN TOUCH</h6>
                    <h3>Travel with Us</h3>
                </div>
                <div class="subscribe-form">
                    <input type="email" name="email" placeholder="Enter your email here..." class="form-control input-lg inputNew txtemail" required="">
                    <button type="submit" class="subscribe-btn">Subscribe</button>
                </div>
            </div>
            <div class="footer_main">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="footer-1">
                            <img src="image/logo.webp">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ut diam et nibh condimentum venenatis eu ac magnasin. Quisque interdum est mauris, eget ullamcorper</p>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2">
                        <div class="footer-2">
                            <h3>OUR AGENCY</h3>
                            <ul>
                                <li><i class="fas fa-chevron-right"></i><a href="">Service</a></li>
                                <li><i class="fas fa-chevron-right"></i><a href="#">Insurancee</a></li>
                                <li><i class="fas fa-chevron-right"></i><a href="#">Agency</a></li>
                                <li><i class="fas fa-chevron-right"></i><a href="#">Tourism</a></li>
                                <li><i class="fas fa-chevron-right"></i><a href="#">Payment</a></li>
                            </ul>
                        </div>
                    </div>
                     <div class="col-lg-2 col-md-2">
                        <div class="footer-2">
                            <h3>OUR AGENCY</h3>
                            <ul>
                                <li><i class="fas fa-chevron-right"></i><a href="#">Service</a></li>
                                <li><i class="fas fa-chevron-right"></i><a href="#">Insurancee</a></li>
                                <li><i class="fas fa-chevron-right"></i><a href="#">Agency</a></li>
                                <li><i class="fas fa-chevron-right"></i><a href="#">Tourism</a></li>
                                <li><i class="fas fa-chevron-right"></i><a href="#">Payment</a></li>
                            </ul>
                        </div>
                    </div>
                     <div class="col-lg-2 col-md-2">
                        <div class="footer-2">
                            <h3>OUR AGENCY</h3>
                            <ul>
                                <li><i class="fas fa-chevron-right"></i><a href="#">Service</a></li>
                                <li><i class="fas fa-chevron-right"></i><a href="#">Insurancee</a></li>
                                <li><i class="fas fa-chevron-right"></i><a href="#">Agency</a></li>
                                <li><i class="fas fa-chevron-right"></i><a href="#">Tourism</a></li>
                                <li><i class="fas fa-chevron-right"></i><a href="#">Payment</a></li>
                            </ul>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="co_bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-12 bm-1">
                            <span>Travels Theme © Copyright 2022. All rights reserved</span>
                        </div>
                        <div class="col-md-4 col-12 bm-1">
                            <ul type="none">
                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="fo_first">
                        <img src="image/logo.webp">
                        <p>Ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.ipsum dolor sit amet, consectetur</p>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="fo_Second">
                        <h3>Company</h3>
                        <ul>
                            <li><a href="#">Service</a></li>
                            <li><a href="#">Packages</a></li>
                            <li><a href="#">Gallery</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="fo_thired">
                        <h3>Gallery</h3>
                        <div class="g-pic">
                            <div class="g-pic-block">
                               <img src="image/footer-gallery-1.jpg">
                               <div class="overlay"></div>
                            </div>
                            <div class="g-pic-block">
                               <img src="image/footer-gallery-2.jpg">
                               <div class="overlay"></div>
                            </div>
                            <div class="g-pic-block">
                               <img src="image/footer-gallery-4.jpg">
                               <div class="overlay"></div>
                            </div>
                            <div class="g-pic-block">
                               <img src="image/footer-gallery-6.jpg">
                               <div class="overlay"></div>
                            </div>
                            <div class="g-pic-block">
                               <img src="image/footer-gallery-5.jpg">
                               <div class="overlay"></div>
                            </div>
                            <div class="g-pic-block">
                               <img src="image/footer-gallery-3.jpg">
                               <div class="overlay"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="fo_four">
                        <h3>Contact Us</h3>
                        <div class="c-block">
                           <div class="f-icon-c"><i class="fa fa-map-marker"></i></div>
                           <div class="f-text-c"><p>Flat 20, Reynolds Neck, North Helenaville, FV77 8WS</p></div>
                        </div>
                        <div class="c-block">
                            <div class="f-icon-c"><i class="fa fa-microphone"></i></i></div>
                            <div class="f-text-c"><a href="tel:+2(305) 587-3407">+2(305) 587-3407</a></div>
                        </div>
                        <div class="c-block">
                            <div class="f-icon-c"><i class="fa fa-envelope"></i></div>
                            <div class="f-text-c"><a href="mailto:info@example.com">info@example.com</a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    
    <a class="up-btn show1" href="#"></a>
    


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script type="text/javascript">

    $("#menu-button").click(function(){
      $(this).toggleClass("active");
      $("#line-1").toggleClass("active");
      $("#line-2").toggleClass("active");
      $("#line-3").toggleClass("active");
      $("#menu").slideToggle("slow");
    });

    $(function(){
  
    $('li.dropdown > a').on('click',function(event){

    event.preventDefault();
    $(this).toggleClass('selected');
    $(this).parent().find('ul').first().toggle(300);

    $(this).parent().siblings().find('ul').hide(200);

    //Hide menu when clicked outside
    $(this).parent().find('ul').parent().mouseleave(function(){ 
      var thisUI = $(this);
      $('html').click(function(){
        thisUI.children(".dropdown-menu").hide();
    thisUI.children("a").removeClass('selected');
               
        $('html').unbind('click');
      });
    });


    });

    });
        
    var btn = $('.up-btn');
        $(window).scroll(function() {
            if ($(window).scrollTop() > 300) {
                btn.addClass('show1');  
            }
            else {
                btn.removeClass('show1');
            }
        });
        btn.on('click', function(e) {
            e.preventDefault();
        $('html, body').animate({scrollTop:0}, '300');
    }); 

    $(window).scroll(function(){
            if ($(this).scrollTop() > 50) {
                $('#dynamic').addClass('newClass');
            } else {
                $('#dynamic').removeClass('newClass');
            }
        });

    </script>
</body>
</html>