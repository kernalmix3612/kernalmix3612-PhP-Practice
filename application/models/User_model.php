<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//put your code here
class User_model extends CI_Model{

    // Log in
    public function login($username, $password){
        // Validate
        $this->db->where('username', $username);
        $this->db->where('password', $password);
        $result = $this->db->get('users');

        if($result->num_rows() == 1){
            return true;
        } else {
            return false;
        }
    }

    public function selectemployee($username){
        $this->db->select('*');
        $this->db->where('username', $username);
        $query = $this->db->get('users');
        return $query->result();
    }

    
    public function register($username, $email, $password, $secretquestion,$secretanswer)
    {
        //Get Max id
        $this->db->select_max('id');
        $result = $this->db->get('users')->result_array();
        foreach ($result as $row) {
            $data = array(
                'id' => (int)$row['id'] + 1,
                'username' => $username,
                'email' => $email,
                'password' => $password,
                'secretquestion'=> $secretquestion,
                'secretanswer'=> $secretanswer
            );
        }
        //Insert New Record
        $query = $this->db->insert('users', $data);
        //$this->send($email, $uid);
        return true;
    }
    
    public function googlelogin($userData){
        $this->db->where('email', $userData['email']);
        $googleresult = $this->db->get('googleusers');
        if($googleresult->num_rows() == 1){
            return true;
        } else {
            return false;
        }
    }

    public function googleregister($userData)//$gender,//$locale,//$picture)
    {
    //Get Max id
    $this->db->select_max('id');
    $result = $this->db->get('googleusers')->result_array();
    foreach ($result as $row) {
        $data = array(
            'id' => (int)$row['id'] + 1,
            //'oauth_provider' => $userData['$oauth_provider'],
            'oauth_uid' => $userData['oauth_uid'],
            'first_name' => $userData['first_name'],
            //'last_name' => $last_name,
            'email' => $userData['email'],
            //'gender' => $gender,
            //'locale' => $locale,
            //'picture' => $picture,
        );
    }
    //Insert New Record
    $query = $this->db->insert('googleusers', $data);
    //$this->send($email, $uid);
    return true;
}


    public function checkinfo($username){//userData
        $query = $this->db->select('*')->from('users')->where('username', $username)->get();
        return $query->result_array();
    }
    public function UpdateUserData($userDataArray){//updateUserData
        $this->db->where('username', $userDataArray['username']);
        $this->db->set('Birthday',$userDataArray['Birthday']);
        $this->db->set('email', $userDataArray['email']);
        $this->db->set('mobileNumber',$userDataArray['mobileNumber']);
        $this->db->update('users');
        return true;
    }
    public function checkans($username, $secretquestion, $secretanswer){
        $this->db->where('username', $username);
        $this->db->where('secretquestion', $secretquestion);
        $this->db->where('secretanswer', $secretanswer);
        $result = $this->db->get('users');
        if($result->num_rows() == 1){
            return true;
        } else {
            return false;
        }
    }
    public function updatepassword($userDataArray){
        //updateUserData
        $this->db->where('username', $userDataArray['username']);
        //$this->db->where('secretquestion', $userDataArray['secretquestion']);
        $this->db->set('password',$userDataArray['password']);
        $this->db->update('users');
    }

} 
?>
