<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'init.php';

$user = new User();

$i = $_GET['id'];
$result = $user->getAllUsername();
foreach ($result as $r){
    $p[] = $r['username'];
}


if($i){
    
    if(in_array($i, $p)){
        echo "Not Available, Please try different username.";
    }else{
        echo "";
    }
    
    
}


?>