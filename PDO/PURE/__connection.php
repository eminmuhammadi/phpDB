<?php
/**
*	
*	Connection for @filesource /../PDO/PURE/..
*	@version 1.0.0
*	
*/
$__HOSTNAME = '';
$__DATABASE = '';
$__USERNAME = '';
$__PASSWORD = '';
/**
* 	@example $__CHARSET=utf8mb4
*/
$__CHARSET  = 'utf8mb4'; 
/**
* 	@example $__COLLATE=utf8mb4_unicode_ci
*/
$__COLLATE  = 'utf8mb4_unicode_ci';
/**
* 	@example $__PORT=3306
*/
$__PORT    = '3306';
/**
*   Find Database
*/
$__FIND = "mysql:host=$__HOSTNAME;dbname=$__DATABASE;charset=$__CHARSET;port=$__PORT;";
/**
*	Options
*/
$__OPTIONS = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_PERSISTENT => false,
    PDO::ATTR_EMULATE_PREPARES => false,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES $__CHARSET COLLATE $__COLLATE"
];
/**
*	Database Connection		
*/

try {
    	$__CON = new PDO($__FIND, $__USERNAME, $__PASSWORD, $__OPTIONS);
} 

catch (PDOException $__ERROR) {
    	die('CONNECTION FAILED : [ERROR]---'. $__ERROR->getMessage().'---[/ERROR]');
}