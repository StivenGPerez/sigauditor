//Consultar empresa con una lista
function list_empresa()
{

var var_emp_id = document.getElementById('emp_id_v').value;

 	//alert(var_emp_id);

    $.post(baseurl+'index.php/con_formulario/listar_empresa', {'emp_id': var_emp_id }, 
	
	function(data)
	{      
        $('#lista_empresas').html(data);            
    });	
}


function list_municipios()
{
	var mun_id = document.getElementById('mun_id').value;

	$.post(baseurl+'index.php/con_formulario/lista_empresas',{'mun_id': mun_id},

		function(data)
		{
			$('#lista_municipios').magicSuggest(data);
		});
}

$(document).ready(function() {    
    //Al escribr dentro del input con id="service"
    $('#mun_id').keypress(function(){
        //Obtenemos el value del input
        var service = $(this).val();        
        var dataString = 'mun_id='+service;

        //Le pasamos el valor del input al ajax
        $.ajax({
            type: "POST",
            url: "autocomplete.php",
            data: dataString,
            success: function(data) {
                //Escribimos las sugerencias que nos manda la consulta
                $('#suggestions').fadeIn(1000).html(data);
                //Al hacer click en algua de las sugerencias
                $('.suggest-element').live('click', function(){
                    //Obtenemos la id unica de la sugerencia pulsada
                    var id = $(this).attr('id');
                    //Editamos el valor del input con data de la sugerencia pulsada
                    $('#service').val($('#'+id).attr('data'));
                    //Hacemos desaparecer el resto de sugerencias
                    $('#suggestions').fadeOut(1000);
                });              
            }
        });
    });              
});           




