<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './init.php';

$template = new Template('./templates/loginT.php');
$template2 = new Template('./templates/Home.php');
$user = new User();
if($out=$user->loginVerify()){
    $un = $_SESSION['username'];
    //var_dump($_SESSION);
    
    $template2->authmessage = "Hello!, ".$un.", <br /> Welcome! You have successfully logged in! ";
    echo $template2;
}else{
    $template->errm = "Either username or password was incorrect. Try Again! ";
    echo $template;
}




?>