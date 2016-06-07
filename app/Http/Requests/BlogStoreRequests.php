<?php 
namespace App\Http\Requests;
use App\Http\Requests\Request;
class BlogStoreRequests extends Request
{
/**
* Determine if the user is authorized to make this request.
*
* @return bool
*/
public function authorize()
{
return true;
}
/**
* Get the validation rules that apply to the request.
*
* @return array
*/
public function rules()
{
return [
'post_comment' => 'required',
'category_id' => 'required',
'blog_title'=>'required'
];
}
}
