function toggleDescription(index) {
    var card = document.getElementById('cartelera-' + index);
    var desc = document.getElementById('desc-' + index);
    var fullDesc = document.getElementById('full-desc-' + index);
    var btn = document.getElementById('toggle-btn-' + index);
    var descargarAdjunto = document.getElementById('descargar-adjunto-' + index);
    var imgContainer = card.querySelector('.img-container'); // Find the img-container element

    if (card.classList.contains('expanded')) {
        card.classList.remove('expanded');
        imgContainer.classList.remove('expanded'); // Remove expanded class from img-container
        fullDesc.style.display = 'none';
        desc.style.display = 'block';
        btn.innerText = 'Ver Más';
        descargarAdjunto.style.display = 'none';
    } else {
        card.classList.add('expanded');
        imgContainer.classList.add('expanded'); // Add expanded class to img-container
        fullDesc.style.display = 'block';
        desc.style.display = 'none';
        btn.innerText = 'Ver Menos';
        descargarAdjunto.style.display = 'block';
    }
}
