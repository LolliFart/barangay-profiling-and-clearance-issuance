<?php

namespace Classes\Utilites;

class ImageValidator{

    private $type;
    private $filename; 
    private $errors = []; 
    private $message = [
        'invalid' => 'Invalid uploads'
        ];

    public function __construct($type, $filename){
        $this->type = $type;
        $this->filename = $filename;
    }
    
// ######################################################################################################

    public function validate_image(){

        for($i=0; $i<sizeof($this->filename); $i++){
            $this->validate_type($this->filename[$i], $this->type[$i]);            

        }

        if(empty($this->errors)){
            return false;
        }
        return $this->errors;

    }

   
     

// ######################################################################################################

    private function validate_type($filename, $type){
        if(!$this->isCorrectType($type)){
            return $this->addError($filename, $this->message['invalid']);
        }
    }

       
// ######################################################################################################


    private function addError($key, $err_message){
        $this->errors[$key] = $err_message;
    }

    private function isCorrectType($val){
        $allowed = array('jpeg', 'png', 'jpg');
        $strArray = explode("/", $val);
        return in_array(end($strArray), $allowed) ? true : false;
     }
      
    

}



?>