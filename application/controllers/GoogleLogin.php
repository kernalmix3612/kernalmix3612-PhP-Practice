<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class GoogleLogin extends CI_Controller{
    public function index(){
        $data['error']= "";
		$this->load->helper('form');
		$this->load->library('google');
		$this->load->helper('url');
        $data['loginURL'] = $this->google->loginURL();
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
    }
}
?>