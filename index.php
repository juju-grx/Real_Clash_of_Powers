<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>Connect</title>
    </head>
    <body>
        <div>
            <button type="submit" id="buttonConnection" >Connection </button>
            <button type="submit" id="buttonInscription">Inscription</button>
            <br>
            <form method='post' id='formConnection'>
                <fieldset>
                    <legend>Identifiez-vous</legend>
                    <p>
                        <input type='text'     placeholder='Pseudo'   name='pseudo'  > <br><br>
                        <input type='password' placeholder='Password' name='password'> <br><br>
                        <input type='submit' value='Connection'>
                    </p>
                </fieldset>
            </form>
            <form method='post' id='formInscription' >
                <fieldset>
                    <legend>Inscrivez-vous</legend>
                        <input type='text'     placeholder='Pseudo'         name='pseudo'       > <br><br>
                        <div   id="Pseudo_erreur"        hidden="true">     <p style="color: red;">Votre pseudo doit contenir plus de 3 caractères</p></div>

                        <input type='text'     placeholder='Email'          name='email'        > <br><br>
                        <div   id="Email_erreur"         hidden="true">     <p style="color: red;">Adresse email invalide                         </p></div>

                        <input type='password' placeholder='Password'       name='password'     > <br><br>
                        <div   id="Password_erreur"      hidden="true">     <p style="color: red;">Mots de passe incorrect                        </p></div>

                        <input type='password' placeholder='Verif Password' name='verifPassword'> <br><br>
                        <div   id="VerifPassword_erreur" hidden="true">     <p style="color: red;">Validation incorrect                           </p></div>

                        <input type='submit' value='Connection'>
                </fieldset>
            </form>
        </div>
        <script src="js/registre.js">   </script>
    </body>
</html>
