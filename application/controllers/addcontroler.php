<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mediacontroler extends CI_Controller {

    public function index()
    {
        $this->load->view('template/header');
        $this->load->model('File_model');
        $file=$this->File_modle->capture_file();
        $dirname = $file['path'];
        //$support_array = array('jpg','mp4','mkv','png','gif')
        $result="";
        foreach ($file as $allfile){
          echo '<img src="'.$dirname.'" /><br />';
          //$data['result']=$result;
        }
        $this->load->view("videodetail", $data);
        $this->load->view('template/footer');
    }



    public function insertfile(){
        $this->load->model('File_model');

        $filename=$this->input->post('filename');
        $authorname=$this->input->post('authorname');
        $image=$this->input->post('image');
        $this->File_model->add_file($filename,$authorname,$image);
        $this->index();
        echo "success";
    }
    public function newcourse() {
        $this->load->view('template/header');
        $this->load->view('media');
        $this->load->view('template/footer');
    }
}

// public function index()
// {
// 	$this->load->view('template/header');
// 	$this->load->view('course');
//     $this->load->view('template/footer');


//     if ($this->input->post('add')){

//         $data['cid']=$this->input->post('cid');
//         $data['coursename']=$this->input->post('coursename');
//         $data['score']=$this->input->post('score');
//         $data['img']=$this->input->post('img');

//        $result= $this->Course_model->add_course($data);
//        if ($result == true ){
//            echo 'successful';
//        }else{
//            echo 'fail';

//        }

//         }

// }

// public function do_upload() {
// 	$this->load->model('File_model');
//     $config['upload_path'] = './uploads/';
// 	$config['allowed_types'] = 'jpg|mp4|mkv|png';
// 	$config['max_size'] = 10000;
// 	$config['max_width'] = 1024;
// 	$config['max_height'] = 768;
// 	$this->load->library('upload', $config);
// 	if ( ! $this->upload->do_upload('userfile')) {
//         $this->load->view('template/header');
//         $data = array('error' => $this->upload->display_errors());
//         $this->load->view('file', $data);
//         $this->load->view('template/footer');
//     } else {
// 		$this->File_model->upload($this->upload->data('file_name'), $this->upload->data('full_path'),$this->session->userdata('username'));
//         $this->load->view('template/header');
//         $this->load->view('file', array('error' => 'File upload success. <br/>'));
//         $this->load->view('template/footer');
//     }
// }
?>