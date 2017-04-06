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
      <title>Konsultacje - Tworzenie konsultacji</title>
      <link rel="stylesheet" href="style.css"/>
      <script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
      <script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>					
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
    $id_pac = $_POST['id'];
    
    $id_pac = htmlentities($id_pac, ENT_QUOTES, "UTF-8");
    $rows   = pg_query(sprintf("SELECT * FROM consultation WHERE id_pac='%s'",
    pg_escape_string($polaczenie, $id_pac)));
    
    $_SESSION['id_pac'] = $id_pac;
    
    if (!$rows) 
    {
        echo "Wystąpił błąd.\n";
        exit;
    }
    else 
    {
        echo '
			<div id="table">
			<table>
			<tr>
    			<th><b>Numer pacjenta</b></th>
   				<th><b>Treść konsultacji</b></th>
  			</tr>';
        
        while ($row = pg_fetch_row($rows)) 
        {
            echo "
  				<tr>
    			<th>$row[0]</th>
    			<th>$row[1]</th>
  				</tr>";
        }
        echo '</table></div>';
    }
}
?>
      <div id="elo">
         <form method="post" action="upload.php">
            <textarea name="text" cols="100" rows="8"></textarea>
            <input type="submit" value="Wyślij" />
            <p>
               <br>
               [ <a href="view.php">Zmień pacjenta! </a> ]
            </p>
         </form>
      </div>
   </body>
</html>