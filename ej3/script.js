document.getElementById('form').addEventListener('submit', function(event) {
    event.preventDefault();

    // Obtener los valores del formulario
    const vehiculo = document.getElementById('vehiculo').value;
    const distancia = parseFloat(document.getElementById('distancia').value);

    // Tabla de consumo de combustible (litros por kilómetro)
    const tablaConsumo = {
        camion_5ton: 12, // Litros por kilómetro
        camion_3ton: 16,
        pickup: 22,
        panel: 28,
        moto: 42
    };

    // Verificar si el vehículo existe en la tabla
    if (tablaConsumo[vehiculo]) {
        const consumoPorKilometro = tablaConsumo[vehiculo];
        const consumoTotal = distancia/consumoPorKilometro;

        // Mostrar el resultado
        document.getElementById('resultado').innerHTML = `
            <h2>Resultado:</h2>
            <p>El consumo de gasolina para un ${vehiculo.replace('_', ' ')} recorriendo ${distancia} km es: 
            <strong>${consumoTotal.toFixed(2)} Galones.</strong></p>
        `;
    } else {
        document.getElementById('resultado').innerHTML = `
            <p style="color: red;">Ocurrió un error al calcular el consumo. Intente nuevamente.</p>
        `;
    }
});