<?php
use MongoDB\Driver\Query;

include('../connexion.php');

if (isset($_GET['deleteOrder'])) {

    $query = "DELETE FROM judge WHERE `ono`='" . $_GET['deleteOrder'] . "'";
    $stmt = $pdo->query($query);

    $query = "DELETE FROM ordering WHERE `ono`='" . $_GET['deleteOrder'] . "'";
    $stmt = $pdo->query($query);

    header('Location: index.php');

} else if(isset($_GET['deleteM'])) {
  
    
    
    $query = "DELETE FROM menu WHERE `Mname`='" . $_GET['deleteM'] . "'";
    $stmt = $pdo->query($query);

   

    header('Location: index.php');
} else if(isset($_GET['deleteMembership'])) {
    
    $query = "DELETE FROM vip WHERE `ctel`='" . $_GET['deleteMembership'] . "'";
    $stmt = $pdo->query($query);

    header('Location: index.php');
} else if(isset($_POST['ADD_MENU'])) {
    $query = "INSERT INTO menu  VALUES ('" . $_POST['menu'] . "','" . $_POST['cost'] . "','" . $_POST['price'] . "')";
    $stmt = $pdo->query($query);
    header('Location: index.php');

} else if(isset($_POST['EDIT_MENU'])) {
    $query = "UPDATE menu  SET Mprice = '" . $_POST['price'] . "', Mcost = '" . $_POST['cost'] . "' WHERE Mname = '" . $_POST['menu'] . "'";
    $stmt = $pdo->query($query);
    echo $query;
    header('Location: index.php');
} else if(isset($_POST['ADD_MEMBERSHIP'])) {
    $query = "INSERT INTO menu  VALUES ('" . $_POST['Ctel'] . "','" . $_POST['Cmoney'] . "','" . $_POST['Ccheck'] . "')";
    $stmt = $pdo->query($query);
    header('Location: index.php');
    echo $stmt ;

}else if(isset($_POST['EDIT_MEMBERSHIP'])) {
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
else if(isset($_POST['ADD_ORDER'])){
    $ono = generateRandomString(4);
    $query = "INSERT INTO ordering(ono, Ctel, Oaddress) VALUES ('" . $ono . "' , '0101', '". $_POST['Oaddress'].  "')";
    $stmt = $pdo->query($query);

    $query = "INSERT INTO  order_detail VALUES('" . $ono . "','" . $_POST['Mname'] . "','" . $_POST['ODprice'] .  "','" .$_POST['ODquantity'] ."')";

    $stmt = $pdo->query($query);
   
     header('Location: index.php');
}
else if(isset($_POST['RECHARGE'])){

    $query = "SELECT * FROM vip WHERE Ctel = '" . $_POST['Ctel'] . "'";
    $stmt = $pdo->query($query);
    echo $stmt->rowCount() . "<br>";

    if($stmt->rowCount() == 0) {
        $query = "INSERT INTO vip  VALUES ('" . $_POST['Ctel'] . "','" . $_POST['Cmoney'] . "','" . "是" . "')";
        echo $query;
        $stmt = $pdo->query($query);
    } else {
        $query = "UPDATE vip SET Cmoney = Cmoney + " . $_POST['Cmoney'] . ", Ccheck =  '是' WHERE Ctel = '" .$_POST['Ctel'] . "'" ;
        echo $query;
        $stmt = $pdo->query($query);
    }

    header('Location: index.php');

}




function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

?>