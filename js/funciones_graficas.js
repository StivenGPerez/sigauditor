function graficar(){
    var inter_id =document.getElementById("interventoria").value;
        
    if(inter_id==-1){
    	alert("Por favor seleccione una empresa y una interventoría  ");
    	return false;
    }else{
    	
    	dis_per_act(inter_id);
    	dis_tp_mobra(inter_id);
    	top_20_cargos_moc(inter_id);
    	veredas_rem(inter_id);
    }           
}


function consecutivos_graficas(){
    var emp_id =document.getElementById("emp_id").value;
    $.post(baseurl+'index.php/con_graficas/selec_interventoria',{'emp_id': emp_id}, function(data){     
                $('#interven').html(data);           
        });
}