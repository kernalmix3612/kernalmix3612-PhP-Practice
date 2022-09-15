<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ShowPicture extends CI_Controller{
    //public function showpicture(){
        //$this -> load -> model('file_model');
        //$data = $this -> file_model->showalldata();
        //if(!$data == null){
            //shuffle($data);
            //echo "<img src='$data[i]' style='width: 150px; height:50px;'>";//send back result
        //}else{
            //echo "";// no result found
        //}
    //}
    public  function showpic(){
        $this->load->view('showpicture');
        $this->load->model('file_model');
        $pic = $this-> file_model->showpic();
        //while ($row = mysqli_fetch_array($pic) )
        if(!$pic==null)
        {
            //TODO fetch id
            //TODO fetch filename
            //TODO fetch path
            //TODO username
            //TODO Likecount
        }else{
            echo  ""; // no result found
        }
    }

    public function add_comment(){
		if($this->input->post('submit')){
		$this->load->model('Comment_model');
		
		$username=$this->input->post('username');
		$content=$this->input->post('content');
		$this->Comment_model->add_comment($username,$content);
		echo "successful";
		}
		}
}
?>