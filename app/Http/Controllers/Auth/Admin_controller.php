<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

use App\Models\Admin;

use DB;

use Hash;



class Admin_controller extends Controller
{
    public function home(){

        $userdata=DB::table('banner')->get();

        $data['userdata']=$userdata;

        return view('admin.home',$data);
    }

    public function forget_password(){

        return view('admin.email');
    }

    public function send_mail(Request $request){

        $validated=$request->validate([

            'email'=>'required|email',
        ]);

        $email=$request->input('email');

        $admin=Admin::where('email',$email)->count();

        if($admin){

            $admin_data=Admin::where('email',$email)->get();

            $admin_id=$admin_data[0]->id;

           

            $string=$this->generateRandomString(4);

            $meta['FROM_EMAIL']="jaypatel07072001@gmail.com";
            $meta['email']=$email;
            $meta['subject']="reset password mail";  
            $meta['id']=$admin_id;
      
            $meta['token']=$string;
      
            Mail::send('email.token', $meta, function($m) use($meta){
        
               $m->from($meta['FROM_EMAIL'],'reset password mail');
               $m->to($meta['email']);
               $m->subject($meta['subject']); 
                });

            $already_store=DB::table('password_resets')->where('admin_id',$admin_id)->count();

            if($already_store){

                DB::table('password_resets')->where('admin_id',$admin_id)->update(['token'=>$string]);
            }else{

                DB::table('password_resets')->insert(['token'=>$string,'admin_id'=>$admin_id]);
            }
            return redirect('admin/confirm_otp/'.$admin_id)->with('error','otp send on email!!');
        }else{

            return redirect('/admin/admin_login')->with('error','user not registered!!');
        }
    }

    public function confirm_otp($id){

        $data['id']=$id;

        return view('admin.otp',$data);
    }

    public function verify_otp(Request $request,$id){

        $valiadted=$request->validate([

            'otp'=>'required',
        ]);

        $otp=$request->input('otp');

        $admin_data=DB::table('password_resets')->where('admin_id',$id)->get();

        $token=$admin_data[0]->token;

        if($otp==$token){

            DB::table('password_resets')->where('admin_id',$id)->delete();

            return redirect('admin/reset_password/'.$id);
        }else{

            return redirect('admin/confirm_otp/'.$id)->with('error','otp is incorrect!!');
        }
    }

    public function reset_password($id){

        $data['id']=$id;

        return view('admin.reset_password',$data);
    }

    public function store_password(Request $request,$id){

        $validated=$request->validate([

            'password'=>'required|min:6',
            'c_password'=>'required|same:password|min:6',
        ]);

        Admin::where('id',$id)->update(['password'=>Hash::make($request->password),]);

        return redirect('/admin/admin_login')->with('error','password change successfully!!!');
    }

    public function add_info(){

        return view('admin.add');
    }

    public function store_add_info(Request $request){

        $validated=$request->validate([

            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');

        $description=$request->input('description');

        $file=$request->file('image');

        $imagename='';

        if($file !=''){

            $destination_path='uploads';

            $imagename=time().''.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);
        }

        DB::table('banner')->insert(['image'=>$imagename,
                                        'title'=>$title,
                                        'description'=>$description,]);

        return redirect('/admin/home')->with('error','data submited successfully!!');
    }

    public function delete_banner_data($id){

        $user_data=DB::table('banner')->where('id',$id)->get();

        $image=$user_data[0]->image;

        if($image !=''){

            unlink(public_path('/uploads/'.$image));
        }

        DB::table('banner')->where('id',$id)->delete();

        return redirect('/admin/home')->with('error','data deleted successfully!!');
    }

    public function update_banner_data($id){

        $userdata=DB::table('banner')->where('id',$id)->get();

        $data['id']=$userdata[0]->id;
        $data['image']=$userdata[0]->image;
        $data['title']=$userdata[0]->title;
        $data['description']=$userdata[0]->description;

        return view('admin.update_banner',$data);
    }

    public function store_update_banner_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');

        $description=$request->input('description');

        $file=$request->file('image');

        $oldimage=$request->input('oldimage');

        $imagename='';

        if($file !=''){

            $destination_path='uploads';

            $imagename=time().''.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);

            if($oldimage !=''){

                unlink(public_path('/uploads/'.$oldimage));
                
            }

            DB::table('banner')->where('id',$id)->update(['image'=>$imagename,]);

        }
        DB::table('banner')->where('id',$id)->update(['title'=>$title,
                                                            'description'=>$description,]);

            return redirect('admin/home')->with('error','data updated successfully!!');
    }


    public function about(){

        $userdata=DB::table('about')->get();

        $data['userdata']=$userdata;

        return view('admin.about',$data);
    }

    public function add_info_about(){

        return view('admin.add_about');
    }

    public function store_add_info_about(Request $request){

        $validated=$request->validate([
            'description'=>'required',
        ]);

        $description=$request->input('description');

        $file1=$request->file('image');

        $imagename1='';

        if($file1 !=''){

            $destination_path='uploads';

            $imagename1=time().''.$file1->getClientOriginalName();

            $file1->move($destination_path,$imagename1);
        }

        $file2=$request->file('logo');

        $imagename2='';

        if($file2 !=''){

            $destination_path='uploads';

            $imagename2=time().''.$file2->getClientOriginalName();

            $file2->move($destination_path,$imagename2);
        }

        DB::table('about')->insert(['image'=>$imagename1,'logo'=>$imagename2,'description'=>$description,]);

        return redirect('admin/about')->with('error','data submited successfully!!');
    }

    public function update_about_data($id){

        $user_data=DB::table('about')->where('id',$id)->get();

        $data['id']=$user_data[0]->id;

        $data['image']=$user_data[0]->image;

        $data['logo']=$user_data[0]->logo;

        $data['description']=$user_data[0]->description;

        return view('admin.update_about',$data);
    }

    public function store_update_about_data(Request $request,$id){

        $validate=$request->validate([
            'description'=>'required',
        ]);

        $description=$request->input('description');

        $file1=$request->file('image');

        $oldimage=$request->input('oldimage');

        $imagename1='';

        if($file1 !=''){

            $destination_path='uploads';

            $imagename1=time().''.$file1->getClientOriginalName();

            $file1->move($destination_path,$imagename1);

            if($oldimage !=''){

                unlink(public_path('/uploads/'.$oldimage));
            }

            DB::table('about')->where('id',$id)->update(['image'=>$imagename1,]);
        }
        $file2=$request->file('logo');

        $oldlogo=$request->input('oldlogo');

        $imagename2='';

        if($file2 !=''){

            $destination_path='uploads';

            $imagename2=time().''.$file2->getClientOriginalName();

            $file2->move($destination_path,$imagename2);

            if($oldlogo !=''){

                unlink(public_path('/uploads/'.$oldlogo));
            }

            DB::table('about')->where('id',$id)->update(['logo'=>$imagename2,]);
        }

        DB::table('about')->where('id',$id)->update(['description'=>$description,]);

        return redirect('admin/about')->with('error','data updated successfully!!');
    }

    public function delete_about_data($id){

        $user_data=DB::table('about')->where('id',$id)->get();

        $image=$user_data[0]->image;

        if($image !=''){

            unlink(public_path('/uploads/'.$image));
        }
        $logo=$user_data[0]->logo;

        if($logo !=''){

            unlink(public_path('/uploads/'.$logo));
        }

        DB::table('about')->where('id',$id)->delete();

        return redirect('/admin/about')->with('error','data deleted successfully!!');
    }

    public function service(){

        $userdata=DB::table('service')->get();

        $data['userdata']=$userdata;

        return view('admin.service',$data);
    }

    public function add_info_service(){

        return view('admin.add_service');
    }


    public function store_add_info_service(Request $request){

        $validated=$request->validate([

            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');

        $description=$request->input('description');

        $file1=$request->file('image');

        $imagename1='';

        if($file1 !=''){

            $destination_path='uploads';

            $imagename1=time().''.$file1->getClientOriginalName();

            $file1->move($destination_path,$imagename1);
        }
        $file2=$request->file('logo');

        $imagename2='';

        if($file2 !=''){

            $destination_path='uploads';

            $imagename2=time().''.$file2->getClientOriginalName();

            $file2->move($destination_path,$imagename2);
        }

        DB::table('service')->insert(['image'=>$imagename1,'logo'=>$imagename2,'title'=>$title,'description'=>$description,]);

        return redirect('admin/service')->with('error','data submited successfully!!!');
    }


    public function delete_service_data($id){

        $user_data=DB::table('service')->where('id',$id)->get();

        $image=$user_data[0]->image;

        if($image !=''){

            unlink(public_path('/uploads/'.$image));
        }
        $logo=$user_data[0]->logo;

        if($logo !=''){

            unlink(public_path('/uploads/'.$logo));
        }

        DB::table('service')->where('id',$id)->delete();

        return redirect('admin/service')->with('error','data deleted successfully!!!');
    }

    public function update_service_data($id){

        $userdata=DB::table('service')->where('id',$id)->get();

        $data['id']=$userdata[0]->id;
        $data['image']=$userdata[0]->image;
        $data['logo']=$userdata[0]->logo;
        $data['title']=$userdata[0]->title;
        $data['description']=$userdata[0]->description;

        return view('admin.update_service',$data);
    }

    public function store_update_service_data(Request $request,$id){

        $valiadted=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');

        $description=$request->input('description');

        $file1=$request->file('image');

        $oldimage=$request->input('oldimage');

        $imagename1='';

        if($file1 !=''){

            $destination_path='uploads';

            $imagename1=time().''.$file1->getClientOriginalName();

            $file1->move($destination_path,$imagename1);


            if($oldimage !=''){

                unlink(public_path('/uploads/'.$oldimage));
            }

            DB::table('service')->where('id',$id)->update(['image'=>$imagename1,]);

        }

        $file2=$request->file('logo');

        $oldlogo=$request->input('oldlogo');

        $imagename2='';

        if($file2 !=''){

            $destination_path='uploads';

            $imagename2=time().''.$file2->getClientOriginalName();

            $file2->move($destination_path,$imagename2);


            if($oldlogo !=''){

                unlink(public_path('/uploads/'.$oldlogo));
            }

            DB::table('service')->where('id',$id)->update(['logo'=>$imagename2,]);

        }

        DB::table('service')->where('id',$id)->update(['title'=>$title,'description'=>$description,]);

        return redirect('admin/service')->with('error','data updated successfully!!!');
    }

    public function booking(){

        $userdata=DB::table('booking')->get();

        $data['userdata']=$userdata;

        return view('admin.booking',$data);
    }

    public function add_info_booking(){

        return view('admin.add_booking');
    }

    public function store_add_info_booking(Request $request){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
        ]);

        $title=$request->input('title');

        $description=$request->input('description');

        $price=$request->input('price');

        $file=$request->file('image');

        $imagename='';

        if($file !=''){

            $destination_path='uploads';

            $imagename=time().''.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);
        }

        DB::table('booking')->insert(['image'=>$imagename,'title'=>$title,'description'=>$description,'price'=>$price,]);

        return redirect('admin/booking')->with('error','data submited successfully!!!');
    }

    public function delete_booking_data($id){

        $userdata=DB::table('booking')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){

            unlink(public_path('/uploads/'.$image));
        }

        DB::table('booking')->where('id',$id)->delete();

        return redirect('admin/booking')->with('error','data deleted successfully!!!');

    }

    public function update_booking_data($id){

        $userdata=DB::table('booking')->where('id',$id)->get();

        $data['id']=$userdata[0]->id;
        $data['image']=$userdata[0]->image;
        $data['title']=$userdata[0]->title;
        $data['description']=$userdata[0]->description;
        $data['price']=$userdata[0]->price;

        return view('admin.update_booking',$data);
    }

    public function store_update_booking_data(Request $request,$id){

        $validated=$request->validate([

            'title'=>'required',
            'description'=>'required',
            'price'=>'required',
        ]);

        $title=$request->input('title');

        $description=$request->input('description');

        $price=$request->input('price');

        $file=$request->file('image');

        $oldimage=$request->input('oldimage');

        $imagename='';

        if($file !=''){

            $destination_path='uploads';

            $imagename=time().''.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);

            if($oldimage !=''){
                unlink(public_path('/uploads/'.$oldimage));
            }

            DB::table('booking')->where('id',$id)->update(['image'=>$imagename]);
        }

        DB::table('booking')->where('id',$id)->update(['title'=>$title,'description'=>$description,'price'=>$price,]);

        return redirect('admin/booking')->with('error','data updated successfully!!!');

    }

    public function package(){

        $userdata=DB::table('package')->get();
        $data['userdata']=$userdata;

        $package=DB::table('package_type')->get();
        $data['package']=$package;

        return view('admin.package',$data);
    }

    public function add_info_package(){

        $package=DB::table('package_type')->get();
        $data['package']=$package;

        return view('admin.add_package',$data);
    }

    public function store_add_info_package(Request $request){

        $validated=$request->validate([

            'title'=>'required',
            'country'=>'required',
            'duration'=>'required',
            'price'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');

        $country=$request->input('country');

        $package=$request->input('package');

        $duration=$request->input('duration');

        $price=$request->input('price');

        $description=$request->input('description');

        $file=$request->file('image');

        $imagename='';

        if($file !=''){

            $destination_path='uploads';

            $imagename=time().''.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);
        }

        DB::table('package')->insert(['image'=>$imagename,'title'=>$title,'country'=>$country,'package'=>$package,'duration'=>$duration,'price'=>$price,'description'=>$description,]);

        return redirect('admin/package')->with('error','data submited successfully!!');
    }

    public function delete_package_data($id){

        $user_data=DB::table('package')->where('id',$id)->get();

        $image=$user_data[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('package')->where('id',$id)->delete();

        return redirect('admin/package')->with('error','data deleted successfully!!');
    }

    public function update_package_data($id){

        $userdata=DB::table('package')->where('id',$id)->get();

        $data['id']=$userdata[0]->id;
        $data['image']=$userdata[0]->image;
        $data['title']=$userdata[0]->title;
        $data['country']=$userdata[0]->country;
        $data['duration']=$userdata[0]->duration;
        $data['price']=$userdata[0]->price;
        $data['description']=$userdata[0]->description;

        return view('admin.update_package',$data);
    }

    public function store_update_package_data(Request $request,$id){

        $validated=$request->validate([

            'title'=>'required',
            'country'=>'required',
            'duration'=>'required',
            'price'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');
        $country=$request->input('country');
        $duration=$request->input('duration');
        $price=$request->input('price');
        $description=$request->input('description');

        $file=$request->file('image');

        $oldimage=$request->input('oldimage');

        $imagename='';

        if($file !=''){


            $destination_path='uploads';

            $imagename=time().''.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);

            if($oldimage !=''){

                unlink(public_path('/uploads/'.$oldimage));
            }

            DB::table('package')->where('id',$id)->update(['image'=>$imagename,]);
        }

        DB::table('package')->where('id',$id)->update(['title'=>$title,
                                                        'country'=>$country,
                                                        'duration'=>$duration,
                                                        'price'=>$price,
                                                        'description'=>$description,]);

        return redirect('admin/package')->with('error','data updated successfully!!');
    }

    public function aboutus_about(){

        $userdata=DB::table('aboutus_about')->get();

        $data['userdata']=$userdata;

        return view('admin.aboutus_about',$data);

    }

    public function add_info_aboutus_about(){

        return view('admin.add_aboutus_about');
    }

    public function store_add_info_aboutus_about(Request $request){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');

        $description=$request->input('description');

        $file1=$request->file('image1');

        $imagename1='';

        if($file1 !=''){

            $destination_path='uploads';

            $imagename1=time().''.$file1->getClientOriginalName();

            $file1->move($destination_path,$imagename1);
        }
        $file2=$request->file('image2');

        $imagename2='';

        DB::table('aboutus_about')->insert(['image1'=>$imagename1,'title'=>$title,'description'=>$description,]);

        return redirect('admin/aboutus_about')->with('error','data submited successfully!!!');
    }

    public function delete_aboutus_about_data($id){

        $userdata=DB::table('aboutus_about')->where('id',$id)->get();

        $image1=$userdata[0]->image1;

        if($image1 !=''){

            unlink(public_path('/uploads/'.$image1));
        }
        $image2=$userdata[0]->image2;

        DB::table('aboutus_about')->where('id',$id)->delete();

        return redirect('admin/aboutus_about')->with('error','data deleted successfully!!!');
    }

    public function update_aboutus_about_data($id){

        $userdata=DB::table('aboutus_about')->where('id',$id)->get();

        $data['id']=$userdata[0]->id;
        $data['image1']=$userdata[0]->image1;
        $data['title']=$userdata[0]->title;
        $data['description']=$userdata[0]->description;

        return view('admin.update_aboutus_about',$data);

    }

    public function store_update_aboutus_about_data(Request $request,$id){

        $validated=$request->validate([

            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');

        $description=$request->input('description');
        
        $file1=$request->file('image1');

        $oldimage1=$request->input('oldimage1');

        $imagename1='';

        if($file1 !=''){

            $destination_path='uploads';

            $imagename1=time().''.$file1->getClientOriginalName();

            $file1->move($destination_path,$imagename1);

            if($oldimage1 !=''){
                unlink(public_path('/uploads/'.$oldimage1));
            }

            DB::table('aboutus_about')->where('id',$id)->update(['image1'=>$imagename1]);
        }

        DB::table('aboutus_about')->where('id',$id)->update(['title'=>$title,'description'=>$description,]);

        return redirect('admin/aboutus_about')->with('error','data updated successfully!!!');

    }

    public function aboutus_client(){

        $userdata=DB::table('aboutus_client')->get();

        $data['userdata']=$userdata;

        return view('admin.aboutus_client',$data);

    }

    public function add_info_aboutus_client(){

        return view('admin.add_aboutus_client');
    }

    public function store_add_info_aboutus_client(Request $request){

        $validated=$request->validate([
            'name'=>'required',
            'description'=>'required',
        ]);

        $name=$request->input('name');

        $description=$request->input('description');

        $file=$request->file('image');

        $imagename='';

        if($file !=''){

            $destination_path='uploads';

            $imagename=time().''.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);
        }

        DB::table('aboutus_client')->insert(['description'=>$description,'image'=>$imagename,'name'=>$name,]);

        return redirect('admin/aboutus_client')->with('error','data submited successfully!!!');
    }

    public function delete_aboutus_client_data($id){

        $userdata=DB::table('aboutus_client')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){

            unlink(public_path('/uploads/'.$image));
        }

        DB::table('aboutus_client')->where('id',$id)->delete();

        return redirect('admin/aboutus_client')->with('error','data deleted successfully!!!');
    }

    public function update_aboutus_client_data($id){

        $userdata=DB::table('aboutus_client')->where('id',$id)->get();

        $data['id']=$userdata[0]->id;
        $data['description']=$userdata[0]->description;
        $data['image']=$userdata[0]->image;
        $data['name']=$userdata[0]->name;
        

        return view('admin.update_aboutus_client',$data);
    }


    public function store_update_aboutus_client_data(Request $request,$id){

        $validated=$request->validate([

            'name'=>'required',
            'description'=>'required',
        ]);

        $name=$request->input('name');

        $description=$request->input('description');
        
        $file=$request->file('image');

        $oldimage=$request->input('oldimage');

        $imagename='';

        if($file !=''){

            $destination_path='uploads';

            $imagename=time().''.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);

            if($oldimage !=''){
                unlink(public_path('/uploads/'.$oldimage));
            }

            DB::table('aboutus_client')->where('id',$id)->update(['image'=>$imagename]);
        }

        DB::table('aboutus_client')->where('id',$id)->update(['description'=>$description,'name'=>$name,]);

        return redirect('admin/aboutus_client')->with('error','data updated successfully!!!');
    }

    public function aboutus_team(){

        $userdata=DB::table('aboutus_team')->get();

        $data['userdata']=$userdata;

        return view('admin.aboutus_team',$data);
    }

    public function add_info_aboutus_team(){

        return view('admin.add_aboutus_team');
    }

    public function store_add_info_aboutus_team(Request $request){

        $validated=$request->validate([
            'name'=>'required',
            'title'=>'required',
        ]);

        $name=$request->input('name');

        $title=$request->input('title');

        $facebook=$request->input('facebook');

        $twitter=$request->input('twitter');

        $linkedin=$request->input('linkedin');

        $instagram=$request->input('instagram');

        $file=$request->file('image');

        $imagename='';

        if($file !=''){

            $destination_path='uploads';

            $imagename=time().''.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);
        }

        DB::table('aboutus_team')->insert(['image'=>$imagename,'name'=>$name,'title'=>$title,'facebook'=>$facebook,'twitter'=>$twitter,'linkedin'=>$linkedin,'instagram'=>$instagram,]);

        return redirect('admin/aboutus_team')->with('error','data submited successfully!!!');
    } 



    public function delete_aboutus_team_data($id){

        $userdata=DB::table('aboutus_team')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){

            unlink(public_path('/uploads/'.$image));
        }

        DB::table('aboutus_team')->where('id',$id)->delete();

        return redirect('admin/aboutus_team')->with('error','data deleted successfully!!!');
    }


    public function update_aboutus_team_data($id){

        $userdata=DB::table('aboutus_team')->where('id',$id)->get();

        $data['id']=$userdata[0]->id;
        $data['image']=$userdata[0]->image;
        $data['name']=$userdata[0]->name;
        $data['title']=$userdata[0]->title;
        $data['facebook']=$userdata[0]->facebook;
        $data['twitter']=$userdata[0]->twitter;
        $data['linkedin']=$userdata[0]->linkedin;
        $data['instagram']=$userdata[0]->instagram;
        

        return view('admin.update_aboutus_team',$data);
    }

    public function store_update_aboutus_team_data(Request $request,$id){

        $validated=$request->validate([

            'name'=>'required',
            'title'=>'required',
        ]);

        $name=$request->input('name');

        $title=$request->input('title');

        $facebook=$request->input('facebook');

        $twitter=$request->input('twitter');

        $linkedin=$request->input('linkedin');

        $instagram=$request->input('instagram');
        
        $file=$request->file('image');

        $oldimage=$request->input('oldimage');

        $imagename='';

        if($file !=''){

            $destination_path='uploads';

            $imagename=time().''.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);

            if($oldimage !=''){
                unlink(public_path('/uploads/'.$oldimage));
            }

            DB::table('aboutus_team')->where('id',$id)->update(['image'=>$imagename]);
        }

        DB::table('aboutus_team')->where('id',$id)->update(['name'=>$name,'title'=>$title,'facebook'=>$facebook,'twitter'=>$twitter,'linkedin'=>$linkedin,'instagram'=>$instagram]);

        return redirect('admin/aboutus_team')->with('error','data updated successfully!!!');
    }

    public function gallary_image(){

        $userdata=DB::table('gallary_image')->get();

        $data['userdata']=$userdata;

        return view('/admin/gallary_image',$data);
    }

    public function add_info_gallary_image(){

        return view('admin.add_gallary_image');
    }

    public function store_add_info_gallary_image(Request $request){

        $file=$request->file('multiple_image');

        foreach($file as $key=>$f){

            if($f !=''){

                $imagename='';

                $destination_path='uploads';

                $imagename=time().''.$f->getClientOriginalName();

                $f->move($destination_path,$imagename);

                DB::table('gallary_image')->insert(['multiple_image'=>$imagename,]);
            }
        }

        return redirect('/admin/gallary_image')->with('error','data submited successfully!!!');
    }

    public function delete_gallary_image_data($id){

        $userdata=DB::table('gallary_image')->where('id',$id)->get();

        $multiple_image=$userdata[0]->multiple_image;

        if($multiple_image !=''){
            unlink(public_path('/uploads/'.$multiple_image));
        }

        DB::table('gallary_image')->where('id',$id)->delete();

        return redirect('/admin/gallary_image')->with('error','data deleted successfully!!!'); 
    }

    public function update_gallary_image_data($id){

        $userdata=DB::table('gallary_image')->where('id',$id)->get();

        $data['id']=$userdata[0]->id;

        $data['multiple_image']=$userdata[0]->multiple_image;

        return view('admin.update_gallary_image',$data);
    }

    public function store_update_gallary_image_data(Request $request,$id){

        $file=$request->file('multiple_image');

        $oldimage=$request->input('oldimage');

        $imagename='';

        if($file !=''){

            $destination_path='uploads';

            $imagename=time().''.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);

            if($oldimage !=''){

                unlink(public_path('/uploads/'.$oldimage));
            }
        }

        DB::table('gallary_image')->where('id',$id)->update(['multiple_image'=>$imagename,]);

        return redirect('/admin/gallary_image')->with('error','data updated successfully!!!');
    }

    public function bg_page(){

        $userdata=DB::table('bg_page')->get();

        $data['userdata']=$userdata;

        return view('admin.bg_page',$data);
    }

    public function update_bg_page($id){

        $userdata=DB::table('bg_page')->where('id',$id)->get();

        $data['id']=$userdata[0]->id;
        $data['name']=$userdata[0]->name;
        $data['image']=$userdata[0]->image;

        return view('admin.update_bg_page',$data);
    }

    public function store_update_bg_page(Request $request,$id){

        $validated=$request->validate([
            'name'=>'required',
        ]);

        $name=$request->input('name');

        $file=$request->file('image');

        $oldimage=$request->input('oldimage');

        $imagename='';

        if($file){

            $destination_path='uploads';

            $imagename=time().''.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);

            if($oldimage !=''){

                unlink(public_path('/uploads/'.$oldimage));
            }

            DB::table('bg_page')->where('id',$id)->update(['image'=>$imagename,]);
        }

        DB::table('bg_page')->where('id',$id)->update(['name'=>$name,]);

        return redirect('/admin/bg_page')->with('error','data updated successfully!!!');
    }




    function generateRandomString($length = 4) {
           $characters = '0123456789';
           $charactersLength = strlen($characters);
           $randomString = '';
           for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
           }
         return $randomString;
      }


}
