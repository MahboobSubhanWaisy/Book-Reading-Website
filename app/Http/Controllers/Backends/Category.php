<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Request;
use App\Model\author;
use App\Model\categories;

class Category extends Controller
{
    public function index(){

    	$data['categories'] = categories::paginate(20);

    	return view('backends/categories/manage_categories', $data);
    }

    public function new(){
    	return view('backends/categories/new_category');
    }

    public function insert(){

    	$data = new categories;
    	$data->ct_title = Request::get('title-en');
    	$data->ct_description = Request::get('description-en');
        $data->ct_title_dari = Request::get('title-da');
        $data->ct_description_dari = Request::get('description-da');
        $data->ct_title_pashto = Request::get('title-pa');
        $data->ct_description_pashto = Request::get('description-pa');
    	$data->save();

    	session()->flash('success', 'Inserted Successfully. ');
        return redirect(route('categories'));  
    }

    public function edit($id){
    	$data['row'] = categories::find($id);
    	return view('backends/categories/edit_category', $data);
    }

    public function update($id){

    	$data = categories::find($id);
		$data->ct_title = Request::get('title-en');
    	$data->ct_description = Request::get('description-en');
        $data->ct_title_dari = Request::get('title-da');
        $data->ct_description_dari = Request::get('description-da');
        $data->ct_title_pashto = Request::get('title-pa');
        $data->ct_description_pashto = Request::get('description-pa');
    	$data->save();

    	session()->flash('success', 'Updated Successfully. ');
        return redirect(route('categories'));  
    }

    public function delete($id){
    	$idNumber = Request::get('idNumber');
    	$row = Author::find($idNumber);
        // if(Auth::user()->usr_id == $gal->gal_user_id || Auth::user()->usr_type == '1'){
            $result = categories::destroy($idNumber);
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
