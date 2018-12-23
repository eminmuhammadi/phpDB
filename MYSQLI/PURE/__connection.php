<?php

/**
*	
*	Connection for @filesource /../MYSQLI/PURE/..
*	@version 1.0.0
*	
*/
$__HOSTNAME = '';
$__DATABASE = '';
$__USERNAME = '';
$__PASSWORD = '';
/**
* 	@example $__PORT=3306
*/
$__PORT    = '3306';
/**
*   Find Database
*/
$__CON = new mysqli($__HOSTNAME, $__USERNAME  , $__PASSWORD  , $__DATABASE , $__PORT);
/**
*   Error Message
*/
if (mysqli_connect_errno()){
	die(mysqli_connect_error());
}