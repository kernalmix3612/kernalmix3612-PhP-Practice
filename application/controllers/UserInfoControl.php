<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class UserInfoControl extends CI_Controller
{
    public function index()
    {
        $this->load->database();
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->view('template/header');
        if ($this->session->userdata('logged_in'))//check if user already login
        {
            $this->load->model("User_model");
            $username = $_SESSION['username'];
            //$this->session->set_userdata($user_data); //set user status to login in session
            $data = $this->user_model->checkinfo($username);
            $this->load->view('UserInfo', $data[0]);
            
        }else{
                redirect('login'); //if user already logined direct user to home page
            }
        $this->load->view('template/footer');
    }

    public function updatePersonalinfo()
    {
        $this->load->model('user_model');
        $this->load->helper('form');
        $this->load->helper('url');
        $username = $this->input->post('username');
        $Birthday = $this->input->post('Birthday');
        $mobileNumber = $this->input->post('mobileNumber');
        $email = $this->input->post('email');
        $userarry = array(
            'username' => $username,
            'Birthday' => $Birthday,
            'email' => $email,
            'mobileNumber'=>$mobileNumber
        );
        $this->user_model->updateUserData($userarry);
        $this->index();
        echo "success";
    }
    public function showuserinfomation(){
        $this->load->model('user_model');
        $this->load->helper('form');
        $this->load->helper('url');

    }

}

