<?php
/**
*	Connection for @filesource /../PDO/PURE/select.php
*/
include_once "__connection.php" ;


/**
*	@version 1.0.0  SELECT TABLE
*/ 

	    /**
        *	Prepare SQL
        */
		$sql   = "SELECT * FROM phpDB";
        /**
        *	Execute SQL
        */			
		$result= mysqli_query($__CON,$sql);
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
    	} 
        /**
       	 *	Row Count = 0
        */ 
    	else {
    		echo "Not found any data";
    	}