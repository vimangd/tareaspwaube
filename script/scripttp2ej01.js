//variables
const caja = document.querySelector("#caja")
const texto = document.querySelector("#texto")
const boton = document.querySelector("#boton")

//evento
boton.addEventListener("click", cambiarColor)

//función cambiar color
function cambiarColor(){
    caja.classList.toggle("cajaAzul")
    caja.classList.toggle("cajaRoja")
    texto.classList.toggle("textoVioleta")
    texto.classList.toggle("textoVerde")
}