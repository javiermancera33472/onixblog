<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model {

////////////////////////////////////////////////////
// Protection definition //
////////////////////////////////////////////////////

    protected $table ='blog';
    public $timestamps = false;
    protected $fillable = [
        'author_id',
        'post_date',
        'post_comment',
        'total_views',
        'category_id',
        'status',
    ];

    protected function joinBlogCategoryAuthor($type=null)
    {
        $minDate = config('jmSettings')['BLOG_TIME'];
        //dd(strtotime($minDate));
        
        $rows = DB::table('blog')
            ->join('users', 'blog.author_id', '=', 'users.id')
                ->join('categories', 'blog.category_id', '=', 'categories.id')
                ->select('users.first_name', 'users.last_name', 'categories.category', 'blog.*')
                ->where('blog.status','=',1)
                //->where('post_date',">=",1466035200)
                ->where('post_date',"<",1466035200)
                ->orderBy("blog.post_date",strtotime($minDate));
        if ($type==1) {
            $rows->where("author_id","=",\Auth::user()->id);
        }
        return $rows;
    }

}
