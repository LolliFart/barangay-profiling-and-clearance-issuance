<?php


namespace Classes\View;

use Classes\Model\Request;

class RequestView extends Request{

    public function get_all_logs(){
        $result = $this->requestLogs();
        $this->row_count = $result->num_rows;
        return $result;
    } 

    public function get_all_pending_request(){
        $result = $this->getAllPendingRequest();
        $this->row_count = $result->num_rows;
        return $result;
    } 

    public function get_pending_request($id){
        $result = $this->getPendingRequest($id);
        $this->row_count = $result->num_rows;
        return $result;
    } 

    public function get_resident_request($id){
        $result = $this->getResidentRequest($id);
        return $result;
    } 

    public function get_resident_clearance($res_id, $clearance_id){
        $result = $this->getResidentClearancet($res_id, $clearance_id);
        return $result;
    } 


}

?>