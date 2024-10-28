const formulario = document.getElementById('registroDispositivo');

formulario.addEventListener('submit', (event) => {
    var serialequipo =  document.querySelector('#serial_del_equipo').value;
    var serialCargador = document.querySelector('#serial_cargador').value;
    event.preventDefault();  
});