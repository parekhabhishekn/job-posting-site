<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include_once 'Database.php';

$database = new Database();

$database->query('SELECT * FROM users WHERE id_users=:id');
$database->bind(':id', '2');
$uname = $database->single();



echo "<h1> {$uname['username']},{$uname['id_users']},{$uname['password']} </h1>";



?>