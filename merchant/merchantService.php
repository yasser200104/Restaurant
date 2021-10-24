<?php
use MongoDB\Driver\Query;

include('../connexion.php');
if(isset($_GET['deleteMenu'])) {
  
    
    
    $query = "DELETE FROM menu WHERE `Mname`='" . $_GET['deleteMenu'] . "'";
    
    $stmt = $pdo->query($query);
    // echo $query;

   

     header('Location: index.php');
} else if(isset($_GET['deleteMembership'])) {
    
    $query = "DELETE FROM vip WHERE `ctel`='" . $_GET['deleteMembership'] . "'";
    $stmt = $pdo->query($query);

    header('Location: index.php');
} else if(isset($_POST['ADD_ORDER'])) {

    
} else if(isset($_POST['ADD_MENU'])) {
    $query = "INSERT INTO menu  VALUES ('" . $_POST['menu'] . "','" . $_POST['cost'] . "','" . $_POST['price'] . "')";
    $stmt = $pdo->query($query);
    header('Location: index.php');

} else if(isset($_POST['EDIT_MENU'])) {
    $query = "UPDATE menu  SET Mprice = '" . $_POST['price'] . "', Mcost = '" . $_POST['cost'] . "' WHERE Mname = '" . $_POST['menu'] . "'";
    $stmt = $pdo->query($query);
    echo $query;
    header('Location: index.php');
} else if(isset($_POST['ADD_MEMBER'])) {
    $query = "INSERT INTO vip  VALUES ('" . $_POST['Ctel'] . "','" . $_POST['Cmoney'] . "','" . $_POST['Ccheck'] . "')";
    $stmt = $pdo->query($query);
    header('Location: index.php');
   

}else if(isset($_POST['EDIT_MEMBER'])) {
    $query = "UPDATE vip  SET cmoney  = '" . $_POST['Cmoney'] . "', Ccheck = '" . $_POST['Ccheck'] . "' WHERE Ctel = '" . $_POST['Ctel'] . "'";
    $stmt = $pdo->query($query);
    echo $query;
    header('Location: index.php');
}
else if(isset($_POST['EDIT_CONDITION'])) {
    $query = "UPDATE vip  SET Ocondition  = '" . $_POST['Ocondition'] . "'.  WHERE Ono = '" . $_POST['Ono'] . "'";
    $stmt = $pdo->query($query);
    echo $query;
    header('Location: "C:\xampp\htdocs\login\delivery\index.php"');
}





?>