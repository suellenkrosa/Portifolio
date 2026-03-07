function validaNome(){
    var elemento = document.getElementById("nome")

    if(elemento.value.length == 0){
        elemento.style.backgroundColor = "#FFFFFF";
    }
    else{
    
        if(elemento.value.length < 10){
            elemento.style.backgroundColor = "#FF0000";
        }
        else
            elemento.style.backgroundColor = "#00FF00";
    }
}

function validaTel(){
    var elemento = document.getElementById("phone");

    if(elemento.value.length == 0){
        elemento.style.backgroundColor = "#FFFFFF";
    }
    else{
    
        if(elemento.value.length == 9 && isNaN(elemento.value)==false){
            elemento.style.backgroundColor = "#00FF00";
        }
        else
            elemento.style.backgroundColor = "#FF0000";
    }
}

function validaPass(){
    var senha = document.getElementById("pass");
    var confSenha = document.getElementById("passConf");

    if(senha.value.length == 0){
        senha.style.backgroundColor = "#FFFFFF";
    }
    else{
        if(senha.value.length < 8 || senha.value != confSenha.value || senha.value.length == 0){
            senha.style.backgroundColor = "#FF0000";
        }
        else
            senha.style.backgroundColor = "#00FF00";
    }

    if(confSenha.value.length == 0){
        confSenha.style.backgroundColor = "#FFFFFF";
    }
    else{
        if(confSenha.value.length < 8 && confSenha.value != confSenha.value){
            confSenha.style.backgroundColor = "#FF0000";
        }
        else
            confSenha.style.backgroundColor = "#00FF00";
    }

}

