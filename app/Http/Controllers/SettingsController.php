<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SettingsController extends Controller {

        public function __construct() {            
            $this->middleware('admins');
        }
        
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            /**
            /* Controller for Index
            */
            $rows = \App\Settings::where("id",23)->paginate(20);
            return view("Settings/index",compact("rows"));
	}

	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit()
	{
            /**
            /* Controller for Edit
            */
            $id=23;
            $rows = \App\Settings::find($id);
            if (empty($rows)) {
                Session::flash("flash_message_danger", "No Records founded");
                return Redirect::route('settings')->withInput();
            }
            return view("Settings/edit",compact("rows"));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
            /**
            /* Controller for Destroy
            */
            if ($request->isMethod("post"))
            {
                if ($request->has("id"))
                {
                    $id = $request->input("id");
                    $rows = \App\Settings::find($id);
                    if (empty($rows)) {
                        Session::flash("flash_message_danger", "No Records founded");
                    } else {
                        $input = $request->all();
                        $rows->app_value=$input["app_value"];
                        $rows->save();
                        Session::flash("flash_message", "Record Updated");
                    }
                } else { 
                    Session::flash("flash_message_danger", "No Records founded"); 
                }
            }
            return Redirect("settings");

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

}
