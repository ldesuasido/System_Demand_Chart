
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highcharts Example</title>
        <script type="application/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<style type="text/css">
#container {
	min-width: 310px;
	max-width: 800px;
	height: 400px;
	margin: 0 auto
}
		</style>
	</head>
	<body>
<script src="res/code/highcharts.js"></script>
<script src="res/code/modules/series-label.js"></script>
<script src="res/code/modules/exporting.js"></script>
<script src="res/code/modules/export-data.js"></script>

<div id="container"></div>



		<script type="text/javascript">
        var downloading=0;
        var ldapel= new Array();
        var lrtd= new Array();
        var lrtx= new Array();
        $(document).ready(function() {
            get_data();   
            setInterval('get_data();',28000);
  
	    }
);
        function get_data(){
                    if(downloading == 1){
                            return;
                        }
                        
                        downloading = 1;                         
                    $.ajax({
                    url: "http://localhost:8080/sysdemand/index.php/csysdemand/get_csd",
                    type: "post",
                    dataType: "json",
                    data: {},
                    success: function(data){
                            if(data == null)
                            {
                                get_data();
                                return;
                            }
                            console.log(data);
                           
                            //var dapraw_json =data;
                        // var arr = JSON.parse(dapraw_json);
                        var sr="";
                            function pad(n, width, z) {
                                z = z || '0';
                                n = n + '';
                                return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
                            }

                            data.forEach(function(arr) {
                          //dap
                                if(arr['sd_region'] == "LUZON") {
                                for(var i = 1; i <= 24; ++i) {      
                                ldapel[i]= arr['sd_dapel_' + pad(i, 2)];      
                                lrtd[i]=arr['sd_rtd_'+pad(i,2)];
                                lrtx[i]=arr['sd_rtx_'+pad(i,2)];
                                
                                }
                                }
                              //  ldapel=JSON.stringify(ldapel);
                            
                                console.log(ldapel);
                                 });

                                            downloading = 0;
                                    },
                                    error:function(){
                                            downloading = 0;
                                        get_data();
                                    }   
                                    }); 
        }

Highcharts.chart('container', {

    title: {
        text: 'System Demand'
    },

    subtitle: {
        text: 'Source:'
    },

    yAxis: {
        title: {
            text: 'MW'
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
    },

    plotOptions: {
        series: {
            label: {
                connectorAllowed: false
            },
            pointStart: 1
        }
    },

    series: [{
        name: 'Installation',
        data: ldapel
    }, {
        name: 'Manufacturing',
        data: ldapel
    }, {
        name: 'Sales & Distribution',
        data: ldapel
    }, {
        name: 'Project Development',
        data: ldapel
    }, {
        name: 'Other',
        data: ldapel
    }],
        

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            },
            chartOptions: {
                legend: {
                    layout: 'horizontal',
                    align: 'center',
                    verticalAlign: 'bottom'
                }
            }
        }]
    }

});
		</script>
	</body>
</html>
