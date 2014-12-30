<?php

    $op = $_SERVER['SERVER_NAME'];
    switch($op){
        case 'local.rg-guild.eu':
            $host = 'localhost';
            $dbname = 'raging-ghoul-v1';
            $user = 'root';
            $pass = '';
            break;
        case 'www.rg-guild.eu':
        case 'rg-guild.eu':
            $host = 'rgv1.sql-pro.online.net';
            $dbname = 'rgv1';
            $user = 'rgv1';
            $pass = 'Cc12381321';
            break;
    }
    $db = new PDO('mysql:host='. $host . ';dbname=' . $dbname, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $db->exec("SET CHARACTER SET utf8");
    
?>