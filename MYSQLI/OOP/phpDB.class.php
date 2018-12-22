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
private $__HOSTNAME="";
/**
*	@example __USERNAME database username
*/
private $__USERNAME="";
/**
*	@example __PASSWORD database password
*/
private $__PASSWORD="";
/**
*	@example __DATABASE database name
*/
private $__DATABASE="";
/**
*	@example __DATABASE port 
*			 DEFAULT MYSQL PORT = 3306
*/
private $__PORT="3306";
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
		$this->__CON = new mysqli($this->__HOSTNAME, $this->__USERNAME  , $this->__PASSWORD  , $this->__DATABASE , $this->__PORT);  
   /**
   *	Error Message
   */	
		if (mysqli_connect_errno()){die(mysqli_connect_error());}

}


/**
*	Insert into Database Function
*/
public function phpDB_insert($s1 , $s2 , $s3 , $s4 , $s5 , $s6) {
        /**
        *	Prepare SQL
        */
    	$sql ="INSERT INTO phpDB (s1 , s2 , s3 , s4 , s5 , s6) VALUES ('".$s1."','".$s2."','".$s3."','".$s4."','".$s5."','".$s6."')";
        /**
        *	Execute SQL
        */    
    	return mysqli_query($this->__CON, $sql);
}


/**
*	Select All with limit Database Function
*/
public function phpDB_select($limit){
        /**
        *	Prepare SQL
        */
		$sql   = "SELECT * FROM phpDB LIMIT $limit";
        /**
        *	Execute SQL
        */			
		$result= mysqli_query($this->__CON,$sql);
        /**
        *	Calculate Row Count
        */	
		if (mysqli_num_rows($result) > 0) {
        	/**
       		 *	At least Row >= 1
        	*/				
   				 while($row = mysqli_fetch_array($result)) {
 					echo    "<table>
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
		$sql   = "SELECT * FROM phpDB WHERE id='$id' ";
        /**
        *	Execute SQL
        */			
		$result= mysqli_query($this->__CON,$sql);
        /**
        *	Calculate Row Count
        */
		if (mysqli_num_rows($result) > 0) {
        		/**
       		 	*	At least Row >= 1
        		*/	 			
   				 while($row = mysqli_fetch_array($result)) {
 					echo    "<table>
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
       	*	Prepare SQL
        */  	
    	$sql="DELETE from phpDB WHERE id='$id'";
        /**
       	*	Execute SQL
        */  	   
    	return mysqli_query($this->__CON, $sql);

}


/**
*	Update using ID and Values Database Function
*/
public function phpDB_update($id,$s1,$s2,$s3,$s4,$s5,$s6){
       	/**
       	*	 Prepare SQL
       	*/ 
    	$sql="UPDATE phpDB SET s1='$s1' , s2='$s2' , s3='$s3' , s4='$s4' , s5='$s5' ,s6='$s6' WHERE id='$id' ";
       	/**
       	*	 Execute SQL
       	*/     
    	return mysqli_query($this->__CON, $sql);
}


/**
*	Execute Any SQL
*/
public function phpDB_execute($sql){
        /**
       	*	Prepare SQL and Execute it
        */  
	  return mysqli_query($this->__CON, $sql);
}



}//end class phpDB