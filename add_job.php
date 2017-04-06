<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './init.php';

$job = new Jobs();
$job->postJob();
$template = new Template('./templates/Home.php');

$template->confirm = "Your Job post has been added to the pool!";

echo $template;


?>