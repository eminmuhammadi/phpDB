<?php
/**
*	
*	Connection for @filesource /../PDO/PURE/..
*	@version 1.0.0
*	
*/
$__HOSTNAME = 'localhost';
$__DATABASE = 'pdo';
$__USERNAME = 'emiga';
$__PASSWORD = 'emiga';
/**
* 	@example $__CHARSET=utf8mb4
*/
$__CHARSET  = 'utf8mb4'; 
/**
* 	@example $_COLLATE=utf8mb4_unicode_ci
*/
$_COLLATE  = 'utf8mb4_unicode_ci';
/**
*   Find Database
*/
$__FIND = "mysql:host=$__HOSTNAME;dbname=$__DATABASE;charset=$__CHARSET";
/**
*	Options
*/
$__OPTIONS = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => false,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $__CHARSET COLLATE $_COLLATE"
];
/**
*	Database Connection		
*/

try {
    	$__CON = new PDO($__FIND, $__USERNAME, $__PASSWORD, $__OPTIONS);
} 

catch (PDOException $__ERROR) {
    	echo 'CONNECTION FAILED : [ERROR]---'. $__ERROR->getMessage().'---[/ERROR]';
}