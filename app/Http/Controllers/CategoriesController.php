<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use \App\Http\Requests\CategoriesStoreRequests;
use \App\Http\Requests\CategoriesUpdateRequests;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller {
    
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
            $rows = \App\Categories::paginate(20);
            return view("categories/index",compact("rows"));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
            /**
            /* Controller for Create
            */
            return view("categories/create");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(CategoriesStoreRequests $request)
	{
            /**
            /* Controller for Store
            */
            if ($request->isMethod("post"))
            {
                $id = $request->input("id");
                $rows = new \App\Categories;
                $input = $request->all();
                $rows->category=$input["category"];
                $rows->status=1;
                $rows->save();
                Session::flash("flash_message", "Record Created");
            }
            return Redirect("categories");

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
	public function edit($id)
	{
            /**
            /* Controller for Edit
            */
            $rows = \App\Categories::find($id);
            if (empty($rows)) {
                Session::flash("flash_message_danger", "No Records founded");
                return Redirect::route('categories')->withInput();
            }
            return view("categories/edit",compact("rows"));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(CategoriesUpdateRequests $request)
	{
            /**
            /* Controller for Destroy
            */
            if ($request->isMethod("post"))
            {
                if ($request->has("id"))
                {
                    $id = $request->input("id");
                    $rows = \App\Categories::find($id);
                    if (empty($rows)) {
                            Session::flash("flash_message_danger", "No Records founded");
                    } else {
                        $input = $request->all();
                        $rows->category=$input["category"];
                        $rows->status=$input["status"];
                        $rows->save();
                        Session::flash("flash_message", "Record Updated");
                    }
                } else { 
                    Session::flash("flash_message_danger", "No Records founded"); 
                }
            }
            return Redirect("categories");

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
