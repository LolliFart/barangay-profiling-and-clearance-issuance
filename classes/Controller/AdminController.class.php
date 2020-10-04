<?php
namespace Classes\Model;

class AdminController extends Admin{

    //add admin
    public function add($data){     
        $data['admin_username'] = $_SESSION['admin_username']; //kani sya pra mahibaw an kng knsay nag add ana na account      
        $this->addAdmin($data);
    }

    public function deactivate_user($id){
        $this->deactivate($id);
      
    }

    public function update_login_date($id){ 
        $this->updateLoginDate($id);
     
    }

    public function update_logout_date($id){
        $this->updateLogoutDate($id);
     
    }

    public function update_username($data){
        $data['admin_id'] = $_SESSION['admin_id'];   
        $this->updateUsername($data);
         
    }

    public function update_password($data){
        $data['admin_id'] = $_SESSION['admin_id'];
        $data['username'] = $_SESSION['admin_username'];         
        $this->updatePassword($data);

    }

    
    public function delete_account($data){    
        $this->deactivate($data);

    }

}
