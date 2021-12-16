<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\user;
use Illuminate\Http\File;
use Storage;
use Request;

class Users extends Controller
{
    public function index(){
    	$data['users'] = user::paginate(20);
    	// echo storage_path();
    	return view('backends/users/manage_users',$data);
    }

    public function new(){
    	return view('backends/users/new_user');
    }


    public function insert(){

    	$confirm = user::where('u_email', Request::get('email'))->count();
    	if($confirm < 1 ){
    		if(Request::get('password') != Request::get('confirm_password')){
    			session()->flash('failed', 'Confirm Password did not match, please try again');
    			return redirect(route('users'));
    		}
	    	$photo = Request::file('photo');
	 		$photo = Storage::disk('user')->putfile('/', new file($photo));
	 		
	    	$data = new user;
	    	$data->u_name = Request::get('fname');
	    	$data->u_lastname = Request::get('lname');
	    	$data->u_email = Request::get('email');
	    	$data->u_password =  Hash::make(Request::get('password'));
	    	$data->u_image = $photo;
	    	$data->save();
    		session()->flash('success', 'Inserted Successfully. ');
    	}else{
    		session()->flash('failed', 'User with email ('. Request::get("email").') already exist, please different email');
    	}
          
    }

    public function edit($id){
    	$data['user'] = user::find($id);
    	return view('backends/users/edit_user',$data);
    }

    public function update($id){

    	$data = user::find($id);
    	
    	$photo = Request::file('photo');
    	if($photo != ''){
    		Storage::disk('user')->delete($data->u_image);
 			$photo = Storage::disk('user')->putfile('/', new file($photo));
 			$data->u_image = $photo;
    	}else{
    		$data->u_image = $data->u_image;
    	}
 		
    	
    	$data->u_name = Request::get('fname');
    	$data->u_lastname = Request::get('lname');

    	if(Request::get('password') != '' ){
    		if(Request::get('password') != Request::get('confirm_password')){
    			session()->flash('failed', 'Confirm Password did not match, please try again');
    			return redirect(route('users'));
    		}else{
				$data->u_password =  Hash::make(Request::get('password'));
    		}
		}
    	
    	$data->save();
		session()->flash('success', 'Updated Successfully. ');

        return redirect(route('users'));  
    }
}
