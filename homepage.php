<?
  session_start();
 if(isset($_SESSION['key'])) {
?>
<html>
  <head>
    <title>Homepage</title>
    </head>
<body>
    <center><h2>Welcome <? echo $_SESSION['name']; ?></h2></center><br>
    <br><a href='http://217.199.187.73/rajatkumar87500.com/account/logout.php'> Logout </a>
    
    </body>
</html>
<?}
 else
 {
     ?>
       <script type='text/javascript'>
            alert("please login first");
            window.open("http://217.199.187.73/rajatkumar87500.com/account/login.php","_self");
       </script>
     <?
 }?>