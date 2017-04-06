<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './init.php';

$template = new Template('./templates/viewMessageT.php');
$id = $_GET['id'];

$user = new User();
$template->messages = $user->getMessage($id);
$user->setRead($id);
//$template->newMessages = $user->getNewMessageCount();

echo $template;

?>
