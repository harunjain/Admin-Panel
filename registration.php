<?php

//to check whether form submit or not
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
// define variables and set to empty values
$name = $email = $pwd = $cpwd = "";

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
 
  $name  = test_input($_POST["name"]);
  $email = test_input($_POST["email"]);
  $pwd   = test_input($_POST["pwd"]);
  $cpwd  = test_input($_POST["cpwd"]);

   //check confirmation of password
    if ( $pwd != $cpwd ){
       ?>
         <script type="text/javascript">
              alert("Password do not match!");
               window.open("http://217.199.187.73/rajatkumar87500.com/account/registration.php","_self");
         </script>
       <?
    }
    
    else{
    // check if e-mail address is well-formed
    
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //getting an invalid email
        ?>
         <script type="text/javascript">
              alert("Invalid email format ");
               window.open("http://217.199.187.73/rajatkumar87500.com/account/registration.php","_self");
         </script>
       <?
    }
  //else checking email already register or not
   else{
        //database connecting
        $conn = mysql_connect("localhost","cl53-a-wordp-6pp","D7xNJ/!Y4") or die(mysql_error()); 
                mysql_select_db("cl53-a-wordp-6pp"); 
         $sql = "SELECT * FROM userdata WHERE email LIKE '".$email."'";
         $res = mysql_query($sql,$conn);
         $num = mysql_num_rows($res);
       
        //user already exist 
        if($num > 0){
             ?>
         <script type="text/javascript">
              alert("User Already Exist please try to login!");
               window.open("http://217.199.187.73/rajatkumar87500.com/account/registration.php","_self");
         </script>
       <?
         }
        
        //if new user
        else {
        $sub ="Confirm your Email Address";
        $link = "http://217.199.187.73/rajatkumar87500.com/account/registered.php/?key=".base64_encode($email);
        $msg ="Click here to confirm your Email ".$link;
        $headers = "From: www.rajatkumar87500.com" . "\r\n"."CC: somebodyelse@example.com";
       
        if(mail($email,$sub,$msg,$headers)){
            echo "<a href='https://accounts.google.com/ServiceLogin#identifier'> Goto gmail to confirm your email </a>";
            
            //start a login session
            session_start();
            $_SESSION['email'] = $email;
            $_SESSION['name']  = $name;
            $_SESSION['pwd']   = base64_encode($pwd);
            $_SESSION['started'] = time();
            
        }
        else{
            echo "There is some problem in mail service please try again after some time";
        }
    }
   }
 }
}
 else  { 
?>
<html>
 <head>
     <title> Homepage</title>
</head>
 <body>
       <a href='http://217.199.187.73/rajatkumar87500.com/'><h4 align='right'> Home </h4></a>
    <br><br>
    <div id='Form'> 
     <!--registration form -->
       <center><h2>Registration form</h2></center><br>
             <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name='myform'>
               <center><h3> Enter UserName : <input type='text' name='name'></h3></center>
               <center><h3> Enter Email ID : <input type='text' name='email'></h3></center>
               <center><h3> Choose Password : <input type='password' name='pwd'></h3></center>
               <center><h3> Confirm Password : <input type='password' name='cpwd'></h3></center>
                 <center><input type='submit' name='submit' value='submit'></center>       
       </form>
     </div>
    </body>
</html>

<? } ?>