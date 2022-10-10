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
                  <form enctype="multipart/form-data" method="post" action="{{url('/admin/store_add_info_aboutus_team')}}">  

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
                                  <label>Name</label>
                              </div>
                              <div class="col-md-12 data">
                                  <input type="text" placeholder="name" name="name" value="" required="">
                                  @if($errors->has('name')) <p class="error_mes">{{ $errors->first('name') }}</p> @endif
                              </div>   
                          </div>

                          <div class="part">
                              <div class="col-md-12 label">
                                  <label>Title</label>
                              </div>
                              <div class="col-md-12 data">
                                  <input type="text" placeholder="title" name="title" value="" required="">
                                  @if($errors->has('title')) <p class="error_mes">{{ $errors->first('title') }}</p> @endif
                              </div>   
                          </div>

                          <div class="part">
                              <div class="col-md-12 label">
                                  <label>Facebook</label>
                              </div>
                              <div class="col-md-12 data">
                                  <input type="url" placeholder="facebook" name="facebook" value="">
                                  @if($errors->has('facebook')) <p class="error_mes">{{ $errors->first('facebook') }}</p> @endif
                              </div>   
                          </div>

                          <div class="part">
                              <div class="col-md-12 label">
                                  <label>Twitter</label>
                              </div>
                              <div class="col-md-12 data">
                                  <input type="url" placeholder="twitter" name="twitter" value="">
                                  @if($errors->has('twitter')) <p class="error_mes">{{ $errors->first('twitter') }}</p> @endif
                              </div>   
                          </div>

                          <div class="part">
                              <div class="col-md-12 label">
                                  <label>LinkedIn</label>
                              </div>
                              <div class="col-md-12 data">
                                  <input type="url" placeholder="linkedin" name="linkedin" value="">
                                  @if($errors->has('linkedin')) <p class="error_mes">{{ $errors->first('linkedin') }}</p> @endif
                              </div>   
                          </div>

                          <div class="part">
                              <div class="col-md-12 label">
                                  <label>Instagram</label>
                              </div>
                              <div class="col-md-12 data">
                                  <input type="url" placeholder="instagram" name="instagram" value="">
                                  @if($errors->has('instagram')) <p class="error_mes">{{ $errors->first('instagram') }}</p> @endif
                              </div>   
                          </div> 

                          <button type="submit">submit</button>
                    </form>       
                </div>  
            </div>
        </div>
      </div>

















@endsection