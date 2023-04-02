var moda = document.getElementById("myModa");

var meuBota = document.getElementById("meuBota");

var spa = document.getElementsByClassName("clos")[0];

var simBt = document.getElementById("simBtn");
var naoBt = document.getElementById("naoBtn");

meuBota.onclick = function() {
  moda.style.display = "block";
}

spa.onclick = function() {
  moda.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == moda) {
    moda.style.display = "none";
  }
} 
