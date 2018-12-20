<?php 

/**
*	@version 1.0.0 
*	Connection for @filesource /../PDO/PURE/DELETE_MULTIPILE_ROW.php
*/

include_once "__connection.php" ;

/**
*	PREPARE AND EXECUTE
*/
$__CON->prepare("DELETE FROM phpDB")->execute();