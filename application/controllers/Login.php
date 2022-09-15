<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class login extends CI_Controller {
	public function index()
	{
		$data['error']= "";
		$this->load->helper('form');
		$this->load->library('google');
		$this->load->helper('url');
		if(isset($_GET['code'])){
	
			// Authenticate user with google
			if($this->google->getAuthenticate()){
			
				// Get user info from google
				$gpInfo = $this->google->getUserInfo();
				
				// Preparing data for database insertion
				//$userData['oauth_provider'] = 'google';
				$userData['oauth_uid'] 		= $gpInfo['id'];
				$userData['first_name'] 	= $gpInfo['given_name'];
				//$userData['last_name'] 		= $gpInfo['family_name'];
				$userData['email'] 			= $gpInfo['email'];
				//$userData['gender'] 		= !empty($gpInfo['gender'])?$gpInfo['gender']:'';
				//$userData['locale'] 		= !empty($gpInfo['locale'])?$gpInfo['locale']:'';
				//$userData['picture'] 		= !empty($gpInfo['picture'])?$gpInfo['picture']:'';//Userdata
				
				// Insert or update user data to the database
				//$userID = $this->user->checkUser($userData);//TODO改成自己的Update
				if(!$this->session->userdata('logged_in')){//如果沒有登入session
					if(!$this->user_model->googlelogin($userData)){//如果Loging傳的值是false
						$this->user_model->googleregister($userData);//start register
						$data['error'] = "<div class=\"alert\" role=\"alert\"> Account has been registered, Please log in</div>";
						$this->load->view('login', $data);
						echo " Your registor is Success";
						//if($this->user_model->googleregister($userData)){//if register success
							//$data['error'] = "<div class=\"alert\" role=\"alert\"> Account has been registered, Please log in</div>";
							//回到登入介面
						//} else{
							//$data['error'] = "<div class=\"alert\" role=\"alert\"> Account has not success</div>";
						//}
						// Store the status and user profile info into session
						//$this->session->set_userdata('loggedIn', true);
						//$this->session->set_userdata('userData', $userData);
					} else {
						$user_data = array(
							'username' => $userData['first_name'],
							'logged_in' => true 	//create session variable
						);
						$this->session->set_userdata($user_data); //set user status to login in session
						$this->load->view('welcome_message'); //if user already logined show main page
					}
				}else{
					$this->load->view('welcome_message');
				}
				//TODO新增驗證（如果沒有就新增到資料庫，有的話就驗證）
				
				
				// Redirect to profile page
				redirect('login');//TODO改成Welcome試試
				
			}
		} 
				
		// Google authentication url
		$data['loginURL'] = $this->google->loginURL();
		$this->load->view('template/header',$data);
		if (!$this->session->userdata('logged_in'))//check if user already login
		{	
			// Load google login view
			//$this->load->view('user_authentication/index',$data);
			if (get_cookie('remember')) { // check if user activate the "remember me" feature  
				$username = get_cookie('username'); //get the username from cookie
				$password = get_cookie('password'); //get the username from cookie
				if ( $this->user_model->login($username, $password) )//check username and password correct
				{
					$user_data = array(
						'username' => $username,
						'logged_in' => true 	//create session variable
					);
					$this->session->set_userdata($user_data); //set user status to login in session
					$this->load->view('welcome_message'); //if user already logined show main page
				}
			}else{
				$this->load->view('login', $data);	//if username password incorrect, show error msg and ask user to login
			}
		}else{
			$this->load->view('welcome_message'); //if user already logined show main page
		}
		$this->load->view('template/footer');
	}
	public function check_login()
	{
		$this->load->model('user_model_mongodb');		//load user model
		$data['error']= "<div class=\"alert alert-danger\" role=\"alert\"> Incorrect username or passwrod!! </div> ";
		$this->load->helper('form');
		$this->load->helper('url');
		$this->load->view('template/header');
		$username = $this->input->post('username'); //getting username from login form
		$password = $this->input->post('password'); //getting password from login form
		$remember = $this->input->post('remember'); //getting remember checkbox from login form
		if(!$this->session->userdata('logged_in')){	//Check if user already login
			$usercount = $this->user_model->selectemployee($username);
			if (count($usercount)>0)//check username and password
			{
				$userpassword = $usercount[0]->password;
				if(password_verify($password,$userpassword)){
					$user_data = array(
						'username' => $username,
						'logged_in' => true 	//create session variable
					);
					if($remember) { // if remember me is activated create cookie
						set_cookie("username", $username, time() + 99 * 365 * 24 * 3600); //set cookie username
						set_cookie("password", $password, time() + 99 * 365 * 24 * 3600); //set cookie password
						set_cookie("remember", $remember, time() + 99 * 365 * 24 * 3600); //set cookie remember
					}	
					$this->session->set_userdata($user_data); //set user status to login in session
					redirect('login'); // direct user home page			
				} else {
					echo "Please check your login information";
					redirect('login');
				}
			}else
			{
				$this->load->view('login', $data);	//if username password incorrect, show error msg and ask user to login
			}
		}else{
			{
				redirect('login'); //if user already logined direct user to home page
			}
		$this->load->view('template/footer');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('logged_in'); //delete login status
		redirect('login'); // redirect user back to login
	}
}
?>