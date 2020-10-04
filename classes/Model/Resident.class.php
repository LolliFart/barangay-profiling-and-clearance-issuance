<?php

namespace Classes\Model;

use Classes\Utilites\Dbh;
 
class Resident extends Dbh{

    protected function getAllResident(){
        $sql = "SELECT res_id as resident_id, res_lname as lastname, res_fname as firstname, res_mname as middlename, res_gender as gender, res_religion as religion, res_DOB as dob, res_address as address, res_civilStatus as civil_status, res_POB as pob, res_contactNumber as contact_number, is_archived as is_archived
        FROM `resident` where is_archived = '1' order by res_lname ASC";
        $result = $this->connect()->query($sql);
        $this->connect()->close();
        return $result;
    }

    protected function getDeletedResident(){
        $sql = "SELECT res_id as resident_id, res_lname as lastname, res_fname as firstname, res_mname as middlename, res_gender as gender, res_religion as religion, res_DOB as dob, res_address as address, res_civilStatus as civil_status, res_POB as pob, res_contactNumber as contact_number, is_archived as is_archived from resident where is_archived = '0'  order by res_lname ASC";
        $result = $this->connect()->query($sql);
        $this->connect()->close();
        return $result;
    }

    protected function getResident($id){
        $sql = "SELECT res_id as resident_id, res_lname as lastname, res_fname as firstname, res_mname as middlename, res_gender as gender, res_religion as religion, res_DOB as dob, res_address as address, res_civilStatus as civil_status, res_POB as pob, res_contactNumber as contact_number, is_archived as is_archived from resident where res_id = '$id' and  is_archived = '1'";
        $result = $this->connect()->query($sql);
        $this->connect()->close();
        return $result;
    }
 

    protected function searchName($data){
    
        $sql = "SELECT res_id as resident_id FROM resident WHERE 
        res_lname = '$data[lastname]' AND res_fname = '$data[firstname]'";
        $result = $this->connect()->query($sql);
        $this->connect()->close();
        return $result;    
    }
 


    // ############################################################################################################


    
    protected function addResident($data){
        $contact_number = '+63' . substr($data['contact_number'], 1, 11);
        $sql = "INSERT INTO resident (res_lname, res_fname, res_mname, res_gender, res_religion, res_DOB, res_address, res_civilStatus, res_POB, res_contactNumber) 
        VALUES ('$data[lastname]', '$data[firstname]', '$data[middlename]', '$data[gender]', '$data[religion]', '$data[dob]', '$data[address]',  '$data[civil_status]', '$data[pob]', '$contact_number')";
        $this->connect()->query($sql);
        $this->connect()->close();
    }

    protected function removeResident($id){
        $sql = "UPDATE `resident` SET `is_archived` = '0' WHERE `resident`.`res_id` = $id";
        $this->connect()->query($sql);
        $this->connect()->close();
    }

    protected function undoResident($id){
        $sql = "UPDATE `resident` SET `is_archived` = '1' WHERE `resident`.`res_id` = $id";
        $this->connect()->query($sql);
        $this->connect()->close();
    }
    
    protected function updateResident($data){
        $contact_number = '+63' . substr($data['contact_number'], 1, 11);
        $sql = "UPDATE resident set res_lname = '$data[lastname]', res_fname = '$data[firstname]', res_mname = '$data[middlename]', res_gender = '$data[gender]', 
        res_religion = '$data[religion]', res_DOB = '$data[dob]', res_address = '$data[address]', res_civilStatus = '$data[civil_status]',
        res_POB = '$data[pob]', res_contactNumber = '$contact_number'
        where res_id = $data[resident_id]"; 

        $this->connect()->query($sql);
        $this->connect()->close();
    }

}
