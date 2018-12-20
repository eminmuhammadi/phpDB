<?php 

/**
*   @version 1.0.0 
*   Connection for @filesource /../PDO/PURE/INSERT_MULTIPILE_ROW.php
*/

include_once "__connection.php" ;

/**
*   INSERT ROW
*/
$rows = [];

$rows[] = [
    's1' => 's1-1',
    's2' => 's2-1',
    's3' => 's3-1',
    's4' => 's4-1',
    's5' => 's5-1',
    's6' => 's6-1'];

$rows[] = [
    's1' => 's1-2',
    's2' => 's2-2',
    's3' => 's3-2',
    's4' => 's4-2',
    's5' => 's5-2',
    's6' => 's6-2'];

/**
*   PREPARE SQL
*/
$sql = "INSERT INTO phpDB SET s1=:s1 , s2=:s2 , s3=:s3 , s4=:s4 , s5=:s5 ,s6=:s6 ";
$statement = $__CON -> prepare($sql);     

/**
*   EXECUTE SQL
*/
foreach ($rows as $row) {
    $statement -> execute($row);
}

/**
*   GET INSERT ID
*/
if ($statement) {
    $__id = $__CON->lastInsertId();
    echo $__id;
} 