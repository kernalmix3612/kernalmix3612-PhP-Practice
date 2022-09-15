<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment_model extends CI_Controller {
    public function capture_comment(){ //get all file information
        $query = $this->db->get("comment");
        return $query->result();
    }
}
