<?php


namespace Classes\View;

use Classes\Model\Resident;

class ResidentView extends Resident{

    public $error=[];
    public $ctr = 0;

    //fetch specific resident
    public function get_resident($id){
        $result = $this->getResident($id);
        return $result;
    }

    //fetch all resident
    public function get_all_resident(){
        $result = $this->getAllResident(); 
        return $result;
    } 

    //
    public function search_name($post_data){
        return $this->searchName($post_data);
    }

    // display deleted resident
    public function display_deleted_list(){
        $result = $this->getDeletedResident();
        return $result;
    }
    
}

?>