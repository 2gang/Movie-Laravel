<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticketing;
use App\Models\Movie;
use App\Models\Runtime;
use App\Models\Room;
use App\Models\Home;
use App\Models\Schedule;

class TicketingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['tmp'] = $this->qstring();

		$text1 = request('text1');	// text1값 알아냄 
		$data['text1'] = $text1;
        $data['list'] = $this->getlist($text1);	
		$data['list1'] = $this->getlist_schedule();		// 자료 읽기
		$data['list2'] = $this->getlist_runtime();
		$data['list3'] = $this->getlist_room();
	
		return view( 'ticketing.index', $data );	// 자료 표시(view/Movie폴더의 index.blade.php)		
    }
	public function getlist( $text1 )
	{
		$result = Schedule::join('movies', 'schedules.movie_id', '=', 'movies.id')->
				join('runtimes', 'ticketings.runtime_id', '=', 'runtimes.id')->
				join('rooms', 'schedules.room_id', '=', 'rooms.id')->
				select('ticketings.*', 'movies.movie_name as movie_name', 'schedules.runt_date as run_date', 'runtimes.runtime as runtime', 'rooms.room_name as room_name')->
					orderby('ticketings.movie_name', 'asc');
		return $result;
	}
	
	public function create()
    {
		$data['tmp'] = $this->qstring();
		
		$data['list'] = $this->getlist_movie();
		$data['list1'] = $this->getlist_schedule();	
		$data['list2'] = $this->getlist_runtime();
		$data['list3'] = $this->getlist_room();
		
		return view( 'ticketing.create', $data);
    }
	
	function getlist_movie()
	{
		$result=Movie::orderby('movie_name')->get();
		return $result;
	}
	function getlist_schedule()
	{	
		$result=Schedule::orderby('run_date')->get();
		return $result;
	}
	function getlist_runtime()
	{	
		$result=Runtime::orderby('runtime')->get();
		return $result;
	}
	function getlist_room()
	{
		$result=Room::orderby('room_name')->get();
		return $result;
	}
	public function store(Request $request)
    {	
		$row = new Schedule; 		// Schedule 모델변수 row 선언
		
		$this->save_row($request, $row); 
		
		$tmp = $this->qstring();

		return  redirect('home');
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
				join('runtimes', 'ticketings.runtime_id', '=', 'runtimes.id')->
				join('rooms', 'schedules.room_id', '=', 'rooms.id')->
				select('ticketings.*', 'movies.movie_name as movie_name', 'schedules.runt_date as run_date', 'runtimes.runtime as runtime', 'rooms.room_name as room_name')->
				where('ticketings.id', '=', $id)->first();
				
		return view('ticketing', $data );
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

        $data['row'] = Schedule::find( $id );	// 자료 찾기
		return view('ticketing', $data );
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

		$row = Ticketing::find($id);	// Schedule 모델변수 row 선언
		$this->save_row($request, $row); 
		return  redirect('ticketing' . $tmp);
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
        Ticketing::find( $id )->delete();
		return redirect('ticketing' . $tmp);
    }
	
	public function save_row(Request $request , $row)
	{			
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
