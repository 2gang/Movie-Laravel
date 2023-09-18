<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Director;

class AdmindirectorController extends Controller
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
		return view( 'admin_director.index', $data );
    }
	
	public function getlist($text1) 
		{
			$result = Director::where('director_name', 'like', '%' . $text1 . '%')->orderby('director_name', 'asc')
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
        return view('admin_director.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$row = new Director;
		$this -> save_row($request, $row);
		
		$tmp = $this -> qstring();
		return redirect('admin_director'. $tmp);
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
		
        $data["row"] = Director::find($id);
		return view('admin_director.show' , $data);
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
		
        $data['row'] = Director::find( $id );
		return view('admin_director.edit', $data);
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
        $row = Director::find($id);
		$this -> save_row($request, $row);
		
		$tmp = $this -> qstring();
		return redirect('admin_director'. $tmp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Director::find($id)->delete();
		
		$tmp = $this -> qstring();
		return redirect('admin_director'. $tmp);
    }
	
	public function save_row(Request $request, $row) {
		$request->validate( [
        'director_name' => 'required|max:50',
		],
		[

        'director_name.required' => '이름은 필수입력입니다.',
        'director_name.max' => '50자 이내여야 합니다.',
		]);
		
		$row->director_name = $request->input('director_name');
		if($request-> hasFile('director_image'))			//Upload할 파일이 있는 경우
		{
			$director_image = $request->file('director_image');
			$director_image_name = $director_image -> getClientOriginalName();		//파일 이름
			$director_image -> storeAs('public/director_img', $director_image_name);	//파일 저장

			
			$row -> director_image = $director_image_name;
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
