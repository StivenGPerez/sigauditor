//animacion del logo grupo sig
$('#logosig').addClass('animated bounceIn');

//esta función identifica cuando se inicia y finaliza una ejecución ajax para mostrar y ocultar el modal loading
//-------------------------------------------------------------------------------------------------
var __USE_GENERIC_LOADING__ = true;
 
$(document).ajaxSend(function (r, s) {
if (__USE_GENERIC_LOADING__)
    waitingDialog.show();//setTimeout(function () {waitingDialog.hide();}, 3000);
    //$("#contentLoading").show();
});
 
$(document).ajaxStop(function (r, s) {
    if (__USE_GENERIC_LOADING__)
        waitingDialog.hide();
        //$("#contentLoading").fadeOut("fast");
});
 
function invalidateGenericLoading() {
        __USE_GENERIC_LOADING__ = false;
}
//-------------------------------------------------------------------------------------------------

//esta funcion es para dar estilos al select de busquedas
$(".chosen-select").chosen({disable_search_threshold: 10});


//esta funcion es para el modal cargando que aparece al utilizar funciones ajax
var waitingDialog = (function ($) {

    // Creating modal dialog's DOM
	var $dialog = $(
		'<div class="modal fade" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">' +
		'<div class="modal-dialog modal-m">' +
		'<div class="modal-content">' +
			'<div class="modal-header"><h3 style="margin:0;"></h3></div>' +
			'<div class="modal-body">' +
				'<div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar" style="width: 100%"></div></div>' +
			'</div>' +
		'</div></div></div>');

	return {
		/**
		 * Opens our dialog
		 * @param message Custom message
		 * @param options Custom options:
		 * 				  options.dialogSize - bootstrap postfix for dialog size, e.g. "sm", "m";
		 * 				  options.progressType - bootstrap postfix for progress bar type, e.g. "success", "warning".
		 */
		show: function (message, options) {
			// Assigning defaults
			var settings = $.extend({
				dialogSize: 'm',
				progressType: ''
			}, options);
			if (typeof message === 'undefined') {
				message = 'Loading';
			}
			if (typeof options === 'undefined') {
				options = {};
			}
			// Configuring dialog
			$dialog.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-' + settings.dialogSize);
			$dialog.find('.progress-bar').attr('class', 'progress-bar');
			if (settings.progressType) {
				$dialog.find('.progress-bar').addClass('progress-bar-' + settings.progressType);
			}
			$dialog.find('h3').text(message);
			// Opening dialog
			$dialog.modal();
		},
		/**
		 * Closes dialog
		 */
		hide: function () {
			$dialog.modal('hide');
		}
	}

})(jQuery);



//esta funcion es para el boton ir arriba que aparece y desaparece
jQuery(document).ready(function() {
jQuery("#IrArriba").hide();
jQuery(function () {
jQuery(window).scroll(function () {
if (jQuery(this).scrollTop() > 200) {
jQuery('#IrArriba').fadeIn();
} else {
jQuery('#IrArriba').fadeOut();
}
});
jQuery('#IrArriba a').click(function () {
jQuery('body,html').animate({
scrollTop: 0
}, 800);
return false;
});
});

});


//Esta funcion es para el efecto del menu principal
var activeEl = 0;
$(function() {
    var items = $('.btn-nav');
    $( items[activeEl] ).addClass('active');
    $( ".btn-nav" ).click(function() {
        $( items[activeEl] ).removeClass('active');
        $( this ).addClass('active');
        activeEl = $( ".btn-nav" ).index( this );
    });
});



//esta funcion es para volver al menu principal desde cada modulo
function volver(){
	if(confirm("Está seguro de volver al menú principal"))
	window.location.href=baseurl+"index.php/inicio/principal";
}



//Como su nombre lo indica es la funcion para eliminar personas sin recargar la pagina
function crud_eliminar(id){
	if(confirm("¿Real mente desea eliminar esta persona?")){
	
		$.getJSON(baseurl+'index.php/con_consolidado/crud_eliminar', {'conso_id': id}, function(json){
			document.getElementById(id).style.display = 'none';
			if(json==true)crud_confirmar.show('Persona eliminada con éxito');
		});
	}
}


function crud_actualizar(id){
	if(confirm("¿Confirma la actualización los datos?")){

	
	var nombre=document.getElementById('nombre').value;
	var lug_nac=document.getElementById('lug_nac').value			
	var cedula=document.getElementById('cedula').value			
	var ced_exp=document.getElementById('ced_exp').value			
	var cargo=document.getElementById('cargo').value			
	var per_sol=document.getElementById('per_sol').value			
	var tp_mobra=document.getElementById('tp_mobra').value			
	var tp_contrato=document.getElementById('tp_contrato').value			
	var base_org=document.getElementById('base_org').value			
	var paso_rsc=document.getElementById('paso_rsc').value			
	var sp=document.getElementById('sp').value			
	var frente_trabajo=document.getElementById('frente_trabajo').value			
	var campo=document.getElementById('campo').value			
	var comunidad=document.getElementById('comunidad').value			
	var fecha_crea=document.getElementById('fecha_crea').value			
	var fecha_ini_cont=document.getElementById('fecha_ini_cont').value			
	var fecha_fin_cont=document.getElementById('fecha_fin_cont').value			

		$.getJSON(baseurl+'index.php/con_consolidado/crud_actualizar', 
				{'nombre': nombre, 'conso_id': id, 'lug_nac': lug_nac, 'cedula': cedula, 'ced_exp': ced_exp, 'cargo': cargo, 'per_sol': per_sol,
				'tp_mobra': tp_mobra, 'tp_contrato': tp_contrato, 'base_org': base_org, 'paso_rsc': paso_rsc, 'sp': sp,
				'frente_trabajo': frente_trabajo, 'campo': campo/*, 'comunidad': comunidad, 'fecha_crea': fecha_crea, 
				'fecha_ini_cont': fecha_ini_cont, 'fecha_fin_cont': fecha_fin_cont*/}, 
		function(json){
			//document.getElementById(id).style.display = 'none';
			//if(json==true)crud_confirmar.show('Persona actualizada con éxito');
			alert(json);
		});
	}
}

function crud_buscar(id){
	
	$.getJSON(baseurl+'index.php/con_consolidado/crud_buscar', {'conso_id': id}, function(json){
			//alert(json.nombre);

var $dialog = $('<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
        '<div class="modal-dialog modal-lg">' +
            '<div class="modal-content">' +
                '<div class="modal-header modal-header-info">' +
                    '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>' +
                    '<h4><i class="glyphicon glyphicon-refresh"></i> Actualizar persona</h4>' +
                '</div>' +
                '<div class="modal-body">' +

                	'<table class="table">' +
						'<tr>' +
							'<td align="right"><strong>Nombre:</strong></td>' +
							'<td><input type="text" name="nombre" id="nombre" class="form-control" value="'+json.nombre+'" size="" style="width:100%"></td>' +
							'<td align="right"><strong>Lugar Nacimiento:</strong></td>' +
							'<td><input type="text" name="lug_nac" id="lug_nac" class="form-control" value="'+json.lug_nac+'" size="" style="width:100%"></td>' +
						'</tr>' +
						'<tr>' +
							'<td align="right"><strong>Cedula:</strong></td>' +
							'<td><input type="text" name="cedula" id="cedula" class="form-control" value="'+json.cedula+'" size="" style="width:100%"></td>' +
							'<td align="right"><strong>Lugar de Expedición:</strong></td>' +
							'<td><input type="text" name="ced_exp" id="ced_exp" class="form-control" value="'+json.ced_exp+'" size="" style="width:100%"></td>' +
						'</tr>' +
						'<tr>' +
							'<td align="right"><strong>Cargo:</strong></td>' +
							'<td><input type="text" name="cargo" id="cargo" class="form-control" value="'+json.cargo+'" size="" style="width:100%"></td>' +
							'<td align="right"><strong>Perfil solicitado:</strong></td>' +
							'<td><input type="text" name="per_sol" id="per_sol" class="form-control" value="'+json.per_sol+'" size="" style="width:100%"></td>' +
						'</tr>' +
						'<tr>' +
							'<td align="right"><strong>Mano de obra:</strong><br><small>(MONC o MOC)</small></td>' +
							'<td><input type="text" name="tp_mobra" id="tp_mobra" class="form-control" value="'+json.tp_mobra+'" size="" style="width:100%"> </td>' +
							'<td align="right"><strong>Contrato:</strong></td>' +
							'<td><input type="text" name="tp_contrato" id="tp_contrato" class="form-control" value="'+json.tp_contrato+'" size="" style="width:100%"></td>' +
						'</tr>' +
						'<tr>' +
							'<td align="right"><strong>Bd. Origen:</strong></td>' +
							'<td><input type="text" name="base_org" id="base_org" class="form-control" value="'+json.base_org+'" size="" style="width:100%"></td>' +
							'<td align="right" colspan="2">'+
						'<table>'+
							'<tr>'+
								'<td align="right"><strong>Paso RSC:</strong></td><td align="right"><input type="text" name="paso_rsc" id="paso_rsc" class="form-control" value="'+json.paso_rsc+'" size="" style="width:90%"></td>'+
								'<td align="right"><strong>SP:</strong></td><td align="right"><input type="text" name="sp" id="sp" class="form-control" value="'+json.sp+'" size="" style="width:90%"></td>'+
							'</tr>'+
						'</table>'+
							'</td>' +
						'</tr>' +
						'<tr>' +
							'<td colspan="4">'+
								'<table class="table">'+
									'<tr>'+
										'<td align="right"><strong>Frente de trabajo: </strong></td><td align="right"><input class="form-control" type="text" name="frente_trabajo" id="frente_trabajo" value="'+json.frente_trabajo+'"> </td>'+
										'<td align="right"><strong>Campo: </strong></td><td align="right"><input class="form-control" type="text" name="campo" id="campo" value="'+json.campo+'"> </td>'+
										'<td align="right"><strong>Comunidad:v</strong></td><td align="right"><input class="form-control" type="text" name="comunidad" id="comunidad" value="'+json.comunidad+'"></td>'+
									'</tr>'+
									'<tr>'+
										'<td align="right"><strong>Fecha Creacion: </strong></td><td align="right"><input class="form-control" type="date" name="fecha_crea" id="fecha_crea" value="'+json.fecha_crea+'"> </td>'+
										'<td align="right"><strong>Inicio contrato: </strong></td><td align="right"><input class="form-control" type="date" name="fecha_ini_cont" id="fecha_ini_cont" value="'+json.fecha_ini_cont+'"> </td>'+
										'<td align="right"><strong>Fin contrato: </strong></td><td align="right"><input class="form-control" type="date" name="fecha_fin_cont" id="fecha_fin_cont" value="'+json.fecha_fin_cont+'"></td>'+
									'</tr>'+
								'</table>'+
							'</td>' +
						'</tr>' +
					'</table>' +

                '</div>' +
                '<div class="modal-footer">' +
                    '<button type="button" class="btn btn-hot pull-left text-uppercase btn-sm" data-dismiss="modal">Close</button>' +
                    '<button type="button" class="btn btn-fresh pull-right text-uppercase btn-sm" data-dismiss="modal" onclick="crud_actualizar('+id+');">'+
						'Actualizar '+
						'<i class="glyphicon glyphicon-refresh"></i>'+
					'</button>'+
                '</div>' +
            '</div>' +
        '</div>' +
    '</div>');
			
//lanza el modal con las caracteristicas de la persona
$dialog.modal();

	});
}









var crud_confirmar = (function ($) {

var $dialog = $('<div class="modal fade" id="success" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">' +
        '<div class="modal-dialog">' +
            '<div class="modal-content">' +
                '<div class="modal-header modal-header-success">' +
                    '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>' +
                    '<h1><i class="glyphicon glyphicon-thumbs-up"></i> <span></span></h1>' +
                '</div>' +
                '<div class="modal-body">' +
                '</div>' +
                '<div class="modal-footer">' +
                    '<button type="button" class="btn btn-default pull-right" data-dismiss="modal">Close</button>' +
                '</div>' +
            '</div>' +
        '</div>' +
    '</div>');
    

	return {

		show: function (message) {
		
			if (typeof message === 'undefined') { message = 'Loading'; }
			$dialog.find('span').text(message);
			// Opening dialog
			$dialog.modal();
		},
		/**
		 * Closes dialog
		 */
		hide: function () {
			$dialog.modal('hide');
		}
	}

})(jQuery);