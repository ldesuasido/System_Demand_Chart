
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Highcharts Example</title>
        <script type="application/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">   

		<style type="text/css">
#container {
	min-width: 310px;
	max-width: 800px;
	height: 400px;
	margin: 0 auto
}
.div1 { width: 50%; height: 50%; float: left; }
.div2 { width: 50%; height: 50%; float: right; }
		</style>
        <script src="res/code/highcharts.js"></script>
<script src="res/code/modules/exporting.js"></script>
<script src="res/code/modules/export-data.js"></script>





		<script type="text/javascript">
        var sldapel=[];
        var downloading=0;
        var line= [123,123,123,123,123,123];
        var ldapel= new Array();
        var lrtd= new Array();
        var lrtx= new Array();
        var vdapel= new Array();
        var vrtd= new Array();
        var vrtx= new Array();
        var sdapel= new Array();
        var srtd= new Array();
        var srtx= new Array();
        var min_srtd,min_srtx,min_lrtd,min_lrtx,min_vrtd,min_vrtx,max_srtd,max_srtx,max_lrtd,max_lrtx,max_vrtd,max_vrtx,ave_srtd,ave_srtx,ave_lrtd,ave_lrtx,ave_vrtd,ave_vrtx=0;



       $(function () {
                var processed_json = new Array();   
                $.getJSON('http://localhost:1234/sysdemand/index.php/csysdemand/get_csd', function(data) {
                    // Populate series
                    function bouncer(arr){
                        return arr.filter(Boolean);
                    }
                   function pad(n, width, z) {
                                z = z || '0';
                                n = n + '';
                                return n.length >= width ? n : new Array(width - n.length + 1).join(z) + n;
                            }
                    function avg(x){
                        bouncer(x).reduce((previous, current)=>current+=previous);
                        return x/bouncer(x).length;
                    }
                 data.forEach(function(arr) {
         
                                if(arr['sd_region'] == "LUZON") {
                                for(var i = 1; i <= 24; ++i) {      
                                ldapel.push(parseInt(arr['sd_dapel_' + pad(i, 2)],10));      
                                lrtd.push(parseInt(arr['sd_rtd_'+pad(i,2)],10));
                                lrtx.push(parseInt(arr['sd_rtx_'+pad(i,2)],10));
                                
                                }
                                ave_lrtd=avg(lrtd);
                                ave_lrtx=avg(lrtx);
                                min_lrtd=Math.min(...bouncer(lrtd));
                                max_lrtd=Math.max(...bouncer(lrtd)); 
                                min_lrtx=Math.min(...bouncer(lrtx));
                                max_lrtx=Math.max(...bouncer(lrtx)); 
                                $("#lminrtx").html(parseInt(min_lrtx));                                
                                $("#lmaxrtx").html(parseInt(max_lrtx));
                                $("#lavertx").html(parseInt(ave_lrtx));
                                $("#lminrtd").html(parseInt(min_lrtd));
                                $("#lmaxrtd").html(parseInt(max_lrtd));                                
                                $("#lavertd").html(parseInt(ave_lrtd));
                                
                                
                                }
                                if(arr['sd_region'] == "VISAYAS") {
                                for(var i = 1; i <= 24; ++i) {      
                                vdapel.push(parseInt(arr['sd_dapel_' + pad(i, 2)],10));      
                                vrtd.push(parseInt(arr['sd_rtd_'+pad(i,2)],10));
                                vrtx.push(parseInt(arr['sd_rtx_'+pad(i,2)],10));
                                
                               // console.log(vdapel);
                                }
                                ave_vrtd=avg(lrtd);
                                ave_vrtx=avg(lrtx);
                                min_vrtd=Math.min(...bouncer(vrtd));
                                max_vrtd=Math.max(...bouncer(vrtd)); 
                                min_vrtx=Math.min(...bouncer(vrtx));
                                max_vrtx=Math.max(...bouncer(vrtx)); 
                                $("#vminrtx").html(parseInt(min_vrtx));                                
                                $("#vmaxrtx").html(parseInt(max_vrtx));
                                $("#vavertx").html(parseInt(ave_vrtx));
                                $("#vminrtd").html(parseInt(min_vrtd));
                                $("#vmaxrtd").html(parseInt(max_vrtd));                                
                                $("#vavertd").html(parseInt(ave_vrtd));
                                
                                }
                                if(arr['sd_region'] == "SYSTEM") {
                                for(var i = 1; i <= 24; ++i) {      
                                sdapel.push(parseInt(arr['sd_dapel_' + pad(i, 2)],10));      
                                srtd.push(parseInt(arr['sd_rtd_'+pad(i,2)],10));
                                srtx.push(parseInt(arr['sd_rtx_'+pad(i,2)],10));
                                
                              //  console.log(vdapel);
                                }
                                ave_srtd=avg(srtd);
                                ave_srtx=avg(srtx);
                                console.log(ave_srtd);
                                min_srtd=Math.min(...bouncer(srtd));
                                max_srtd=Math.max(...bouncer(srtd)); 
                                min_srtx=Math.min(...bouncer(srtx));
                                max_srtx=Math.max(...bouncer(srtx)); 
                                $("#sminrtx").html(parseInt(min_srtx));                                
                                $("#smaxrtx").html(parseInt(max_srtx));
                                $("#savertx").html(parseInt(ave_srtx));
                                $("#sminrtd").html(parseInt(min_srtd));
                                $("#smaxrtd").html(parseInt(max_srtd));                                
                                $("#savertd").html(parseInt(ave_srtd));
                                
                                }
                                });
                    // draw chart
                    $('#container').highcharts({
                     title: {
        text: 'System Demand'
    },

     xAxis: {
        title: {
            text: 'INTERVAL'
        },
            tickInterval: 1
    },
    yAxis: {
        title: {
            text: 'MW'
        },
            tickInterval: 2000
    },
   

    plotOptions: {
        series: {
            marker: {
                radius: 2
            },
            dataLabels: {
                enabled: false
            },
           
            lineWidth: 1, 
            pointStart: 1,
            showInLegend: true
        }
    },

    series: [{
        name: 'LUZON DAPEL',
        data: ldapel
    },  {
        name: 'LUZON RTD',
        data: lrtd
    }, {
        name: 'LUZON RTX',
        data: lrtx
    }, {
        name: 'VISAYAS DAPEL',
        data: vdapel
    },{
        name: 'VISAYAS RTD',
        data: vrtd
    },{
        name: 'VISAYAS RTX',
        data: vrtx
    },{
        name: 'SYSTEM DAPEL',
        data: sdapel
    },{
        name: 'SYSTEM RTD',
        data: srtd
    },{
        name: 'SYSTEM RTX',
        data: srtx
    },],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 450
            } 
        }]
    }
                }); 
            });
        });



      


                            
		</script>
	</head>
	<body style="font-family:'Roboto',sans-serif;overflow:hidden;">
        
    <div id="container" style="height: 400px;width:450px;align:left;" class="div1"></div>
    <div>
    <br>
        <table class="table-bordered table-striped" cellpadding="10"width="50%">
            <tr>
                <th></th>
                <th>SYSTEM</th>
                <th>LUZON</th>
                <th>VISAYAS</th>
            </tr>
            <tr>
                <th>MIN</th>
                <th id="sminrtd"></th>
                <th id="lminrtd"></th>
                <th id="vminrtd"></th>
            </tr>
            <tr>
                <th>MAX</th>
                <th id="smaxrtd"></th>
                <th id="lmaxrtd"></th>
                <th id="vmaxrtd"></th>
            </tr> <tr>
                <th>AVE</th>
                <th id="savertd"></th>
                <th id="lavertd"></th>
                <th id="vavertd"></th>
            </tr>

        </table>
        <br><br>
        <table class="table-bordered table-striped" cellpadding="10"width="50%">
            <tr>
                <th></th>
                <th>SYSTEM</th>
                <th>LUZON</th>
                <th>VISAYAS</th>
            </tr>
            <tr>
                <th>MIN</th>
                <th id="sminrtx"></th>
                <th id="lminrtx"></th>
                <th id="vminrtx"></th>
            </tr>
            <tr>
                <th>MAX</th>
                <th id="smaxrtx"></th>
                <th id="lmaxrtx"></th>
                <th id="vmaxrtx"></th>
            </tr> <tr>
                <th>AVE</th>
                <th id="savertx"></th>
                <th id="lavertx"></th>
                <th id="vavertx"></th>
            </tr>

        </table>
    </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>


	</body>
    
</html>
