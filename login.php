<?  
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        //connecting to database
        //database details can be edits
        //userdata table having ID, name, email, password etc
        
          $conn = mysql_connect("localhost","cl14-rajat","HR.9Gy32Y") or die(mysql_error()); 
                  mysql_select_db("cl14-rajat");
        
           $sql = "SELECT * FROM userdata WHERE email LIKE '".$_POST['email']."' AND password LIKE '".base64_encode($_POST['pwd'])."'";
           $res = mysql_query($sql, $conn) or die(mysql_error());
          $user = mysql_num_rows($res);
        
    if( $user == 0 ){
        ?>
         <script type="text/javascript">
              alert("Invalid Email or password Please try Again!");
             
               // link of current login/signup page
               //window.open("http://79.170.40.52/myphp.com/project/login.php","_self");
         </script>
       <?
         }
         else{
               $row = mysql_fetch_array($res);
                 session_start();
                 $_SESSION['key'] = $_POST['email'];
                 $_SESSION['name'] = $row['1'];
                 $link = "Location: http://79.170.40.52/myphp.com/project/homepage.php/?key=".base64_encode($_POST['email']);
                 header( $link );
         }
    } 
 else {
?>

<html>

	<head>
        <title>Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
		<link href="common.css" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	</head>

	<body>
        <a href='http://79.170.40.52/myphp.com/'><h5 align='right'> Home </h5></a>
		<main>
			<center>


				 <div class="section"></div>

      <h3 class="indigo-text">Sign In</h3>
      <div class="section"></div>


			<div class="container logincontainer z-depth-1 grey lighten-4 row">

                 <form method='post' class='col s12' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name='myform'>
            
					<div class="row">
					<div class="input-field col s12">
						<i class="small material-icons prefix">email</i>
						<input type="email" id="email" class="validate" name="email" required>
						<label for="email">Enter email</label>
						<span id="errorfield"></span>
						</div></div>
					<div class="row">
					<div class="input-field col s12">
						<i class="small material-icons prefix">lock</i>
						<input type="password" id="psswd" class="validate" name="pwd" required>
						<label for="psswd">Enter Password</label>

						</div>
						<br>

						<br><br>
						<label><a href="registration.php" style="font-size:18px;">Create account</a> &nbsp;&nbsp;&nbsp;&nbsp; <a href="#" style="font-size:18px;">Forgot Password? </a></label>
						<center>
              <div class='row'>
                <button type="submit" name='btn_login' class='col s12 btn btn-large waves-effect red' id="submit" >Submit</button>
              </div>
            </center>
					</div>


				</form>

            </div>





			</center>
		</main>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>

		<script>
	$(document).ready(function() {
    Materialize.updateTextFields();
  });

		//Login form doesn't require validation for each field. It would be over kill.
		//if form is empty, them html 'required method' will throw error.



	</script>

	</body>

</html>


<? } ?>