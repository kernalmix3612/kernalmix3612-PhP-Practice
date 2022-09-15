<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Upload extends CI_Controller
{
    public function index()
    {
		$this->load->view('template/header'); 
    	if (!$this->session->userdata('logged_in'))//check if user already login
		{	
			if (get_cookie('remember')) { // check if user activate the "remember me" feature  
				$username = get_cookie('username'); //get the username from cookie
				$password = get_cookie('password'); //get the username from cookie
				if ( $this->user_model->login($username, $password) )//check username and password correct
				{
					$user_data = array('username' => $username,'logged_in' => true );
					$this->session->set_userdata($user_data); //set user status to login in session
					$this->load->view('file',array('error' => ' ')); //if user already logined show upload page
				}
			}else{
				redirect('login'); //if user already logined direct user to home page
			}
		}else{
			$this->load->view('file',array('error' => ' ')); //if user already logined show login page
		}
		$this->load->view('template/footer');
    }
    public function do_upload() {
		$this->load->model('file_model');
        $config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'jpg|mp4|mkv|png|gif';
		$config['max_size'] = 100000;
		$config['max_width'] = 6000;
		$config['max_height'] = 4000;
        $filename=$this->input->post('filename');
		$postTitle=$this->input->post('postTitle');
        $authorname=$this->input->post('authorname');
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('userfile')) {
            $this->load->view('template/header');
            $data = array('error' => $this->upload->display_errors());
            $this->load->view('file', $data);
            $this->load->view('template/footer');
        } else {
			$this->file_model->upload($filename, $postTitle, $this->upload->data('full_path'),$this->session->userdata('username'),$authorname);
            $this->load->view('template/header');
            $this->load->view('file', array('error' => 'File upload success. <br/>'));
            $this->load->view('template/footer');
        }
	}
//    public function updatefile(){//update your work
//        /*$this->load->model('File_model');
//        $filename=$this->input->post('filename');
//        $authorname=$this->input->post('authorname');
//        $image=$this->input->post('image');
//        $this->File_model->add_file($filename,$authorname,$image);
//        $this->index();
//        echo "success";*/
//    }
    public function upload_comment(){

    }
}

