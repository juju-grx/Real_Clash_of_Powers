var formConnection       = document.getElementById("formConnection");{
var formInscription      = document.getElementById("formInscription");
var Pseudo_erreur        = document.getElementById("Pseudo_erreur");
var Email_erreur         = document.getElementById("Email_erreur");
var Password_erreur      = document.getElementById("Password_erreur");
var VerifPassword_erreur = document.getElementById("VerifPassword_erreur");
}
formInscription.hidden = true;

document.getElementById("buttonInscription").onclick = function(e) {

    formInscription.hidden = false;
    formConnection.hidden  = true ;
}

document.getElementById("buttonConnection").onclick = function(e) {

    formInscription.hidden = true ;
    formConnection.hidden  = false;
}

formConnection.addEventListener('submit', function(e) {
    e.preventDefault();
    var data = new FormData(this);

    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            var res = this.response;
            console.log(res);
            if(res.success) {
                console.log('Utilisateur connecter !');
            } else {
                alert(res.msg);
            }
        }else if (this.readyState == 4) {
            alert('Une erreur est survenue...');
        }
    };

    xhr.open('POST', 'formulaire/traitementConnection.php', true);
    xhr.responseType = 'json';
    xhr.send(data);

    return false;
});

formInscription.addEventListener('submit', function(e) {
    e.preventDefault();
    
    Pseudo_erreur.hidden        = true;
    Email_erreur.hidden         = true;
    Password_erreur.hidden      = true;
    VerifPassword_erreur.hidden = true;
    
    var data = new FormData(this);
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            var res = this.response;
            console.log(res);
            if(res.success) {
                console.log('Utilisateur inscript !');
            } else {
                if(res.msg.erreur = 1)
                {
                    alert("Veuillez renseiger tous les chemps");
                } else {
                    Pseudo_erreur.hidden        = res.msg.pseudo;
                    Email_erreur.hidden         = res.msg.email;
                    Password_erreur.hidden      = res.msg.password;
                    VerifPassword_erreur.hidden = res.msg.verifpassword;
                }
            }
        }else if (this.readyState == 4) {
            alert('Une erreur est survenue...');
        }
    };

    xhr.open('POST', 'formulaire/traitementInscription.php', true);
    xhr.responseType = 'json';
    xhr.send(data);

    return false;
});