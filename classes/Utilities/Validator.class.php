<?php

namespace Classes\Utilites;

class Validator{

    private $data;
    private $errors = []; 
    private $message = [
        'invalid'         => 'invalid input',
        'checked'         => 'must be checked',
        'empty'           => 'please put something here',
        'min'             => 'input is too short',
        'max'             => 'input is too long',
        'number'          => 'invalid input',
        'email'           => 'email address is invalid',
        'password_repeat' => 'passwords do not match',
        'select'          => 'please select an option',
        'year'            => 'invalid year',
        'amount'          => 'invalid input',
        'uname-comb'      => 'invalid username. Must be combination of letter(s), number(s), uppercase or lowercase. 6-15 lenght.',
        'password'        => 'invalid password'];


    public function __construct($post_data){
        $this->data = $post_data;
    }

    
// ######################################################################################################

    public function validate_business_form(){
        $this->validate_text('firstname');
        $this->validate_optional_text('middlename');
        $this->validate_text('lastname');
        $this->validate_characters('address');
        $this->validate_text('kindofbiz');
        $this->validate_characters('tradename'); 
        $this->validate_text('located');

        $this->validate_integer('or_number');
        $this->validate_amount('amount_paid');
        $this->validate_amount('garbage_fee');
        $this->validate_year('year_validity');
        
        if(empty($this->errors)){
            return false;
        }

        return $this->errors;

    }  

    public function validate_credentials(){  
        $this->validate_username('username');
        $this->validate_password('password');

        if(empty($this->errors)){
            return false;
        }

        return $this->errors;
    }
    
    public function validate_clearance_form(){
        $this->validate_text('lastname');
        $this->validate_text('firstname');
        $this->validate_optional_text('middlename');
        $this->validate_select('civil_status');
        $this->validate_text('purpose');
        $this->validate_characters('address');
        $this->validate_email();

        if(empty($this->errors)){
            return false;
        }

        return $this->errors;

    }  

    public function validate_admin_clearance_form(){
        $this->validate_text('lastname');
        $this->validate_text('firstname');
        $this->validate_optional_text('middlename');
        $this->validate_select('civil_status');
        $this->validate_text('purpose');
        $this->validate_characters('address');

        if(empty($this->errors)){
            return false;
        }

        return $this->errors;

    }  

    public function validate_admin_residency_form(){
        $this->validate_text('lastname');
        $this->validate_text('firstname');
        $this->validate_optional_text('middlename');
        $this->validate_select('civil_status');
        $this->validate_text('purpose');
        $this->validate_characters('address');
        $this->validate_year('year_of_residency');

        if(empty($this->errors)){
            return false;
        }

        return $this->errors;

    }  


    public function validate_form(){
        $this->validate_text('lastname');
        $this->validate_text('firstname');
        $this->validate_optional_text('middlename');
        $this->validate_characters('pob');
        $this->validate_characters('address');
        $this->validate_number();
        $this->validate_select('gender');
        $this->validate_text('religion');
        $this->validate_select('civil_status');

        if(empty($this->errors)){
            return false;
        }

        return $this->errors;

    }  

    public function validate_user_name(){  
        $this->validate_username('username');
        if(empty($this->errors)){
            return false;
        }

        return $this->errors;
    }

    public function validate_pass(){
        $keys = array_keys($this->data);
        foreach($keys as $key){
            $this->validate_password($key);
        }  
        if(empty($this->errors)){
            return false;
        }

        return $this->errors;
    }


    

// ######################################################################################################

    private function validate_year($key){
        if($this->isEmpty($this->data[$key])){
            return $this->addError($key, $this->message['empty']);
        }
        
        if($this->isContainHtmlTag($this->data[$key])){
            return $this->addError($key, $this->message['invalid']);
        }

        if($this->is_number($this->data[$key])){
            return $this->addError($key, $this->message['year']);
        }

    }

    private function validate_integer($key){
        if($this->isEmpty($this->data[$key])){
            return $this->addError($key, $this->message['empty']);
        }
        
        if($this->isContainHtmlTag($this->data[$key])){
            return $this->addError($key, $this->message['invalid']);
        }

        if($this->is_number($this->data[$key])){
            return $this->addError($key, $this->message['invalid']);
        }

    }

    private function validate_amount($key){
        if($this->isEmpty($this->data[$key])){
            return $this->addError($key, $this->message['empty']);
        }

        if($this->is_amount($this->data[$key])){
            return $this->addError($key, $this->message['amount']);
        }

    }

    private function validate_optional_text($key){
        
        if($this->isContainExtraCharacters($this->data[$key]) || $this->isContainHtmlTag($this->data[$key])){
            return $this->addError($key, $this->message['invalid']);
        }
    }

    private function validate_text($key){
        if($this->isEmpty($this->data[$key])){
            return $this->addError($key, $this->message['empty']);
        }
        
        if($this->isContainExtraCharacters($this->data[$key]) || $this->isContainHtmlTag($this->data[$key])){
            return $this->addError($key, $this->message['invalid']);
        }

        if($this->isCorrectLenght($this->data[$key])){
            return $this->addError($key, $this->message['min']);
        }
    }

    private function validate_characters($key){
        if($this->isEmpty($this->data[$key])){
            return $this->addError($key, $this->message['empty']);
        }
        
        if($this->isContainHtmlTag($this->data[$key])){
            return $this->addError($key, $this->message['invalid']);
        }

        if($this->isCorrectLenght($this->data[$key])){
            return $this->addError($key, $this->message['min']);
        }
    }

    private function validate_number(){
        if($this->isEmpty($this->data['contact_number'])){ 
            return $this->addError('contact_number', $this->message['empty']);
        }

        if($this->isContainHtmlTag($this->data['contact_number']) || $this->isContactValid($this->data['contact_number'])){
            return $this->addError('contact_number', $this->message['invalid']);
        }
    }

    private function validate_email(){
        if($this->isEmailValid($this->data['email']) || $this->isContainHtmlTag($this->data['email'])){
            return $this->addError('email', $this->message['email']);
        }
    }

    private function validate_select($key){
        if($this->isEmpty($this->data[$key])){
            return $this->addError($key,  $this->message['select']);
        }
    }
    // $key = username
    private function validate_username($key){
        if($this->isEmpty($this->data[$key])){
            return $this->addError($key, $this->message['empty']);
        }

        if($this->isCorrectLenght($this->data[$key])){
            return $this->addError($key, $this->message['min']);
        }

        if($this->isContainHtmlTag($this->data[$key])){
            return $this->addError($key,  $this->message['invalid']);
        }
    
    }

    private function validate_password($key){

        if($this->isCorrectLenght($this->data[$key])){
            return $this->addError($key, $this->message['password']);
        }
    
        if($this->checkpassword($this->data[$key])){
            return $this->addError($key, $this->message['password']);
        }
    }




    
// ######################################################################################################

    // NAAY ERROR ANG G INPUT TAWAGON NI SYA NA FUNCTION PRA MASULOD SA ATNG ERROR NA ARRAY
    private function addError($key, $err_message){
        $this->errors[$key] = $err_message;
    }

    // RETURN TRUE KNG tinoud ba jd na error sya or empty
    private function isEmpty($val){
        return strlen($val) <= 0 ? true : false;
     }
    
    //  admin#$#$#
    private function isContainExtraCharacters($val){    
         return !preg_match("/^[a-zA-Z ]*$/", $val) ? true : false;
    }
    
    private function isEmailValid($val){
        return !preg_match('/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/', $val) ? true : false;
    }
    
    private function isContainHtmlTag($val){
        return preg_match("/<[^<]+>/", $val, $m) != 0 ? true : false;
    }
    
    private function isContactValid($val){
        return (substr($val, 0, 2) == '09' && strlen($val) == 11 && preg_match('/[\+]{0,1}(\d{10,13}|[\(][\+]{0,1}\d{2,}[\13)]*\d{5,13}|\d{2,6}[\-]{1}\d{2,13}[\-]*\d{3,13})/',$val))? false : true;
    
     }
    
    private function isCorrectLenght($val){
        return(strlen($val)>=2)? false : true;
    }
    
    private function checkpassword($val){    
        
        return !preg_match('/\A(?=[^A-Z]*[A-Z])(?=[^a-z]*[a-z])(?=\D*\d)(?![^!@#$%^&*()\-_=+{};:,<.>]*[!@#$%^&*()\-_=+{};:,<.>])\S{8,30}\z/', $val) ? true : false;
    }  

    private function is_number($val){    
        return !preg_match('/^[0-9]+$/', $val) ? true : false;
    }  

    private function is_amount($val){    
        return !preg_match('/^[0-9]+(?:\.[0-9]{2}){0,1}$/', $val) ? true : false;
    }  

}

