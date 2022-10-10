@extends('layout.header_footer')

@section('content')


    <div id="header">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="new-slick-slider">
               @foreach($banner_data as $b) 
                <div class="slick-slider1">
                    <img src="/uploads/{{$b->image}}" alt="...">
                    <div class="title">
                        <h1 class="animated slideInDown text-center">{{$b->title}}</h1>
                        <h2 class="animated slideInLeft text-center">{{$b->description}}</h2>
                        <button class="animated slideInRight edit-button"><a href="">Contact Us</a></button>
                    </div>
                </div>
                @endforeach
              
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
    <div class="co_search">
        <div class="container">
            <div class="search_main">
                <input type="text" value="" class="mkdf-tours-destination-search tt-input" name="destination" placeholder="Where To?" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;">
                <select id="selectbox2">
                    <option value="">Month&hellip;</option>
                    <option value="january">January</option>
                    <option value="february">February</option>
                    <option value="march">March</option>
                    <option value="april">April</option>
                    <option value="may">May</option>
                    <option value="june">June</option>
                    <option value="july">July</option>
                    <option value="august">August</option>
                    <option value="september">September</option>
                    <option value="october">October</option>
                    <option value="november">November</option>
                    <option value="december">December</option>
                </select>
                <select id="selectbox1">
                    <option value="">Select an option&hellip;</option>
                    <option value="aye">Aye</option>
                    <option value="eh">Eh</option>
                    <option value="ooh">Ooh</option>
                    <option value="whoop">Whoop</option>
                </select>
                <button class="search_btn"><a href="#">Submit</a></button>
            </div>
        </div>
    </div>
    <div class="travel-bg">
        <div class="container">
            <div class="main-travel-spe">
                <div class="travel-title">
                    <h1>Why Travel with Tutive?</h1>
                </div>
                <div class="main-travel-block">

                    @foreach($about_data as $a)
                    <div class="travel1 col-sm-12 col-md-5 col-lg-3">
                        <div class="overflow-shine">
                                <div class="test-shine">
                                    <img src="uploads/{{$a->image}}">
                                </div>
                        </div>
                        <div class="icon-img">
                            <img src="uploads/{{$a->logo}}">
                        </div>
                        <p>{{$a->description}}</p>
                    </div>
                    @endforeach
                    
                </div>
            </div>
        </div>
    </div>
    <div class="co_service">
        <h3>Our Services</h3>
        <div class="container">
            <div class="row">
                @foreach($service_data as $s)
                <div class="col-lg-4 col-md-6 pad-1">
                    <div class="item-single">
                        <div class="servi_image">
                            <img src="uploads/{{$s->image}}">
                        </div>
                        <div class="content">
                            <h4>{{$s->title}}</h4>
                            <p>{{$s->description}}</p>
                            <div class="discount">
                                <i class="fas fa-passport"></i>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="bg-hotel">
        <div class="container1">
            <div class="main-hotel">
                <div class="main-title">
                    <div class="content-title">
                        <h1>Hotels Booking</h1>
                        <h4>Looking cautiously round, to ascertain that they <br>were not overhead</h4>
                    </div>
                </div>
                <div class="row">
                    @foreach($booking_data as $bo)
                    <div class="col-lg-6">
                        <div class="hotel-block">
                            <div class="h-block">
                                <div class="h-img">
                                    <div>
                                       <img src="uploads/{{$bo->image}}">
                                    </div>
                                </div>
                                <div class="h-info">
                                    <h4>{{$bo->title}}</h4>
                                    <p>{{$bo->description}}</p>
                                </div>
                                <div class="h-price">
                                    <p>From</p>
                                    <h3>{{$bo->price}}</h3>
                                    <p>Person</p>
                                    <div class="book_btn book_btn2">
                                         <button class="btn-5"><a href="#">Details</a></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="desti-bg">
        <div class="desti_head">
            <h3>Hot Packages</h3>
        </div>
        <div class="container">
            <div class="row">
                @foreach($package_data as $p)
                <div class="col-lg-4 col-md-6 padding-1">
                    <div class="d-block">
                        <figure class="imghvr-zoom-out ">
                            <img src="uploads/{{$p->image}}" alt="37">
                            <div class="sydney-block">
                                <div class="sydney-info">
                                    <p>{{$p->title}}</p>
                                    <h4>{{$p->country}}</h4>
                                </div>
                            </div>
                            <div class="sydney-disc">
                                <div class="sydney-info1">
                                    <h5>Duration: <strong>{{$p->duration}} DAYS</strong></h5>
                                    <div class="price">Rs.{{$p->price}}</div>
                                </div>
                            </div>
                            <figcaption>
                                <div class="back-info">
                                    <h3>{{$p->country}}</h3>
                                    <p>{{$p->description}}</p>
                                    <a href="#">Read More</a>
                                    <div class="sydney-icon">
                                       <i class="fa fa-globe"></i><i class="fa fa-road"></i><i class="fa fa-plane"></i><i class='fa fa-university'></i>
                                    </div>
                                </div>
                            </figcaption>
                        </figure>
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
        .title{
            position: absolute;
            top: 30%;
            left: 20%;
        }
        .title-2{
            position: absolute;
            top: 30%;
            left: 30%;
        }
        .title-3{
            position: absolute;
            top: 30%;
            left: 25%;
        }
        .slick-slider1{
            position: relative;
        }
        .slick-slider1:before{
            content: '';
            position: absolute;
            background-color: #484343a6;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .slick-slider1 img{
            width: 100% !important;
            height: 719px !important;
            object-fit: cover;
        }
        .carousel{
            width: 100%;
        }
        .title h1{
            font-size: 70px;
            color: white;
        }
        .title h2{
            color: white;
        }
        .edit-button{
            margin-left: 42%;
        }
        .title .animated {
             animation-duration: 1.3s;
             animation-delay: 0.5s;
        }

        
    </style>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>

    <script type="text/javascript">
        
        $(document).ready(function(){

            $('.new-slick-slider').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                autoplay:true
            });
            
        });
    </script>

















@endsection