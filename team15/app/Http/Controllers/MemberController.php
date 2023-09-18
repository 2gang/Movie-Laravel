<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;

class MemberController extends Controller
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
		return view( 'member.index', $data );	// 자료 표시(view/member폴더의 index.blade.php)

    }
		public function getlist( $text1 )
	{
		$result = Member::where('name', 'like', '%' . $text1 . '%')->orderby('name','asc')->paginate(5)->appends( ['text1' => $text1] );
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

		return view( 'member.create', $data );
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

		$row = new Member; 		// member 모델변수 row 선언
		$this->save_row($request, $row); 

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
        $data['row'] = Member::find( $id );                      // Eloquent ORM
		return view('member.show', $data );
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

        $data['row'] = Member::find( $id );	// 자료 찾기
		return view('member.edit', $data );
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

		$row = Member::find($id);	// member 모델변수 row 선언
		$this->save_row($request, $row); 

		return  redirect('home');
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
        Member::find( $id )->delete();
		return redirect('home');
    }
	
	public function save_row(Request $request , $row)
	{		
		$row->uid = $request->input("uid");	// 값 입력 
		$row->pwd = $request->input("pwd");
		$row->name = $request->input("name");
		$row->phone = $request->input("phone");
		$row->save();			// 저장
	}

	public function qstring()
	{
		$text1 = request("text1") ? request('text1') : "";
		$page = request('page') ? request('page') : "1";
		$tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";
		return $tmp;
	}

}
