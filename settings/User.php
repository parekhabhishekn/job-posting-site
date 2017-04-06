<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User{
    
    private $db;
    
    
    public function __construct() {
        $this->db = new Database();
    }
    
    public function getAllUsername(){
        $query="SELECT username FROM user_credentials";
        $this->db->query($query);
        return $this->db->resultset();
    }
    
    public function getAllEmail(){
        $query="SELECT email FROM user_information";
        $this->db->query($query);
        return $this->db->resultset();
    }
    
    public function getNewMessageCount(){
        $query = "SELECT count(id_message) as newMs FROM `message` WHERE id_reciever = :ui AND mRead=0 ORDER BY time_stamp DESC";
        $this->db->query($query);
        $this->db->bind(':ui', $_SESSION['id']);
        $result = $this->db->resultset();
        return $result;
    }
    
    public function getMessage($id){
        $query = "SELECT * FROM message WHERE id_message = $id";
        $this->db->query($query);
        //$this->db->bind(':ui', $id);
        //$this->db->execute();
        $result = $this->db->single();
        
        return $result;
    }
    
    public function setRead($id){
        $query = "UPDATE message SET `mRead` = '1' WHERE `message`.`id_message` = $id";
        $this->db->query($query);
        $this->db->execute();
    }
    
    
    public function getReceivedMessages(){
        $query = "SELECT * FROM `message` WHERE id_reciever = :ui ORDER BY time_stamp DESC";
        $this->db->query($query);
        $this->db->bind(':ui', $_SESSION['id']);
        $result = $this->db->resultset();
        return $result;
    }
    
    public function getProfile(){
        if(isset($_SESSION['role'])){
            if($_SESSION['role'] == 2){
                $id = $_SESSION['id'];
                $query = "SELECT * FROM jobseeker as j JOIN user_information as u ON j.id_user=u.id_user WHERE j.id_user =:ui";
                $this->db->query($query);
                $this->db->bind(':ui', $id);
                $result = $this->db->single();
                return $result;
            }else{
                $id = $_GET['id'];
                $query = "SELECT * FROM jobseeker as j JOIN user_information as u ON j.id_user=u.id_user WHERE j.id_user =:ui";
                $this->db->query($query);
                $this->db->bind(':ui', $id);
                $result = $this->db->single();
                return $result;
            }
        }else{
            return "";
        }
    }
    
    public function updateProfile(){
        if(isset($_POST)){
               $edu = $_POST['education'];
               $exp = $_POST['experience'];
               $gpa = $_POST['gpa'];
               $skills = $_POST['skills'];
               $id = $_SESSION['id'];
               
               $query = "SELECT * FROM jobseeker where id_user = $id";
               $this->db->query($query);
               $r = $this->db->single();
               if($r == null){
               
               
               
               $query = "INSERT INTO jobseeker (`id_user`, `education`, `experience`, `gpa`, `skills`) VALUES (:id, :edu, :exp, :gpa, :ski)";
               //:id, :edu, :exp, :gpa, :ski
               $this->db->query($query);
               $this->db->bind(':id', $id);
               $this->db->bind(':edu', $edu);
               $this->db->bind(':exp', $exp);
               $this->db->bind(':gpa', $gpa);
               $this->db->bind(':ski', $skills);
               
               $this->db->execute();
               
               }
               else{
               
               $query = "UPDATE `jobseeker` SET `education`=:edu,`experience`=:exp,`gpa`=:gpa,`skills`=:ski WHERE `id_user`=:id";
               //:id, :edu, :exp, :gpa, :ski
               $this->db->query($query);
               $this->db->bind(':id', $id);
               $this->db->bind(':edu', $edu);
               $this->db->bind(':exp', $exp);
               $this->db->bind(':gpa', $gpa);
               $this->db->bind(':ski', $skills);
               
               $this->db->execute();
               }
               
               
    
        }
    }
    
    
    public function loginVerify(){
        if(isset($_POST)){
            $username = $_POST['username'];
            $password = $_POST['password'];
            
            $query = "SELECT id_user,password FROM USER_CREDENTIALS WHERE username = :un";
            
            $this->db->query($query);
            $this->db->bind(':un', $username);
            //$this->db->bind(':pw', $password);
            
            $op = $this->db->single();
            
            
            if($this->db->rowCount() == 1 && password_verify($password,$op['password'])){
                
                session_start();
                
                $_SESSION['username'] = $username;
                
                $_SESSION['id'] = $op['id_user'];
                $_SESSION['role']=  $this->getUserRole((int)$_SESSION['id']);
                return $op;
            }
            else
                
                return 0;
            
        }
        
    }
    
    public function registerUser(){
        if(isset($_POST)){
            $username = $_POST['username'];
            
            
            $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            if(strpos($lastname,"'")!==FALSE){
                $lastname = str_replace("'", "\'", $lastname);
            }
            
            $email = $_POST['email'];
            if(strpos($email,"'")!==FALSE){
                $email = str_replace("'", "\'", $email);
            }
            
            $role = $_POST['role'];
            $citizen = $_POST['citizen'];
            $ethni = $_POST['ethnicity'];
            $dis = $_POST['disability'];
            $mil = $_POST['militry'];
            $phone = $_POST['phone'];
            $join_date = time();
            $address = $this->insertAddress();
            
            
            
            $inser_user_cred = "INSERT INTO USER_CREDENTIALS (`id_user`, `username`, `password`) VALUES (NULL, :un, :pw)";
            $this->db->query($inser_user_cred);
            $this->db->bind(":un", $username);
            $this->db->bind(":pw", $password);
            $this->db->execute();
            $id = $this->db->lastInsertId();
            //echo $id;
            $insert_user = "INSERT INTO user_information (`id_user`, `firstname`, `lastname`, `email`, `id_role`, `id_address`, `citizenship`, `ethinicity`, `disability`, `military_status`,  `phone_no`) VALUES (NULL,'".$firstname."','".$lastname."','".$email."','".$role."','".$address."','".$citizen."','".$ethni."','".$dis."','".$mil."','".$phone."' )";//:fn, :ln, :em, :rl, :addr, :ct, :et, :di, :mil,:ph)";
            $this->db->query($insert_user);
            //$this->db->bind(":id",NULL);//':fn', ':ln', ':em', ':rl', ':add', ':ct', ':et', ':di', ':mil', ':jd', ':ph'
            $this->db->bind(':fn',$firstname );
            $this->db->bind(':ln',$lastname );
            $this->db->bind(':em',$email );
            $this->db->bind(':rl',$role );
            $this->db->bind(':addr',$address );
            $this->db->bind(':ct',$citizen );
            $this->db->bind(':et',$ethni );
            $this->db->bind(':di',$dis );
            $this->db->bind(':mi',$mil );
            //$this->db->bind(":jd",$join_date );
            $this->db->bind(':ph',$phone );
            
            
            
            
            $this->db->execute();
            
            
            
            
            
            return $this->db->lastInsertId();
            
        }else{
            return 0;
        }
        
    }
    
    
    public function insertAddress(){
        if(isset($_POST)){
            $street = $_POST['street'];
            $city = ($_POST['city']);
            $state = $_POST['state'];
            $zip = $_POST['zip'];
            $country = $_POST['country'];
            
            
            
            
            $inser_address = "INSERT INTO ADDRESS (`id_address`, `street`, `city`, `state`, `zip`, `country`) VALUES (NULL, :str, :ct, :st, :zp, :c)";
            
            
            $this->db->query($inser_address);
            $this->db->bind(":str", $street);
            $this->db->bind(":ct", $city);
            $this->db->bind(":st", $state);
            $this->db->bind(":zp", $zip);
            $this->db->bind(":c", $country);
            $this->db->execute();
            
            
            return $this->db->lastInsertId();
            
        }else{
            return 0;
        }
    }
    
    public function getUserRole($id){
        $query = "SELECT id_role FROM user_information WHERE id_user=:ui";
        $this->db->query($query);
        $this->db->bind(':ui', $id);
        $r = $this->db->single();
        //var_dump($r);
        return $r['id_role'];
    }
    
    public function getUserName($id){
        $query = "SELECT username FROM user_credentials  WHERE id_user=:ui";
        $this->db->query($query);
        $this->db->bind(':ui', $id);
        $r = $this->db->single();
        return $r['username'];
    }
    
    
}


?>

