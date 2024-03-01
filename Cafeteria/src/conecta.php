<?php

    $user = 'root';
    $pass = '';

    $char = array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET CHARACTER SET utf8'
    );

    $pdo = new PDO('mysql:host=localhost;dbname=serenatto', $user, $pass, $char);
?>