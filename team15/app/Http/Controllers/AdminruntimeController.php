<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Runtime;

class AdminruntimeController extends Controller
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
		return view( 'admin_runtime.index', $data );
    }
	
	public function getlist($text1) 
		{
			$result = Runtime::where('runtime', 'like', '%' . $text1 . '%')->orderby('runtime', 'asc')
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
		
        return view('admin_runtime.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$row = new Runtime;
		$this -> save_row($request, $row);
		
		$tmp = $this -> qstring();
		return redirect('admin_runtime'. $tmp);
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
		
        $data["row"] = Runtime::find($id);
		return view('admin_runtime.show' , $data);
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
		
        $data['row'] = Runtime::find( $id );
		return view('admin_runtime.edit', $data);
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
        $row = Runtime::find($id);
		$this -> save_row($request, $row);
		
		$tmp = $this -> qstring();
		return redirect('admin_runtime'. $tmp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Runtime::find($id)->delete();
		
		$tmp = $this -> qstring();
		return redirect('admin_runtime'. $tmp);
    }
	
	public function save_row(Request $request, $row) {
		$request->validate( [
        'runtime' => 'required|max:50',
		],
		[

        'runtime.required' => '시간은 필수입력입니다.',
		]);
		
		$row->runtime = $request->input('runtime');
		
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
