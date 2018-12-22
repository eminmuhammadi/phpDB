<?php

/**
*	phpDB
*
*	@version 1.0.0
*	@author Emin Muhammadi
* 	@copyright 2018 Emin Muhammadi
*   @filesource /../API/phpDB.class.php
*/
/**
*	Autoload Class
*/
spl_autoload_register(function ($class) {
    include_once $class . '.class.php';
});
header('Content-Type: application/json');
/**
*	Custom Headers for API
*/
phpDB_header();
ini_set('display_errors', '0');
/**
*   @example  PUT , POST , GET , DELETE -> OPTIONS
*/
$method=$_SERVER['REQUEST_METHOD'];

/**
*   Switch Methods
*/
switch($method) {
/**
*   Update Data
*/
  case 'PUT':
    phpDB_method_put($_GET['id'],$_GET['s1'],$_GET['s2'],$_GET['s3'],$_GET['s4'],$_GET['s5'],$_GET['s6']);  
    break;
/**
*   Insert Data
*/    
  case 'POST':
    phpDB_method_post($_GET['s1'],$_GET['s2'],$_GET['s3'],$_GET['s4'],$_GET['s5'],$_GET['s6']);  
    break;
/**
*   Select Data
*/    
  case 'GET': 
    phpDB_method_get($_GET['id']);  
    break;
/**
*   Delete Data
*/     
  case 'DELETE':
    phpDB_method_delete($_GET['id']);  
    break;    
/**
*   Error
*/      
  default:
    phpDB_error("Invalid method");  
    break;
}

function phpDB_error($error){

	$obj= new phpDB;
	return $obj->API("400",$error,NULL,NULL,NULL,NULL,NULL,NULL,NULL);

}

function phpDB_method_get($id){
	
	$obj= new phpDB;
	if(empty($id)){

		return $obj->API("400","Identification not selected",NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	}
	else {

		return $obj->phpDB_select($id);
	}

}


function phpDB_method_delete($id){

	$obj= new phpDB;
	if(empty($id)){

		return $obj->API("400","Identification not selected",NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	}
	else {

		return $obj->phpDB_delete($id);
	}

}

function phpDB_method_post($s1,$s2,$s3,$s4,$s5,$s6){

	$obj= new phpDB;
	if(empty($s1)||empty($s2)||empty($s3)||empty($s4)||empty($s5)||empty($s6)){

		return $obj->API("400","Variables have not been selected completely",NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	}
	else {

		return $obj->phpDB_insert($s1,$s2,$s3,$s4,$s5,$s6);
	}

}

function phpDB_method_put($id,$s1,$s2,$s3,$s4,$s5,$s6){

	$obj= new phpDB;
	if(empty($id)||empty($s1)||empty($s2)||empty($s3)||empty($s4)||empty($s5)||empty($s6)){

		return $obj->API("400","Variables have not been selected completely",NULL,NULL,NULL,NULL,NULL,NULL,NULL);
	}
	else {

		return $obj->phpDB_update($id,$s1,$s2,$s3,$s4,$s5,$s6);
	}

}
function phpDB_header() {
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 0');
    }
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {

        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            header("Access-Control-Allow-Methods: GET, POST, PUT , DELETE , OPTIONS");         
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
        exit(0);
    }
}