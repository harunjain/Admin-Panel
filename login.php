<?  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        //connecting to database
          $conn = mysql_connect("localhost","cl53-a-wordp-6pp","D7xNJ/!Y4") or die(mysql_error()); 
                  mysql_select_db("cl53-a-wordp-6pp");
        
           $sql = "SELECT * FROM userdata WHERE email LIKE '".$_POST['email']."' AND password LIKE '".base64_encode($_POST['pwd'])."'";
           $res = mysql_query($sql, $conn);
          $user = mysql_num_rows($res);
          
    if( $user == 0 ){
        ?>
         <script type="text/javascript">
              alert("Invalid Email or password Please try Again!");
               window.open("http://217.199.187.73/rajatkumar87500.com/account/login.php","_self");
         </script>
       <?
         }
         else{
               $row = mysql_fetch_array($res);
                 session_start();
                 $_SESSION['key'] = $_POST['email'];
                 $_SESSION['name'] = $row['1'];
                 $link = "Location: http://217.199.187.73/rajatkumar87500.com/account/homepage.php/?key=".base64_encode($_POST['email']);
                 header( $link );
         }
    } 
 else {
?>
<html>
  <head>
     <title>Login</title>
    </head>
    <body>
         <a href='http://217.199.187.73/rajatkumar87500.com/'><h4 align='right'> Home </h4></a>
          <br><br>
           <center><h2> Login form</h2></center>
            <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name='myform'>
                <center><h3>Email : <input type='text' name='email'></h3></center>
                <center><h3>Password : <input type='password' name='pwd'></h3></center>
                <center><h3><input type='submit' nname='submit' value='login'></h3></center>
        </form>
    </body>
</html>
<? } ?>