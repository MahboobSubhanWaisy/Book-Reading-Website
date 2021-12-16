<?php

namespace App\Http\Controllers;

use App;
use App\Model\book;
use App\Model\categories;
use App\Model\client;
use App\Model\book_rating;
use Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Helper;
use App\Model\favorite;
use Auth;
use DB;
use Session;

class Welcome extends Controller
{
    public function index(){

    	$data['books'] = book::with('category','author','book_attachment')->get();
    	$data['category'] = categories::get();
    	return view('frontend/home', $data);
    }


    public function book_information($book_id){
    	$data['books'] = book::with('category','author')->limit('6')->get();
    	$data['book'] = book::with('category','author')->find($book_id);
        Helper::counter($book_id);

        $rating = DB::table('book_rating')
        ->join('books', 'books.bk_id', '=', 'book_rating.br_book_id')
        ->join('clients','clients.clt_id','=','book_rating.br_client_id')
        ->select(
            'clients.clt_name',
            'book_rating.br_comment',
            'book_rating.br_rating_number',
            'book_rating.br_created_at'
        )
        ->where('books.bk_id', '=', $book_id)
        ->get();

        $data['rate'] = $rating;

        $ratingNumber = 0;
        $count = 0;
        $fiveStarRating = 0;
        $fourStarRating = 0;
        $threeStarRating = 0;
        $twoStarRating = 0;
        $oneStarRating = 0;

        foreach($rating as $rateResult)
        {
            $ratingNumber += $rateResult->br_rating_number;
            $count += 1;
            if($rateResult->br_rating_number == '5'){
                $fiveStarRating += 1;
            }else if($rateResult->br_rating_number == '4'){
                $fourStarRating += 1;
            }else if($rateResult->br_rating_number == '3'){
                $threeStarRating += 1;
            }else if($rateResult->br_rating_number == '2'){
                $twoStarRating += 1;
            }else if($rateResult->br_rating_number == '1'){
                $oneStarRating += 1;
            }
            $data['comment'] = $rateResult->br_comment;
            $data['comment_date'] = $rateResult->br_created_at;
        }

        $average = 0;
        if($ratingNumber && $count){
            $average = ($ratingNumber / $count);
            $average = round($average,'1');
        }
        $data['average'] = $average;

        $fiveStarRatingPercent = round(($fiveStarRating/5)*100);
		$data['fiveStarRatingPercent'] = !empty($fiveStarRatingPercent)?$fiveStarRatingPercent.'%':'0%';

        $fourStarRatingPercent = round(($fourStarRating/5)*100);
        $data['fourStarRatingPercent'] = !empty($fourStarRatingPercent)?$fourStarRatingPercent.'%':'0%';
        
        $threeStarRatingPercent = round(($threeStarRating/5)*100);
        $data['threeStarRatingPercent'] = !empty($threeStarRatingPercent)?$threeStarRatingPercent.'%':'0%';
        
        $twoStarRatingPercent = round(($twoStarRating/5)*100);
        $data['twoStarRatingPercent'] = !empty($twoStarRatingPercent)?$twoStarRatingPercent.'%':'0%';
        
        $oneStarRatingPercent = round(($oneStarRating/5)*100);
        $data['oneStarRatingPercent'] = !empty($oneStarRatingPercent)?$oneStarRatingPercent.'%':'0%';
        
        $user_rated = '';
        if(Auth::guard('client')->user()){
            $rated = book_rating::select('br_rating_number')->where('br_client_id', '=' , Auth::guard('client')->user()->clt_id)->where('br_book_id','=', $book_id)->get();
            $user_rated = count($rated);
            $user_rated = $user_rated > 0 ? $rated = 'yes' : $rated = 'no';
        }
        $data['rated'] = $user_rated;
        
    	return view('frontend/information', $data);
    }

    public function signup(){
        return view('frontend/signup');
    }

    public function books(){

        $data['books'] = book::with('category','author','book_attachment','favorite')->paginate(20);
        $data['category'] = categories::get();
        return view('frontend/books',$data);
    }

    public function register(){
        $validatedData = Request::validate([
            'name' => ['required', 'string', 'min:3', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:clients,clt_email'],
            'password' => ['required', 'string', 'min:5'],
        ]);

        $data = new client; 
        $data->clt_name = Request::get('name');
        $data->clt_email = Request::get('email');
        $data->clt_password = Hash::make(Request::get('password'));
        $data->save();
        return Redirect(route('signin'));

    }


    public function signin(){
        return view('frontend/signin');
    }

    public function profileEdit()
    {
        $client_id = Auth::guard('client')->user()->clt_id;
        $data = client::find($client_id);
        return view('frontend/edit_client', compact('data'));
    }

    public function profileUpdate()
    {
        $old_password = Request::get('old-password');
        $new_password = Request::get('new-password');
        $conf_password = Request::get('conf-password');
        
        $data = client::find(Auth::guard('client')->user()->clt_id);
        $db_password = $data->clt_password;
        if($new_password != ''){
            if(Hash::check($old_password, $db_password) && ($new_password == $conf_password)){
                $new_password = Hash::make($new_password);;
                $data->clt_password = $new_password;
                $data->clt_name = Request::get('name');
                $data->save();
                return Redirect(route('default'));
            }else{
                Session::flash('omardom', 'Please Check Your Password Again.!');
                return back();
            }
        }else{
            $data->clt_name = Request::get('name');
            $data->save();
            return Redirect(route('default'));
        }
    }

    public function favorite($book_id){
        if(Auth::guard('client')->user() != ''){
            $check = array('fav_client_id' => Auth::guard('client')->user()->clt_id, 'fav_book_id' => $book_id);
            $check = favorite::where($check)->count();

            if($check < 1 ){
                $data = new favorite; 
                $data->fav_book_id = $book_id;
                $data->fav_client_id = Auth::guard('client')->user()->clt_id;
                $data->save();
            }else{
                echo 'Already Exist';
            }
        }else{
            return 'Please login...';
        }
    }

    public function book_liked(){

        if(Auth::guard('client')->user() == ''){
            return redirect(route('signin'));
        }
        $data['favorite'] = favorite::where('fav_client_id', Auth::guard('client')->user()->clt_id)->with('book','client')->paginate(10);
        $data['recent'] = book::with('category','author')->orderBy('bk_created_at','desc')->limit(10)->get();
        return view('frontend/book_liked',$data);
    }


    public function contact_us(){
        return view('frontend/contact_us');
    }

    public function searchBook()
    {
        $books = book::select('bk_id','bk_title','bk_title_dari','bk_title_pashto')
        ->where('bk_title', 'like', '%' . Request::get('searchText') . '%')
        ->orWhere('bk_title_dari', 'like', '%' . Request::get('searchText') . '%')
        ->get();
        return json_encode( $books );
    }

    public function english()
    {
        Session::put('locale','en');
        App::setlocale('en');
        return back();
    }

    public function dari()
    {
        Session::put('locale','fa');
        App::setlocale('fa');

        return back();
    }

    public function pashto()
    {
        Session::put('locale','pa');
        App::setlocale('pa');
        return back();
    }

}
