@extends('admin.layout.header')

@section('content')




<div class="page title1" style="display: block;">
          <div class="mt-5">
              <div class="list1">
                  <h4 class="mb-4">Portfolio List</h4>
                  <button class="btn1"><a href="{{url('/admin/add_info_aboutus_team')}}" style="color:black;">ADD</a></button>
              </div>
              <div class="detail table-responsive">
                  <table class="table table-bordered table-striped">
                      <thead>
                          <tr>
                            <th>Id</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Title</th>
                            <th>Facebook_url</th>
                            <th>Twitter_url</th>
                            <th>Linkedin_url</th>
                            <th>Instagram_url</th>    
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
                              <td>{{$u->name}}</td>
                              <td>{{$u->title}}</td>
                              <td>{{$u->facebook}}</td>
                              <td>{{$u->twitter}}</td>
                              <td>{{$u->linkedin}}</td>
                              <td>{{$u->instagram}}</td>
                              <td>
                                <button class="btn0 btn2"><a href="{{url('/admin/update_aboutus_team_data')}}/{{$u->id}}"><i class="fal fa-pencil"></i></a></button>
                              </td>
                              <td>
                                <button class="btn3 btn0"><a href="{{url('/admin/delete_aboutus_team_data')}}/{{$u->id}}"><i class="fal fa-trash-alt"></i></a></button>
                              </td>
                          </tr>
                      </tbody>

                      @endforeach
                  </table>
              </div>
          </div>
      </div>



















@endsection