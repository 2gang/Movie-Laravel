<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;

class AdminroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$data['tmp'] = $this -> qstring();
		
        $text1 = request('text1');
		$data['text1'] = $text1;
		$data['list'] = $this->getlist($text1);		// 자료 읽기
		return view( 'admin_room.index', $data );
    }
	
	public function getlist($text1) 
		{
			$result = Room::where('room_name', 'like', '%' . $text1 . '%')->orderby('room_name', 'asc')
			->paginate(5)->appends( ['text1' => $text1] );
			
			return $result;
		}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$data['tmp'] = $this -> qstring();
        return view('admin_room.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$row = new Room;
		$this -> save_row($request, $row);
		
		$tmp = $this -> qstring();
		return redirect('admin_room'. $tmp);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {	
		$data['tmp'] = $this -> qstring();
		
        $data["row"] = Room::find($id);
		return view('admin_room.show' , $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$data['tmp'] = $this -> qstring();
		
        $data['row'] = Room::find( $id );
		return view('admin_room.edit', $data);
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
        $row = Room::find($id);
		$this -> save_row($request, $row);
		
		$tmp = $this -> qstring();
		return redirect('admin_room'. $tmp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Room::find($id)->delete();
		
		$tmp = $this -> qstring();
		return redirect('admin_room'. $tmp);
    }
	
	public function save_row(Request $request, $row) {
		$request->validate( [
        'room_name' => 'required|max:50',
		],
		[

        'room_name.required' => '이름은 필수입력입니다.',
        'room_name.max' => '50자 이내여야 합니다.',
		]);
		
		$row->room_name = $request->input('room_name');
		
		$row -> save();
	}
	
	public function qstring()
	{
		$text1 = request('text1') ? request('text1') : "";
		$page = request('page') ? request('page') : "1";
		
		$tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";
		
		return $tmp;
	}
	
}
