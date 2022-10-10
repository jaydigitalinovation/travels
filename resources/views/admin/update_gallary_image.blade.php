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
                  <form enctype="multipart/form-data" method="post" action="{{url('/admin/store_update_gallary_image_data')}}/{{$id}}">  

                  	@csrf

                          <div class="part">
                              <div class="col-md-12 label">
                                 <label>Image</label>
                              </div>
                              <div class="col-md-12">
                                 <input type="file" name="multiple_image" onchange="readURL(this);" value="">
                                 <img id="blah" src="/uploads/{{$multiple_image}}" width="100px" height="100px" alt="">
                                 @if($errors->has('multiple_image')) <p class="error_mes">{{ $errors->first('multiple_image') }}</p> @endif
                                 <input type="hiddden" name="oldimage" value="{{$multiple_image}}">
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