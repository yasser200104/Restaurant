<?php
use MongoDB\Driver\Query;

include('../connexion.php');

if(isset($_POST['EDIT_CONDITION'])) {
    $query = "UPDATE ordering  SET Ocondition  = '" . $_POST['Ocondition'] . "'  WHERE Ono = '" . $_POST['Ono'] . "'";
    $stmt = $pdo->query($query);
    //echo $query;
    header('Location: index.php');
}





?>