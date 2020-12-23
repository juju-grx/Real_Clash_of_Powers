<?php

$success = 0;
$msg = "Une erreur est survenue (inscription.php)";

if (!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['verifPassword']))
{
    $pseudo = htmlspecialchars(strip_tags($_POST['pseudo']));
    $email = htmlspecialchars(strip_tags($_POST['email']));
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $Verifpassword = password_hash($_POST['verifPassword'], PASSWORD_DEFAULT);

    if (strlen($pseudo < 3)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            if($password == $Verifpassword)
            {
                $success = 1;
                $msg = "";
            } else {
                $msg = "Mots de passe incorrect";
            }
        } else {
            $msg = "Adresse email invalide";
        }
    } else {
        $msg = " Votre pseudo doit contenir plus de 2 caractères";
    }
} else {
    $msg = "Veuillez renseigner tous les champs";
}


$res = ["success" => $success, "msg" => $msg];
echo json_encode($res);

?>