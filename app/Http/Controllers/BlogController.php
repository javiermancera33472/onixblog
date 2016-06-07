<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use Illuminate\Http\Request;
use Request;
use \App\Http\Requests\BlogStoreRequests;
use \App\Http\Requests\BlogUpdateRequests;
use Illuminate\Support\Facades\Session;


class BlogController extends Controller {

        public function __construct() {            
            $this->middleware('auth',['except' => ['index',"show"]]);
        }
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            //$rows = \App\Blog::joinBlogCategoryAuthor();
            /**
            /* Controller for Index
            */
            $rows = \App\Blog::joinBlogCategoryAuthor()->paginate(20);
            return view("blog/index",compact("rows"));
	}
        public function myBlogs()
	{
            //$rows = \App\Blog::joinBlogCategoryAuthor();
            /**
            /* Controller for Index
            */
            $rows = \App\Blog::joinBlogCategoryAuthor("1")->paginate(20);
            return view("blog/index",compact("rows"));
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
            $categories = \App\Categories::where("status","=",1)->lists('category','id');
            return view("blog/create")->with("categories",$categories);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(BlogStoreRequests $request)
	{
            /**
            /* Controller for Store
            */
            if ($request->isMethod("post"))
            {
                $id = $request->input("id");
                $rows = new \App\Blog;
                $input = $request->all();
                $rows->post_date=time();
                $rows->blog_title=$input["blog_title"];
                $rows->post_comment=$input["post_comment"];
                $rows->author_id= \Auth::user()->id;
                $rows->category_id= $input["category_id"];
                $rows->showing_after= $input["showing_after"];
                $rows->status=1;
                $rows->save();
                Session::flash("flash_message", "Record Created");
            }
            return Redirect("blog");

	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
            /**
            /* Controller for Edit
            */
            $rows = \App\Blog::find($id);
            if (empty($rows)) {
                Session::flash("flash_message_danger", "No Records founded");
                return Redirect::route('blog')->withInput();
            }
            $categories = \App\Categories::where("status","=",1)->lists('category','id');
            return view("blog/show",compact("rows"))->with("categories",$categories);;
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
            if(\Auth::user()->is('admins'))
            {        
                $rows = \App\Blog::find($id);
            } else {
                $rows = \App\Blog::where("id","=",$id)->where("author_id","=",\Auth::user()->id)->first();
            }
            //dd($rows);
            if (empty($rows)) {
                Session::flash("flash_message_danger", "No Records founded");
                return Redirect::route('blog')->withInput();
            }
            $categories = \App\Categories::where("status","=",1)->lists('category','id');
            return view("blog/edit",compact("rows"))->with("categories",$categories);;
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(BlogUpdateRequests $request)
	{
            /**
            /* Controller for Destroy
            */
            if ($request->isMethod("post"))
            {
                if ($request->has("id"))
                {
                    $id = $request->input("id");
                    $rows = \App\Blog::find($id);
                    if (empty($rows)) {
                        Session::flash("flash_message_danger", "No Records founded");
                    } else {
                        $input = $request->all();
                        $rows->blog_title=$input["blog_title"];
                        $rows->post_comment=$input["post_comment"];
                        $rows->status=$input["status"];
                        $rows->category_id= $input["category_id"];
                        $rows->showing_after= $input["showing_after"];
                        $rows->save();
                        Session::flash("flash_message", "Record Updated");
                    }
                } else { 
                    Session::flash("flash_message_danger", "No Records founded"); 
                }
            }
            return Redirect("blog");

	}

        public function delete($id)
	{
            /**
            /* Controller for Edit
            */
            if(\Auth::user()->is('admins'))
            {        
                $rows = \App\Blog::find($id);
            } else {
                $rows = \App\Blog::where("id","=",$id)->where("author_id","=",\Auth::user()->id)->first();
            }
            if (empty($rows)) {
                Session::flash("flash_message_danger", "No Records founded");
                return Redirect::route('blog')->withInput();
            }
            $categories = \App\Categories::where("status","=",1)->lists('category','id');
            return view("blog/delete",compact("rows"))->with("categories",$categories);;
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy(Request $request)
	{
            /**
            /* Controller for Destroy
            */
            if (Request::isMethod('post'))
            {
                $input = Request::input();
                if ($input["id"])
                {
                    $id = $input["id"];
                    $rows = \App\Blog::find($id);
                    if (empty($rows)) {
                        Session::flash("flash_message_danger", "No Records founded");
                    } else {
                        $rows->delete();
                        Session::flash("flash_message", "Record Deleted");
                    }
                } else { 
                    Session::flash("flash_message_danger", "No Records founded"); 
                }
            }
            return Redirect("blog");

	}

}
