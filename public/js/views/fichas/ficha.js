$(document).ready(function () {
    $('input[id=fecha_nacimiento]').each(function () {
        $(this).change(calcularEdad);
    });

    $('a.glyphicon-transfer').click(copiarDireccion);

    $('.disparadorArchivo').each(function () {
        var callback = $(this).attr('data-callback');
        try {
            $(this).dropzone({
                url: $(this).attr('data-urlsubir'),
                previewsContainer: ".destino",
                acceptedFiles: $(this).attr('data-tipoarchivo'),
                dictInvalidFileType: "El archivo posee una extensión invalida",
                success: function (file, response) {
                    this.removeFile(file);
                    $('#modalArchivo').modal('hide');
                    if (callback != undefined) {
                        eval(callback + '("' + response.url + '")');
                    }
                    window.location.reload();
                },
                processing: function () {
                    $('#modalArchivo').modal('show');
                },
                error: function (file, errorMessage, request) {
                    var response = JSON.parse(request.responseText);
                    this.removeFile(file);
                    $('#modalArchivo').modal('hide');
                    mostrarError(response.mensaje);
                }
            });
        } catch (err) {

        }
    });
});

function copiarDireccion() {
    var btn = this;
    confirmarIntencion("¿Esta seguro que desea copiar la dirección?", function () {
        var id = $(btn).attr('data-id');
        var url = $(btn).attr('data-url');
        var div = $(btn).closest('#direccion_representante');
        $.ajax({
            url: baseUrl + url + "/" + id,
            method: 'get',
            success: function (data) {
                div.html(data.vista);
                $('a.glyphicon-transfer').unbind('click');
                $('a.glyphicon-transfer').click(copiarDireccion);
            }
        });
    });
}

function calcularEdad(evt)
{
    var form = $(evt.target).closest("form");
    $.getJSON(baseUrl + "helpers/edad?fecha_nacimiento=" + $(evt.target).val(), function (data) {
        $(form).find("#edad").val(data.edad);
    });
}

function buscarPersona(evt)
{
    var parent = $('#form-familiares');
    var variables = parent.find('input, select').serialize();
    if (parent.find('#tipo_nacionalidad_id').val() == "" || parent.find('#ci').val() == "") {
        return;
    }
    $.ajax({
        url: baseUrl + "personas/buscar",
        data: variables,
        dataType: 'json',
        method: "GET",
        success: function (data)
        {
            if (data.persona.id != undefined) {
                parent.find('#persona_solicitante_id, #persona_beneficiario_id, #id').val(data.persona.id);
                $.each(data.persona, function (index, val) {
                    parent.find('#' + index).val(val);
                });

                parent.find('#nombre, #apellido').prop("disabled", true);
            } else {
                parent.find('#nombre, #apellido').prop("disabled", false);
                parent.not('#nombre, #apellido').val("");
            }
        }
    });
}

function fotoSubida(url) {
    $('#fotoPersona').attr('src', url);
    mostrarMensaje("Se añadio la foto correctamente.");
}