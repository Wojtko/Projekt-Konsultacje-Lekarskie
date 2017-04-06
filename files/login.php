<?php
session_start();

if ((!isset($_POST['login'])) || (!isset($_POST['haslo']))) 
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
    
    $login = $_POST['login'];
    $haslo = $_POST['haslo'];
    
    $login = htmlentities($login, ENT_QUOTES, "UTF-8");
    $haslo = htmlentities($haslo, ENT_QUOTES, "UTF-8");
    
    $rows = pg_query(sprintf("SELECT * FROM users WHERE login='%s' AND  password='%s'",
    pg_escape_string($polaczenie, $login),
    pg_escape_string($polaczenie, $haslo)));
    
    $ile = pg_num_rows($rows);
    if ($ile > 0) 
    {
        $_SESSION['zalogowany'] = true;
        
        $row = pg_fetch_assoc($rows);
        
        $_SESSION['name']    = $row['name'];
        $_SESSION['surname'] = $row['surname'];
        $_SESSION['id']      = $row['id'];
        
        unset($_SESSION['blad']);
        pg_free_result($row);
        header('Location: view.php');
    }
    
    else 
    {
        $_SESSION['blad'] = '<span style="color:red">Nieprawidłowy login lub hasło!</span>';
        header('Location: index.php');
    }
    pg_close($polaczenie);
}
?>