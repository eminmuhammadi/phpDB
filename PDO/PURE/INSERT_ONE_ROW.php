<?php 

/**
*	@version 1.0.0 
*	Connection for @filesource /../PDO/PURE/INSERT_ONE_ROW.php
*/

include_once "__connection.php" ;

/**
*	INSERT ROW
*/
$row = [
    's1' => 's1',
    's2' => 's2',
    's3' => 's3',
    's4' => 's4',
    's5' => 's5',
    's6' => 's6'        
];

/**
*	PREPARE SQL AND EXECUTE
*/
$sql    = "INSERT INTO phpDB SET s1=:s1 , s2=:s2 , s3=:s3 , s4=:s4 , s5=:s5 ,s6=:s6 ";
$statement = $__CON -> prepare($sql) -> execute($row);     

/**
*   GET LAST INSERT ID
*/
if ($statement) {
    $__id = $__CON->lastInsertId();
    echo $__id;
}               