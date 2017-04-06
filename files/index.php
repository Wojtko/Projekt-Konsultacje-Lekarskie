<?php
session_start();

if (isset($_SESSION['zalogowany']) && ($_SESSION['zalogowany'] == true)) 
{
    header('Location: view.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
   <head>
      <meta charset="UTF-8"/>
      <meta http-equiv="X-UA-Compataible" content="IE-edge,chrome=1"/>
      <title>Konsultacje lekarskie</title>
   </head>
   <body>
      <form action="login.php" method="post">
         Login:<br/> <input type="text" name="login"/><br/>
         Haslo:<br/> <input type="password" name="haslo"/><br/><br/>
         <input type="submit" value="Zaloguj się"/>
      </form>
      <?php 
         if(isset($_SESSION['blad']))	echo $_SESSION['blad'];
         ?>
   </body>
</html>