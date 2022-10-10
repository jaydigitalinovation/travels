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
                  <form enctype="multipart/form-data" method="post" action="{{url('/admin/store_update_booking_data')}}/{{$id}}">  

                  	@csrf
                          <div class="part">
                              <div class="col-md-12 label">
                                 <label>Image</label>
                              </div>
                              <div class="col-md-12">
                                 <input type="file" name="image" onchange="readURL(this);" value="">
                                 <img id="blah" src="/uploads/{{$image}}" width="100px" height="100px" alt="">
                                 @if($errors->has('image')) <p class="error_mes">{{ $errors->first('image') }}</p> @endif
                                 <input type="hiddden" name="oldimage" value="{{$image}}">
                               </div>   
                          </div>
                          <div class="part">
                              <div class="col-md-12 label">
                                  <label>Tittle</label>
                              </div>
                              <div class="col-md-12 data">
                                  <input type="text" placeholder="title" name="title" value="{{$title}}" required="">
                                  @if($errors->has('title')) <p class="error_mes">{{ $errors->first('title') }}</p> @endif
                              </div>   
                          </div>  
                             
                          <div class="part">
                              <div class="col-md-12 label">
                                  <label>Description</label>
                              </div>
                              <div class="col-md-12 data">
                                  <textarea type="text" name="description">{{$description}}</textarea>
                                  @if($errors->has('description')) <p class="error_mes">{{ $errors->first('description') }}</p> @endif
                              </div>
                          </div>

                          <div class="part">
                              <div class="col-md-12 label">
                                  <label>Tittle</label>
                              </div>
                              <div class="col-md-12 data">
                                  <input type="text" placeholder="price" name="price" value="{{$price}}" required="">
                                  @if($errors->has('price')) <p class="error_mes">{{ $errors->first('price') }}</p> @endif
                              </div>   
                          </div> 

                          <button type="submit">submit</button>
                    </form>       
                </div>  
            </div>
        </div>
      </div>


      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
      <script type="text/javascript">
        
         function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#blah')
                        .attr('src', e.target.result)
                        .width(130)
                        .height(130);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
      </script>

















@endsection