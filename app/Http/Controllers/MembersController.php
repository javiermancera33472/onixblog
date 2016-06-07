<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use App\Http\Requests\MembersRequest;
use App\Http\Requests\MembersChangePasswordRequest;

class MembersController extends Controller {

        public function __construct() {
            //$this->middleware('admins',['only'=>'create']);
            $this->middleware('auth',['except'=>'activation']);
        }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            
            if(\Auth::user()->is('admins'))
            {                                
                //$grid = \App\User::paginate(20);                                        
                $grid = \App\User::get();  
                return view('members.member_admin',compact('grid','grades','years'));
            }
            else
            {
                return view('blog');
            }            
            
            
            //$users = DB::table('users')->paginate(15);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getedit($id=null)
	{            
            if(\Auth::user()->is('admins'))
            {
                if (is_null($id)) {
                    $user = \App\User::find(\Auth::user()->id);
                } else {
                    $user = \App\User::find($id);
                }
            }
            else {
                $user = \App\User::find(\Auth::user()->id);
            }
            //dd($user);
            return view('members.member_edit',compact('user'));    
	}
        /**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */

        public function getpassword($id)
	{
            if(\Auth::user()->is('admins'))
            {
                $user = \App\User::find($id);
            }
            else {
                $user = \App\User::find(\Auth::user()->id);
            }
            return view('members.member_password',compact('user'));    
	}
        
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postupdate(MembersRequest $request)
	{
            //echo $request->id;exit;
            $user = \App\User::find($request->id);
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->zip_code = $request->zip_code;
            $user->email = $request->email;  
            if (($request->has('status')))
            {    
                $user->status = $request->status;
            }
            $user->save();
            \Session::flash("flash_message","The Record has been updated!!");                        
            if(\Auth::user()->is('admins'))
            {
                return redirect('/members');
            }
            else
            {
                return redirect('/members/profile');
            }
            //dd($request);exit;
            //\App\User::find($request, $columns)
        }


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function postupdatepassword(MembersChangePasswordRequest $request)
	{
            //echo $request->id;exit;
            $user = \App\User::find($request->id);
            $user->password = bcrypt($request->password);
            $user->save();
            return redirect('/members');
            //dd($request);exit;
            //\App\User::find($request, $columns)
        }
        
        /**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

        /**
	 * Build the search 
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function search()
	{
            if(\Auth::user()->is('admins'))
            {
                //dd(Input::all());exit;
                if (Request::has("s_first_name"))
                {
                    $grid = \App\User::where("first_name","like","%" . Request::input("s_first_name"). "%")->paginate(20);
                } else if (Request::has("s_last_name"))
                {
                    $grid = \App\User::where("last_name","like","%" . Request::input("s_last_name"). "%")->paginate(20);
                } else if (Request::has("s_id"))
                {
                    $grid = \App\User::where("id","=",Request::input("s_id"))->paginate(20);
                } else if (Request::has("s_email"))
                {
                    $grid = \App\User::where("email","like","%" . Request::input("s_email"). "%")->paginate(20);
                } else if (Request::has("s_zip_code"))
                {
                    $grid = \App\User::where("zip_code","like","" . Request::input("s_zip_code"). "%")->paginate(20);
                } 
                else
                {    
                    $grid = \App\User::paginate(20);  
                }
                //return redirect('members')->withInput();
                return view('members.member_admin',['grid' => $grid->appends(Request::except('page'))]);
            }
            else
            {
                return view('blog');
            }            
	}
        
        /**
	 * Activate a member
	 *
	 * 
	 */
	public function activation($actkey,$uid)
	{  
            $users = \App\User::where('id', '=', $uid)
                    ->where("status","=",0)
                    ->where("act_key","=",$actkey)
                    ->update([
                        'status' => 1,
                        'act_date'=>time(),
                        'act_key'=>""
                    ]);
            if (!$users)
            {
                return view('members.invalid_activation');
            }
            else
            {
                return view("members.success_activation");
            }
        }    
}
