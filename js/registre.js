var formConnection  = document.getElementById("formConnection") ;
var formInscription = document.getElementById("formInscription");
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
            if(res.success) {
                console.log('Utilisateur inscript !');
            } else {
                alert(res.msg);
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