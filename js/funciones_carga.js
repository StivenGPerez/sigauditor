function verificar_si_debe_cargar(){
    //alert("hola");
    var emp_id =document.getElementById("emp_id").value;
    var inter_id =document.getElementById("interventoria").value;
        
    $.post(baseurl+'index.php/con_modulo_carga/carga',{'emp_id': emp_id, 'inter_id': inter_id},
        function(data){     
                $('#carga').html(data);           
        });
}

function consecutivos(){
    //alert("hola");

    var emp_id =document.getElementById("emp_id").value;
    $.post(baseurl+'index.php/con_modulo_carga/selec_interventoria',{'emp_id': emp_id},
        function(data){     
                $('#interven').html(data);           
        });
} 


function nueva_interventoria(){
    var emp_id =document.getElementById("emp_id").value;


    if(confirm("Está seguro de abrir un nuevo proceso interventor")){
        $.post(baseurl+'index.php/con_modulo_carga/crear_interventoria',{'emp_id': emp_id},
        function(data){     
                $('#interven').html(data);        
        });
    }
}



function cruzar_informacion(){
    var empresa =document.getElementById("emp_id").value;
    var inter_id =document.getElementById("interventoria").value;

    if (empresa=="-1" || inter_id=="-1") {
    	alert("Por favor seleccione una empresa y una Interventoria");
    	document.getElementById("emp_id").focus();
    	return false;

    }else{
        var empresa_text =document.getElementById("emp_id");
        var nom_emp = empresa_text.options[empresa_text.selectedIndex].text;

        var inter =document.getElementById("interventoria");
        var inter_nom = inter.options[inter.selectedIndex].text;

		$.post(baseurl+'index.php/con_modulo_carga/cruzar_informacion',{'emp_id': empresa, 'emp_nom': nom_emp, 'inter_id': inter_id, 'inter_nom': inter_nom },
        function(data){     
                $('#pista_contratista').html(data);           
        });       

        document.getElementById("cruzar").disabled = true;
    }
}


//funcion javascript que envia el formulario al controlador que maneja contratista
function enviar_contratista(){
    var empresa =document.getElementById("emp_id").value;
    var inter_id =document.getElementById("interventoria").value;
    
    if (empresa=="-1" || inter_id=="-1") {
        alert("Por favor seleccione una empresa y una Interventoria");
        document.getElementById("emp_id").focus();
        return false;
    }else{
        var ruta_con =document.getElementById("ruta_con").value;
        if (ruta_con.length == 0) {
            alert("Por favor cargue un archivo CSV");
            document.getElementById("ruta_con").focus();
            return false;
        }else{
            waitingDialog.show();setTimeout(function () {waitingDialog.hide();}, 3000);

            var empresa_text =document.getElementById("emp_id");
            //var empresa_id =document.getElementById("emp_id").value;
            var nom_emp = empresa_text.options[empresa_text.selectedIndex].text;

            var inter =document.getElementById("interventoria");    
            var inter_nom = inter.options[inter.selectedIndex].text;

            document.getElementById("empresa_con").value=nom_emp;
            document.getElementById("empresa_con_id").value=empresa;

            document.getElementById("inter_nom").value=inter_nom;
            document.getElementById("inter_id").value=inter_id;
        
        	document.form_con.submit();
        }
    }
}

function enviar_activos(){
    var empresa =document.getElementById("emp_id").value;
    var inter_id =document.getElementById("interventoria").value;
    
    if (empresa=="-1" || inter_id=="-1") {
        alert("Por favor seleccione una empresa");
        document.getElementById("emp_id").focus();
        return false;
    }else{
        var ruta_act =document.getElementById("ruta_act").value;
        if (ruta_act.length == 0) {
            alert("Por favor cargue un archivo CSV");
            document.getElementById("ruta_act").focus();
            return false;
        }else{
            waitingDialog.show();setTimeout(function () {waitingDialog.hide();}, 3000);

            var empresa_text =document.getElementById("emp_id");
            //var empresa_id =document.getElementById("emp_id").value;
            var nom_emp = empresa_text.options[empresa_text.selectedIndex].text;

            var inter =document.getElementById("interventoria");    
            var inter_nom = inter.options[inter.selectedIndex].text;

            document.getElementById("empresa_act").value=nom_emp;
            document.getElementById("empresa_act_id").value=empresa;

            document.getElementById("inter_nom_act").value=inter_nom;
            document.getElementById("inter_id_act").value=inter_id;

        	document.form_act.submit();
        }
    }
}

function enviar_remitidos(){
    var empresa =document.getElementById("emp_id").value;
    var inter_id =document.getElementById("interventoria").value;
    

    if (empresa=="-1" || inter_id=="-1") {
        alert("Por favor seleccione una empresa y la interventoria");
        document.getElementById("emp_id").focus();
        return false;
    }else{
        var ruta_rem =document.getElementById("ruta_rem").value;
        if (ruta_rem.length == 0) {
            alert("Por favor cargue un archivo CSV");
            document.getElementById("ruta_rem").focus();
            return false;
        }else{
           waitingDialog.show();setTimeout(function () {waitingDialog.hide();}, 3000);

            var empresa_text =document.getElementById("emp_id");
            //var empresa_id =document.getElementById("emp_id").value;
            var nom_emp = empresa_text.options[empresa_text.selectedIndex].text;

            var inter =document.getElementById("interventoria");    
            var inter_nom = inter.options[inter.selectedIndex].text;

            document.getElementById("empresa_rem").value=nom_emp;
            document.getElementById("empresa_rem_id").value=empresa;

            document.getElementById("inter_nom_rem").value=inter_nom;
            document.getElementById("inter_id_rem").value=inter_id;

        	document.form_rem.submit();
        }
    }
}




/*function consolidado(){
    //alert("hola");
    var emp_id =document.getElementById("emp_id").value;
    $.post(baseurl+'index.php/con_consolidado/consolidado',{'emp_id': emp_id},
        function(data){     
                $('#consolidado').html(data);           
        });
}*/ 













//funcion que gestiona el filtro del modulo consolidado tablas contratistas activos y remitidos
$(document).on('click', '.filterable .btn-filter', function(event) {            
//$(document).on(function(){

   // $('.filterable .btn-filter').click(function(){
        var $panel = $(this).parents('.filterable'),
        $filters = $panel.find('.filters input'),
        $tbody = $panel.find('.table tbody');
        if ($filters.prop('disabled') == true) {
            $filters.prop('disabled', false);
            $filters.first().focus();
        } else {
            $filters.val('').prop('disabled', true);
            $tbody.find('.no-result').remove();
            $tbody.find('tr').show();
        }
  //  });

    $('.filterable .filters input').keyup(function(e){
        /* Ignore tab key */
        var code = e.keyCode || e.which;
        if (code == '9') return;
        /* Useful DOM data and selectors */
        var $input = $(this),
        inputContent = $input.val().toLowerCase(),
        $panel = $input.parents('.filterable'),
        column = $panel.find('.filters th').index($input.parents('th')),
        $table = $panel.find('.table'),
        $rows = $table.find('tbody tr');
        /* Dirtiest filter function ever ;) */
        var $filteredRows = $rows.filter(function(){
            var value = $(this).find('td').eq(column).text().toLowerCase();
            return value.indexOf(inputContent) === -1;
        });
        /* Clean previous no-result if exist */
        $table.find('tbody .no-result').remove();
        /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
        $rows.show();
        $filteredRows.hide();
        /* Prepend no-result row if all rows are filtered */
        if ($filteredRows.length === $rows.length) {
            $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
        }
    });
});





/*function generar_xml(){
    var emp_id =document.getElementById("emp_id").value;
    $.post(baseurl+'index.php/con_consolidado/excel_consolidado',{'emp_id': emp_id},
        function(data){     
                $('#excel').html(data);     
                //window.open(baseurl+'index.php/con_consolidado/excel_consolidado');      
        });
}*/