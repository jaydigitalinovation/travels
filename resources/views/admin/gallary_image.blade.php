@extends('admin.layout.header')

@section('content')




<div class="page title1" style="display: block;">
          <div class="mt-5">
              <div class="list1">
                  <h4 class="mb-4">Portfolio List</h4>
                  <button class="btn1"><a href="{{url('/admin/add_info_gallary_image')}}" style="color:black;">ADD</a></button>
              </div>
              <div class="detail table-responsive">
                  <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>Id</th>
                            <th>Image</th>    
                            <th>Update</th>
                            <th>Delete</th>
                          </tr>
                      </thead>

                      @foreach($userdata as $key=>$u)
                      <tbody>

                          <tr>
                            <td>{{$key+1}}</td>
                            <td>
                                <img src="/uploads/{{$u->multiple_image}}" width="60" height="60">
                              </td>
                              <td>
                                <button class="btn0 btn2"><a href="{{url('/admin/update_gallary_image_data')}}/{{$u->id}}"><i class="fal fa-pencil"></i></a></button>
                              </td>
                              <td>
                                <button class="btn3 btn0"><a href="{{url('/admin/delete_gallary_image_data')}}/{{$u->id}}"><i class="fal fa-trash-alt"></i></a></button>
                              </td>
                          </tr>
                      </tbody>

                      @endforeach
                  </table>
              </div>
          </div>
      </div>



















@endsection