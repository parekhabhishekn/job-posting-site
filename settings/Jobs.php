<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


class Jobs{
    
    
    private $db;
    
    function __construct() {
        
        
        $this->db = new Database();
    }
    
    
    public function getAllJobs(){
        $this->db->query('SELECT * FROM JOBS');
        
        $result= $this->db->resultset();
        //$res['id'] = $result['id_jobs'];
        //$res['desc'] = $result['description'];
        
        return $result;
        
    }
    
    public function getJob($id){
        $this->db->query('SELECT * FROM JOBS WHERE id_jobs = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }
    
    public function postJob(){
        if(isset($_POST) && isset($_SESSION)){
            $id_e = $_SESSION['id'];
            $type = $_POST['type_job'];
            $des = $_POST['description'];
            if(strpos($des,"'")!==FALSE){
                $des = str_replace("'", "\'", $des);
            }
            $title = $_POST['title'];
            if(strpos($title,"'")!==FALSE){
                $title = str_replace("'", "\'", $title);
            }
            
            $query = "INSERT INTO jobs (`id_jobs`, `id_employer`, `description`, `type_job`, `title`, `post_date`, `expire_date`) VALUES (NULL, :id, :des, :type, :title, CURRENT_TIMESTAMP, NULL)";
            $this->db->query($query);//:id, :des, :type, :title
            $this->db->bind(':id', $id_e);
            $this->db->bind(':des', $des);
            $this->db->bind(':type', $type);
            $this->db->bind(':title', $title);
            $this->db->execute();
            
        }
    }
    
    
    
    
    
    
    
}


?>