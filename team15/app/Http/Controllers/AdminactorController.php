<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Actor;

class AdminactorController extends Controller
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
		return view( 'admin_actor.index', $data );
    }
	
	public function getlist($text1) 
		{
			$result = Actor::where('actor_name', 'like', '%' . $text1 . '%')->orderby('actor_name', 'asc')
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
        return view('admin_actor.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$row = new Actor;
		$this -> save_row($request, $row);
		
		$tmp = $this -> qstring();
		return redirect('admin_actor'. $tmp);
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
		
        $data["row"] = Actor::find($id);
		return view('admin_actor.show' , $data);
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
		
        $data['row'] = Actor::find( $id );
		return view('admin_actor.edit', $data);
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
        $row = Actor::find($id);
		$this -> save_row($request, $row);
		
		$tmp = $this -> qstring();
		return redirect('admin_actor'. $tmp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Actor::find($id)->delete();
		
		$tmp = $this -> qstring();
		return redirect('admin_actor'. $tmp);
    }
	
	public function save_row(Request $request, $row) {
		$request->validate( [
        'actor_name' => 'required|max:50',
		],
		[

        'actor_name.required' => '이름은 필수입력입니다.',
        'actor_name.max' => '50자 이내여야 합니다.',
		]);
		
		$row->actor_name = $request->input('actor_name');
		if($request-> hasFile('actor_image'))			//Upload할 파일이 있는 경우
		{
			$actor_image = $request->file('actor_image');
			$actor_image_name = $actor_image -> getClientOriginalName();		//파일 이름
			$actor_image -> storeAs('public/actor_img', $actor_image_name);	//파일 저장

			
			$row -> actor_image = $actor_image_name;
		}
		
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
