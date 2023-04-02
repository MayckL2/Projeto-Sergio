let menu = document.querySelector(".menu")
let retratil = document.querySelector(".retratil")
let header = document.querySelector("header")
let scroll= 0
let seta = document.querySelector(".setaTopo")
let modal = document.querySelector(".contato")
document.querySelector("footer div button").addEventListener("click", abreModal)
document.querySelector(".contato .fecha").addEventListener("click", fechaModal)


// verifica o temanho do dispositivo
function checaDispositivo(){
    let tela = window.innerWidth

    if(tela <= 800){
        menu.style.display = 'block'
    }else{
        menu.style.display = 'none'
    }
}

// exibe menu no mobile
function chamaMenu(){
    if(retratil.style.right == '-200px'){
        menu.style.rotate= '90deg'
        retratil.style.right= '0px'
    }else{
        menu.style.rotate= '0deg'
        retratil.style.right = '-200px'
    }
}

// esconde header ao rolar a pagina
function escondeHeader(){
  scroll = window.pageYOffset

  if(scroll > 200){
    header.style.backgroundColor= "#131313"
    seta.style.opacity= '1'
  }else if(scroll < 200){
    header.style.backgroundColor= "transparent"
    seta.style.opacity= '0'
  }
}

// abre modal de contate-nos
function abreModal(){
  modal.style.display ="flex"
}

// fehca modal de contate-nos
function fechaModal(){
  modal.style.display= "none"
}