<?php

use App\Http\helpers as Helpers;
use App\Model\book_counter;
use App\Model\book_attachment;


	class Helper{

		public static function counter($book_id){
			$data = new book_counter();
			$data->bc_book_id = $book_id;
			if(Auth::guard('client')->user() != '') {
				$data->bc_client_id = Auth::guard('client')->user()->clt_id;
			}
			$data->save();
		}


		public static function get_link($book_id,$type){
			
			$data = array('at_book_id' => $book_id, 'at_type' => $type );

			$data = book_attachment::where($data)->first();
			if($type == 'video' && $data != ''){
				return asset('/storage/app/books/video/'.$data->at_attachement);
			}else if($type == 'audio' && $data != ''){
				return asset('/storage/app/books/audio/'.$data->at_attachement);
			}else if($type == 'pdf' && $data != ''){
				return asset('/storage/app/books/pdf/'.$data->at_attachement);
			}else{
				return 'file not found';	
			}
			
		}


		public static function fev_login_check($id){
			if(Auth::guard('client')->user() != ''){
				
				return route('ffev').'/'.$id;
			}else{
				return route('signin');
			}
		}

		public static function fav_check($fav_id){

			// return '<i class="fa fa-heart"></i>';
		

			if(Auth::guard('client')->user() == ''){
				return '<i class="fa fa-heart"></i>';
			}else if(Auth::guard('client')->user() != '' && $fav_id != ''){
				return '';
			}else if(Auth::guard('client')->user() != '' && $fav_id == ''){
				return '<i class="fa fa-heart"></i>';
			}else{
				return '<i class="fa fa-heart"></i>';
			}
		}

	}
?>