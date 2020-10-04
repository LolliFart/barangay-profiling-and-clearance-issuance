<?php

namespace Classes\View;

use Classes\Model\Admin;


class AdminView extends Admin
{
    public $ctr = 0;

    //check kung naa ba ang username
    public function check_username($username_data)
    {
        $result = $this->checkAccountUsername($username_data); 
        if($result){
            if ($result->num_rows == 0) {
                return false;
            }
        }
        return true;
    }

    public function check_account_login($data)
    {
        $result = $this->checkAccountCredentials($data);
        if($result){
            if ($result->num_rows == 0) {
                return false;
            }
        }
 
        return $result;
    }


    //Checks inputted password kung same ba sa database
    public function check_password($data)
    {
        $data['admin_id'] = $_SESSION['admin_id'];
        $data['username'] = $_SESSION['admin_username'];
        $result = $this->verifyPassword($data); //returns sql query
        if($result){
            if ($result->num_rows == 0) {
                return false;
            }
        }
        return true;
    }


    //fetch tanan record sa admin account
    public function get_all_admin()
    {
        $result = $this->getAllAdmin();
        return $result;
    }

}
