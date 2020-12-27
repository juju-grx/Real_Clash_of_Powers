<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Connect</title>
        <link rel="stylesheet" href="style/style_connect.css">
    </head>
    <body>
        <div>
            <center>
                <button type="submit" id="buttonConnection" disabled="true">Connection </button>
                <button type="submit" id="buttonInscription">Inscription</button>
                <br>
                <form method='post' id='formConnection'>
                    <fieldset>
                        <legend>Identifiez-vous</legend>
                        <p>
                            <input type='text'     placeholder='Pseudo*'   name='pseudo'  > <br><br>
                            <input type='password' placeholder='Password*' name='password'> <br><br>
                            <input type='submit' value='Connection'>
                        </p>
                    </fieldset>
                </form>
                <form method='post' id='formInscription' hidden="true">
                    <fieldset>
                        <legend>Inscrivez-vous</legend>
                            <input type='text' placeholder='Pseudo*' name='pseudo' id="valuePseudo"> <br><br>
                            <p id="Pseudo_erreur" hidden="true" style="color: red;"></p>

                            <input type='text' placeholder='Email*' name='email' id="valueEmail"> <br><br>
                            <p id="Email_erreur" hidden="true" style="color: red;"></p>

                            <input type='password' placeholder='Password*' name='password' id="valuePassword"> <br><br>
                            <p id="Password_erreur" hidden="true" style="color: red;">Mots de passe incorrect</p>

                            <input type='password' placeholder='Verif Password*' name='verifPassword' id="valuePasswordVerif"> <br><br>
                            <p id="VerifPassword_erreur" hidden="true" style="color: red;">Validation incorrect</p>

                            <input type='submit' value='Inscription' id="buttonValidationInscription" disabled="true">
                            <p id="champsVide" style="color: red;">Veuillez renseiger tous les champs</p>
                    </fieldset>
                </form>
            </center>
        </div>
        <script src="js/registre.js">   </script>
    </body>
</html>
