const iniciarTemporizador = (minutos, segundos) => {
    ocultarElemento($contenedorInputs);
    mostrarElemento($btnPausar);
    ocultarElemento($btnIniciar);
    ocultarElemento($btnDetener);
    if (fechaFuturo) {
      fechaFuturo = new Date(new Date().getTime() + diferenciaTemporal);
      console.log("Reanudar con diferencia de " + diferenciaTemporal);
      diferenciaTemporal = 0;
    } else {
      console.log("Iniciar");
      const milisegundos = (segundos + (minutos * 60)) * 1000;
      fechaFuturo = new Date(new Date().getTime() + milisegundos);
    }
    clearInterval(idInterval);
    idInterval = setInterval(() => {
      const tiempoRestante = fechaFuturo.getTime() - new Date().getTime();
      if (tiempoRestante <= 0) {
        console.log("Tiempo terminado");
        clearInterval(idInterval);
        sonido.play();
        ocultarElemento($btnPausar);
        mostrarElemento($btnDetener);
      } else {
        $tiempoRestante.textContent = milisegundosAMinutosYSegundos(tiempoRestante);
      }
    }, 50);
  };
  
  const pausarTemporizador = () => {
    ocultarElemento($btnPausar);
    mostrarElemento($btnIniciar);
    mostrarElemento($btnDetener);
    diferenciaTemporal = fechaFuturo.getTime() - new Date().getTime();
    clearInterval(idInterval);
  };
  
  const detenerTemporizador = () => {
    clearInterval(idInterval);
    fechaFuturo = null;
    diferenciaTemporal = 0;
    sonido.currentTime = 0;
    sonido.pause();
    $tiempoRestante.textContent = "00:00.0";
    init();
  };
  
  const agregarCeroSiEsNecesario = valor => {
    if (valor < 10) {
      return "0" + valor;
    } else {
      return "" + valor;
    }
  }
  const milisegundosAMinutosYSegundos = (milisegundos) => {
    const minutos = parseInt(milisegundos / 1000 / 60);
    milisegundos -= minutos * 60 * 1000;
    segundos = (milisegundos / 1000);
    return `${agregarCeroSiEsNecesario(minutos)}:${agregarCeroSiEsNecesario(segundos.toFixed(1))}`;
  };