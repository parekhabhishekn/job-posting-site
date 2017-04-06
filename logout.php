<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './init.php';


$template = new Template('./templates/Home.php');

unset($_SESSION['username']);
unset($_SESSION['role']);
unset($_SESSION);



echo $template;




?>