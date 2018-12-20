<?php 

/**
*	@version 1.0.0 
*	Connection for @filesource /../PDO/PURE/SELECT_WHERE_MULTIPILE_ROW.php
*/

include_once "__connection.php" ;

/**
*	PREPARE SQL
*/
$sql = $__CON -> prepare("SELECT * from phpDB WHERE s1=:s1 && s2=:s2 ");

/**
*	EXECUTE SQL WHERE
*/
$s1  =  "";
$s2  =  "";
$sql -> execute(['s1' => $s1 , 's2' => $s2 ]);

/**
*	PRINT ARRAY FOREACH
*
*	@example while ($row = $sql->fetch()) {}
*
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
