<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model {

    ////////////////////////////////////////////////////
    // Protection definition //
    ////////////////////////////////////////////////////

        protected $table ='categories';
        public $timestamps = false;
        protected $fillable = [
            'category',
            'status',
        ];

}
