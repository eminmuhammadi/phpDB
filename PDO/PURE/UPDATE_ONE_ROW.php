<?php 

/**
*   @version 1.0.0 
*   Connection for @filesource /../PDO/PURE/UPDATE_ONE_ROW.php
*/

include_once "__connection.php" ;

/**
*   UPDATE ROW
*/
$row = [
/**
*	USED IN WHERE 
*/
	'id' => '0',
/**
*	USED UPDATE
*/
    's1' => 's2',
    's2' => 's2',
    's3' => 's3',
    's4' => 's4',
    's5' => 's5',
    's6' => 's6'        
];
/**
*   SQL
*/
$sql = "UPDATE phpDB SET s1=:s1 , s2=:s2 , s3=:s3 , s4=:s4 , s5=:s5 ,s6=:s6 WHERE id=:id ";

/**
*   PREPARE AND EXECUTE
*/
$statement = $__CON->prepare($sql)->execute($row);