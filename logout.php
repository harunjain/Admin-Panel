<?
  session_start();
 if (session_destroy()){
?>
  <script type="text/javascript">
              alert("Successfully logout");
               window.open("http://217.199.187.73/rajatkumar87500.com/","_self");
         </script>
<?
                       }
 else{
      ?>
      <script type="text/javascript">
              alert("there is some problem please try to logout later");
               window.open("http://217.199.187.73/rajatkumar87500.com/account/homepage.php","_self");
         </script>
     <?
 }
?>