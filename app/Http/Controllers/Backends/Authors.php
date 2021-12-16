<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Request;
use App\Model\author;
use Illuminate\Http\File;
use Storage;




class Authors extends Controller
{
    public function index(){

    	$data['authors'] = author::paginate(20);

    	return view('backends/authors/manage_authors', $data);
    }

    public function new_author(){
    	return view('backends/authors/new_author');
    }

    public function insert_author(){

 		$photo = Request::file('photo');
 		$photo = Storage::disk('authors_photo')->putfile('/', new file($photo));
 		
    	$data = new author;
    	$data->atr_name = Request::get('fname');
    	$data->atr_last_name = Request::get('lname');
    	$data->atr_email = Request::get('email');
    	$data->atr_phone_number = Request::get('phone');
    	$data->atr_address = Request::get('address');
    	$data->atr_bio = Request::get('bio');
    	$data->atr_photo = $photo;
    	$data->save();

    	session()->flash('success', 'Inserted Successfully. ');
        return redirect(route('authors'));  
    }

    public function edit_author($id){
    	$data['author'] = author::find($id);
    	return view('backends/authors/edit_author', $data);
    }

    public function update_author($id){

    	$data = author::find($id);

 		$photo = Request::file('photo');
 		if($photo != '' ){
 			$photo = Storage::disk('authors_photo')->putfile('/', new file($photo));
 		}else{
 			$photo = $data->atr_photo;
 		}

    	$data->atr_name = Request::get('fname');
    	$data->atr_last_name = Request::get('lname');
    	$data->atr_email = Request::get('email');
    	$data->atr_phone_number = Request::get('phone');
    	$data->atr_address = Request::get('address');
    	$data->atr_bio = Request::get('bio');
    	$data->atr_photo = $photo;
    	$data->save();

    	session()->flash('success', 'Updated Successfully. ');
        return redirect(route('authors'));  
    }

    public function view_author($id){
    	$data['author'] = author::find($id);
    	return view('backends/authors/view_authors', $data);
    }

    public function delete_author($id){
    	$idNumber = Request::get('idNumber');
    	$row = Author::find($idNumber);
        // if(Auth::user()->usr_id == $gal->gal_user_id || Auth::user()->usr_type == '1'){
            Storage::disk('authors_photo')->delete($row->atr_photo);
            $result = Author::destroy($idNumber);
            if($result) {
                echo 'true';
            }else{
                return "false";
            }
        // }else{
        //     return "false";
        // }  

    }  
}
