<?php

$dsn = 'mysql:dbname=real_clash_of_powers;host=127.0.0.1';
$user = 'root';
$password = '';

try {
  $_db = new PDO($dsn, $user, $password);
}
catch (PDOException $e){
    print('<br/>Erreur de connexion : ' . $e->getMessage());
  }

$success = 0;
$validation = 0;
$erreur = 1;
$PDOerreur = null;

$erreurPseudo = null;
$erreurEmail = false;
$erreurPassword = false;
$erreurVerifPassword = false;

$pseudo = null;
$email = null;
$password = null;
$verifPassword = null;

    if (!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['password']) AND !empty($_POST['verifPassword']))
    {
        $pseudo = htmlspecialchars(strip_tags($_POST['pseudo']));
        $email = htmlspecialchars(strip_tags($_POST['email']));
        $password = htmlspecialchars(strip_tags($_POST['password']));
        $verifPassword = htmlspecialchars(strip_tags($_POST['verifPassword']));

        $erreur = 0;

        if (strlen($pseudo) > 3) {
            $validation += 1;
            $erreurPseudo = "Votre pseudo doit contenir plus de 3 caractères";
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $validation += 1;
            $erreurEmail = true;
        }

        if (strlen($_POST['password']) >= 8 )
        {
            $validation += 1;
            $erreurPassword = true;
        }

        if ($password == $verifPassword) {
            $validation += 1;
            $erreurVerifPassword = true;
        }

        if($validation >=4 )
        {
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

            $request = $_db->prepare('INSERT INTO utilisateur SET pseudo = :pseudo, email = :email,`password` = :password;');

            $request->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $request->bindValue(':email', $email, PDO::PARAM_STR);
            $request->bindValue(':password', $password, PDO::PARAM_STR);

            $request->execute();
            if ($request->errorCode() != '00000') {
                $PDOerreur = $request->errorInfo()[2];
            }

            $success = 1;
        }
        $erreur = 0;
    }

$msg = ["erreurPseudo" => $erreurPseudo, "email" => $erreurEmail, "password" => $erreurPassword, "verifPassword" => $erreurVerifPassword];

    $res = ["erreur" => $erreur, "success" => $success, "msg" => $msg, "PDOerreur" => $PDOerreur, "pseudo" => strlen($pseudo)];
    echo json_encode($res);

?>