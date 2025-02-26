document.getElementById('cambiar').addEventListener('click', cambiarMonedas)

function cambiarMonedas() {

    const campo1 = document.getElementById("monedaActual");
    const campo2 = document.getElementById("monedaDestino");

    let mon1 = campo1.value
    let mon2 = campo2.value

    campo1.value = mon2;
    campo2.value = mon1;



}
