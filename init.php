<?php
session_start();


require_once('./settings/settings.php');
require_once('./settings/Template.php');
require_once('./settings/Database.php');
require_once('./settings/Jobs.php');
require_once('./settings/User.php');
require_once('./settings/Message.php');

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function __autoload($class){
    require_once '../settings/'.$class.'.php';
}



?>