@extends('admin.layout.header')

@section('content')

  <div class="page my-4 title1">
        <div class="mt-5">
            <h4 class="mb-4">Details List</h4>
            <div class="detail">
            	@if(session()->has('error'))
					    <div class="alert alert-success">
					        {{session()->get('error')}}
					    </div>
					    @endif
                <div class="form">      
                  <form enctype="multipart/form-data" method="post" action="{{url('/admin/store_add_info_gallary_image')}}">  

                  	@csrf

                          <div class="part">
                              <div class="col-md-12 label">
                                 <label>Image</label>
                              </div>
                              <div class="col-md-12">
                                 <input type="file" name="multiple_image[]" onchange="readURL(this);" multiple>
                                 @if($errors->has('multiple_image')) <p class="error_mes">{{ $errors->first('multiple_image') }}</p> @endif
                                 <img id="blah" src="#" alt="">
                               </div>   
                          </div>

                          <button type="submit">submit</button>
                    </form>       
                </div>  
            </div>
        </div>
      </div>

















@endsection