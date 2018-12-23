<?php
/**
*	Connection for @filesource /../PDO/PURE/update.php
*/
include_once "__connection.php" ;


/**
*	@version 1.0.0  UPDATE TABLE
*/ 

$param=[

	"id"=>" ",
	"s1"=>" ",
	"s2"=>" ",
	"s3"=>" ",
	"s4"=>" ",
	"s5"=>" ",
	"s6"=>" "

];
       	/**
       	*	 Prepare SQL
       	*/ 
    	$sql="UPDATE phpDB SET s1='".$param['s1']."',s2='".$param['s2']."',s3='".$param['s3']."',s4='".$param['s4']."',s5='".$param['s5']."',s6='".$param['s6']."' WHERE  id='".$param['id']."'";
       	/**
       	*	 Execute SQL
       	*/     
    	mysqli_query($__CON, $sql);