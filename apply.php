<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './init.php';


$template = new Template('./templates/messageT.php');

$message = new Message();
//$message->addMessage();

echo $template;

?>