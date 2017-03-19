<html>
 <head>
     <title> Contact Us</title>
 </head>
 <body>
    <br><br>
    
      <!--registration form -->
        <center><a href='http://217.199.187.73/rajatkumar87500.com/'> Home </a></center>
        <br><br/><center> Contact US</center><br/><br />
		<h3>Contact info</h3>
		<?
		      $conn = mysql_connect("localhost","cl53-a-wordp-6pp","D7xNJ/!Y4") or die(mysql_error());
			          mysql_select_db("cl53-a-wordp-6pp");
					  
			   $sql = "SELECT * FROM contact";
			   $res = mysql_query($sql,$conn) or die(mysql_error());
			   
			    if(mysql_num_rows($res) > 0) {
			    while($row = mysql_fetch_assoc($res)){
               echo "id: " .$row["ID"]. "</br> --  Name: ".$row["name"]."</br> -- Email: " .$row["email"]."</br> -- contact: " .$row["contact"]."</br> link: " .$row["link"]."<br>"."-- Address: ".$row["Address"]."<br>";
                   }
				}
 		?>  
		
		  <br>
       </body>
</html>