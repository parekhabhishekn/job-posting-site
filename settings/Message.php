<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Message{
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function addMessage(){
        if(isset($_POST)){
            $sender = $_POST['sender'];
            $receiver = $_POST['receiver'];
            $job = $_POST['job'];
            $content = $_POST['content'];
            //var_dump($_POST);
            if(strpos($content,"'")!==FALSE){
                $content = str_replace("'", "\'", $content);
            }
            
            $query ="INSERT INTO `message`(`id_message`, `id_jobs`, `id_sender`, `id_reciever`, `contents`,`mRead`) VALUES (NULL,$job,:sender,$receiver,:content,0)";
            
            $this->db->query($query);
            //$this->db->bind(':job', $job);
            $this->db->bind(':sender', $sender);
            //$this->db->bind(':receiver', $receiver);
            $this->db->bind(':content', $content);
            
            $this->db->execute();
            
            
        }
    }
    
    public function getSentMessages(){
        
        
    }
    
    
    
    
    
    
    
}


?>

