<?php

session_start();

if (!isset($_SESSION['zalogowany'])) 
{
    header('Location: index.php');
    exit();
}

require_once "connect.php";

$polaczenie = pg_connect("host=$host dbname=$db_name user=$db_user password=$db_password");

if (!$polaczenie) 
{
    echo "Connection status bad <br />";
} 
else 
{
    echo "Connection status ok <br />";
    
    $text = $_POST['text'];
    $text = htmlentities($text, ENT_QUOTES, "UTF-8");
    
    $rows = pg_query(sprintf("INSERT INTO consultation VALUES (%s, '%s')", 
    pg_escape_string($polaczenie, $_SESSION['id_pac']), 
    pg_escape_string($polaczenie, $text)));
    
    pg_close($polaczenie);
    
    header('Location: view.php');
}
?>