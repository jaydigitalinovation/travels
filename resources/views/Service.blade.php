@extends('layout.header_footer')

@section('content')

	<div class="in_banner">
    	<div class="container">
    		<div class="in_head">
    			<h3>Service</h3>
    		</div>
    		<div class="in_dis">
    			<ul>
    				<li>Home</li>
    				<li><span>Service</span></li>
    			</ul>
    		</div>
    	</div>
    </div>
    <div class="co_service">
        <h3>Our Services</h3>
        <div class="container">
            <div class="row">
            	@foreach($service_data as $se)
                <div class="col-lg-4 col-md-6 pad-1">
                    <div class="item-single">
                        <div class="servi_image">
                            <img src="uploads/{{$se->image}}">
                        </div>
                        <div class="content">
                            <h4>{{$se->title}}</h4>
                            <p>{{$se->description}}</p>
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















@endsection