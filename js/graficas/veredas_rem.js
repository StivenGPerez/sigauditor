function veredas_rem(inter_id){
// $(document).ready(function() {

var options = {
    chart: {
        renderTo: 'veredas_rem',
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
        text: '<strong>Comunidades que remitieron MONC que pasaron por RSC</strong>',
        align:'left'
    },
    subtitle: {
        text: null
    },
    xAxis: {
        categories: [],
        tickInterval: 1,
        title: {enabled: true, text: 'Veredas'},
        labels: {
            align: 'center',
            rotation: -30,
            x: -3,
            y: 20,
            /*formatter: function() {
                return Highcharts.dateFormat(format, Date.parse(this.value +' UTC'));
            }*/
        }
    },
    plotOptions: {
        series: { 
            animation: {duration: 3000}, 
            allowPointSelect: true,
            marker: {enabled: false} 
        },
        line: { marker: { enabled: false}},
        column: {
                depth: 25
            }
    },
    yAxis: {
        min: 0,
        title: {text: 'Personas'},
        plotLines: [{
            value: 0,
            width: 1,
            color: '#FC0606'
        }]
    },
    tooltip: {
        crosshairs: true,
        shared: true
        /*formatter: function() {
            return '<b>'+ this.series.name +'</b><br/>'+
            Highcharts.dateFormat('%l:%M%p', Date.parse(this.x +' UTC')) +': '+ this.y+' Â°';
        }*/
    },

    legend: {
        layout: 'horizontal',
        backgroundColor: '#FFFFFF',
        align: 'right',
        verticalAlign: 'bottom',
        floating: true,
        //x: 90,
        //y: 5
    },

    series: []
    }



    //var id=$("#estacion_id").attr("value");
    
        $.getJSON(baseurl+'index.php/con_graficas/veredas_rem',{'inter_id': inter_id}, function(json){
        
            options.xAxis.categories = json[0]['data'];
            options.series[0] = json[1];

            //options.xAxis.categories = Array{A,B,C,D};
            //options.series[0] = Array{1,2,3,4};

            options.series[0].color="#0080FF";
            options.series[0].name="Personas";
            options.series[0].type="column";
            
            chart = new Highcharts.Chart(options);
        });




}