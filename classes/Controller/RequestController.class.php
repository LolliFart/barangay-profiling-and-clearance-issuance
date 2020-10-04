<?php

namespace Classes\Controller;

use Classes\Model\Request;

class RequestController extends Request{


    public function resident_request_clearance($post_data){
        $this->resident_add_request($post_data);
    }

    public function admin_request_clearance($post_data){
        $this->admin_add_request($post_data);
    }

    public function update_request_status($id, $val){
        $this->updateRequestStatus($id, $val);
    }



}  
?>