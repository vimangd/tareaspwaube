//variables
const imagen = document.querySelector("#imagen")

//evento
imagen.addEventListener("mouseover",cambiarImagen)

//función cambiar imagen
function cambiarImagen(){
    if (imagen.src == "../img/perro2.jpg"){
        imagen.src = "../img/perro1.jpg"
    } else{
    imagen.src = "../img/perro2.jpg"
    }
}