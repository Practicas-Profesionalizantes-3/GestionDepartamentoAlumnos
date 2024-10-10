function imprimirTarjeta(id) {
    // Obtener el elemento de la tarjeta
    var tarjeta = document.getElementById('tramite-' + id);
    
    // Crear un nuevo iframe para la impresión
    var iframe = document.createElement('iframe');
    iframe.style.display = 'none'; // Ocultar el iframe
    document.body.appendChild(iframe);
    
    // Obtener el documento del iframe
    var doc = iframe.contentWindow.document;
    doc.open();
    doc.write('<html><head><title>Imprimir Tarjeta</title>');
    
    // Incluir las hojas de estilo
    doc.write(`
        <style>
            body {
                font-family: 'Kumbh Sans', sans-serif;
                padding: 0;
                color: #333;
            }
            .tarjeta {
                border: 1px solid #ccc;
                border-radius: 8px;
                padding: 15px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                background-color: #f9f9f9;
                width: 600px;
                margin: auto;
            }
            .titlulo_tramites_dpto {
                text-aling: center;
                display: flex;
                justify-content: center;
            }
            div {
                margin: 20px 0px;
            }
            .info_dpto{
                width: 100%;
                display: flex;
                justify-content: space-between;
            }   
            button {
                display: none;
            }
        </style>
    `);
    
    doc.write('</head><body>');
    doc.write('<div class="tarjeta">'); // Añadir clase para aplicar estilos
    doc.write(tarjeta.innerHTML); // Contenido de la tarjeta
    doc.write('</div>');
    doc.write('</body></html>');
    doc.close();

    // Imprimir el contenido del iframe
    iframe.contentWindow.focus();
    iframe.contentWindow.print();

    // Eliminar el iframe después de un breve tiempo
    setTimeout(function() {
        document.body.removeChild(iframe);
    }, 1000); // Esperar un segundo antes de eliminarlo
}

