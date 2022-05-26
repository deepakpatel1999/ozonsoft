<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Companies;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    	$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    	
    	return view('admin_dashboard');
        //return view('home');
    }
    public function handleAdmin()
    {
    	return view('admin_dashboard');
    	//return view('handleAdmin');
    }
    


    public function Companies()
    {
    	
    	$compony = DB::table('Companies')->get();
    	return view('Allusers_list', compact('compony'));
    	
    }
    public function compony()
    {

    	return view('User_create');
    	
    }
    public function inset_list(Request $request)
    {   
    	
    	$request->validate([
    		'name' => 'required',
    		'email' => 'required',
    		'logo' => 'required'
    	]); 

    	if($request->hasFile('logo')){
    		$file = $request->file('logo');

    		$filename = $request->file('logo')->getClientOriginalName();

    		$path = $request->file('logo')->store('public/images');

    	}else{
    		$filename="test.png"	;
    	}
    	$data = Companies::insert(['name' => $request->name,'email' => $request->email,'logo' => $filename]);

    	return json_encode(array(
    		"statusCode"=>200
    	));
    }
    public function edit($id)
    {
    	$edit = Companies::find($id);
    	return view('editlist', compact('edit'));
    }
    public function update_list(Request $request)
    {    

    	$id=$request->id;
    	$request->validate([
    		'name' => 'required',
    		'email' => 'required',
    		
    		'logo' => 'required'
    	]); 
    	if($request->hasFile('logo')){
    		$file = $request->file('logo');

    		$filename = $request->file('logo')->getClientOriginalName();

    		$path = $request->file('logo')->store('public/images');
    		
    	}else{
    		$filename="";
    	}
    	$data = Companies::find($id)->update(['name' => $request->name,'email' => $request->email,'logo' => $filename]);
    	
    	return redirect()->route('admin.List',  ['message']);
    }
    public function delete_list(Request $request)
    {
    	$id=$request->butdelete_id;

    	$data=DB::table('Companies')->where('id',$id)->delete();
    	return json_encode(array(
    		"statusCode"=>200
    	));
    }

    
}
