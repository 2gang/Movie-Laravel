<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Movie;
use App\Models\Director;
use App\Models\Actor;


class AdminmovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['tmp'] = $this->qstring();

		$text1 = request('text1');		// text1값 알아냄 
		$data['text1'] = $text1;

        $data['list'] = $this->getlist($text1);		// 자료 읽기
		return view( 'admin_movie.index', $data );	// 자료 표시(view/Movie폴더의 index.blade.php)

    }
		public function getlist( $text1 )
	{
		$result = Movie::leftjoin('directors', 'movies.director_id', '=', 'directors.id')->
				select('movies.*', 'directors.director_name as director_name')->
					where('movies.movie_name', 'like', '%' . $text1 . '%')->
					orderby('movies.movie_name', 'asc')->
					paginate(5)->appends(['text1'=>$text1]);
		return $result;
	}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data['list'] = $this->getlist_director();
		$data['list1'] = $this->getlist_actor();
		$data['tmp'] = $this->qstring();

		return view( 'admin_movie.create', $data);
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
    public function store(Request $request)
    {
		$tmp = $this->qstring();

		$row = new Movie; 		// Movie 모델변수 row 선언
		$this->save_row($request, $row); 

		return  redirect('admin_movie');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$data['tmp'] = $this->qstring();
        $data['row'] = Movie::join('directors', 'movies.director_id', '=', 'directors.id')->
				join('actors', 'movies.actor_id', '=', 'actors.id')->
				select('movies.*', 'directors.director_name as director_name', 'actors.actor_name as actor_name')->
				where('movies.id', '=', $id)->first();
				
		return view('admin_movie.show', $data );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$data['tmp'] = $this->qstring();
		
		$data['list'] = $this->getlist_director();
		$data['list1'] = $this->getlist_actor();

        $data['row'] = Movie::find( $id );	// 자료 찾기
		return view('admin_movie.edit', $data );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$tmp = $this->qstring();

		$row = Movie::find($id);	// Movie 모델변수 row 선언
		$this->save_row($request, $row); 

		return  redirect('admin_movie' . $tmp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		$tmp = $this->qstring();
        Movie::find( $id )->delete();
		return redirect('admin_movie' . $tmp);
    }
	
	public function save_row(Request $request , $row)
	{		
	
		$request->validate([
            'actor_id' => 'required|numeric',
            'movie_name' => 'required|max:50',
            'director_id' => 'required|numeric',
			'genre_name' => 'required|max:50'
        ],
        [
            'actor_id.required' => '배우명은 필수입력입니다.',
            'movie_name.required' => '영화 이름은 필수입력입니다.',
            'genre_name.required' => '장르명은 필수입력입니다.',
            'director_id.required' => '감독명은 필수입력입니다.',
            'movie_name.max' => '50자 이내입니다.',
            'genre_name.max' => '50자 이내입니다.',
        ]);
		
		$row->movie_name = $request->input("movie_name");	// 값 입력 
		$row->genre_name = $request->input("genre_name");
		$row->director_id = $request->input("director_id");
        $row->actor_id = $request->input("actor_id");
        $row->info = $request->input("info");
		
		if ($request->hasFile('movie_image'))	         // upload할 파일이 있는 경우
		{
			$movie_image = $request->file('movie_image');
			$movie_image_name = $movie_image->getClientOriginalName();             
			$movie_image->storeAs('public/movie_img', $movie_image_name);
			
			$row->movie_image = $movie_image_name;                    
		}
		
        $row->movie_url = $request->input("movie_url");
        $row->state = $request->input("state");
		$row->save();			// 저장
	}

	public function qstring()
	{
		$text1 = request("text1") ? request('text1') : "";
		$page = request('page') ? request('page') : "1";
		$tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";
		return $tmp;
	}

};
