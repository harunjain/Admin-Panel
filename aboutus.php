<html>
 <head>
     <title> About Us</title>
 </head>
 <body>
    <br><br>
    
      <!--registration form -->
        <center><a href='http://217.199.187.73/rajatkumar87500.com/'> Home </a></center>
        <br><br/><center> ABOUT US</center><br/>
		<br /> <h3>Team members </h3>
		<?
		      $conn = mysql_connect("localhost","cl53-a-wordp-6pp","D7xNJ/!Y4") or die(mysql_error());
			          mysql_select_db("cl53-a-wordp-6pp");
					  
			   $sql = "SELECT * FROM members";
			   $res = mysql_query($sql,$conn) or die(mysql_error());
			   
			    if(mysql_num_rows($res) > 0) {
			    while($row = mysql_fetch_assoc($res)){
                       echo "id: " .$row["ID"]. "&nbsp&nbsp&nbsp --  Name: ".$row["name"]."&nbsp&nbsp&nbsp -- post: " .$row["post"]."&nbsp&nbsp&nbsp -- contact: " .$row["contact"]."&nbsp&nbsp&nbsp Email: " .$row["email"]."<br>";
					   
                   }
				     $sql1 = "SELECT * FROM contact";
					   $res1 = mysql_query($sql1, $conn)or die(mysql_error());
					   $row1  = mysql_fetch_array($res1);        
					   echo "<br> What we do <br>".$row1['wedo'];
				}
 		?>  
		
		  <br>
       </body>
</html>