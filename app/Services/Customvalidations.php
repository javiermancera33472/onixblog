<?php namespace App\Services\Validation;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of customValidations
 *
 * @author JAVIER
 */
use Illuminate\Validation\Validator;

class Customvalidations extends Validator {
    public function validateFoo($attribute, $value, $parameters)
    {
        echo "here";exit;
        return $value == 'foo';
    }
}
