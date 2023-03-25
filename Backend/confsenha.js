var confsenha = document.getElementsByName('confsenha')[0]
var senha = document.getElementsByName('senha')[0]

confsenha.addEventListener('input', conferir)
senha.addEventListener('input', conferir)

function conferir() { 
    if (senha.value == confsenha.value && senha.value != '' && confsenha.value != '') { 

        document.getElementById('enviar').disabled = false; 

    } else { 

        document.getElementById('enviar').disabled = true;

    }
}