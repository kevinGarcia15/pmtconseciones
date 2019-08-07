$(document).on('ready', funcPrincipal);

function funcPrincipal()
{
	$("#BtnAgregar").on('click', funcNuevaVenta);
    $("#btnNuevaAclaracion").on('click', funcNuevaAclaracion);
    $("#btnNuevoProyecto").on('click', funcNuevoProyecto);
    $("#btnNuevoEntrevistado").on('click', funcNuevoEntrevistado);
    $("#btnNuevoCriterio").on('click', funcNuevoCriterio);
    $("#btnNuevaPregunta").on('click', funcNuevaPregunta);

	$("body").on('click', ".btn-danger", funcEliminarFila);

    $.get('../scripts/get-cbo-auditores.php', function(data) {
        cboAuditores = data;
    });
}

function funcEliminarFila()
{
	$(this).parent().parent().fadeOut( "slow", function() { $(this).remove(); } );
}

function funcNuevaPregunta()
{
    $("#tablaPreguntas")
    .append
    (
        $('<tr>')
        .append
        (
            $('<td>')
            .append
            (
                $('<input>').attr('type', 'text').addClass('form-control').attr('name', 'preguntas[]')
            )
        )
        .append
        (
            $('<td>')
            .append
            (
                $('<input>').attr('type', 'text').addClass('form-control').attr('name', 'pasos[]')
            )
        )
        .append
        (
            $('<td>').addClass('text-center')
            .append
            (
                $('<div>').addClass('btn btn-primary').text('Guardar')
            )
            .append
            (
                $('<div>').addClass('btn btn-danger').text('Eliminar')
            )
        )
    );
}

function funcNuevoCriterio()
{
    $("#tablaCriterios")
    .append
    (
        $('<tr>')
        .append
        (
            $('<td>')
            .append
            (
                $('<input>').attr('type', 'text').addClass('form-control').attr('name', 'criterios[]')
            )
        )
        .append
        (
            $('<td>').addClass('text-center')
            .append
            (
                $('<div>').addClass('btn btn-primary').text('Guardar')
            )
            .append
            (
                $('<div>').addClass('btn btn-danger').text('Eliminar')
            )
        )
    );
}

function funcNuevoEntrevistado()
{
    $("#tablaEntrevistados")
    .append
    (
        $('<tr>')
        .append
        (
            $('<td>')
            .append
            (
                $('<input>').attr('type', 'text').addClass('form-control').attr('name', 'entrevistados[]')
            )
        )
        .append
        (
            $('<td>')
            .append
            (
                $('<input>').attr('type', 'text').addClass('form-control').attr('name', 'cargos[]')
            )
        )
        .append
        (
            $('<td>').addClass('text-center')
            .append
            (
                $('<div>').addClass('btn btn-primary').text('Guardar')
            )
            .append
            (
                $('<div>').addClass('btn btn-danger').text('Eliminar')
            )
        )
    );
}

var cboAuditores;
function funcNuevoProyecto()
{
    $("#tablaProyectos")
    .append
    (
        $('<tr>')
        .append
        (
            $('<td>').append
            (
                $('<input>').attr('type', 'text').addClass('form-control').attr('name', 'tareas[]')
            )
        )
        .append
        (
            $('<td>').append
            (
                $('<input>').attr('type', 'date').addClass('form-control').attr('name', 'inicios[]')
            )
        )
        .append
        (
            $('<td>').append
            (
                $('<input>').attr('type', 'date').addClass('form-control').attr('name', 'fines[]')
            )
        )
        .append
        (
            $('<td>').addClass('text-center')
            .append
            (
                cboAuditores
            )
        )
        .append
        (
            $('<td>').addClass('text-center')
            .append
            (
                $('<div>').addClass('btn btn-danger').text('Eliminar')
            )
        )
    );
}

function funcNuevaAclaracion()
{
    $("#tablaAclaraciones")
    .append
    (
        $('<tr>')
        .append
        (
            $('<td>')
            .append
            (
                $('<input>').attr('type', 'text').addClass('form-control').attr('name', 'aclaraciones_si[]')
            )
        )
        .append
        (
            $('<td>')
            .append
            (
                $('<input>').attr('type', 'text').addClass('form-control').attr('name', 'aclaraciones_no[]')
            )
        )
        .append
        (
            $('<td>').addClass('text-center')
            .append
            (
                $('<div>').addClass('btn btn-primary').text('Guardar')
            )
            .append
            (
                $('<div>').addClass('btn btn-danger').text('Eliminar')
            )
        )
    );
}

function funcNuevaVenta()
{
	$("#TablaVenta")
	.append
	(
		$('<tr>')
        .append
        (
        	$('<td>')
            .append
            (
            	$('<input>').attr('type', 'text').addClass('form-control').attr('name', 'estrategias[]')
            )
        )
        .append
        (
        	$('<td>')
            .append
            (
            	$('<input>').attr('type', 'text').addClass('form-control').attr('name', 'alineamientos[]')
            )
        )
        .append
        (
        	$('<td>').addClass('text-center')
            .append
            (
            	$('<div>').addClass('btn btn-primary').text('Guardar')
            )
            .append
            (
            	$('<div>').addClass('btn btn-danger').text('Eliminar')
            )
        )
    );
	//.append("<tr><td>123</td><td>456</td></tr>");
}
