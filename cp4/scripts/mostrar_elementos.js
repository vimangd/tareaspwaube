const formulario = document.getElementById("form_agregar")
const butAgregar = document.getElementById("agregar")
const estudiantes = document.getElementById("ver_estudiantes")
const butVer = document.getElementById("boton_ver")

butAgregar.addEventListener("click", () => {
    if (estudiantes.classList.contains("hiden")) {
        formulario.classList.toggle("hiden")
    } else {
        estudiantes.classList.add("hiden")
        formulario.classList.toggle("hiden")
    }
})

butVer.addEventListener("click", () => {
    if (formulario.classList.contains("hiden")) {
        estudiantes.classList.toggle("hiden")
    } else {
        formulario.classList.add("hiden")
        estudiantes.classList.toggle("hiden")
    }
})

