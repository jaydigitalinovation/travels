@extends('layout.header_footer')

@section('content')



	<div class="in_banner">
    	<div class="container">
    		<div class="in_head">
    			<h3>Contact Us</h3>
    		</div>
    		<div class="in_dis">
    			<ul>
    				<li>Home</li>
    				<li><span>Contact Us</span></li>
    			</ul>
    		</div>
    	</div>
    </div>
    <div class="contact-section">
        <div class="container">
            <div class="contact-wraper">

            	@foreach($contact_data as $c)
                <div class="contact-info-area">
                    <h4 class="title">Contact Info</h4>
                    <div class="contact-info-item">
                        <div class="thumb">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="content">
                            <h6 class="title">Office Address</h6>
                            <p>{{$c->address}}</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="thumb">
                            <i class="fas fa-envelope-open-text"></i>
                        </div>
                        <div class="content">
                            <h6 class="title">Email Address</h6>
                            <a href="Mailto:demo@gmailc.com">{{$c->email}}</a>
                            <a href="Mailto:demo@gmailc.com">{{$c->email}}</a>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="thumb">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="content">
                            <h6 class="title">Phone Number</h6>
                            <a href="Tel:01923">{{$c->phone_no}}</a><br>
                            <a href="Tel:01923">{{$c->phone_no}}</a>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="contact-form-wrapper">
                    <h2 class="title">Get In Touch</h2>
                    <form class="contact-form" method="post" action="{{url('/contact_data')}}">

                    	@csrf
                        <div class="row gy-4">
                            <div class="col-lg-12 pa--1">
                                <div class="form--group">
                                    <input type="text" name="name" class="form--control" placeholder="Your Name">
                                </div>
                            </div>
                            <div class="col-lg-12 pa--1">
                                <div class="form--group">
                                    <input type="email" name="email" class="form--control" placeholder="Your Email">
                                </div>
                            </div>
                            <div class="col-lg-12 pa--1">
                                <div class="form--group">
                                    <input type="tel" name="phone_no" class="form--control" placeholder="Your Number">
                                </div>
                            </div>
                            <div class="col-lg-12 pa--1">
                                <div class="form--group">
                                	<textarea name="description" cols="30" rows="5" placeholder="Write your message..." class="form-control" autocomplete="off" spellcheck="false">	
	    							</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="book_btn book_btn1">
                            <button class="btn-5" type="submit"><span>Send Message</span></button>
                         </div>
                        <div class="communication-method-wrapper">
                            <span>Preferred mode of communication</span>
                            <div class="group-wrapper">
                                <div class="form--group custom--radio">
                                    <input type="radio" checked="" name="method" id="method1">
                                    <label for="method1">Email</label>
                                </div>
                                <div class="form--group custom--radio">
                                    <input type="radio" name="method" id="method2">
                                    <label for="method2">Phone</label>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    <style type="text/css">
    	
    	.btn-5 span {
		    z-index: 1;
		    position: relative;
		    color: white;
		}
		.btn-5:hover span {
		    z-index: 1;
		    position: relative;
		    color: #2d7fbb;
		}
    </style>












@endsection