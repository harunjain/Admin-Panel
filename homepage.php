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
    <br><a href='http://79.170.40.52/myphp.com/project/logout.php'> Logout </a>
    
    </body>
</html>
<?}
 else
 {
     ?>
       <script type='text/javascript'>
            alert("please login first");
            window.open("http://79.170.40.52/myphp.com/project/login.php","_self");
       </script>
     <?
 }?>