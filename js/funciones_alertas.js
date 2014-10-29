//selecciona y crea el select con las interventorias de una empresa
function consecutivos_alertas(){
    //alert("hola");

    var emp_id =document.getElementById("emp_id").value;
    $.post(baseurl+'index.php/con_alertas/selec_interventoria',{'emp_id': emp_id},
        function(data){     
                $('#interven').html(data);           
        });
}

function alertas(){
    var inter_id =document.getElementById("interventoria").value;
        
    if(inter_id==-1){
        alert("Por favor seleccione una empresa y una interventoría  ");
        return false;
    }else{
        $.post(baseurl+'index.php/con_alertas/alertas',{'inter_id': inter_id},
        function(data){     
                $('#alertas').html(data);           
        });
    }
}