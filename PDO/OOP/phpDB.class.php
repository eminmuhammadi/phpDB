<?php

/**
*	
*	@version 1.0.0
*	@author Emin Muhammadi
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
   	}
   /**
   *	Error Message
   */	
   catch (PDOException $__ERROR) {
   			die($__ERROR->getMessage());
   }
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
            return true;
        } 
   		/**
   		*	Error Message
   		*/	
        catch(PDOException $__ERROR) {
            echo $__ERROR->getMessage();
            return false;
        }
}

/**
*	Select All with limit Database Function
*/
public function phpDB_select($limit) {
        /**
        *	Prepare SQL
        */
		$sql = $this->__CON -> prepare("SELECT * from phpDB LIMIT $limit");
        /**
        *	Execute SQL
        */		
		$sql -> execute();
        /**
        *	Calculate Row Count
        */	
      		if($sql->rowCount()>0) {
        	/**
       		 *	At least Row >= 1
        	*/	
      				 while($row=$sql->fetch()){
 						echo "<table>
 									    <tr>
 		   					  			  <td>".$row['id']."</td>
 		   								    <td>".$row['s1']."</td>
          								<td>".$row['s2']."</td>
           								<td>".$row['s3']."</td>
           								<td>".$row['s4']."</td>
           								<td>".$row['s5']."</td>
           								<td>".$row['s6']."</td>
      								</tr>
      						</table>"; 
      				 }
      			return true;
      		}
        	/**
       		 *	Row Count = 0
        	*/      		
      		else {
      			return false;
      		}
}

/**
*	Select using ID Database Function
*/
public function phpDB_selectID($id) {
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
 						echo "<table>
 									    <tr>
 		   					  			  <td>".$row['id']."</td>
 		   								    <td>".$row['s1']."</td>
          								<td>".$row['s2']."</td>
           								<td>".$row['s3']."</td>
           								<td>".$row['s4']."</td>
           								<td>".$row['s5']."</td>
           								<td>".$row['s6']."</td>
      								</tr>
      						</table>"; 
      				 }
      			return true;	 
      		}
        	/**
       		 *	Row Count = 0
        	*/         		
      		else {
      			return false;
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
    		  $this->__CON->prepare("DELETE FROM phpDB WHERE id=:id")->execute(['id'=>$id]);
    		  return true;
    	}
        /**
       	*	Error Message
        */     	
        catch(PDOException $__ERROR) {
              echo $__ERROR->getMessage();
              return false;
        }
}

/**
*	Update using ID and Values Database Function
*/
public function phpDB_update($id,$s1,$s2,$s3,$s4,$s5,$s6){
    	try{
       		 /**
       		  *	 Prepare SQL
        	  */      		
              $sql = $this->__CON->prepare("UPDATE phpDB SET s1=:s1 , s2=:s2 , s3=:s3 , s4=:s4 , s5=:s5 ,s6=:s6 WHERE id=:id ");
       		 /**
       		  *	 Inject Variables
        	  */  
              $sql->bindParam(":id", $id);
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
              return true;
    	}
        /**
       	*	Error Message
        */      	
        catch(PDOException $__ERROR) {
              echo $__ERROR->getMessage();
              return false;
        }
    	   
}


/**
*	Execute Any SQL
*/
public function phpDB_execute($sql){
        /**
       	*	Prepare SQL and Execute it
        */  	
    	try{
    		  $this->__CON->prepare($sql)->execute();
    		  return true;
    	}
        /**
       	*	Error Message
        */     	
        catch(PDOException $__ERROR) {
              echo $__ERROR->getMessage();
              return false;
        }
}

}//end class phpDB