<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\book;

class Welcome extends Controller
{
    public function index(){
    	$data['books'] = book::with('author','book_counter')->orderBy('bk_created_at','desc')->limit(10)->get();
    	return view('backends/dashboard',$data);
    }

}
