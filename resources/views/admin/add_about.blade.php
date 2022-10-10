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
                  <form enctype="multipart/form-data" method="post" action="{{url('/admin/store_add_info_about')}}">  

                  	@csrf
                          <div class="part">
                              <div class="col-md-12 label">
                                 <label>Image</label>
                              </div>
                              <div class="col-md-12">
                                 <input type="file" name="image" onchange="readURL(this);" required="">
                                 @if($errors->has('image')) <p class="error_mes">{{ $errors->first('image') }}</p> @endif
                                 <img id="blah" src="#" alt="">
                               </div>   
                          </div>
                          <div class="part">
                              <div class="col-md-12 label">
                                  <label>Logo</label>
                              </div>
                              <div class="col-md-12 data">
                                  <input type="file" placeholder="Logo" name="logo" value="" required="">
                                  @if($errors->has('logo')) <p class="error_mes">{{ $errors->first('logo') }}</p> @endif
                              </div>   
                          </div>  
                             
                          <div class="part">
                              <div class="col-md-12 label">
                                  <label>Description</label>
                              </div>
                              <div class="col-md-12 data">
                                  <textarea type="text" name="description"></textarea>
                                  @if($errors->has('description')) <p class="error_mes">{{ $errors->first('description') }}</p> @endif
                              </div>
                          </div>

                          <button type="submit">submit</button>
                    </form>       
                </div>  
            </div>
        </div>
      </div>

















@endsection