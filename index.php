<!DOCTYPE html>
<html lang="en">
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
                    <p>
                        <input type='text'     placeholder='Pseudo'         name='pseudo'  > <br><br>
                        <input type='text'     placeholder='Email'          name='email'   > <br><br>
                        <input type='password' placeholder='Password'       name='password'> <br><br>
                        <input type='password' placeholder='Verif Password' name='password'> <br><br>
                        <input type='submit' value='Connection'>
                    </p>
                </fieldset>
            </form>
        </div>
        <script src="js/registre.js">   </script>
    </body>
</html>
