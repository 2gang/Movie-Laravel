<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Store;

class AdminstoreController extends Controller
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
		return view( 'admin_store.index', $data );
    }
	
	public function getlist($text1) 
		{
			$result = Store::where('product', 'like', '%' . $text1 . '%')->orderby('product', 'asc')
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
        return view('admin_store.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$row = new Store;
		$this -> save_row($request, $row);
		
		$tmp = $this -> qstring();
		return redirect('admin_store'. $tmp);
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
		
        $data["row"] = Store::find($id);
		return view('admin_store.show' , $data);
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
		
        $data['row'] = Store::find( $id );
		return view('admin_store.edit', $data);
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
        $row = Store::find($id);
		$this -> save_row($request, $row);
		
		$tmp = $this -> qstring();
		return redirect('admin_store'. $tmp);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Store::find($id)->delete();
		
		$tmp = $this -> qstring();
		return redirect('admin_store'. $tmp);
    }
	
	public function save_row(Request $request, $row) {
		$request->validate( [
        'product' => 'required|max:50',
		],
		[

        'product.required' => '이름은 필수입력입니다.',
        'product.max' => '50자 이내여야 합니다.',
		]);
		
		$row->product = $request->input('product');
		if($request-> hasFile('product_image'))			//Upload할 파일이 있는 경우
		{
			$product_image = $request->file('product_image');
			$product_image_name = $product_image -> getClientOriginalName();		//파일 이름
			$product_image -> storeAs('public/product_img', $product_image_name);	//파일 저장

			
			$row -> product_image = $product_image_name;
		}
		$row->price = $request->input('price');
		
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
