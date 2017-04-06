<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './init.php';

$jobs = new Jobs();

$template = new Template('./templates/jobsT.php');

$template->jobs = $jobs->getAllJobs();

echo $template;

?>