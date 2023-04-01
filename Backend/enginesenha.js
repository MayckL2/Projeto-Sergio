var modall = document.getElementById("myModa");

var span = document.getElementsByClassName("clo")[0];

var inf = document.getElementById("info");


inf.onclick = function () {
    modall.style.display = "block";
}

span.onclick = function() {
    modall.style.display = "none";
  }

  window.onclick = function(event) {
    if (event.target == moda) {
      moda.style.display = "none";
    }
  } 