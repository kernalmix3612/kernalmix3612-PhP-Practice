<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 //put your code here 
 class File_model extends CI_Model{

    // upload file
    public function upload($filename,$postTitle, $path, $username,$authorname){

        $data = array(
            'filename' => $filename,
            'postTitle'=> $postTitle,
            'path' => $path,
            'username' => $username,
            'authorname'=> $authorname

        );
        $query = $this->db->insert('files', $data);

    }

//     public function uploadfile($filename, $path, $username)
//     {
//
//         $data = array(
//             'filename' => $filename,
//             'path' => $path,
//             'username' => $username,
//             //'$authorname' => $authorname
//
//         );
//         $query = $this->db->insert('files', $data);
//     }

         function fetch_data($query)
    {
        if($query == '')
        {
            return null;
        }else{
            $this->db->select("*");
            $this->db->from("files");
            $this->db->like('filename', $query);
            $this->db->or_like('username', $query);
            $this->db->order_by('filename', 'DESC');
            return $this->db->get();
        }
    }
    /*function showalldata()
    {
        $this->db->select("*");
        $this->db->from("files");
        $this->db->order_by('filename', 'DESC');
        return $this->db->get();
    }*/

    public function capture_file(){ //get all file information
        $query = $this->db->get("files");
        return $query->result();
    }

    public  function add_file($filename,$authorname,$image){
        $data = array(
            'filename' => $filename,
            'authorname' => $authorname,
            'image' => $image
        );
        $this->db->insert('uploadfile',$data);//Uploaded file
        return true;
    }

    function likecount($filename){
        $query = $this->db->select('likecount')->from('files')->where('filename', $filename)->get();
        return $query->result_array();
    }

    function presslike($Arrayfileupdate)
    {
        $this->db->where("filename",$Arrayfileupdate['filename']);
        $this->db->set('likecount',$Arrayfileupdate['likecount']);
        return $this->db->get();
    }
}
