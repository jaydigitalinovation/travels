@extends('admin.layout.header')

@section('content')




<div class="page title1" style="display: block;">
          <div class="mt-5">
              <div class="list1">
                  <h4 class="mb-4">Portfolio List</h4>
                  <button class="btn1"><a href="{{url('/admin/add_info_service')}}" style="color:black;">ADD</a></button>
              </div>
              <div class="detail table-responsive">
                  <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Logo</th>
                            <th>Title</th>
                            <th>Description</th>    
                            <th>Update</th>
                            <th>Delete</th>
                          </tr>
                      </thead>

                      @foreach($userdata as $key=>$u)
                      <tbody>

                          <tr>
                            <td>{{$key+1}}</td>
                              <td>
                                <img src="/uploads/{{$u->image}}" width="60" height="60">
                              </td>
                              <td>
                                <img src="/uploads/{{$u->logo}}" width="60" height="60">
                              </td>
                              <td>{{$u->title}}</td>
                              <td>{{$u->description}}</td>
                              <td>
                                <button class="btn0 btn2"><a href="{{url('/admin/update_service_data')}}/{{$u->id}}"><i class="fal fa-pencil"></i></a></button>
                              </td>
                              <td>
                                <button class="btn3 btn0"><a href="{{url('/admin/delete_service_data')}}/{{$u->id}}"><i class="fal fa-trash-alt"></i></a></button>
                              </td>
                          </tr>
                      </tbody>

                      @endforeach
                  </table>
              </div>
          </div>
      </div>



















@endsection