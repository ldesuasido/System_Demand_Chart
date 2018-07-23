
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
        <META HTTP-EQUIV="refresh" CONTENT="240">


		<title>Highcharts Example</title>
        <script type="application/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">   

		<style type="text/css">
#container {
	height: 100%;
    width:100%;
	
    
}
#html,#body{
    position:fixed;
    top:0;
    bottom:0;
    left:0;
    right:0;
}
.div1 { width: 100%; height: 100%; grid-column:1;}
.div2 {  width: 100%; height: 100%; grid-column:2; }
.con { display:grid; grid-template-columns: repeat(auto-fill,minmax(500px,900px)); position:absolute;top:0;bottom:0;left:0;height:100%;width:100%;}
		</style>
        <script src="res/code/highcharts.js"></script>
<script src="res/code/modules/exporting.js"></script>
<script src="res/code/modules/export-data.js"></script>





		<script type="text/javascript">
        
        var downloading=0;
       $(document).ready(function() {
        get_ydata(); 
        get_data(); 
        setInterval('get_data();',28000);
        setInterval('get_ydata();',28000);
        }
    );
    function get_ydata(){
          $(function () {
        var ylrtd= new Array();
        var ylrtx= new Array();
        var yvrtd= new Array();
        var yvrtx= new Array();
        var ysrtd= new Array();
        var ysrtx= new Array();
        var yldate=new Array();
        var yvdate=new Array();
        var ysdate=new Array();
        var imin_ysrtd,imax_ysrtd,imin_ylrtd,imax_ylrtd,imin_yvrtd,imax_yvrtd=0;
        var dmin_ysrtd,dmax_ysrtd,dmin_ylrtd,dmax_ylrtd,dmin_yvrtd,dmax_yvrtd=0;
        var min_ylrtd,min_ysvrtd,min_ysrtd=0;
        var ave_sys,ave_luz,ave_vis=0;
        
        var no=0;
        if(downloading == 1)
            {
                return;
            }
            
            downloading = 1;

 
                $.getJSON('http://54.191.55.210/sysdemand/index.php/CSysDemand/get_ysd', function(data) {
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
                      var y = bouncer(x).reduce((previous, current)=>current+=previous);
                        return y/bouncer(x).length;
                    }
                 data.forEach(function(arr) {
         
                                if(arr['sd_region'] == "LUZON") {
                                for(var i = 1; i <= 24; ++i) {      
                                ylrtd.push(parseInt(arr['sd_rtd_'+pad(i,2)],10));
                                yldate.push(arr['sd_date']);
                                                             }
                                min_ylrtd=Math.min(...bouncer(ylrtd));
                                max_ylrtd=Math.max(...bouncer(ylrtd)); 
                               
                                
                                                                 }                                
                                if(arr['sd_region'] == "VISAYAS") {
                                for(var i = 1; i <= 24; ++i) {      
                                yvrtd.push(parseInt(arr['sd_rtd_'+pad(i,2)],10));
                                yvdate.push(arr['sd_date']);
                              
                                                             }
                                min_yvrtd=Math.min(...bouncer(yvrtd));
                                max_yvrtd=Math.max(...bouncer(yvrtd)); 
                                
                                
                                                                 }
                                if(arr['sd_region'] == "SYSTEM") {
                                for(var i = 1; i <= 24; ++i) {      
                                ysrtd.push(parseInt(arr['sd_rtd_'+pad(i,2)],10));
                                ysdate.push(arr['sd_date']); 
                                                             }
                                min_ysrtd=Math.min(...bouncer(ysrtd));
                                max_ysrtd=Math.max(...bouncer(ysrtd)); 
                                
                                                                 }
                 });
                 imin_ylrtd=ylrtd.indexOf(min_ylrtd);
                 dmin_ylrtd=yldate[imin_ylrtd];
                 imax_ylrtd=ylrtd.indexOf(max_ylrtd);
                 dmax_ylrtd=yldate[imax_ylrtd];

                 imin_yvrtd=yvrtd.indexOf(min_yvrtd);
                 dmin_yvrtd=yvdate[imin_yvrtd];
                 imax_yvrtd=yvrtd.indexOf(max_yvrtd);
                 dmax_yvrtd=yvdate[imax_yvrtd];
                 
                 imin_ysrtd=ysrtd.indexOf(min_ysrtd);
                 dmin_ysrtd=ysdate[imin_ysrtd];
                 imax_ysrtd=ysrtd.indexOf(max_ysrtd);
                 dmax_ysrtd=ysdate[imax_ysrtd];
                 ave_sys=avg(ysrtd);
                 ave_luz=avg(ylrtd);
                 ave_vis=avg(yvrtd);
                 console.log(ave_sys);
                 $("#dysminrtd").html(dmin_ysrtd);
                 $("#dylminrtd").html(dmin_ylrtd);
                 $("#dyvminrtd").html(dmin_yvrtd);
                 $("#dysmaxrtd").html(dmax_ysrtd);
                 $("#dylmaxrtd").html(dmax_ylrtd);
                 $("#dyvmaxrtd").html(dmax_yvrtd);

                 $("#ysminrtd").html(parseInt(min_ysrtd));
                 $("#ylminrtd").html(parseInt(min_ylrtd));
                 $("#yvminrtd").html(parseInt(min_yvrtd));
                 $("#ysmaxrtd").html(parseInt(max_ysrtd));
                 $("#ylmaxrtd").html(parseInt(max_ylrtd));
                 $("#yvmaxrtd").html(parseInt(max_yvrtd));
                 
                 console.log(dmin_ylrtd);
                $("#ysavertd").html(parseInt(ave_sys));
                $("#ylavertd").html(parseInt(ave_luz));
                $("#yvavertd").html(parseInt(ave_vis));
                 
                   
                 });
                  downloading = 0;
                 }); 
                 }
                


          







    function get_data(){
       $(function () {
        var sldapel=[];
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
        var imin_srtd,imin_srtx,imin_lrtd,imin_lrtx,imin_vrtd,imin_vrtx,imax_srtd,imax_srtx,imax_lrtd,imax_lrtx,imax_vrtd,imax_vrtx=0;
        if(downloading == 1)
            {
                return;
            }
            
            downloading = 1;
   
                $.getJSON('http://54.191.55.210/sysdemand/index.php/CSysDemand/get_csd', function(data) {
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
                      var y = bouncer(x).reduce((previous, current)=>current+=previous);
                        return y/bouncer(x).length;
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
                                imin_lrtd=lrtd.indexOf(min_lrtd)+1;
                                imax_lrtd=lrtd.indexOf(max_lrtd)+1; 
                                imin_lrtx=lrtx.indexOf(min_lrtx)+1; 
                                imax_lrtx=lrtx.indexOf(max_lrtx)+1;  
                                $("#ilminrtx").html(parseInt(imin_lrtx));                                
                                $("#ilmaxrtx").html(parseInt(imax_lrtx));
                                $("#ilminrtd").html(parseInt(imin_lrtd));
                                $("#ilmaxrtd").html(parseInt(imax_lrtd)); 
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
                                ave_vrtd=avg(vrtd);
                                ave_vrtx=avg(vrtx);
                                min_vrtd=Math.min(...bouncer(vrtd));
                                max_vrtd=Math.max(...bouncer(vrtd)); 
                                min_vrtx=Math.min(...bouncer(vrtx));
                                max_vrtx=Math.max(...bouncer(vrtx)); 
                              //  console.log(vrtd);
                                imin_vrtd=vrtd.indexOf(min_vrtd)+1;
                                imax_vrtd=vrtd.indexOf(max_vrtd)+1; 
                                imin_vrtx=vrtx.indexOf(min_vrtx)+1; 
                                imax_vrtx=vrtx.indexOf(max_vrtx)+1;  
                                $("#ivminrtx").html(parseInt(imin_vrtx));                                
                                $("#ivmaxrtx").html(parseInt(imax_vrtx));
                                $("#ivminrtd").html(parseInt(imin_vrtd));
                                $("#ivmaxrtd").html(parseInt(imax_vrtd)); 
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
                               // console.log(srtd);
                                imin_srtd=srtd.indexOf(min_srtd)+1;
                                imax_srtd=srtd.indexOf(max_srtd)+1; 
                                imin_srtx=srtx.indexOf(min_srtx)+1; 
                                imax_srtx=srtx.indexOf(max_srtx)+1;  
                                $("#isminrtx").html(parseInt(imin_srtx));                                
                                $("#ismaxrtx").html(parseInt(imax_srtx));
                                $("#isminrtd").html(parseInt(imin_srtd));
                                $("#ismaxrtd").html(parseInt(imax_srtd)); 
                                $("#sminrtx").html(parseInt(min_srtx));                                
                                $("#smaxrtx").html(parseInt(max_srtx));
                                $("#savertx").html(parseInt(ave_srtx));
                                $("#sminrtd").html(parseInt(min_srtd));
                                $("#smaxrtd").html(parseInt(max_srtd));                                
                                $("#savertd").html(parseInt(ave_srtd));
                                
                                }
                                });
                                downloading =0;
                    // draw chart
                    $('#container').highcharts({
    

     title: {
        text: 'System Demand'
    },

    legend: {
        align: 'left',
        verticalAlign: 'top',
        borderWidth: 0
    },

    tooltip: {
        shared: true,
        crosshairs: true
    },
     xAxis: {
         title: {
            text: 'Interval'
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
         line: {
        animation: false
    },
    
        series: {
            marker: {
                radius: 2
            },
            dataLabels: {
                enabled: false
            },
           
            lineWidth: 2, 
            pointStart: 1,
            showInLegend: true,
            
        }
    },

    series: [{
        name: 'LUZON DAPEL',
        data: ldapel,
        color: '#90CAF9'
    },  {
        name: 'LUZON RTD',
        data: lrtd,
        color: '#0D47A1'

    }, {
        name: 'LUZON RTX',
        data: lrtx,
        color: '#1E88E5'

    }, {
        name: 'VISAYAS DAPEL',
        data: vdapel,
        color: '#A5D6A7'
    },{
        name: 'VISAYAS RTD',
        data: vrtd,
        color: '#1B5E20'

        
    },{
        name: 'VISAYAS RTX',
        data: vrtx,
        color: '#43A047'

    },{
        name: 'SYSTEM DAPEL',
        data: sdapel,
        color: '#ef9a9a'
    },{
        name: 'SYSTEM RTD',
        data: srtd,
        color: '#b71c1c'
    },{
        name: 'SYSTEM RTX',
        data: srtx,
        color: '#e53935'
    },],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 500
            } 
        }]
    }
                }); 
            });
             downloading = 0;
        });


    }
      


                            
		</script>
	</head>
	<body style="font-family:'Roboto',sans-serif;font-size:13px;">
    <section class="con collapsed" style="width:100%">
    <div id="container" class="div1" style="width:100%;height:100%;"></div>
    <div class="div2" > 
    
        <table class="table-bordered text-center" cellpadding="10"width="100%"height="40%">
            <tr >
                <th class="table-primary"></th>
                <th class="table-primary">SYSTEM</th>
                <th style="width:10%" class="table-secondary">Int</th>
                <th class="table-primary">LUZON</th>
                <th style="width:10%" class="table-secondary">Int</th>
                <th class="table-primary">VISAYAS</th>
                <th style="width:10%" class="table-secondary">Int</th>
            </tr>
            <tr>
                <th class="table-primary">RTD-MIN</th>
                <th id="sminrtd"></th>
                <th id="isminrtd" style="width:10%" class="table-secondary"></th>
                <th id="lminrtd"></th>
                <th id="ilminrtd" style="width:10%" class="table-secondary"></th>
                <th id="vminrtd"></th>
                <th id="ivminrtd" style="width:10%" class="table-secondary"></th>
            </tr>
            <tr>
                <th class="table-primary">RTD-MAX</th>
                <th id="smaxrtd"></th>
                <th id="ismaxrtd"style="width:10%" class="table-secondary"></th>
                <th id="lmaxrtd"></th>
                <th id="ilmaxrtd"style="width:10%" class="table-secondary"></th>
                <th id="vmaxrtd"></th>
                <th id="ivmaxrtd"style="width:10%" class="table-secondary"></th>
            </tr>
            <tr>
                <th class="table-primary">RTD-AVE</th>
                <th id="savertd" colspan="2"></th>
                <th id="lavertd" colspan="2"></th>
                <th id="vavertd" colspan="2"></th>
            </tr>
            <tr>
                <th class="table-primary">RTX-MIN</th>
                <th id="sminrtx"></th>
                <th id="isminrtx"style="width:10%" class="table-secondary"></th>
                <th id="lminrtx"></th>
                <th id="ilminrtx"style="width:10%" class="table-secondary"></th>
                <th id="vminrtx"></th>
                <th id="ivminrtx"style="width:10%" class="table-secondary"></th>
            </tr>
            <tr>
                <th class="table-primary">RTX-MAX</th>
                <th id="smaxrtx"></th>
                <th id="ismaxrtx"style="width:10%" class="table-secondary"></th>
                <th id="lmaxrtx"></th>
                <th id="ilmaxrtx"style="width:10%" class="table-secondary"></th>
                <th id="vmaxrtx"></th>
                <th id="ivmaxrtx"style="width:10%" class="table-secondary"></th>
            </tr> 
            <tr>
                <th class="table-primary">RTX-AVE</th>
                <th id="savertx" colspan="2"></th>
                <th id="lavertx" colspan="2"></th>
                <th id="vavertx" colspan="2"></th>
            </tr>

        </table>
        <br><br><br>
        <br><br><br>
        <table class="table-bordered text-center" cellpadding="5"width="100%"height="40%">
            <tr class="table-primary">
                <th></th>
                <th>SYSTEM</th>
                <th>LUZON</th>
                <th>VISAYAS</th>
            </tr>
            <tr>
                <th class="table-primary" rowspan="2">MIN</th>
                <th id="ysminrtd"></th>
                <th id="ylminrtd"></th>
                <th id="yvminrtd"></th>
            </tr>
            <tr style="height:1%;" class="table-secondary">
                
                <td style="height:1%;" id="dysminrtd"></td>
                <td style="height:1%;" id="dylminrtd"></td>
                <td style="height:1%;" id="dyvminrtd"></td>
            </tr>
            <tr>
                <th class="table-primary" rowspan="2">MAX</th>
                <th id="ysmaxrtd"></th>
                <th id="ylmaxrtd"></th>
                <th id="yvmaxrtd"></th>
            </tr>
            <tr style="height:1%;" class="table-secondary">
                <td style="height:1%;" id="dysmaxrtd"></td>
                <td style="height:1%;" id="dylmaxrtd"></td>
                <td style="height:1%;" id="dyvmaxrtd"></td>
            </tr>
             
             <tr>
                <th class="table-primary">AVE</th>
                <th id="ysavertd"></th>
                <th id="ylavertd"></th>
                <th id="yvavertd"></th>
            </tr>

        </table>
    </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</section>
	</body>
    
</html>
