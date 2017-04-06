<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './init.php';
$msg="";
if(isset($_POST)){
    if(isset($_POST['search']) && ( strpos($_POST['search'],' OR ')=== FALSE)&& ( strpos($_POST['search'],"'")=== FALSE)){
        $item = $_POST['search'];
        $db = new Database();
        
        if($_SESSION['role']==1){
            if(isset($_POST['crit'])){
            $crit = $_POST['crit'];
            
            $query="SELECT * FROM jobseeker WHERE ";
            if($crit == 'gpa'){
                if(is_numeric($item)){
                    $query.="gpa >= $item";
                }else{
                    goto m;
                }
            }
            if($crit == 'skills'){
                
                    $query.="skills like '%$item%'";
                
            }
            if($crit == 'exp'){
                if(is_numeric($item)){
                    $query.="experience >= $item";
                }else{
                    goto m;
                }    
            }
            if($crit == 'edu'){
                $query.="education like '%$item%'";
            }
            
            $db->query($query);
            //$db->bind(':it', $item);
            $db->execute();
        
            $result = $db->resultset();
            $user = new User();
            $msg.="Search result returned following....<br /><ol>";
            foreach($result as $r){
               $msg.="<li> <a href='viewProfile.php?id={$r['id_user']}' > ".$user->getUserName($r['id_user'])."</a> - GPA: ".$r['gpa']." - skills: ".$r['skills']."</li>";
            }
            $msg.="</ol>";
            }
            else{
                m:
                    $msg="Sorry! You must select a criteria to search.";
            }
        }else{
            
            $query="SELECT * FROM JOBS WHERE title like '%{$item}%' OR description like '%{$item}%' ";
            $db->query($query);
            //$db->bind(':it', $item);
            //$db->bind(':it2', $item);
            $db->execute();
        
            $result = $db->resultset();
            $msg.="Search result returned following....<br /><ol>";
            foreach($result as $r){
                $msg.="<li><a href='viewJob?id={$r['id_jobs']}' >".$r['title']."</a></li>";
            }
            $msg.="</ol>";
        }
        
        
    }else{
        if(isset($_POST['search'])){
            $msg="Sorry! No result for <b>{$_POST['search']}</b>.";
        }
    }
}


$template = new Template('./templates/searchT.php');
$template->result = $msg;
echo $template;

?>