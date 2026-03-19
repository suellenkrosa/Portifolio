// Esta função será chamada quando o formulário for enviado
function validarRegisto(event) {
    
    // 1. busca os campos da página (se não existirem, o JS ignora)
    var campoPass = document.getElementById('pass');
    var campoConf = document.getElementById('conf_pass');
    var campoTelefone = document.getElementById('tl');
    var campoData = document.getElementById('data_nasc');

    // --- VALIDAR PASSWORDS ---
    if (campoPass && campoConf) {
        if (campoPass.value !== campoConf.value) {
            alert("As passwords não são iguais!");
            event.preventDefault(); // Trava o envio
            return false;
        }

        // Verifica se tem pelo menos 8 letras
            if (campoPass.value.length > 0 && campoPass.value.length < 8) {
            alert("A password deve ter pelo menos 8 caracteres!");
            event.preventDefault();
            return false;
        }
    }

    // --- VALIDAR TELEFONE (9 números) ---
    if (campoTelefone) {
        if (campoTelefone.value.length !== 9) {
            alert("O telefone deve ter exatamente 9 números!");
            event.preventDefault();
            return false;
        }
    }

    // --- VALIDAR IDADE (Mínimo 16 anos) ---
    if (campoData && campoData.value !== "") {
        var dataInserida = new Date(campoData.value);
        var anoInserido = dataInserida.getFullYear();
        var anoAtual = new Date().getFullYear();

        if ((anoAtual - anoInserido) < 16) {
            alert("Deves ter pelo menos 16 anos para entrar!");
            event.preventDefault();
            return false;
        }
    }

    // Se não entrou em nenhum "if" de erro, o formulário segue caminho!
    return true;
}

window.onload = function() {
    // Liga a validação apenas ao formulário que tem a classe 'form-registo'
    // O formulário de 'form-dados' será ignorado por este script e funcionará normal
    var formRegisto = document.querySelector(".form-registo");
    
    if (formRegisto) {
        formRegisto.onsubmit = validarRegisto;
    }
};