<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Years extends Model {

    protected $table ='years';

    public $timestamps = false;
    
    /*
    * 
    * 
    */
    protected function getYears() {
       $tmp = \App\Years::all();
       $years = [];
       foreach ($tmp as $row)
       {
           $years[$row->id]=$row->year_name;
       }
       return $years;
    }

}
