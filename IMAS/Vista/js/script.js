function confirmarCancelarCliente(numero) {
    if (confirm("Esta seguro de cancelar al cliente" + numero)) {
        $.get("index.php", {accion: 'confirmarCliente', numero: numero}, function (mensaje)
        {

            alert(accion);

            alert(mensaje);
        });

    }
}