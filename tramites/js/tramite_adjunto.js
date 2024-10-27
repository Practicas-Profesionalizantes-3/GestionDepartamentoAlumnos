    // Captura los elementos usando jQuery correctamente
    var imgInp = document.getElementById("adjunto");
    var blah = document.getElementById("blah");

    // Escucha el cambio del input de archivo
    imgInp.onchange = evt => {
        const [file] = imgInp.files;
        if (file) {
            // Cambia la fuente de la imagen y asegúrate de que sea visible
            blah.src = URL.createObjectURL(file);
            blah.style.display = "block"; // Usa .style para manipular CSS en JS puro
        }
    }