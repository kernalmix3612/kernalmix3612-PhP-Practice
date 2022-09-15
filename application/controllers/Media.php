<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Media extends CI_Controller
{
    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('media', array('error' => ' '));
        $this->load->view('template/footer');
    }
    public function SearchVideo($videoId)
    {
        $this->load->helper('cookie');
        $cookieVideo = array(
            'name' => 'mediaDetailId',
            'value' => $videoId,
            'expire' =>  86500,
            'secure' => false
        );
        $this->input->set_cookie($cookieVideo);
        $this->load->view('template/header');
        $this->load->view('videodetail');
        $this->load->view('template/footer');
    }

}