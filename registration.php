<html>
<head>
    <title> Signup </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/css/materialize.min.css">
	<link href="common.css" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    
    <script>
	//isName() function is triggered when a user clicks or navigate to the add username field
	//if username is blank then it throws error message, else it returns validateName() function
		function isName() {
			var name = document.getElementById("name").value;
			if (name == "") {
				$("#errorname").html("name cannot be blank");
				$("#email,#psswd, button").each(function() {  //jquery code for disabling other fields and submit button
					$(this).prop("disabled", true);
				});
			}
			else {
				$("#errorname").text("");
				$("#email,#psswd").each(function() {
					$(this).prop("disabled", false);						//jquery code for enabling other fields and submit button
				});
				return validateName();
			}
		}
//validateName() is the main function which checks for username via regex and numerical condition.
		function validateName() {
			var name = document.getElementById("name").value;
			var RegExName = /[~`!#$%\^&*+=\-\[\]\\';,/{}|\\":<>\?]/;
			var namearr = [];
			var newstring = name.split(""); 			//var name is split into individual char and stored in an array
			namearr = newstring;								  //for loop is used to traverse the individual char in array and check against the conditions. Even if a single character is wrong, then it throws the error.
			for (x = 0; x < namearr.length; x++) {
				if (isNaN(namearr[x]) == false || RegExName.test(namearr[x]) == true) {
					$("#errorname").html("name can only be alphabetic");
					$("#email,#psswd, button").each(function() {
						$(this).prop("disabled", true);     //fields disabled
					});
				} else {
					$("#errorname").text("");
					$("#email,#psswd").each(function() {
						$(this).prop("disabled", false);   //fields enabled
					});
				}
			};
		}

		//validateMail() works like isName(). It checks fore user email via regex and condition
		function validateMail() {

			var RegExMail = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
			var email = document.getElementById("email").value;
			if (email == "" || RegExMail.test(email) == false) {
				$("#errormail").html("Please enter a valid Email address");
				$("#psswd, button").each(function() {
					$(this).prop("disabled", true);
				});

			} else {
				$("#errormail").html("");
				$("#psswd").each(function() {
					$(this).prop("disabled", false);
				});
			}

		}



		function validatePsswd() {
				var psswd = document.getElementById("psswd").value;
				$("#warning").css("display","block");
				if (psswd.length < 8) {
					$("button").prop("disabled", true);
					return false;


				}
				else {
					$("button").prop("disabled", false);
					return true;
				}

		}
	
		$(document).ready(function() {
			Materialize.updateTextFields();
			$("#email,#psswd, button").each(function() {					//Only input field is enabled first
				$(this).prop("disabled", true);											//rest of the fields and button are disabled
			});
		});
	</script>
    
<style>
    #gotogmail{
        font-size: 24px;
        width: 350px;
        height: 50px;
        padding-top: 8px;
        text-align: center;
        color: white;
        background-color: lightgreen;
        border: 2px solid white;
        margin: auto auto;
    }
    #gotogmail:hover{
        color: lightgreen;
        background-color: white;
        border: 2px solid lightgreen;
        box-shadow: 8px 8px lightgray;
    }
    </style>
</head>
<body>
    
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
  $pwd   = test_input($_POST["psswd"]);
  $cpwd  = test_input($_POST["cpwd"]);


    // check if e-mail address is well-formed
    
     if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //getting an invalid email
        ?>
         <script type="text/javascript">
              alert("Invalid email format ");
               window.open("http://79.170.40.52/myphp.com/project/signup.html","_self");
         </script>
       <?
    }
  //else checking email already register or not
   else{
        //database connecting
          $conn = mysql_connect("localhost","cl14-rajat","HR.9Gy32Y") or die(mysql_error()); 
                  mysql_select_db("	cl14-rajat");
       
         $sql = "SELECT * FROM userdata WHERE email LIKE '".$email."'";
         $res = mysql_query($sql,$conn);
         $num = mysql_num_rows($res);
       
        //user already exist 
        if($num > 0){
             ?>
         <script type="text/javascript">
              alert("User Already Exist please try to login!");
               window.open("http://79.170.40.52/myphp.com/project/signup.html","_self");
         </script>
       <?
         }
        
        //if new user
        else {
        $sub ="Confirm your Email Address";
        $link = "http://79.170.40.52/myphp.com/project/registered.php/?key=".base64_encode($email);
        $msg ="Click here to confirm your Email ".$link;
        $headers = "From: www.myphp.com" . "\r\n"."CC: somebodyelse@example.com";
       
        if(mail($email,$sub,$msg,$headers)){
           ?>
              <div id='gotogmail' onclick="location.href='https://accounts.google.com/ServiceLogin#identifier';"> Goto Gmail To Confirm Email </div>
           <?
        
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
 else  { 
?>

     <a href='http://79.170.40.52/myphp.com/'><h5 align='right'> Home </h5></a>
	<main>
		<center>


			<div class="section"></div>

			<h3 class="indigo-text">Sign Up</h3>
			<div class="section"></div>


			<div class="container logincontainer z-depth-1 grey lighten-4 row">

                <form method='post' action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" name='myform' class='col s12'>
					<!--add link inaction attribute -->
					<div class="row">
						<div class="input-field col s12">
							<i class="small material-icons prefix">perm_identity</i>
							<input type="text" id="name" class="validate" name="name" oninput="isName()" onkeydown="validateName()" required>
							<span class="errorfield" id="errorname"></span>
							<label for="name">Enter Name</label>
						</div>
					</div>


					<div class="row">
						<div class="input-field col s12">
							<i class="small material-icons prefix">email</i>
							<input type="text" id="email" class="validate" name="email" onkeydown="validateMail()" required>
							<label for="email">Enter email</label>
							<span class="errorfield" id="errormail"></span>
						</div>
					</div>
					<div class="row">
						<div class="input-field col s12">
							<i class="small material-icons prefix">lock</i>
							<input type="password" id="psswd" class="validate" name="psswd" required onkeydown="validatePsswd()">
							<label for="psswd">Enter Password</label>
							<span id="warning" style="display:none;"> Password should be equal to or greater than 8 characters</span>
							<span class="errorfield" id="errorpsswd"></span>
						</div>
                        
						<br><br>
						<center>
							<div class='row'>
								<button class='col s12 btn btn-large waves-effect green' id="submit" name='submit' type="submit">Submit</button>
							</div>
						</center>
					</div>


				</form>

			</div>
		</center>
	</main>

	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.0/js/materialize.min.js"></script>


<? } ?>

    </body>
</html>
    

