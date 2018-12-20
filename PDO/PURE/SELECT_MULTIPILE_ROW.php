<?php 

/**
*	@version 1.0.0 
*	Connection for @filesource /../PDO/PURE/SELECT_MULTIPILE_ROW.php
*/

include_once "__connection.php" ;

/**
*	PREPARE SQL
*/
$sql = $__CON -> prepare("SELECT * from phpDB");

/**
*	EXECUTE SQL
*/
$sql -> execute();

/**
*	PRINT ARRAY FOREACH
*/
foreach ($sql as $row) {
 echo "<table><tr>
 		   <td>".$row['id']."</td>
 		   <td>".$row['s1']."</td>
           <td>".$row['s2']."</td>
           <td>".$row['s3']."</td>
           <td>".$row['s4']."</td>
           <td>".$row['s5']."</td>
           <td>".$row['s6']."</td>
      </tr></table>"; 
}