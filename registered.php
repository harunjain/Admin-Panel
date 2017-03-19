<?
  session_start();
  $duration = time() - $_SESSION['started'];
  
  if(base64_decode($_GET['key']) == $_SESSION['email']){
  if ( $duration < 10000 ){
      
      //register user in database
       $conn = mysql_connect("localhost","cl53-a-wordp-6pp","D7xNJ/!Y4") or die(mysql_error()); 
               mysql_select_db("cl53-a-wordp-6pp");
        $sql = "INSERT INTO userdata ( email ,name ,password) VALUES ('".$_SESSION['email']."', '".$_SESSION['name']."', '".$_SESSION['pwd']."');";
        
        if(mysql_query($sql, $conn)){
            echo "User successfully registered <br>";
            echo "<a href='http://217.199.187.73/rajatkumar87500.com/account/login.php'>click here to login</a>";
        }
      else{
           
      }
  }
  else { 
         ?>
         <script type="text/javascript">
              alert("your confirmation link has been expired Please try again!");
               window.open("http://217.199.187.73/rajatkumar87500.com/","_self");
         </script>
       <?
  }
 }
 else { 
        ?>
         <script type="text/javascript">
              alert("Invalid link");
               window.open("http://217.199.187.73/rajatkumar87500.com/","_self");
         </script>
       <?
      }
?>