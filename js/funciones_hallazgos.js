function hallazgos(){
    var inter_id =document.getElementById("interventoria").value;
        
    if(inter_id==-1){
    	alert("Por favor seleccione una empresa y una interventoría  ");
    	return false;
    }else{
    	$.post(baseurl+'index.php/con_hallazgos/hallazgos',{'inter_id': inter_id},
        function(data){     
                $('#hallazgos').html(data);           
    	});
    }

            
}





function consecutivos_hallazgos(){
    //alert("hola");

    var emp_id =document.getElementById("emp_id").value;
    $.post(baseurl+'index.php/con_hallazgos/selec_interventoria',{'emp_id': emp_id},
        function(data){     
                $('#interven').html(data);           
        });
}