@extends('layout.header_footer')

@section('content')



	<div class="in_banner">
    	<div class="container">
    		<div class="in_head">
    			<h3>Domestic</h3>
    		</div>
    		<div class="in_dis">
    			<ul>
    				<li>Home</li>
    				<li><span>Domestic</span></li>
    			</ul>
    		</div>
    	</div>
    </div>
    <div class="desti-bg">
        <div class="desti_head">
            <h3>Domestic Packages</h3>
        </div>
        <div class="container">
            <div class="row">

            	@foreach($domestic_data as $dd)
                <div class="col-lg-4 col-md-6 col-12 padding-1">
                    <div class="d-block">
                        <figure class="imghvr-zoom-out ">
                            <img src="uploads/{{$dd->image}}" alt="37">
                            <div class="sydney-block">
                                <div class="sydney-info">
                                    <p>{{$dd->title}}</p>
                                    <h4>{{$dd->country}}</h4>
                                </div>
                            </div>
                            <div class="sydney-disc">
                                <div class="sydney-info1">
                                    <h5>Duration: <strong>{{$dd->duration}} DAYS</strong></h5>
                                    <div class="price">Rs.{{$dd->price}}</div>
                                </div>
                            </div>
                            <figcaption>
                                <div class="back-info">
                                    <h3>{{$dd->country}}</h3>
                                    <p>{{$dd->description}}</p>
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








@endsection