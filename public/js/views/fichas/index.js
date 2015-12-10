$(document).ready(function () {
    $(document).on('dblclick', '.marcar-ficha', function () {
        if ($('#fichas-marcadas').length) {
            var elem = $(this).clone();
            elem.removeClass('marcar-ficha');
            elem.addClass('remover-ficha');
            $('#fichas-marcadas').append(elem);
            $(this).remove();
        }

    });

    $(document).on('dblclick', '.remover-ficha', function () {
        var elem = $(this).clone();
        elem.removeClass('remover-ficha');
        elem.addClass('marcar-ficha');
        $('#fichas-lista').append(elem);
        $(this).remove();
    });
});

function asignado() {
    window.location.reload();
}