<?php 

/**
*	@version 1.0.0 
*	Connection for @filesource /../PDO/PURE/DELETE_ONE_ROW.php
*/

include_once "__connection.php" ;

/**
*	WHERE 
*/
$where = ['id' => 1];

/**
*	PREPARE AND EXECUTE
*/
$__CON->prepare("DELETE FROM phpDB WHERE id=:id")->execute($where);