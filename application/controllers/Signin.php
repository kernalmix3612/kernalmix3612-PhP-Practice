<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Signin extends CI_Controller {
	public function index()
	{	
		$data['error']= "";
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('template/header');
		$this->load->view('signin');
		$this->load->view('template/footer');
    } 
    //sign in function
	public function registeration()
	{
		$this->load->model('user_model');
		$data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Password should contain at lest 4 letter and a number</div>";
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('template/header');

		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$hashpassword = password_hash($password,PASSWORD_DEFAULT);
		$secretquestion = $_POST['secretquestion'];
		$secretanswer = $this->input->post('secretanswer');
		
		//data[username] = $this->input->post('username');

		//data[secretquestion] = $this->input->post('secretquestion');
		
		//$data['password']=password_hash($password,PASSWORD_DEFAULT);//passowrd_hash

		//Passsword Validation
		if (strlen($password) < 5 or !(1 === preg_match('~[0-9]~', $password))) {
			$this->load->view('signin', $data);
		} else if (!(filter_var($email, FILTER_VALIDATE_EMAIL))) {
			$data['error'] = "<div class=\"alert alert-danger\" role=\"alert\"> Not a valid email</div>";
			$this->load->view('signin', $data);
		} else {
			if ($this->user_model->register($username, $email, $hashpassword,$secretquestion,$secretanswer)) {
				$data['error'] = "<div class=\"alert\" role=\"alert\"> Account has been registered, Please log in</div>";
				$this->load->view('login', $data);
			} else{
                $data['error'] = "<div class=\"alert\" role=\"alert\"> Account has not success</div>";
            }
		}
		$this->load->view('template/footer');
	}
}
?>