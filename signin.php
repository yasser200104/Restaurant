<?php


if (isset($_POST['but_submit'])) {

    if ($_POST['username'] == "merchant") {
        header('Location: merchant');
    }
    else if ($_POST['username'] == "customer") {
        header('Location: customer');
    }
    else if ($_POST['username'] == "delivery") {
        header('Location: delivery');
    }
    else {
        header('Location: index.html');
    }
}


?>