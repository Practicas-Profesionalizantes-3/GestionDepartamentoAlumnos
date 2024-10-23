var carrera = JSON.parse(sessionStorage.getItem('usuario')).carrera;
$("#carreraTexto").text(carrera);

var idCarrera = JSON.parse(sessionStorage.getItem('usuario')).id_carrera;

var urlMaterias = 'http://localhost/api/api-Alumnos/materia_carrera.php?id_carrera=' + idCarrera;

$.ajax({
    url: urlMaterias,
    type: 'GET',
    dataType: 'json',
    success: function (materias) {
        procesarMaterias(materias);
    },
    error: function (xhr, status, error) {
        console.error('Error en la solicitud:', status, error);
    }
});

function procesarMaterias(materias) {
    console.log(materias)
    var selectMateria = $('#materia');
    selectMateria.empty();

    materias.forEach(function (materia) {
        var option = $('<option></option>').val(materia.id).text(materia.materia);
        selectMateria.append(option);
    });
}