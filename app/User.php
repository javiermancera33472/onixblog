<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Bican\Roles\Contracts\HasRoleAndPermissionContract;
use Bican\Roles\Traits\HasRoleAndPermission;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, HasRoleAndPermissionContract {

	use Authenticatable, CanResetPassword, HasRoleAndPermission;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = 
        [
            'email',
            'password',
            'remember_token',
            'created_at',
            'updated_at',
            'last_name',
            'first_name',
            'user_type',
            'status',
            'act_key',
            'address',
            'address_1',
            'city',
            'state',
            'zip_code',
            'act_date',
            
        ];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];
        
        protected function getMemberName($id) {
            $member = $this->find($id);
            return array($member->first_name,$member->last_name,$member->grade);
            
        }

}
