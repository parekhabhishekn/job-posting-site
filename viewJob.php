<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './init.php';

$id = $_GET['id'];

$job = new Jobs();
$user = new User();

$template = new Template('./templates/jobT.php');

$template->job = $job->getJob($id);
$template->poster = $user->getUserName($template->job['id_employer']);

echo $template;

?>
