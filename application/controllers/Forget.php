<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forget extends CI_Controller {

	public function index()
	{
        $data['error']= "";
        $this->load->helper('form');
        $this->load->helper('url');
		$this->load->view('template/header');
		$this->load->view('forget');
		$this->load->view('template/footer');

	}

	public function updatepassword()
 {
	 $this->load->model('User_model');
     $this->load->helper('form');
     $this->load->helper('url');
     $username=$this->input->post('username');
     $secretquestion = $_POST['secretquestion'];
     $secretanswer = $this->input->post('secretanswer');
    //  $username = $this->input->post('username');
    //  $secretquestion = $this->input->post('secretquestion');
	//  $password = $this->input->post('password');
    if($this->User_model->checkans($username,$secretquestion,$secretanswer)){
        $data['username']=$this->input->post('username');
        $password=$this->input->post('password');
        $data['password']=password_hash($password,PASSWORD_DEFAULT);//passowrd_hash
        $this->User_model->updatepassword($data);
        echo "success";
        $this->index();
    }else{
        echo "Please check your secure Answer";
        $this->index();
    }
    //  $data['username']=$this->input->post('username');
    //  $data['password']=$this->input->post('password');
     //$password=$this->input->post('password');//passowrd_hash
     //$data['password']=password_hash($password,PASSWORD_DEFAULT);//passowrd_hash
    //  $data['secretanswer']=$this->input->post('secretanswer');
    

    //  $this->User_model->updatepassword($data);
	//  echo "success";
    //  $this->index();
 }
}

?>