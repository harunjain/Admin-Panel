<?
  session_start();
 if (session_destroy()){
?>
  <script type="text/javascript">
              alert("Successfully logout");
               window.open("http://79.170.40.52/myphp.com/","_self");
         </script>
<?
                       }
 else{
      ?>
      <script type="text/javascript">
              alert("there is some problem please try to logout later");
               window.open("http://79.170.40.52/myphp.com/project/homepage.php","_self");
         </script>
     <?
 }
?>