<?php

/**
*	phpDB
*	@version 1.0.0
*	@author Emin Muhammadi
*   @filesource /../PDO/OOP/class.php
*/


/**
*	Autoload Class
*/
spl_autoload_register(function ($class) {
    include_once $class . '.class.php';
});


/**
*	Creating Object of Class
*/
$obj= new phpDB;


/**
*	Execute SQL
*	@example phpDB_execute($sql)
*/
$obj->phpDB_execute("CREATE TABLE IF NOT EXISTS phpDB (id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,s1 VARCHAR(32) NULL,s2 VARCHAR(32) NULL,s3 VARCHAR(32) NULL,s4 VARCHAR(32) NULL,s5 VARCHAR(32) NULL,s6 VARCHAR(32) NULL)");


/**
*	Select All with limit Database Function
*	@example phpDB_select($limit)
*/
$obj->phpDB_select("100");


/**
*	Select using ID Database Function
*	@example phpDB_selectID($id)
*/
$obj->phpDB_selectID("1");


/**
*	Delete using ID Database Function
*	@example phpDB_delete($id)
*/
$obj->phpDB_delete("1");


/**
*	Update using ID and Values Database Function
*	@example phpDB_update($id,$s1,$s2,$s3,$s4,$s5,$s6)
*/
$obj->phpDB_update("1","s1","s2","s3","s4","s5","s6");


/**
*	Insert into Database Function
*	@example phpDB_insert($s1,$s2,$s3,$s4,$s5,$s6)
*/
$obj->phpDB_insert("s1","s2","s3","s4","s5","s6");