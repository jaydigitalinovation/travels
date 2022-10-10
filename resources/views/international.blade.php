@extends('layout.header_footer')

@section('content')

	<div class="in_banner">
    	<div class="container">
    		<div class="in_head">
    			<h3>International</h3>
    		</div>
    		<div class="in_dis">
    			<ul>
    				<li>Home</li>
    				<li><span>International</span></li>
    			</ul>
    		</div>
    	</div>
    </div>
    <div class="desti-bg">
        <div class="desti_head">
            <h3>International Packages</h3>
        </div>
        <div class="container">
            <div class="row">

            	@foreach($international_data as $id)
                <div class="col-lg-4 col-md-6 col-12 padding-1">   
                    <div class="d-block">
                        <figure class="imghvr-zoom-out ">
                            <img src="uploads/{{$id->image}}" alt="37">
                            <div class="sydney-block">
                                <div class="sydney-info">
                                    <p>{{$id->title}}</p>
                                    <h4>{{$id->country}}</h4>
                                </div>
                            </div>
                            <div class="sydney-disc">
                                <div class="sydney-info1">
                                    <h5>Duration: <strong>{{$id->duration}} DAYS</strong></h5>
                                    <div class="price">Rs.{{$id->price}}</div>
                                </div>
                            </div>
                            <figcaption>
                                <div class="back-info">
                                    <h3>{{$id->country}}</h3>
                                    <p>{{$id->description}}</p>
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