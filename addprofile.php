<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './init.php';


$user = new User();

$user->updateProfile();
$template = new Template('./templates/home.php');
$template->confirm = "Profile Updated Successfully";

echo $template;

?>