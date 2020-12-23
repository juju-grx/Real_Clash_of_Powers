<?php

$success = 0;
$msg = "Une erreur est survenue (connection.php)";

if (!empty($_POST['pseudo']) AND !empty($_POST['password']))
{
    $pseudo = htmlspecialchars(strip_tags($_POST['pseudo']));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    if (strlen($pseudo < 10)) {
        // Conenction au site 
        $success = 1;
        $msg = "";
    } else {
        $msg = " Votre pseudo doit contenir lmoins de 10 caractères";
    }
} else {
    $msg = "Veuillez renseigner tous les champs";
}


$res = ["success" => $success, "msg" => $msg];
echo json_encode($res);
?>