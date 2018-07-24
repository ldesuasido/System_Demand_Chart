
<!DOCTYPE HTML>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
        <META HTTP-EQUIV="refresh" CONTENT="240">


		<title>Highcharts Example</title>
        <script type="application/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="res/bootstrap.min.css "/>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">   

		<style type="text/css">
#container {
	height: 100%;
    width:100%;
    max-height:100%;
	display:inline-block;
    
}
#html,#body{
    position:fixed;
    top:0;
    bottom:0;
    left:0;
    right:0;
}
.div1 { width: 100%; height: 100%; grid-column:1;display:inline-block;}
.div2 {  width: 100%; height: 100%; max-height:100%; grid-column:2;display:inline-block; }
.con { display:grid; grid-template-columns: repeat(auto-fill,minmax(500px,900px)); position:absolute;top:0;bottom:0;left:0;height:100%;width:100%;}
@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

body {
  background-color: #ECEFF1;
  font-family: "Roboto", helvetica, arial, sans-serif; 
  text-rendering: optimizeLegibility;
}


div.table-title {
   display: block;
  margin: auto; 
}

.table-title {
   color: #fafafa; 
   font-style:normal;
   font-family: "Roboto", helvetica, arial, sans-serif;
   text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
   text-transform:uppercase;
}
h6 {
   color: #455A64; 
   font-style:normal;
   font-family: "Roboto", helvetica, arial, sans-serif;
   text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
}

/*** Table Styles **/

.table-fill {
  background: white;
  border-radius:3px;
  border-collapse: collapse; 
  margin: auto; 
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
}
 
th {
  color:#D5DDE5;;
  background:#1b1e24;
  border-bottom:4px solid #9ea7af;
  border-right: 1px solid #343a45; 
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
 
}

th:first-child {
  border-top-left-radius:3px;
}
 
th:last-child {
  border-top-right-radius:3px;
  border-right:none;
}
  
tr {
  border-top: 1px solid #C1C3D1;
  border-bottom-: 1px solid #C1C3D1;
  color:#666B85; 
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}
 
tr:hover td {
  background:#4E5066;
  color:#FFFFFF;
  border-top: 1px solid #22262e;
}
 
tr:first-child {
  border-top:none;
}

tr:last-child {
  border-bottom:none;
}
 
tr:nth-child(odd) td {
  background:#EBEBEB;
}
 
tr:nth-child(odd):hover td {
  background:#4E5066;
}

tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}
 
tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}
 
td {
  background:#FFFFFF; 
  text-align:left;
  vertical-align:middle;

  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: left;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: right;
}

td.text-left {
  text-align: left;
}

td.text-center {
  text-align: center;
}

td.text-right {
  text-align: right;
}
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
                     function formatNumber (num) {
                        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
                    }
                    function getInterval(i){
                        var j=(i+1)%24;
                        if(j!=0){
                        return j;
                        }
                        else{
                            return 24;
                        }

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
                 console.log(ysrtd);
                 console.log(ave_sys);
                 $("#dysminrtd").html(dmin_ysrtd);
                 $("#dylminrtd").html(dmin_ylrtd);
                 $("#dyvminrtd").html(dmin_yvrtd);
                 $("#dysmaxrtd").html(dmax_ysrtd);
                 $("#dylmaxrtd").html(dmax_ylrtd);
                 $("#dyvmaxrtd").html(dmax_yvrtd);

                 $("#ysminrtd").html(formatNumber(parseInt(min_ysrtd)));
                 $("#ylminrtd").html(formatNumber(parseInt(min_ylrtd)));
                 $("#yvminrtd").html(formatNumber(parseInt(min_yvrtd)));
                 $("#ysmaxrtd").html(formatNumber(parseInt(max_ysrtd)));
                 $("#ylmaxrtd").html(formatNumber(parseInt(max_ylrtd)));
                 $("#yvmaxrtd").html(formatNumber(parseInt(max_yvrtd)));
                 
                 console.log(dmin_ylrtd);
                $("#ysavertd").html(formatNumber(parseInt(ave_sys)));
                $("#ylavertd").html(formatNumber(parseInt(ave_luz)));
                $("#yvavertd").html(formatNumber(parseInt(ave_vis)));
                 
                $("#iysminrtd").html(getInterval(imin_ysrtd));
                $("#iylminrtd").html(getInterval(imin_ylrtd));
                $("#iyvminrtd").html(getInterval(imin_yvrtd));
                $("#iysmaxrtd").html(getInterval(imax_ysrtd));
                $("#iylmaxrtd").html(getInterval(imax_ylrtd));
                $("#iyvmaxrtd").html(getInterval(imax_yvrtd));
                   
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
        var d = (new Date()).toString().split(' ').splice(1,3).join(' ');
        var min_srtd,min_srtx,min_lrtd,min_lrtx,min_vrtd,min_vrtx,max_srtd,max_srtx,max_lrtd,max_lrtx,max_vrtd,max_vrtx,ave_srtd,ave_srtx,ave_lrtd,ave_lrtx,ave_vrtd,ave_vrtx,min_ldapel,min_vdapel,min_sdapel=0;
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
                    function formatNumber (num) {
                        return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, "$1,")
                    }
                    function getInterval(x,y,minmax){
                        var val1=x.indexOf(minmax)+1;
                        if(val1==0){
                            return y.indexOf(minmax);

                        }
                        else{
                            return x.indexOf(minmax);
                        }
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
                                min_lrtd=Math.min(...bouncer(lrtd),...bouncer(ldapel));
                                max_lrtd=Math.max(...bouncer(lrtd),...bouncer(ldapel)); 
                                min_lrtx=Math.min(...bouncer(lrtx));
                                max_lrtx=Math.max(...bouncer(lrtx)); 
                                console.log("ldapel"+ldapel);
                                imin_lrtd=getInterval(lrtd,ldapel,min_lrtd)+1;
                                console.log(imin_lrtd);
                                imax_lrtd=getInterval(lrtd,ldapel,max_lrtd)+1; 
                                imin_lrtx=lrtx.indexOf(min_lrtx)+1; 
                                imax_lrtx=lrtx.indexOf(max_lrtx)+1;  
                                
                                $("#ilminrtx").html(formatNumber(parseInt(imin_lrtx)));                                
                                $("#ilmaxrtx").html(formatNumber(parseInt(imax_lrtx)));
                                $("#ilminrtd").html(formatNumber(parseInt(imin_lrtd)));
                                $("#ilmaxrtd").html(formatNumber(parseInt(imax_lrtd))); 
                                $("#lminrtx").html(formatNumber(parseInt(min_lrtx)));                                
                                $("#lmaxrtx").html(formatNumber(parseInt(max_lrtx)));
                                $("#lavertx").html(formatNumber(parseInt(ave_lrtx)));
                                $("#lminrtd").html(formatNumber(parseInt(min_lrtd)));
                                $("#lmaxrtd").html(formatNumber(parseInt(max_lrtd)));                                
                                $("#lavertd").html(formatNumber(parseInt(ave_lrtd)));
                                
                                
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
                                min_vrtd=Math.min(...bouncer(vrtd),...bouncer(vdapel));
                                max_vrtd=Math.max(...bouncer(vrtd),...bouncer(vdapel)); 
                                min_vrtx=Math.min(...bouncer(vrtx));
                                max_vrtx=Math.max(...bouncer(vrtx)); 
                              //  console.log(vrtd);
                                imin_vrtd=getInterval(vrtd,vdapel,min_vrtd)+1;
                                imax_vrtd=getInterval(vrtd,vdapel,max_vrtd)+1;                                
                                imin_vrtx=vrtx.indexOf(min_vrtx)+1; 
                                imax_vrtx=vrtx.indexOf(max_vrtx)+1;  
                                $("#ivminrtx").html(formatNumber(parseInt(imin_vrtx)));                                
                                $("#ivmaxrtx").html(formatNumber(parseInt(imax_vrtx)));
                                $("#ivminrtd").html(formatNumber(parseInt(imin_vrtd)));
                                $("#ivmaxrtd").html(formatNumber(parseInt(imax_vrtd))); 
                                $("#vminrtx").html(formatNumber(parseInt(min_vrtx)));                                
                                $("#vmaxrtx").html(formatNumber(parseInt(max_vrtx)));
                                $("#vavertx").html(formatNumber(parseInt(ave_vrtx)));
                                $("#vminrtd").html(formatNumber(parseInt(min_vrtd)));
                                $("#vmaxrtd").html(formatNumber(parseInt(max_vrtd)));                                
                                $("#vavertd").html(formatNumber(parseInt(ave_vrtd)));
                                
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
                                min_srtd=Math.min(...bouncer(srtd),...bouncer(sdapel));
                                max_srtd=Math.max(...bouncer(srtd),...bouncer(sdapel)); 
                                min_srtx=Math.min(...bouncer(srtx));
                                max_srtx=Math.max(...bouncer(srtx)); 
                               // console.log(srtd);
                                imin_srtd=getInterval(srtd,sdapel,min_srtd)+1;
                                imax_srtd=getInterval(srtd,sdapel,max_srtd)+1;                                
                                imin_srtx=srtx.indexOf(min_srtx)+1; 
                                imax_srtx=srtx.indexOf(max_srtx)+1;  
                                $("#isminrtx").html(formatNumber(parseInt(imin_srtx)));                                
                                $("#ismaxrtx").html(formatNumber(parseInt(imax_srtx)));
                                $("#isminrtd").html(formatNumber(parseInt(imin_srtd)));
                                $("#ismaxrtd").html(formatNumber(parseInt(imax_srtd))); 
                                $("#sminrtx").html(formatNumber(parseInt(min_srtx)));                                
                                $("#smaxrtx").html(formatNumber(parseInt(max_srtx)));
                                $("#savertx").html(formatNumber(parseInt(ave_srtx)));
                                $("#sminrtd").html(formatNumber(parseInt(min_srtd)));
                                $("#smaxrtd").html(formatNumber(parseInt(max_srtd)));                                
                                $("#savertd").html(formatNumber(parseInt(ave_srtd)));
                                $("#datetoday").html("<h6><strong>"+d+"</strong></h6>");
                                }
                                });
                                downloading =0;
                    // draw chart
                    $('#container').highcharts({
    chart: {
        backgroundColor: '#FFFFFF',
        type: 'line'
    },

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

    series: [
        {
        name: 'SYSTEM DAPEL',
        data: sdapel,
        color: '#ffcdd2'
    },{ 
        name: 'SYSTEM RTD',
        data: srtd,
        color: '#e53935'
    },{
        name: 'SYSTEM RTX',
        data: srtx,
        color: '#b71c1c'
    },
        {
        name: 'LUZON DAPEL',
        data: ldapel,
        color: '#BBDEFB'
    },  {
        name: 'LUZON RTD',
        data: lrtd,
        color: '#1E88E5'

    }, {
        name: 'LUZON RTX',
        data: lrtx,
        color: '#0D47A1'

    }, {
        name: 'VISAYAS DAPEL',
        data: vdapel,
        color: '#A5D6A7'
    },{
        name: 'VISAYAS RTD',
        data: vrtd,
        color: '#43A047'

        
    },{
        name: 'VISAYAS RTX',
        data: vrtx,
        color: '#1B5E20'

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
    
                <div id="datetoday" colspan="8" class="text-center table-title" style="border:0px;"></div>
         
        <table class="table-fill text-center " cellpadding="2px"width="100%"height="40%">
    <thead>
            
            <tr class="text-center">
                <th class="text-center" colspan="2"></th>
                <th class="text-center" >SYSTEM</th>
                <th style="width:10%" class="">Int</th>
                <th class="text-center">LUZON</th>
                <th style="width:10%" class="text-center">Int</th>
                <th class="text-center">VISAYAS</th>
                <th style="width:10%" class="text-center">Int</th>
            </tr>
</thead>
<tbody class="table-hover">
            <tr>
                <th class="table-success text-center" rowspan="3" style="border-bottom:none;border-right:none;font-size:80%;">R<br>T<br>D<br>-<br>D</br>A<br>P</th>
                <th class="table-success text-center" style="border-bottom:none;border-right:4px solid #9ea7af;">MIN</th> 
                <td class="text-center" id="sminrtd"></td>
                <td id="isminrtd" style="width:10%" class="text-center"></td>
                <td class="text-center" id="lminrtd"></td>
                <td id="ilminrtd" style="width:10%" class="text-center"></td>
                <td class="text-center" id="vminrtd"></td>
                <td id="ivminrtd" style="width:10%" class="text-center"></td>
            </tr>
            <tr>
                <th class="table-success text-center" style="border-bottom:none;border-right:4px solid #9ea7af;">MAX</th>
                <td class="text-center" id="smaxrtd"></td>
                <td id="ismaxrtd"style="width:10%" class="text-center"></td>
                <td class="text-center" id="lmaxrtd"></td>
                <td id="ilmaxrtd"style="width:10%" class="text-center"></td>
                <td class="text-center" id="vmaxrtd"></td>
                <td id="ivmaxrtd"style="width:10%" class="text-center"></td>
            </tr>
            <tr>
                <th class="table-success text-center" style="border-bottom:none;border-right:4px solid #9ea7af;">AVE</th>
                <td class="text-center" id="savertd" colspan="2"></td>
                <td class="text-center" id="lavertd" colspan="2"></td>
                <td class="text-center" id="vavertd" colspan="2"></td>
            </tr>
            <tr>
                <th class="table-info text-center" rowspan="3" style="border-bottom:none;border-right:none;">R<br>T<br>X<br></th>
                <th class="table-info text-center" style="border-bottom:none;border-right:4px solid #9ea7af;">MIN</th>
                <td id="sminrtx" class="text-center"></td>
                <td id="isminrtx"style="width:10%" class="text-center"></td>
                <td id="lminrtx" class="text-center"></td>
                <td id="ilminrtx"style="width:10%" class="text-center"></td>
                <td id="vminrtx" class="text-center"></td>
                <td id="ivminrtx"style="width:10%" class="text-center"></td>
            </tr>
            <tr>
                <th class="table-info text-center" style="border-bottom:none;border-right:4px solid #9ea7af;">MAX</th>
                <td id="smaxrtx" class="text-center"></td>
                <td id="ismaxrtx"style="width:10%" class="text-center"></td>
                <td id="lmaxrtx" class="text-center"></td>
                <td id="ilmaxrtx"style="width:10%" class="text-center"></td>
                <td id="vmaxrtx" class="text-center"></td>
                <td id="ivmaxrtx"style="width:10%" class="text-center"></td>
            </tr> 
            <tr>
                <th class="table-info text-center" style="border-bottom:none;border-right:4px solid #9ea7af;">AVE</th>
                <td id="savertx" colspan="2" class="text-center"></td>
                <td id="lavertx" colspan="2" class="text-center"></td>
                <td id="vavertx" colspan="2" class="text-center"></td>
            </tr>
</tbody>

        </table>
        <br>
        <div colspan="8" class="text-center table-title" style="border:0px;"><h6><strong>Year to Date</h6></div>
        <table class="table-fill text-center" cellpadding="2px"width="100%"height="40%">
            <thead>
            <tr class="text-center">
                <th></th>
                <th class="text-center" >SYSTEM</th>
                <th style="width:10%" class="text-center">Int</th>
                <th class="text-center" >LUZON</th>
                <th style="width:10%" class="text-center">Int</th>
                <th class="text-center" >VISAYAS</th>
                <th style="width:10%" class="text-center">Int</th>
            </tr>
</thead>
<tbody class="table-hover">
            <tr>
                <th class="text-center table-success" rowspan="2" style="border-bottom:none;border-right:4px solid #9ea7af;">MIN</th>
                <td class="text-center" id="ysminrtd"></td>
                <td id="iysminrtd" style="width:10%" class="text-center"></td>                
                <td class="text-center" id="ylminrtd"></td>
                <td id="iylminrtd" style="width:10%" class="text-center"></td>
                <td class="text-center" id="yvminrtd"></td>
                <td id="iyvminrtd" style="width:10%" class="text-center"></td>
            </tr>
            <tr style="height:1%;" class="text-center">
                
                <td class="text-center" style="height:1%;" id="dysminrtd" colspan="2"></td>
                <td class="text-center" style="height:1%;" id="dylminrtd" colspan="2"></td>
                <td class="text-center" style="height:1%;" id="dyvminrtd" colspan="2"></td>
            </tr>
            <tr>
                <th class="text-center table-success" rowspan="2" style="border-bottom:none;border-right:4px solid #9ea7af;">MAX</th>
                <td class="text-center" id="ysmaxrtd"></td>
                <td id="iysmaxrtd" style="width:10%" class="text-center"></td>
                <td class="text-center" id="ylmaxrtd"></td>
                <td id="iylmaxrtd" style="width:10%" class="text-center"></td>
                <td class="text-center" id="yvmaxrtd"></td>
                <td id="iyvmaxrtd" style="width:10%" class="text-center"></td>
            </tr>
            <tr style="height:1%;" class="text-center">
                <td class="text-center" style="height:1%;" id="dysmaxrtd" colspan="2"></td>
                <td class="text-center" style="height:1%;" id="dylmaxrtd" colspan="2"></td>
                <td class="text-center" style="height:1%;" id="dyvmaxrtd" colspan="2"></td>
            </tr>
             
             <tr>
                <th class="text-center table-success"style="border-bottom:none;border-right:4px solid #9ea7af;">AVE</th>
                <td class="text-center" id="ysavertd" colspan="2"></td>
                <td class="text-center" id="ylavertd" colspan="2"></td>
                <td class="text-center" id="yvavertd" colspan="2"></td>
            </tr>
</tbody>
        </table>

    </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

</section>
	</body>
    
</html>
