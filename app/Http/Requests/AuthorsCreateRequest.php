<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class AuthorsCreateRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
            if(\Auth::user()->is('admins'))
            {  
                return true;
            }
            return false;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		////////////////////////////////////////////////////
                // Rules Definition //
                ////////////////////////////////////////////////////
                // alpha|alpha Numeric|email|date|date_format(m-d-Y)|integer|numeric

                return [
                    'author_first_name' => 'required',
                    'author_last_name' => 'required',
                    'author_email' => 'required|email',
                    
                ];
	}

}
