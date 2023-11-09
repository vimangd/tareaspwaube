const nombre = document.getElementById("name")
const email = document.getElementById("email")
const pass = document.getElementById("password")
const form = document.getElementById("form")
const parrafo = document.getElementById("warnings")

form.addEventListener("submit",e=>{
    e.preventDefault()
    let warnings = ""
    let entrar = false
    parrafo.innerHTML = ""
    if(nombre.value.length == 0){
        warnings += `Debes agregar un nombre <br>`
        entrar = true
    }
    if(email.value.length == 0){
        warnings += `Debes agregar un correo <br>`
        entrar = true
    }
    if(pass.value.length == 0){
        warnings += `Debes agregar una contraseña <br>`
        entrar = true
    }
    if(entrar){
        parrafo.innerHTML = warnings
    }else{
        parrafo.innerHTML = "Enviado" 
    }
})