<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'init.php';

$user = new User();

$i = $_GET['email'];
$result = $user->getAllEmail();
foreach ($result as $r){
    $p[] = $r['email'];
}


if($i){
    
    if(in_array($i, $p)){
        echo "Already Registered!";
    }else{
        echo "";
    }
}
?>