<?php
/**
*	Connection for @filesource /../PDO/PURE/insert.php
*/
include_once "__connection.php" ;


/**
*	@version 1.0.0  INSERT TABLE
*/ 

$param=[

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
      $sql ="INSERT INTO phpDB (s1 , s2 , s3 , s4 , s5 , s6) VALUES ('".$param['s1']."','".$param['s2']."','".$param['s3']."','".$param['s4']."','".$param['s5']."','".$param['s6']."')";
       	/**
       	*	 Execute SQL
       	*/     
    	mysqli_query($__CON, $sql);