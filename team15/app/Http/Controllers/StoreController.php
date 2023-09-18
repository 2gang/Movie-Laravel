<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Store;

class StoreController extends Controller
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
		return view( 'store.index', $data );
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
	
	public function qstring()
	{
		$text1 = request('text1') ? request('text1') : "";
		$page = request('page') ? request('page') : "1";
		
		$tmp = $text1 ? "?text1=$text1&page=$page" : "?page=$page";
		
		return $tmp;
	}
	
}
