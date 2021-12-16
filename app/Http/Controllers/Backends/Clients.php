<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Request;
use App\Model\client;
use App\Model\book;

class Clients extends Controller
{
    public function index(){

    	$data['clients'] = client::paginate(20);
    	return view('backends/clients/manage_clients', $data);
    }

    public function disable($id){
    	
    }


    public function book_counters(){
    	$data['books'] = book::with('author','book_counter')->paginate(20);
    	return view('backends/clients/manage_book_counters',$data);
    }
}
