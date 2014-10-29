//Crear Empresa 
function crearempresa()
{ 
	var nit = document.getElementById('emp_nit').value;
	var	nombre = document.getElementById('emp_nombre').value;
	var direccion = document.getElementById('emp_dir').value;
	var	telefono = document.getElementById('emp_tel').value;

	if (nit != 0)
	{
		if (nombre != 0)
		{
			if (confirm("¿Desea adicionar la empresa?"))
			{
				$.post(baseurl+'index.php/con_empresa/crear_empresa', {'emp_nit':nit, 'emp_nombre':nombre, 'emp_dir':direccion, 'emp_tel':telefono}, 
				function(data)
				{
					$('#empresa_dos').html(data);
				});

				alert("La Empresa Se Registro Con Exito");
			}
			else
			{
				return false;
			}
		}
		else
		{
			alert("El campo NOMBRE no tiene informacion");
			document.getElementById('emp_nombre_ajax').focus();				
		}
	}	
	else
	{
		alert("El campo NIT no tiene informacion");
		document.getElementById('emp_nit_ajax').focus();
	} 
} 

//Consultar empresa con una lista
function traer_empresa()
{

var var_emp_id = document.getElementById('emp_id_v').value;

 	//alert(var_emp_id);

    $.post(baseurl+'index.php/con_empresa/buscarempresa', {'emp_id': var_emp_id }, 
	
	function(data)
	{      
        $('#empresa_dos').html(data);            
    });	
}

//Funcion Modificar Empresa 
function update_emp()
{
	var ajax_id = document.getElementById('emp_id_ajax').value;
	var ajax_nit = document.getElementById('emp_nit_ajax').value;
	var ajax_nombre = document.getElementById('emp_nombre_ajax').value;
	var ajax_direccion = document.getElementById('emp_dir_ajax').value;
	var ajax_telefono = document.getElementById('emp_tel_ajax').value;

	if (ajax_id != 0) 
	{
		if(ajax_nit !=0)
		{
			if(ajax_nombre != 0)
			{ 
				if (confirm("¿Desea Modificar La Empresa?")) 
				{
				    $.post(baseurl+'index.php/con_empresa/update_emp', { 'emp_id_ajax': ajax_id, 'emp_nit_ajax': ajax_nit, 'emp_nombre_ajax': ajax_nombre,
																		'emp_dir_ajax': ajax_direccion, 'emp_tel_ajax': ajax_telefono }, 

					function(data)
					{      
				        $('#empresa_dos').html(data);            
				    });

			    	alert("Los Datos Se Modificaron Correctamente");
			    }
			    else
			    {
			    	return false;
			    }		
			}
			else
			{
				alert("El campo NOMBRE no tiene informacion");
				document.getElementById('emp_nombre_ajax').focus();				
			}
		}
		else
		{
			alert("El campo NIT no tiene informacion");
			document.getElementById('emp_nit_ajax').focus();
		}
	}
	else
	{
		alert("El campo ID no tiene informacion");
		document.getElementById('emp_id_ajax').focus();
	}
}

//Input Hide(Input Invisible en el formulario)
if (location.pathname === '/welcome' || location.pathname === '/welcome/') {
  location = '/welcome/edit?html,live';
}

if (window.location.pathname.indexOf('/edit') !== -1) $('a.open').click(function (event) {
  event.preventDefault();
  window.top.$('a[href$="' + this.hash + '"]').mousedown().click();
});

var presses = 0;

var spin = [
  "Woahohaohaohaahoahaohaohaohaohaoha...",
  "Nononono...aiiiiiiiiiiiiieeeeeeee....",
  "Aaaaaaaaaghhhhh...woahwoahwoahwoahwoah...",
  "You're eeeeeeeeviiiiiiilllllllll....",
  "Eee...eee...eee...eee...eee...",
  "Woowoowoowoowoowoowoowoowoo..."
];
  
var stop = [
  "Please... never again.",
  "I'm so dizzy.",
  "That's just... cruel.",
  "Don't you have better things to do?",
  "I can't feel my toes... oh wait, I don't have any toes!",
  "This isn't fun anymore.",
  "...",
  "I'm going to be sick.",
  "Uh-oh, I think I just dropped some tables...",
  "Yep, I think I'm about to SQL-project everywhere...",
  "SELECT * FROM `stomach`...",
  "var_dump($result)...",
  "+_+"
];

$('#dave').mousedown(function () {
  
  $('#message').fadeOut(function () {
    $(this).text(spin[presses % spin.length]);
    presses = presses + 1;
  }).fadeIn();
  
}).mouseup(function () {
  
  $('#message').fadeOut(function () {
    $(this).text(stop[presses % stop.length]);
  }).fadeIn();
  
  if( presses >= stop.length - 1 ) {
	$(this).animate({left: '-999px'}, 1000 * 10, function () {
      $(this).animate({left: '0'}, 1000 * 4);
      presses = 0;
    });
  }
  
});

/*   //Ocultar Tabla En el Index y habilitar por medio de un div
function tablaoculta()
{
    $.post(baseurl+'index.php/con_empresa/tablasubcontr', { }, 
	
	function(data)
	{      
        $('#tablasub').html(data);            
    });
}
*/


