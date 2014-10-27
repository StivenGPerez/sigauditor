function consolidado(){

	//window.location = baseurl+'index.php/con_consolidado/consolidado';

	var inter_id = $('#interventoria').val();
	var emp_id = $('#emp_id').val();
	
	if(inter_id=='-1' || emp_id=='-1'){
		alert("Por favor seleccione una empresa y una interventoría");
	}else{

		$.post(baseurl+'index.php/con_consolidado/consolidado',{'inter_id': inter_id},
        	function(data){     
               $('#consolidado').html(data);           
    	});
	}

}



function consecutivos_consolidado(){
    //alert("hola");

    var emp_id =document.getElementById("emp_id").value;
    $.post(baseurl+'index.php/con_consolidado/selec_interventoria',{'emp_id': emp_id},
        function(data){     
                $('#interven').html(data);           
        });
}