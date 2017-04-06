<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './init.php';

$user = new User();

$template = new Template('./templates/viewProfileT.php');



$template->confirm = $user->getProfile();

echo $template;
?>