// Pega a div do modal
var modal = document.getElementById("myModal");

// Pega o botão que ativa o modal
var btn = document.getElementById("btn");

// Pega o <span> que fecha o modal
var span = document.getElementsByClassName("close")[0];

// Quando o usuário clicar no botão de ativar, o modal aparece
btn.onclick = function() {
  modal.style.display = "block";
}

// Quando o usuário clicar no span de fechar, o modal se torna none
span.onclick = function() {
  modal.style.display = "none";
}

// Quando o usuário clicar fora do modal, ele fecha
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
} 