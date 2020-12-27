var formConnection       = document.getElementById("formConnection");{
var formInscription      = document.getElementById("formInscription");
var Pseudo_erreur        = document.getElementById("Pseudo_erreur");
var Email_erreur         = document.getElementById("Email_erreur");
var Password_erreur      = document.getElementById("Password_erreur");
var VerifPassword_erreur = document.getElementById("VerifPassword_erreur");
var valuePseudo          = document.getElementById("valuePseudo");
var valueEmail           = document.getElementById("valueEmail");
var valuePassword        = document.getElementById("valuePassword");
var valuePasswordVerif   = document.getElementById("valuePasswordVerif");
var champsVide           = document.getElementById("champsVide");
var buttonInscription    = document.getElementById("buttonInscription");
var buttonConnection     = document.getElementById("buttonConnection");
var buttonValidationInscription = document.getElementById("buttonValidationInscription");
}

function isEmpty(str) {
    return (!str || 0 === str.length);
}

buttonInscription.onclick = function(e) {

    buttonConnection.disabled = false;
    buttonInscription.disabled = true;

    var ifInscription = setInterval(function() { 
        if(buttonConnection.disabled == true)
        {
            clearInterval(ifInscription)
        }

        if(this.isEmpty(valuePseudo.value) || this.isEmpty(valueEmail.value) || this.isEmpty(valuePassword.value) || this.isEmpty(valuePasswordVerif.value)){
            buttonValidationInscription.disabled = true;
            champsVide.hidden = false;
    
        } else {
            buttonValidationInscription.disabled = false;
            champsVide.hidden = true;
        }
    
    },1000)

    formInscription.hidden = false;
    formConnection.hidden  = true ;
}

buttonConnection.onclick = function(e) {

    buttonConnection.disabled = true;
    buttonInscription.disabled = false;

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

    var data = new FormData(this);
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if(this.readyState == 4 && this.status == 200) {
            var res = this.response;
            console.log(res);
            if(res.success) {
                console.log('Utilisateur inscript !');
            } else {
                if(res.erreur == 1)
                {
                    alert("Veuillez renseiger tous les champs");
                } else {
                    if(!res.msg.pseudo)
                    {
                        Pseudo_erreur.hidden  = false;
                        Pseudo_erreur.textContent = res.msg.erreurPseudo;
                    }
                    Email_erreur.hidden         = res.msg.email;
                    Password_erreur.hidden      = res.msg.password;
                    VerifPassword_erreur.hidden = res.msg.verifpassword;
                }
            }
        }else if (this.readyState == 4) {
            alert('Une erreur est survenue...');
        }
    };

    /*var valuePseudo = document.getElementById("valuePseudo");
    console.log(valuePseudo);
    setInterval(function() { 

        if(valuePseudo.textLength <= 3)
        {
            Pseudo_erreur.hidden  = false;
            Pseudo_erreur.textContent = "Votre pseudo doit contenir plus de 3 caractères";
        } else {
            Pseudo_erreur.hidden  = true;
        }   

        /*if(filter_var(valueEmail.value, 274))
        {
            Email_erreur.hidden = true;
            Email_erreur.textContent = "Adresse email invalide";
        } else {
            Email_erreur.hidden = true;
        }
        

    
    
    
    
    
    
    }, 500);*/

    xhr.open('POST', 'formulaire/traitementInscription.php', true);
    xhr.responseType = 'json';
    xhr.send(data);

    return false;
});