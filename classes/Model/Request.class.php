<?php

namespace Classes\Model;

use Classes\Utilites\Dbh;

class Request extends Dbh{

    protected function resident_add_request($data){
        $sql = "INSERT INTO clearance_requested (res_id,clearance_id,date_requestedOn,purpose, file_upload_directory, email, address, civil_status)
        VALUES ('$data[resident_id]','$data[clearance_id]',CURRENT_TIMESTAMP,'$data[purpose]', '$data[zip_upload_directory]', '$data[email]', '$data[address]', '$data[civil_status]')";
        $this->connect()->query($sql);
        $this->connect()->close();
    }

    protected function admin_add_request($data){
        $sql = "INSERT INTO clearance_requested (res_id,clearance_id, date_issuedOn, date_requestedOn,purpose,address, civil_status, is_pending, is_approved)
        VALUES ('$data[resident_id]','$data[clearance_id]',CURRENT_TIMESTAMP, CURRENT_TIMESTAMP,'$data[purpose]', '$data[address]', '$data[civil_status]', '0', '1')";
        $this->connect()->query($sql);
        $this->connect()->close();
    }

    protected function requestLogs(){
        
        $sql = "SELECT clr_req.clearanceRequested_id, clr_req.date_issuedOn, clr_req.date_requestedOn, clr_req.purpose, res.res_lname, 
        res.res_fname, res.res_mname, res.res_gender, clr_req.address, clr_req.civil_status, cl_type.clearance_name, clr_req.is_approved
        FROM clearance_requested clr_req 
            join resident res
            join clearance_type cl_type
                where clr_req.res_id = res.res_id and clr_req.clearance_id = cl_type.clearance_id and clr_req.is_pending = '0' order by res_lname ASC" ;

        $result = $this->connect()->query($sql);
        $this->connect()->close();
        return $result;
    }

    protected function getAllPendingRequest(){
        
        $sql = "SELECT clr_req.res_id, clr_req.clearanceRequested_id, clr_req.date_requestedOn, clr_req.purpose, res.res_lname, 
        res.res_fname, res.res_mname, res.res_gender, clr_req.address, clr_req.civil_status, cl_type.clearance_name, clr_req.email
        FROM clearance_requested clr_req 
            join resident res
            join clearance_type cl_type
                where clr_req.res_id = res.res_id and clr_req.clearance_id = cl_type.clearance_id and clr_req.is_pending = '1' order by res_lname ASC";

        $result = $this->connect()->query($sql);
        $this->connect()->close();
        return $result;
    }






    
    protected function getPendingRequest($id){
        
        $sql = "SELECT clr_req.res_id, clr_req.clearance_id, clr_req.clearanceRequested_id, clr_req.date_requestedOn, clr_req.purpose, res.res_lname, 
        res.res_fname, res.res_mname, res.res_gender, clr_req.address, clr_req.civil_status, cl_type.clearance_name, 
        clr_req.email as to_email, clr_req.file_upload_directory, res.res_DOB, cl_type.clearance_path_name
        FROM clearance_requested clr_req 
            join resident res
            join clearance_type cl_type
            where clr_req.clearanceRequested_id = '$id' 
                and clr_req.res_id = res.res_id
                and clr_req.clearance_id = cl_type.clearance_id";
        $result = $this->connect()->query($sql);
        $this->connect()->close();
        return $result;
    }


    protected function getResidentRequest($id){
        
        $sql = "SELECT * FROM clearance_requested where res_id = '$id' order by date_issuedOn ASC";
        $result = $this->connect()->query($sql);
        $this->connect()->close();
        return $result;
    }

    protected function getResidentClearancet($res_id, $clearance_id){
        
        $sql = "SELECT * FROM clearance_requested where res_id = '$res_id' and clearance_id = '$clearance_id' order by date_issuedOn ASC";
        $result = $this->connect()->query($sql);
        $this->connect()->close();
        return $result;
    }

    protected function updateRequestStatus($id, $val){
        
        $sql = "UPDATE clearance_requested set date_issuedOn = CURRENT_DATE, is_approved = '$val', is_pending = '0' where clearanceRequested_id = '$id'";
        $result = $this->connect()->query($sql);
        $this->connect()->close();
        return $result;

    }


}

?>