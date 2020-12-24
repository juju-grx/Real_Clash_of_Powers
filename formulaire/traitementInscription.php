<?php

$success = 0;
$msg = ["erreur" => "Veuillez renseigner tous les champs", "un" => $_POST['pseudo'], "pseudo" => false, "email" => false, "password" => false, "verifPassword" => false];;
$validation = 0;

    if (!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['verifPassword']))
    {
        $pseudo = htmlspecialchars(strip_tags($_POST['pseudo']));
        $email = htmlspecialchars(strip_tags($_POST['email']));
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $Verifpassword = password_hash($_POST['verifPassword'], PASSWORD_DEFAULT);

        if (strlen($pseudo > 2)) {
            $validation += 1;
            $ErreurPseudo = true;
        } else {
            $ErreurPseudo = false;
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validation += 1;
            $erreurEmail = true;
        } else {
            $erreurEmail = false;
        }

        if ($_POST['password'] < 8 )
        {
            $erreurPassword = true;
            if ($password == $Verifpassword) {
                $validation += 1;
                $erreurVerifPassword = true;
            } else {
                $erreurVerifPassword = false;
            }
        } else {
            $erreurPassword = false;
        }
        
        if($validation == 3){
            $success = 1;
        }

        $msg = ["erreur" => 0, "un" => $_POST['pseudo'], "pseudo" => $ErreurPseudo, "email" => $erreurEmail, "password" => $erreurPassword, "verifPassword" => $erreurVerifPassword];
        $res = ["success" => $success, "msg" => $msg];

    } else {
        $msg = ["erreur" => 1, "un" => $_POST['pseudo'], "pseudo" => false, "email" => false, "password" => false, "verifPassword" => false];
        $res = ["success" => $success, "msg" => $msg];
    }

echo json_encode($res);

?>