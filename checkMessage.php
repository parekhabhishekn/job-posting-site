<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include 'init.php';

$user = new User();


$result = $user->getNewMessageCount();




    
    if($result[0]['newMs']!=0){
        echo "(".$result[0]['newMs'].")";//echo "($result)";
    }else{
        echo ""; //echo "()";
    }
?>
