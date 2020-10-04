<?php

namespace Classes\Model;

use Classes\Utilites\Dbh;

class Admin extends Dbh{ 

    protected function getAllAdmin(){
        $sql = 'SELECT admin_id, admin_username, last_logout, last_login, date_created, created_by, status  from admin order by admin_username ASC';
        $result = $this->connect()->query($sql);
        $this->connect()->close(); 
        return $result;
    }

    protected function getAdmin($id){
        $sql = "SELECT * from admin where admin_id = '$id'";
        $result = $this->connect()->query($sql);
        $this->connect()->close();
        return $result; 
    }

    protected function addAdmin($data){
        $data['username'] = strtolower($data['username']);
        $sql = "INSERT INTO admin (admin_username, admin_pass, date_created, created_by) 
        VALUES ('$data[username]', '$data[password]', current_timestamp(), '$data[admin_username]')";
        $this->connect()->query($sql);
        $this->connect()->close();
    }


    
    protected function updateAdmin($data){
        $data['username'] = strtolower($data['username']);
        $sql = "UPDATE admin set admin_username = '$data[username]', admin_password = '$data[password]'
        where admin_id = $data[admin_id]"; 
        $this->connect()->query($sql);
        $this->connect()->close(); 
    }

    protected function updateUsername($data){
        $data['username'] = strtolower($data['username']);
        $sql = "UPDATE admin set admin_username = '$data[username]'
        where admin_id = '$data[admin_id]'"; 
        $this->connect()->query($sql);
        $this->connect()->close();
    } 

    protected function updatePassword($data){
        $sql = "UPDATE admin set admin_pass = '$data[password]'
        where admin_id = $data[admin_id] and admin_username = '$data[username]'"; 
        $this->connect()->query($sql);
        $this->connect()->close();
    } 

    protected function verifyPassword($data){
        $sql = "SELECT * from admin where admin_id = '$data[admin_id]' and admin_username = '$data[username]' and admin_pass = '$data[oldpassword]'";
        $result = $this->connect()->query($sql);
        $this->connect()->close();
        return $result;
    }

    protected function checkAccountUsername($data){
        $sql = "SELECT * from admin where admin_username = '$data' and status = '1'";
        $result = $this->connect()->query($sql);
        $this->connect()->close();
        return $result;
    }

    protected function checkAccountCredentials($data){
        $username= $data['username'];
        $password= $data['password'];

        $sql = "SELECT admin_username, admin_id FROM admin WHERE admin_username='$username' AND admin_pass='$password' and status = '1'";
        $result = $this->connect()->query($sql);
        $this->connect()->close();
        return $result;
 
    }

    protected function updateLoginDate($id){
        $sql = "UPDATE admin set last_login = sysdate() where admin_id = '$id'";
        $this->connect()->query($sql);
        $this->connect()->close();
    } 

    protected function updateLogoutDate($id){
        $sql = "UPDATE admin set last_logout = sysdate() where admin_id = '$id'";
        $result = $this->connect()->query($sql);
        $this->connect()->close();
    }  


    protected function deactivate($id){
        $sql = "update admin set status = '0' where admin_id = '$id'";
        $this->connect()->query($sql);
        $this->connect()->close();
    }
}


?>