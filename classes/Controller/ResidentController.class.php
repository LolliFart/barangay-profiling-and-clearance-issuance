<?php


namespace Classes\Controller;

use Classes\Model\Resident;

class ResidentController extends Resident{ 

    public function add_resident($post_data){
        $this->addResident($post_data);
    } 

    public function update($post_data){ 
        $this->updateResident($post_data);
    }

    public function delete($id){
        $this->removeResident($id);
    }

    public function undo($id){
        $this->undoResident($id);
    }

}



?>