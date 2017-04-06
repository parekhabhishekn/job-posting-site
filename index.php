<?php
include './init.php';
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$template = new Template('./templates/home.php');

//$template->message = "A message from controller";
$template->confirm = "<h1>Welcome to JobALoo</h1><p>We are JobALoo, your ultimate destination to search for job. Now, never be afraid of pesky boss; We are here, to give you your dream job.";
echo $template;
?>



