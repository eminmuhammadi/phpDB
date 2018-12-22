<?php

/**
*	
*	@version 1.0.0
*	@author Emin Muhammadi
* @copyright 2018 Emin Muhammadi
*	
*/

class phpDB{

/**
*	@example __HOSTNAME database hostname
*/
private $__HOSTNAME = "";

/**
*	@example __DATABASE database name
*/
private $__DATABASE = "";
/**
*	@example __USERNAME database username
*/
private $__USERNAME = "";
/**
*	@example __PASSWORD database password
*/
private $__PASSWORD = "";
/**
*	@example __DATABASE port 
*			 DEFAULT MYSQL PORT = 3306
*/
private $__PORT     = "3306";
/**
*	@example options for database
*			 DEFAULT CHARSET = utf8mb4
*			 DEFAULT COLLATE = utf8mb4_unicode_ci
*/
private $__OPTIONS  = [
    		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    		PDO::ATTR_PERSISTENT => false,
   			PDO::ATTR_EMULATE_PREPARES => false,
   			PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    		PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4 COLLATE utf8mb4_unicode_ci"];
/**
*	Database Connection
*/    			
private $__CON;


/**
*	Constructor for Database Connection
*/
public function __construct(){

   /**
   *	Find Database and Establish connection
   */
   try {
   	     $this->__CON = new PDO("mysql:host=".$this->__HOSTNAME.";port=".$this->__PORT.";dbname=".$this->__DATABASE.";charset=utf8mb4",$this->__USERNAME,$this->__PASSWORD,$this->__OPTIONS);
   /**
   *  Create Table phpDB (For Api Demo)
   *  @example phpDB
   *                - id 
   *                - s1
   *                - s2 
   *                - s3 
   *                - s4 
   *                - s5    
   *                - s6                 
   */         
         $this->__CON->prepare("CREATE TABLE IF NOT EXISTS phpDB (id INT(8) UNSIGNED AUTO_INCREMENT PRIMARY KEY,s1 VARCHAR(32) NULL,s2 VARCHAR(32) NULL,s3 VARCHAR(32) NULL,s4 VARCHAR(32) NULL,s5 VARCHAR(32) NULL,s6 VARCHAR(32) NULL)")->execute();

   	}
   /**
   *	Error Message
   */	
   catch (PDOException $__ERROR) {
   			die($__ERROR->getMessage());
   }
}


/**
* API JSON Constructor
*/
public function API($status,$message,$id,$s1,$s2,$s3,$s4,$s5,$s6){
  /**
    * Status
    * @example 400 - Bad Request
    * @example 200 - OK 
    */
  header("HTTP/1.1 ".$status);
  /**
    * Array
    */
        $API['status']  = $status;
        $API['message'] = $message;
        $API['id'] = $id;
        $API['s1'] = $s1;
        $API['s2'] = $s2;
        $API['s3'] = $s3;
        $API['s4'] = $s4;
        $API['s5'] = $s5;
        $API['s6'] = $s6;
  /**
    *  Print Json
    */
  return print(json_encode($API));
}




/**
*	Insert into Database Function
*/
public function phpDB_insert($s1 , $s2 , $s3 , $s4 , $s5 , $s6) {
        try {
        	/**
        	*	Prepare SQL
        	*/
            $sql = $this->__CON->prepare("INSERT INTO phpDB(s1, s2, s3, s4, s5, s6) VALUES(:s1, :s2, :s3, :s4 , :s5 , :s6)");
        	/**
        	*	Inject Values
        	*/
            $sql->bindParam(":s1", $s1);
            $sql->bindParam(":s2", $s2);
            $sql->bindParam(":s3", $s3);
            $sql->bindParam(":s4", $s4);
            $sql->bindParam(":s5", $s5);
            $sql->bindParam(":s6", $s6);
        	/**
        	*	Execute SQL
        	*/
            $sql->execute();

            if ($sql) { $__id = $this->__CON->lastInsertId();}
            return $this->API(200,"Successfully Inserted Data",$__id,$s1,$s2,$s3,$s4,$s5,$s6);
        } 
   		/**
   		*	Error Message
   		*/	
        catch(PDOException $__ERROR) {
            return $this->API(400,"Error in data ".$__ERROR->getMessage(),NULL,NULL,NULL,NULL,NULL,NULL,NULL);
        }
}



/**
*	Select using ID Database Function
*/
public function phpDB_select($id) {
        /**
        *	Prepare SQL
        */
		$sql = $this->__CON -> prepare("SELECT * from phpDB WHERE id=:id");
        /**
        *	Execute SQL
        */			
		$sql -> execute(['id'=> $id]);
        /**
        *	Calculate Row Count
        */
      		if($sql->rowCount()>0) {
        			/**
       		 		 *	At least Row >= 1
        			 */	      			
      				 while($row=$sql->fetch()){
                  
                  return $this->API(200,"Successfully Selected Data",$row['id'],$row['s1'],$row['s2'],$row['s3'],$row['s4'],$row['s5'],$row['s6']);
      				 }
      		}
        	/**
       		 *	Row Count = 0
        	*/         		
      		else {
              return $this->API(400,"Not found any data",NULL,NULL,NULL,NULL,NULL,NULL,NULL);
      		}
}


/**
*	Delete using ID Database Function
*/
public function phpDB_delete($id){
  /**
  *	Prepare SQL and Execute it
  */  	
  try{
    $sql = $this->__CON -> prepare("SELECT * from phpDB WHERE id=:id");
        /**
        * Execute SQL
        */      
    $sql -> execute(['id'=> $id]);
        /**
        * Calculate Row Count
        */
          if($sql->rowCount()>0) {
              /**
               *  At least Row >= 1
               */             
               while($row=$sql->fetch()){
                  
                  $this->__CON->prepare("DELETE FROM phpDB WHERE id=:id")->execute(['id'=>$id]);
                  return $this->API(200,"Successfully Deleted Data",$id,NULL,NULL,NULL,NULL,NULL,NULL);
               }
          }
          /**
           *  Row Count = 0
          */            
          else {
              return $this->API(400,"Not found any data",NULL,NULL,NULL,NULL,NULL,NULL,NULL);
          }
    		  
    	}
        /**
       	*	Error Message
        */     	
        catch(PDOException $__ERROR) {
            return $this->API(400,"Error in data ".$__ERROR->getMessage(),$id,NULL,NULL,NULL,NULL,NULL,NULL);
        }
}



/**
*	Update using ID and Values Database Function
*/
public function phpDB_update($id,$s1,$s2,$s3,$s4,$s5,$s6){
    	try{
    $sql = $this->__CON -> prepare("SELECT * from phpDB WHERE id=:id");
        /**
        * Execute SQL
        */      
    $sql -> execute(['id'=> $id]);
        /**
        * Calculate Row Count
        */
          if($sql->rowCount()>0) {
              /**
               *  At least Row >= 1
               */             
               while($row=$sql->fetch()){
                  
              /**
                *  Prepare SQL
                */          
                  $sql = $this->__CON->prepare("UPDATE phpDB SET s1=:s1 , s2=:s2 , s3=:s3 , s4=:s4 , s5=:s5 ,s6=:s6 WHERE     id=:id ");
              /**
                *  Inject Variables
                */  
                  $sql->bindParam(":id", $id);
                  $sql->bindParam(":s1", $s1);
                  $sql->bindParam(":s2", $s2);
                  $sql->bindParam(":s3", $s3);
                  $sql->bindParam(":s4", $s4);
                  $sql->bindParam(":s5", $s5);
                  $sql->bindParam(":s6", $s6);
              /**
                * Execute SQL
                */  
                  $sql->execute();
                  return $this->API(200,"Successfully Updated Data",$id,$s1,$s2,$s3,$s4,$s5,$s6);
            }
          }
          /**
           *  Row Count = 0
          */            
          else {
              return $this->API(400,"Not found any data",NULL,NULL,NULL,NULL,NULL,NULL,NULL);
          }
          
      }        
    	
        /**
       	*	Error Message
        */      	
        catch(PDOException $__ERROR) {
              return $this->API(400,"Error in data ".$__ERROR->getMessage(),NULL,NULL,NULL,NULL,NULL,NULL,NULL);
        }
    	   
}





}//end class phpDB