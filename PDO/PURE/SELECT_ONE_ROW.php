<?php 

/**
*	@version 1.0.0 
*	Connection for @filesource /../PDO/PURE/SELECT_ONE_ROW.php
*/

include_once "__connection.php" ;

/**
*	PREPARE SQL
*/
$sql = $__CON -> prepare("SELECT * from phpDB LIMIT 1");

/**
*	EXECUTE SQL
*/
$sql -> execute();

/**
*	PRINT ARRAY
*/
$row = $sql-> fetch();
print("<pre>".
		print_r($row,true)
	         ."</pre>");