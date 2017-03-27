<html>
    <head>
     <title>Signup status</title>
        
    <style>
    #gotologin{
        font-size: 24px;
        text-align: center;
        width: 350px;
        height: 40px;
        padding-top: 8px;
        color: white;
        background-color: lightgreen;
        border: 2px solid white;
        margin: auto auto;
    }
    #gotologin:hover{
        color: lightgreen;
        background-color: white;
        border: 2px solid lightgreen;
        box-shadow: 8px 8px lightgray;
    }
     #gotohome{
        font-size: 24px;
         text-align: center;
        
        width: 350px;
        height: 45px;
        padding-top: 8px;
        color: white;
        background-color: lightcoral;
        border: 2px solid white;
        margin: auto auto;
    }
    #gotohome:hover{
        color: lightcoral;
        background-color: white;
        border: 2px solid lightcoral;
        box-shadow: 8px 8px lightgray;
        
    }
        h2{
            text-align: center;
            margin-top: 200px;
        }
        </style>
    </head>
  <body>
         <?
          session_start();
          $duration = time() - $_SESSION['started'];

          if(base64_decode($_GET['key']) == $_SESSION['email']){
          if ( $duration < 10000 ){

           //database connecting
              $conn = mysql_connect("localhost","cl14-rajat","HR.9Gy32Y") or die(mysql_error()); 
                      mysql_select_db("cl14-rajat");
       
      //register user in database
      
        $sql = "INSERT INTO userdata ( ID, Name, email ,password) VALUES ('NULL', '".$_SESSION['name']."', '".$_SESSION['email']."', '".$_SESSION['pwd']."');";
      
        if(mysql_query($sql, $conn)){
            
            ?>
             <h2 style="color: lightgreen;"> User successfully registered </h2><br><br>
             <div id='gotologin' onclick="location.href='http://79.170.40.52/myphp.com/project/login.php';"> Click here to login </div>
            <?
        }
      else{
            ?>
              <h2 style="color: red;"> there is some problem on server! </h2><br><br>
             <div id='gotohome' onclick="location.href='http://79.170.40.52/myphp.com/';"> Try Again </div>
            <?
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
  </body>
</html>
