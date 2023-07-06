<?php

define('DB_HOST', 'localhost:3306');
define('DB_NAME', 'supermercado');
define('DB_USER', 'root');
define('DB_PASSWORD', '');

// Connect to the database
$db = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASSWORD);
