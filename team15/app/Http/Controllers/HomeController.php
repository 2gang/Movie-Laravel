<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Actor;
use App\Models\Director;
use App\Models\Member;
use App\Models\Movie;
use App\Models\Room;
use App\Models\Seat;
use App\Models\Ticketing;

class HomeController extends Controller
{
	public function index()
    {
		$data['tmp'] = $this->qstring();

		$text1 = request('text1');		// text1값 알아냄 
		$data['text1'] = $text1;

        $data['list'] = $this->getlist($text1);		// 자료 읽기
		$data['list1'] = $this->getlist_actor();		// 자료 읽기
			
		return view( 'home.index', $data );	// 자료 표시(view/Movie폴더의 index.blade.php)

    }
	public function create()
    {
		$data['tmp'] = $this->qstring();

		$text1 = request('text1');		// text1값 알아냄 
		$data['text1'] = $text1;

        $data['list'] = $this->getlist($text1);		// 자료 읽기
		$data['list1'] = $this->getlist_actor();		// 자료 읽기
			
		return view( 'home.create', $data );	// 자료 표시(view/Movie폴더의 index.blade.php)

    }
	public function getlist( $text1 )
	{
		$result = Movie::leftjoin('directors', 'movies.director_id', '=', 'directors.id')->
				select('movies.*', 'directors.director_name as director_name')->
					where('movies.movie_name', 'like', '%' . $text1 . '%')->
					orderby('movies.movie_name', 'asc')->
					paginate(20)->appends(['text1'=>$text1]);
		return $result;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

	public function check()
	{
		$uid=request('uid');
		$pwd=request('pwd');
		
		$row=Member::where('uid','=',$uid)->
				 		where('pwd','=',$pwd)->first();
		if($row)
		{
			session()->put('uid',$row->uid);
			session()->put('id', $row->id);
		}
		return redirect('home');
	}
	
		public function logout()
	{
		
			session()->forget('uid');
		
		return redirect('home');
	}

	function getlist_director()
	{
		$result=Director::orderby('director_name')->get();
		return $result;
	}
	
	function getlist_actor()
	{
		$result=Actor::orderby('actor_name')->get();
		return $result;
	}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

	

	public function qstring()
	{
		$text1 = request("text1") ? request('text1') : "";
		$page = request('page') ? request('page') : "1";
		$tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";
		return $tmp;
	}
}