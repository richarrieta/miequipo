$(document).ajaxComplete(function () {
    $(".fa-arrow-down").unbind("click");
    $(".fa-arrow-down").click(usarPersona);
});

$(document).ready(function () {
    $('#div-representante').find('input,select').removeAttr('required');
    $('#nombre, #apellido').prop("disabled", true);
    $("#tipo_nacionalidad_id, #ci").change(buscarPersona);
    $('.salvar-persona').click(crearPersona);
    $('.siguiente').click(validarPersonas);

    $('[id=ind_sincedula]').each(function () {
        $(this).change(mostrarOcultarMenor);
    });
});

function validarPersonas(evt)
{
    if ($('#div-representante').find('#representante_id').val() == "") {
        mostrarError("Debe guardar los datos del representante");
        return false;
    }
    if ($('#div-jugador').find('#jugador_id').val() == "") {
        mostrarError("Debe guardar los datos del jugador");
        return false;
    }
}

function mostrarOcultarSolicitante(evt)
{
    var parent = $(evt.target).closest('.form-group').parent();
    if (parent.find('input[name=ind_mismo_benef]:checked').val() == 1) {
        $('#div-solicitante').find('input,select').removeAttr('required');
        $('#div-solicitante').hide();
    } else {
        $('#div-solicitante').find('input,select').attr('required', 'required');
        $('#div-solicitante').show();
    }
}

function mostrarOcultarMenor(evt)
{
    var parent = $(evt.target).closest('.form-group').parent();
    var seleccion = parent.find('input[name=ind_sincedula]:checked').val();
    if (seleccion == 1) {
        $('#div-jugador').find('#nombre, #apellido').prop("disabled", false);
        $('#div-menor').find('input,select').attr('required');
        $('#div-menor').hide();
        $('#div-jugador').find('.salvar-persona').show();
    } else {
        $('#div-menor').find('input,select').removeAttr('required', 'required');
        $('#div-menor').show();
        $('#div-jugador').find('.salvar-persona').hide();
        $('#div-jugador').find('#nombre, #apellido').prop("disabled", true);
    }
}

function buscarPersona(evt)
{
    var parent = $(evt.target).closest('.row').parent();
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
                parent.find('#representante_id, #jugador_id').val(data.persona.id);
                parent.find('#nombre').first().val(data.persona.nombre);
                parent.find('#apellido').val(data.persona.apellido);
                parent.find('#nombre, #apellido').prop("disabled", true);
                parent.find('.salvar-persona').hide();
            } else {
                parent.find('#representante_id, #jugador_id').val("");
                parent.find('#nombre, #apellido').prop("disabled", false);
                parent.find('#nombre, #apellido').val("");
                parent.find('.salvar-persona').show();
            }
        }
    });
}

function crearPersona(evt)
{
    var parent = $(evt.target).closest('.row').parent();
    var variables = parent.find('input, select').serialize();
    parent.find('input, textarea, select, checkbox, radio').parent().removeClass("has-error");
    parent.find('.help-block').remove();

    $.ajax({
        url: baseUrl + "personas/crear",
        data: variables,
        dataType: 'json',
        method: "POST",
        formulario: parent,
        success: function (data)
        {
            mostrarMensaje(data.mensaje);
            parent.find('#representante_id, #jugador_id').val(data.persona.id);
        },
        error: function (data)
        {
            var formulario = this.formulario;
            if (data.status == 400) {
                mostrarError(procesarErrores(data.responseJSON.errores));
                $.each(data.responseJSON.errores, function (key, value) {
                    $('#' + key).parent().addClass('has-error has-feedback');
                    $.each(value, function (key2, value2) {
                        $(formulario).find('#' + key).parent().append("<span class='help-block'>" + value2 + "</span>");
                    });
                });
            }
        }
    });
}


