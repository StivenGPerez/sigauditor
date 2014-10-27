function dis_per_act(inter_id){
// $(document).ready(function() {

var options = {
    chart: {
        renderTo: 'dis_per_act',
        zoomType: 'xy',
        //plotBackgroundImage: baseurl+'img/fondo.png'  //imagen de fondo
            margin: 75,
            options3d: {
                enabled: true,
                alpha: 15,
                beta: 15,
                depth: 50,
                viewDistance: 25
            }
    },
     title: {
            text: '<strong>Distribución del personal activo</strong>',
            align:'left'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
    series: []
    }



    //var id=$("#estacion_id").attr("value");
    
        $.getJSON(baseurl+'index.php/con_graficas/distri_personal_activo',{'inter_id': inter_id}, function(json){
        
            //options.xAxis.categories = json[0]['data'];
            options.series[0] = json[0];

            //options.xAxis.categories = Array{A,B,C,D};
            //options.series[0] = Array{1,2,3,4};

            options.series[0].color="#0101DF";
            options.series[0].name="Personas";
            options.series[0].type="pie";
            
            chart = new Highcharts.Chart(options);
        });




}