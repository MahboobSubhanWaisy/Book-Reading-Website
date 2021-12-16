<?php

namespace App\Http\Controllers\Backends;

use App\Http\Controllers\Controller;
use Request;
use App\Model\book;
use App\Model\client;
use App\Model\author;
use App\Model\categories;
use App\Model\book_attachment;
use App\Model\book_rating;
use Illuminate\Http\File;
use Storage;
use Auth;

class Books extends Controller
{
    public function index(){
		$data['books'] = book::with('category','author','book_attachment')->paginate(20);
    	return view('backends/books/manage_books', $data);
    }

    public function new(){
    	$data['authors'] = author::get();
    	$data['categories']  = categories::get();
    	return view('backends/books/new_book',$data);
    }

    public function insert(){

    	$data = new book;
    	$data->bk_category_id = Request::get('category');
    	$data->bk_author_id = Request::get('publisher');
    	$data->bk_title = Request::get('book-title-en');
    	$data->bk_description = Request::get('description_en');
    	$data->bk_publish_date = date('Y-m-d', strtotime(Request::get('publish-date')));
    	$data->bk_cover_photo = Storage::disk('book_cover')->putfile('/', new file(Request::file('book-cover_en')));
		$data->bk_title_pashto = Request::get('book-title-pa');
		$data->bk_description_pashto = Request::get('description_pa');
		$data->bk_cover_photo_pashto = Storage::disk('book_cover')->putfile('/', new file(Request::file('book-cover_pa')));
		$data->bk_title_dari = Request::get('book-title-da');
		$data->bk_description_dari = Request::get('description_da');
		$data->bk_cover_photo_dari= Storage::disk('book_cover')->putfile('/', new file(Request::file('book-cover_da')));
    	$data->save();


    	if(Request::file('pdf-book') != ''){
    		$fileNamePdf = Request::file('pdf-book');
    		$att = new book_attachment;
    		$att->at_book_id = $data->bk_id;
    		$att->at_attachement = Storage::disk('book_pdf')->putfile('/', new file($fileNamePdf));
    		$att->at_name = $fileNamePdf->getClientOriginalName();
    		$att->at_type = 'pdf';
    		$att->save();
    	}

    	if(Request::file('audio-book') != ''){
    		$fileNameAudio = Request::file('audio-book');
    		$att = new book_attachment;
    		$att->at_book_id = $data->bk_id;
    		$att->at_attachement = Storage::disk('book_pdf')->putfile('/', new file($fileNameAudio));
    		$att->at_name = $fileNameAudio->getClientOriginalName();
    		$att->at_type = 'audio';
    		$att->save();
    	}

        if(Request::file('flash-book') != ''){
            $fileNameAudio = Request::file('flash-book');
            $att = new book_attachment;
            $att->at_book_id = $data->bk_id;
            $att->at_attachement = Storage::disk('book_swf')->putfile('/', new file($fileNameAudio));
            $att->at_name = $fileNameAudio->getClientOriginalName();
            $att->at_type = 'video';
            $att->save();
        }

    	session()->flash('success', 'Inserted Successfully. ');
        return redirect(route('books'));  
    }

    public function edit($id){
    	$data['row'] = book::find($id);
    	$data['authors'] = author::get();
    	$data['categories']  = categories::get();
    	return view('backends/books/edit_book', $data);
    }

    public function update($id){

		$data = book::find($id);
    	$photo_en = Request::file('book-cover-en');
		$photo_da = Request::file('book-cover-da');
		$photo_pa = Request::file('book-cover-pa');

 		if($photo_en != '' ){
 			$photo_en = Storage::disk('book_cover')->putfile('/', new file($photo_en));
 		}else{
 			$photo_en = $data->bk_cover_photo;
 		}

		 if($photo_da != '' ){
			$photo_da = Storage::disk('book_cover')->putfile('/', new file($photo_da));
		}else{
			$photo_da = $data->bk_cover_photo_dari;
		}

		if($photo_pa != '' ){
			$photo_pa = Storage::disk('book_cover')->putfile('/', new file($photo_pa));
		}else{
			$photo_pa = $data->bk_cover_photo_pashto;
		}

    	$data->bk_category_id = Request::get('category');
    	$data->bk_author_id = Request::get('publisher');
    	$data->bk_title = Request::get('book-title-en');
    	$data->bk_description = Request::get('description-en');
    	$data->bk_publish_date = date('Y-m-d', strtotime(Request::get('publish-date')));
		$data->bk_title_dari = Request::get('book-title-da');
    	$data->bk_description_dari = Request::get('description-da');
		$data->bk_title_pashto = Request::get('book-title-pa');
    	$data->bk_description_pashto = Request::get('description-pa');
		$data->bk_cover_photo_dari = $photo_da;
		$data->bk_cover_photo_dari = $photo_pa;
    	$data->save();


    	if(Request::file('pdf-book') != ''){
    		$fileNamePdf = Request::file('pdf-book');

	 		$att = book_attachment::where('at_book_id', $id)->where('at_type','pdf')->first();
    		if($att == ''){
    			$att = new book_attachment;
    		}else{
    			Storage::disk('book_pdf')->delete($att->at_attachement);
    		}
    		$att->at_book_id = $id;
    		$att->at_attachement = Storage::disk('book_pdf')->putfile('/', new file($fileNamePdf));
    		$att->at_name = $fileNamePdf->getClientOriginalName();
    		$att->at_type = 'pdf';
    		$att->save();
    	}

    	if(Request::file('audio-book') != ''){
    		$fileNameAudio = Request::file('audio-book');
    		$att = book_attachment::where('at_book_id', $id)->where('at_type','audio')->first();
    		if($att == ''){
    			$att = new book_attachment;
    		}else{
    			Storage::disk('book_pdf')->delete($att->at_attachement);
    		}

    		$att->at_book_id = $data->bk_id;
    		$att->at_attachement = Storage::disk('book_audio')->putfile('/', new file($fileNameAudio));
    		$att->at_name = $fileNameAudio->getClientOriginalName();
    		$att->at_type = 'audio';
    		$att->save();
    	}

        if(Request::file('flash-book') != ''){
            $fileNameAudio = Request::file('flash-book');
            $att = book_attachment::where('at_book_id', $id)->where('at_type','video')->first();
            
            if($att == ''){
                $att = new book_attachment;
            }else{
                Storage::disk('book_swf')->delete($att->at_attachement);
            }

            $att->at_book_id = $data->bk_id;
            $att->at_attachement = Storage::disk('book_swf')->putfile('/', new file($fileNameAudio));
            $att->at_name = $fileNameAudio->getClientOriginalName();
            $att->at_type = 'video';
            $att->save();
        }

    	session()->flash('success', 'Updated Successfully. ');
        return redirect(route('books'));  
    }

    public function delete($id){
    	$idNumber = Request::get('idNumber');
    	$row = book::find($idNumber);
        // if(Auth::user()->usr_id == $gal->gal_user_id || Auth::user()->usr_type == '1'){
    	Storage::disk('book_cover')->delete($row->bk_cover_photo);
    	$file = book_attachment::where('at_book_id', $idNumber)->get();
    	foreach ($file as $file) {
    		if($file->at_type == 'pdf'){
    			Storage::disk('book_pdf')->delete($file->at_attachement);
    			book_attachment::destroy($file->at_id);
    		}

    		if($file->at_type == 'audio'){
    			Storage::disk('book_audio')->delete($file->at_attachement);
    			book_attachment::destroy($file->at_id);
    		}

            if($file->at_type == 'swf'){
                Storage::disk('book_swf')->delete($file->at_attachement);
                book_attachment::destroy($file->at_id);
            }

    	}
            $result = book::destroy($idNumber);
            if($result) {
                echo 'true';
            }else{
                return "false";
            }
        // }else{
        //     return "false";
        // }  

    }  

    public function view($id){
    	$data['row'] = book::with('category','author', 'book_rating')->find($id);
		// $data2 = $data['row'];
		// foreach($data2->book_rating as $row)
		// {
		// 	echo $data2->bk_title . ' ' .$row->clt_name . ' '.$row->pivot->br_comment;
		// 	echo '<br>';
		// }



		
		// foreach($clt2 as $row)
		// {
		// 	foreach($row->client_comment as $row2){
		// 		echo $data2->bk_title . ' ' . $row->clt_name . ' ' . $row2->br_comment;
		// 		echo '<br>';
		// 	}
		// }

		// foreach($data2->book_rating as $row)
		// {
		// 	echo $data2->bk_title . ' ' . $row->br_comment;
		// 	echo '<br>';
		// }
	
		// exit();
    	return view('backends/books/view_book', $data);
    }

	public function download(){
		if(Auth::guard('client')->user() == ''){
            return redirect(route('signin'));
        }else{
			$row_id = Request::input('data-id');
			$row = book_attachment::find($row_id);
			$file = $row->at_attachement;
			return Storage::disk('book_pdf')->download($file);
			return redirect('/bbook');
		}
	}

	public function postComment()
	{
		$rate = Request::input('star-value');
		$book_id = Request::input('book_id');
		$comment = Request::input('comment');
		$client = Auth::guard('client')->user()->clt_id;

		$data = new book_rating;
		$data->br_book_id = $book_id;
		$data->br_client_id = $client;
		$data->br_rating_number = $rate;
		$data->br_comment = $comment;
		$data->save();
		
		if($data == true)
		{
			return 'comment-save';
		}else{
			return 'not-saved';
		}
	}
}
