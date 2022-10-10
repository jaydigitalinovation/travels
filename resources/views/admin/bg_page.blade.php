@extends('admin.layout.header')

@section('content')




<div class="page title1" style="display: block;">
          <div class="mt-5">
              <div class="list1">
                  <h4 class="mb-4">Portfolio List</h4>
                  <button class="btn1"><a href="{{url('/admin/add_info_booking')}}" style="color:black;">ADD</a></button>
              </div>
              <div class="detail table-responsive">
                  <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Page_name</th>
                            <th>Image</th>    
                            <th>Update</th>
                          </tr>
                      </thead>

                      @foreach($userdata as $key=>$u)
                      <tbody>

                          <tr>
                            <td>{{$key+1}}</td>
                              <td>{{$u->name}}</td>
                              <td>{{$u->page_name}}</td>
                              <td>
                                <img src="/uploads/{{$u->image}}" width="60" height="60">
                              </td>
                              <td>
                                <button class="btn0 btn2"><a href="{{url('/admin/update_bg_page')}}/{{$u->id}}"><i class="fal fa-pencil"></i></a></button>
                              </td>
                          </tr>
                      </tbody>

                      @endforeach
                  </table>
              </div>
          </div>
      </div>



















@endsection