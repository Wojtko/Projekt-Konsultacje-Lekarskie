<?php
session_start();

if (!isset($_SESSION['zalogowany'])) 
{
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pl">
   <head>
      <meta charset="UTF-8"/>
      <meta http-equiv="X-UA-Compataible" content="IE-edge,chrome=1"/>
      <title>Konsultacje - Widok pacjentów</title>
      <link rel="stylesheet" href="style.css"/>
   </head>
   <body>
<?php
require_once "connect.php";

$polaczenie = pg_connect("host=$host dbname=$db_name user=$db_user password=$db_password");

if (!$polaczenie) 
{
    echo "Connection status bad <br />";
} 
else 
{
    echo "<p>Witaj " . $_SESSION['name'] . " " . $_SESSION['surname'] . '! [ <a href="logout.php">Wyloguj się!</a> ]</p><br>';
    
    $rows = pg_query($polaczenie, "SELECT * FROM patients  ORDER BY id_pac");
    
    if (!$rows) 
    {
        echo "Wystąpił błąd.";
        exit;
    } 
    else 
    {
        echo '
			<div id="table">
			<table>
			<tr>
    			<th><b>Numer</b></th>
    			<th><b>Imie</b></th>
   				<th><b>Nazwisko</b></th>
  			</tr>';
        
        while ($row = pg_fetch_row($rows)) 
        {
            echo "
  				<tr>
    			<th>$row[0]</th>
    			<th>$row[1]</th>
   				<th>$row[2]</th>
  				</tr>";
        }
        echo '</table></div>';
    }
    
    pg_free_result($row);
    pg_close($polaczenie);
}
?>
      <form action="textarea.php" method="post">
         <br>Nr. Pacjenta:<br/> <input type="number" name="id"/><br>
         <input type="submit" value="Prześlij"/>
      </form>
   </body>
</html>