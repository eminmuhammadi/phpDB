<?php
/**
*	Connection for @filesource /../PDO/PURE/create.php
*/
include_once "__connection.php" ;


/**
*	@version 1.0.0  CREATE TABLE
*/ 

$param=[

	"sql"=>"CREATE TABLE IF NOT EXISTS phpDB (id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,s1 VARCHAR(32) NULL,s2 VARCHAR(32) NULL,s3 VARCHAR(32) NULL,s4 VARCHAR(32) NULL,s5 VARCHAR(32) NULL,s6 VARCHAR(32) NULL)"

];
       	/**
       	*	 Execute SQL
       	*/     
    	mysqli_query($__CON, $param['sql']);