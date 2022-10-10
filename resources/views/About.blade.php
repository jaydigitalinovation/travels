@extends('layout.header_footer')

@section('content')


	<div class="in_banner">
    	<div class="container">
    		<div class="in_head">
    			<h3>About Us</h3>
    		</div>
    		<div class="in_dis">
    			<ul>
    				<li>Home</li>
    				<li><span>About Us</span></li>
    			</ul>
    		</div>
    	</div>
    </div>
    <div class="in_about">
    	<div class="container">
    		<div class="row">

    			@foreach($aboutus_about_data as $a)
    			<div class="col-lg-6 col-md-5">
    				<div class="about_image">
    					<img src="uploads/{{$a->image1}}">
    				</div>
    			</div>
    			<div class="col-lg-6 col-md-7">
    				<div class="about_disc">
    					<h3>{{$a->title}}</h3>
    					{!!$a->description!!}
                        <div class="book_btn book_btn1">
                            <button class="btn-5"><a href="Contact.html">Contact Us</a></button>
                        </div>
    				</div>
    			</div>
    			@endforeach
    		</div>
    	</div>
    </div>
    <div class="in_book">
        <div class="container">
            <div class="book_now">
                <div class="book_inner">
                    <h5>Plan your trip with us</h5>
                    <h3>Ready for an unforgetable tour?</h3>
                </div>
                <div class="book_btn">
                    <button class="btn-5"><a href="packages.html">Book Tour Now</a></button>
                </div>
            </div>
        </div>
    </div>
    <div class="in_test">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 new-padding">
                    <img src="image/package.jpg" class="image_client">
                </div>
                <div class="col-lg-6 col-md-6 new-padding1">
                    <div id="demo" class="slick slide" data-ride="slick">
                        <h3>What're Our Clients Say</h3>
                        <div class="slick-inner">
                            @foreach($aboutus_client_data as $ac)
                            <div class="slick-item">
                                <div class="slick-caption">
                                    <p class="mx-auto">{{$ac->description}}</p> 
                                    <img class="mx-auto" src="uploads/{{$ac->image}}">
                                    <div class="text-center text-white" id="image-caption">{{$ac->name}}</div>
                                </div>
                            </div>
                            @endforeach
                        </div> 
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="team">
        <div class="container">
            <div class="team_head">
                <h3>Our Team & Guide</h3>
                <p>Travel has helped us to understand the meaning of life and it has helped us become better people. Each time we travel, we see the world with new eyes.</p>
            </div>
            <div class="row__1 team_slider">

            	@foreach($aboutus_team_data as $t)
                <div class="col-lg">
                    <div class="team-single">
                        <div class="team_image">
                             <img src="uploads/{{$t->image}}" alt="Demo Image">
                        </div>
                        <div class="team_content">
                            <div class="team_title">
                                <h3>{{$t->name}}</h3>
                                <p>{{$t->title}}</p>
                            </div>
                            <div class="social-link">
                                <a href="{{$t->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                                <a href="{{$t->twitter}}" target="_blank"><i class="fab fa-twitter"></i></a>
                                <a href="{{$t->linkedin}}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                                <a href="{{$t->instagram}}" target="_blank"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                @endforeach
            </div>
        </div>
    </div>
    <div class="discount-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="discount-box">
                        <img class="discount_vector" src="image/discount_single.png">
                        <div id="container">
                            <div class="discount_desc">
                                <h4>Travel Adventures</h4>
                                <h2>25% off</h2>
                                <p>Spend a best Holidays with us</p>
                                <div class="descount_btn">
                                    <a href="#"><img src="image/appstore.png"></a>
                                    <a href="#"><img src="image/playstore.png"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style type="text/css">
        .slick-control-prev.slick-arrow {
            text-align: right;
            margin-top: 4%;
        }
        i.fas.fa-arrow-left {
            position: absolute;
            bottom: 0%;
            right: 9%;
        }
        .slick-inner.slick-initialized.slick-slider {
            position: relative;
        }
        #demo img {
            width: 6rem;
            border-radius: 5rem;
            margin-top: 2rem;
            height: 100%;
        }
       #demo p {
            margin-top: 11%;
            text-align: center;
            color: white;
            width: 79%;
        }
    </style>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

<script type="text/javascript">
 	
 	$('.team_slider').slick({
            autoplay: true,
            autoplaySpeed: 1500,
            slidesToShow:4,
            slidesToScroll: 1,
            dots: false,
            arrows: false,
            focusOnSelect: true,
            // prevArrow: '<div class="service-arrow slide-arrow prev-arrow"><i class="far fa-chevron-left"></i></div>',
            // nextArrow: '<div class="service-arrow slide-arrow next-arrow"><i class="far fa-chevron-right"></i></div>',
            responsive: [
                {
                  breakpoint: 1024,
                  settings: {
                    slidesToShow:2,
                    slidesToScroll: 1,
                    adaptiveHeight: true,
                  },
                },
                {
                  breakpoint: 600,
                  settings: {
                    slidesToShow:1,
                    slidesToScroll: 1,
                  },
                },
            ],
        });

    $('.slick-inner').slick({
            autoplay: true,
            autoplaySpeed: 1500,
            slidesToShow:1,
            slidesToScroll: 1,
            dots: false,
            arrows: true,
            prevArrow: '<div class="slick-control-prev"><i class="fas fa-arrow-left"></i></div>',
            nextArrow: '<div class="slick-control-prev"><i class="fas fa-arrow-right"></i></div>'
        });
</script>










@endsection