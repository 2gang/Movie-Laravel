<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Schedule;
use App\Models\Movie;
use App\Models\Runtime;
use App\Models\Room;


class AdminscheduleController extends Controller
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
		return view( 'admin_schedule.index', $data );	// 자료 표시(view/Schedule폴더의 index.blade.php)

    }
		public function getlist( $text1 )
	{
		$result = Schedule::join('movies', 'schedules.movie_id', '=', 'movies.id')->
					join('rooms', 'schedules.room_id', '=', 'rooms.id')->
					join('runtimes', 'schedules.runtime_id', '=', 'runtimes.id')->
					select('schedules.*', 'movies.movie_name as movie_name', 'rooms.room_name as room_name', 'runtimes.runtime as runtime')->
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
		$data['tmp'] = $this->qstring();
		
		$data['list'] = $this->getlist_movie();
		$data['list1'] = $this->getlist_room();
		$data['list2'] = $this->getlist_runtime();
		
		return view( 'admin_schedule.create', $data);
    }
	
	function getlist_movie()
	{
		$result=Movie::orderby('movie_name')->get();
		return $result;
	}
	
	function getlist_room()
	{
		$result=Room::orderby('room_name')->get();
		return $result;
	}
	function getlist_runtime()
	{	
		$result=Runtime::orderby('runtime')->get();
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
		$row = new Schedule; 		// Schedule 모델변수 row 선언
		
		$this->save_row($request, $row); 
		
		$tmp = $this->qstring();

		return  redirect('admin_schedule');
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
        $data['row'] = Schedule::join('movies', 'schedules.movie_id', '=', 'movies.id')->
				join('rooms', 'schedules.room_id', '=', 'rooms.id')->
				join('runtimes', 'schedules.runtime_id', '=', 'runtimes.id')->
				select('schedules.*', 'movies.movie_name as movie_name', 'rooms.room_name as room_name', 'runtimes.runtime as runtime')->
				where('schedules.id', '=', $id)->first();
				
		return view('admin_schedule.show', $data );
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
    $data['list'] = $this->getlist_movie();
		$data['list1'] = $this->getlist_room();
		$data['list2'] = $this->getlist_runtime();

        $data['row'] = Schedule::find( $id );	// 자료 찾기
		return view('admin_schedule.edit', $data );
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

		$row = Schedule::find($id);	// Schedule 모델변수 row 선언
		$this->save_row($request, $row); 
		return  redirect('admin_schedule' . $tmp);
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
        Schedule::find( $id )->delete();
		return redirect('admin_schedule' . $tmp);
    }
	
	public function save_row(Request $request , $row)
	{			
		

		$request->validate([
			'run_date' =>'required|max:50',
            'movie_id' => 'required|numeric',
            'room_id' => 'required|numeric',
			'runtime_id' => 'required|numeric',
        ],
        [
            'run_date.required' => '상영 날짜는 필수입력입니다.',
            'movie_id.required' => '영화명은 필수입력입니다.',
            'room_id.required' => '상영관은 필수입력입니다.',
            'runtime_id.required' => '상영 시간은 필수입력입니다.',
        ]);
		
		
		$row->run_date = $request->input("run_date");
		$row->movie_id = $request->input("movie_id");
        $row->room_id = $request->input("room_id");
        $row->runtime_id = $request->input("runtime_id");
		
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
