<?php
/**
*	Connection for @filesource /../PDO/PURE/delete.php
*/
include_once "__connection.php" ;


/**
*	@version 1.0.0  DELETE TABLE
*/ 

$param=[

	"id"=>" "

];
       	/**
       	*	 Prepare SQL
       	*/ 
      $sql ="DELETE from phpDB WHERE id='".$param['id']."'";
       	/**
       	*	 Execute SQL
       	*/     
    	mysqli_query($__CON, $sql);