<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class user_controller extends Controller
{
    public function index(){

        $banner_data=DB::table('banner')->get();
        $data['banner_data']=$banner_data;

        $about_data=DB::table('about')->get();
        $data['about_data']=$about_data;

        $service_data=DB::table('service')->take(3)->get();
        $data['service_data']=$service_data;

        $booking_data=DB::table('booking')->get();
        $data['booking_data']=$booking_data;

        $package_data=DB::table('package')->get();
        $data['package_data']=$package_data;

        return view('welcome',$data);
    }

    public function about(){

        $aboutus_about_data=DB::table('aboutus_about')->take(1)->get();
        $data['aboutus_about_data']=$aboutus_about_data;

        $aboutus_client_data=DB::table('aboutus_client')->get();
        $data['aboutus_client_data']=$aboutus_client_data;

        $aboutus_team_data=DB::table('aboutus_team')->get();
        $data['aboutus_team_data']=$aboutus_team_data;

        $bg_page_data=DB::table('bg_page')->get();
        $data['bg_page_data']=$bg_page_data;

        return view('About',$data);
    }

    public function service(){

        $service_data=DB::table('service')->get();
        $data['service_data']=$service_data;

        $bg_page_data=DB::table('bg_page')->get();
        $data['bg_page_data']=$bg_page_data;

        return view('Service',$data);

    }

    public function gallary(){

        $gallary_data=DB::table('gallary_image')->get();
        $data['gallary_data']=$gallary_data;

        $bg_page_data=DB::table('bg_page')->get();
        $data['bg_page_data']=$bg_page_data;

        return view('Gallary',$data);

    }

    public function demestic(){

        $domestic_data=DB::table('package')->where('package','1')->get();
        $data['domestic_data']=$domestic_data;

        $bg_page_data=DB::table('bg_page')->get();
        $data['bg_page_data']=$bg_page_data;

        return view('domestic',$data);
    }

    public function international(){

        $international_data=DB::table('package')->where('package','2')->get();
        $data['international_data']=$international_data;

        $bg_page_data=DB::table('bg_page')->get();
        $data['bg_page_data']=$bg_page_data;

        return view('international',$data);
    }

    public function contact(){

        $contact_data=DB::table('admins')->take(1)->get();
        $data['contact_data']=$contact_data;

        $bg_page_data=DB::table('bg_page')->get();
        $data['bg_page_data']=$bg_page_data;

        return view('contact',$data);
    }

    public function contact_data(Request $request){

        $validated=$request->validate([

            'name'=>'required',
            'email'=>'required',
            'phone_no'=>'required',
            'description'=>'required',
        ]);

        $name=$request->input('name');
        $email=$request->input('email');
        $phone_no=$request->input('phone_no');
        $description=$request->input('description');

        DB::table('user_help')->insert(['name'=>$name,'email'=>$email,'phone_no'=>$phone_no,'description'=>$description,]);

        return redirect('/contact')->with('error','Your Response saved successfully!!!');
    }

}
