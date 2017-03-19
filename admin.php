<html>
 <head>
     <title> Admin Panel</title>
 </head>
 <body>
    <br><br>
    
      <!--registration form -->
        <center><a href='http://217.199.187.73/rajatkumar87500.com/'> Home </a></center>
        <br><br/><center> Administrater</center><br/><br />
			  <h3>Add Member </h3><br>
		    <form action='' method='post'>
			  Name: <input type='text' name='name'  /><br />
			  Post: <input type='text' name='post'  /><br />
			  Contact: <input type='number' name='contact'  /><br />
			  Email: <input type="email" name="email" /><br />
			  <input type="submit" value="Add member" name='addmember' />
			</form>
			
			 <br /><br /><h3>Update contact </h3><br>
		    <form action='' method='post'>
			  Name: <input type='text' name='name'  /><br />
			  Web Link: <input type='text' name='link'  /><br />
			  Contact: <input type='number' name='contact'  /><br />
			  Email: <input type="email" name="email" /><br />
			  Address: <textarea name='address' rows="3" cols="30" resize='none'></textarea><br>
			  What we do: <textarea name='wedo' rows="6" cols="30" resize='none'></textarea><br><br>  
			  <input type="submit" value="Update" name='Update' />
			</form><br><br>
		 
		 
		 
		<?
		      $conn = mysql_connect("localhost","cl53-a-wordp-6pp","D7xNJ/!Y4") or die(mysql_error());
			          mysql_select_db("cl53-a-wordp-6pp");
		      if(isset($_POST['addmember'])){
		$sql = "INSERT INTO members (ID ,name ,post ,contact ,email)VALUES (NULL ,  '".$_POST['name']."',  '".$_POST['post']."',  '".$_POST['contact']."','".$_POST['email']."');";
		       if(mysql_query($sql,$conn)){
			   ?>
			       <script type="text/javascript">
				    alert("Member Added successfully");
					window.open("http://217.199.187.73/rajatkumar87500.com/admin.php","_self");
					</script>
			   <?
			   }
			  }
			  if(isset($_POST['Update'])){
			   echo "Updating";
			  }
		?>
		
		  <br>
       </body>
</html>