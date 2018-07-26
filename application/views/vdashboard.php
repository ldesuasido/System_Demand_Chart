
<!DOCTYPE HTML>
<html>
	<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <META HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <META HTTP-EQUIV="refresh" CONTENT="300">


		<title>System Demand</title>
        <script type="application/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <link rel="stylesheet" href="res/bootstrap.min.css"/>
        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">   

		<style type="text/css">
#container {

	display:inline-flex;
width:100%;
    
} 
.table{
    font-size:1px;
    font-size:0.1vw;
    font-size:0.1vh;
}

.tl { position: absolute; top: 0; left: 0; right: 50%; bottom: 50%; 
      background: white; border:solid #000; border-width: 0 1px 1px 0; }
.tr { position: absolute; top: 0; left: 50%; right: 0; bottom: 50%; 
      background: white; border:solid #000; border-width: 0 0 1px 0; }
.bl { position: absolute; top: 50%; left: 0; right: 50%; bottom: 0; 
      background: white; border:solid #000; border-width: 0 1px 0 0; }
.br { position: absolute; top: 50%; left: 50%; right: 0; bottom: 0; 
      background: white; } 
/* #html,#body{
  
    top:0;
    bottom:0;
    left:0;
    right:0;
} */
/* .div1 { width: 100%; height: 100%;max-height:100%; grid-column:1;position:relative;} */
/* .div2 {  width: 100%; height: 100%; max-height:100%; grid-column:2;position:relative;} */
.con { display:grid; grid-template-columns: repeat(auto-fill,minmax(500px,900px)); position:absolute;top:0;bottom:0;left:0;height:100vh;width:100vw;} */
@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

body {
  background-color: #FFFFFF;
  font-family: "Roboto", helvetica, arial, sans-serif; 
  text-rendering: optimizeLegibility;
}


/* div.table-title {
   display: block;
  margin: auto; 
} */

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
        get_ydatal(); 
        get_data(); 
        get_datal();
        get_price();
        setInterval('get_data();',28000);
        setInterval('get_datal();',28000);
        setInterval('get_ydata();',28000);
        setInterval('get_ydatal();',28000);
        setInterval('get_price();',28000);
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
                      function secLowest(arr_num) {
                    arr_num.sort(function(x,y)
                            {
                            return x-y;
                            });
                    var uniqa = [arr_num[0]];
                    var result = [];
                    
                    for(var j=1; j < arr_num.length; j++)
                    {
                        if(arr_num[j-1] !== arr_num[j])
                        {
                        uniqa.push(arr_num[j]);
                        }
                    }
                        result.push(uniqa[1]);
                    return result.join(',');
                    }

                 data.forEach(function(arr) {
         
                                if(arr['sd_region'] == "LUZON") {
                                for(var i = 1; i <= 24; ++i) {      
                                ylrtd.push(parseInt(arr['sd_rtd_'+pad(i,2)],10));
                                yldate.push(arr['sd_date']);
                                                             }
                                min_ylrtd=secLowest(bouncer(ylrtd));
                                max_ylrtd=Math.max(...bouncer(ylrtd)); 
                               
                                
                                                                 }                                
                                if(arr['sd_region'] == "VISAYAS") {
                                for(var i = 1; i <= 24; ++i) {      
                                yvrtd.push(parseInt(arr['sd_rtd_'+pad(i,2)],10));
                                yvdate.push(arr['sd_date']);
                              
                                                             }
                                min_yvrtd=secLowest(bouncer(yvrtd));
                                max_yvrtd=Math.max(...bouncer(yvrtd)); 
                                
                                
                                                                 }
                                if(arr['sd_region'] == "SYSTEM") {
                                for(var i = 1; i <= 24; ++i) {      
                                ysrtd.push(parseInt(arr['sd_rtd_'+pad(i,2)],10));
                                ysdate.push(arr['sd_date']); 
                                                             }
                                min_ysrtd=secLowest(bouncer(ysrtd));
                                max_ysrtd=Math.max(...bouncer(ysrtd)); 
                                
                                                                 }
                 });
                 imin_ylrtd=ylrtd.indexOf(parseInt(min_ylrtd));
                 dmin_ylrtd=yldate[imin_ylrtd];
                 imax_ylrtd=ylrtd.indexOf(max_ylrtd);
                 dmax_ylrtd=yldate[imax_ylrtd];
                 

                 imin_yvrtd=yvrtd.indexOf(parseInt(min_yvrtd));
                 dmin_yvrtd=yvdate[imin_yvrtd];
                 imax_yvrtd=yvrtd.indexOf(max_yvrtd);
                 dmax_yvrtd=yvdate[imax_yvrtd];
                 
                 imin_ysrtd=ysrtd.indexOf(parseInt(min_ysrtd));
                 dmin_ysrtd=ysdate[imin_ysrtd];
                 imax_ysrtd=ysrtd.indexOf(max_ysrtd);
                 dmax_ysrtd=ysdate[imax_ysrtd];
                 ave_sys=avg(ysrtd);
                 ave_luz=avg(ylrtd);
                 ave_vis=avg(yvrtd);
                //  console.log("ysrtd"+ysrtd);
                //  console.log("min_ysrtd"+min_ysrtd);
                //  console.log("imin"+imin_ysrtd);
                 console.log(ave_sys);
                 $("#dysminrtd").html((new Date(dmin_ysrtd)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imin_ysrtd),2)+"00H"+")");
                 $("#dylminrtd").html((new Date(dmin_ylrtd)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imin_ylrtd),2)+"00H"+")");
                 $("#dyvminrtd").html((new Date(dmin_yvrtd)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imin_yvrtd),2)+"00H"+")");
                 $("#dysmaxrtd").html((new Date(dmax_ysrtd)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imax_ysrtd),2)+"00H"+")");
                 $("#dylmaxrtd").html((new Date(dmax_ylrtd)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imax_ylrtd),2)+"00H"+")");
                 $("#dyvmaxrtd").html((new Date(dmax_yvrtd)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imax_yvrtd),2)+"00H"+")");

                 $("#ysminrtd").html("<strong>"+formatNumber(parseInt(min_ysrtd))+"<br></strong>"+"<span style='font-size:70%;'>"+(new Date(dmin_ysrtd)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imin_ysrtd),2)+"00H"+")");
                 $("#ylminrtd").html("<strong>"+formatNumber(parseInt(min_ylrtd))+"<br></strong>"+"<span style='font-size:70%;'>"+(new Date(dmin_ysrtd)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imin_ylrtd),2)+"00H"+")");
                 $("#yvminrtd").html("<strong>"+formatNumber(parseInt(min_yvrtd))+"<br></strong>"+"<span style='font-size:70%;'>"+(new Date(dmin_ysrtd)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imin_yvrtd),2)+"00H"+")");
                 $("#ysmaxrtd").html("<strong>"+formatNumber(parseInt(max_ysrtd))+"<br></strong>"+"<span style='font-size:70%;'>"+(new Date(dmax_ysrtd)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imax_ysrtd),2)+"00H"+")");
                 $("#ylmaxrtd").html("<strong>"+formatNumber(parseInt(max_ylrtd))+"<br></strong>"+"<span style='font-size:70%;'>"+(new Date(dmax_ylrtd)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imax_ylrtd),2)+"00H"+")");
                 $("#yvmaxrtd").html("<strong>"+formatNumber(parseInt(max_yvrtd))+"<br></strong>"+"<span style='font-size:70%;'>"+(new Date(dmax_yvrtd)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imax_yvrtd),2)+"00H"+")");
                 
                 console.log(dmin_ylrtd);
                $("#ysavertd").html("<strong>"+formatNumber(parseInt(ave_sys)));
                $("#ylavertd").html("<strong>"+formatNumber(parseInt(ave_luz)));
                $("#yvavertd").html("<strong>"+formatNumber(parseInt(ave_vis)));
                 
                // $("#iysminrtd").html(getInterval(imin_ysrtd));
                // $("#iylminrtd").html(getInterval(imin_ylrtd));
                // $("#iyvminrtd").html(getInterval(imin_yvrtd));
                // $("#iysmaxrtd").html(getInterval(imax_ysrtd));
                // $("#iylmaxrtd").html(getInterval(imax_ylrtd));
                // $("#iyvmaxrtd").html(getInterval(imax_yvrtd));
                   
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
                                
                                // $("#ilminrtx").html(formatNumber(parseInt(imin_lrtx)));                                
                                // $("#ilmaxrtx").html(formatNumber(parseInt(imax_lrtx)));
                                // $("#ilminrtd").html(formatNumber(parseInt(imin_lrtd)));
                                // $("#ilmaxrtd").html(formatNumber(parseInt(imax_lrtd))); 
                                $("#lminrtx").html(formatNumber("<strong>"+parseInt(min_lrtx))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imin_lrtx,2)+"00H"+")");                                
                                $("#lmaxrtx").html(formatNumber("<strong>"+parseInt(max_lrtx))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imax_lrtx,2)+"00H"+")");
                                $("#lavertx").html(formatNumber("<strong>"+parseInt(ave_lrtx)));
                                $("#lminrtd").html(formatNumber("<strong>"+parseInt(min_lrtd))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imin_lrtd,2)+"00H"+")");
                                $("#lmaxrtd").html(formatNumber("<strong>"+parseInt(max_lrtd))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imax_lrtd,2)+"00H"+")");                                
                                $("#lavertd").html(formatNumber("<strong>"+parseInt(ave_lrtd)));
                                
                                
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
                                // $("#ivminrtx").html(formatNumber(parseInt(imin_vrtx)));                                
                                // $("#ivmaxrtx").html(formatNumber(parseInt(imax_vrtx)));
                                // $("#ivminrtd").html(formatNumber(parseInt(imin_vrtd)));
                                // $("#ivmaxrtd").html(formatNumber(parseInt(imax_vrtd))); 
                                $("#vminrtx").html(formatNumber("<strong>"+parseInt(min_vrtx))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imin_vrtx,2)+"00H"+")");                                
                                $("#vmaxrtx").html(formatNumber("<strong>"+parseInt(max_vrtx))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imax_vrtx,2)+"00H"+")");
                                $("#vavertx").html(formatNumber("<strong>"+parseInt(ave_vrtx)));
                                $("#vminrtd").html(formatNumber("<strong>"+parseInt(min_vrtd))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imin_vrtd,2)+"00H"+")");
                                $("#vmaxrtd").html(formatNumber("<strong>"+parseInt(max_vrtd))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imax_vrtd,2)+"00H"+")");                                
                                $("#vavertd").html(formatNumber("<strong>"+parseInt(ave_vrtd)));
                                
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
                                // $("#isminrtx").html(formatNumber(parseInt(imin_srtx)));                                
                                // $("#ismaxrtx").html(formatNumber(parseInt(imax_srtx)));
                                // $("#isminrtd").html(formatNumber(parseInt(imin_srtd)));
                                // $("#ismaxrtd").html(formatNumber(parseInt(imax_srtd))); 
                                $("#sminrtx").html(formatNumber("<strong>"+parseInt(min_srtx))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imin_srtx,2)+"00H"+")");                                
                                $("#smaxrtx").html(formatNumber("<strong>"+parseInt(max_srtx))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imax_srtx,2)+"00H"+")");
                                $("#savertx").html(formatNumber("<strong>"+parseInt(ave_srtx)));
                                $("#sminrtd").html(formatNumber("<strong>"+parseInt(min_srtd))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imin_srtd,2)+"00H"+")");
                                $("#smaxrtd").html(formatNumber("<strong>"+parseInt(max_srtd))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imax_srtd,2)+"00H"+")");                                
                                $("#savertd").html(formatNumber("<strong>"+parseInt(ave_srtd)));
                                $("#datetoday").html("<strong>"+d+"</strong>");
                                }
                                });
                                downloading =0;
                    // draw chart
                    $('#container').highcharts({
    chart: {
        backgroundColor: '#FFFFFF',
        type: 'line',
    },
    credits:{
        enabled: false,
    },
     title: {
        text: 'System Demand'
    },

    legend: {
        align: 'center',
        verticalAlign: 'bottom',
        borderWidth: 0,
         itemStyle: {
                
                fontWeight: 'bold',
                fontSize: '7px'
            }
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
        showInLegend: false,   
        name: 'SYS DAPEL',
        data: sdapel,
        color: '#ffcdd2'
    },{ 
        showInLegend: false,   
        name: 'SYS RTD',
        data: srtd,
        color: '#e53935'
    },{
        name: 'SYS',
        data: srtx,
        color: '#b71c1c'
    },
        {
        showInLegend: false,   
        name: 'LUZ DAPEL',
        data: ldapel,
        color: '#BBDEFB'
    },  {
        showInLegend: false,   
        name: 'LUZ RTD',
        data: lrtd,
        color: '#1E88E5'

    }, {
        name: 'LUZ',
        data: lrtx,
        color: '#0D47A1'

    }, {
        showInLegend: false,   
        name: 'VIS DAPEL',
        data: vdapel,
        color: '#A5D6A7'
    },{
        showInLegend: false,   
        name: 'VIS RTD',
        data: vrtd,
        color: '#43A047'

        
    },{
        name: 'VIS',
        data: vrtx,
        color: '#1B5E20'

    },],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 1000
            } 
        }]
    }
                }); 
            });
             downloading = 0;
        });


    }

     function get_ydatal(){
          $(function () {
        var ylrtdl= new Array();
        var ylrtxl= new Array();
        var yvrtdl= new Array();
        var yvrtxl= new Array();
        var ysrtdl= new Array();
        var ysrtxl= new Array();
        var yldatel=new Array();
        var yvdatel=new Array();
        var ysdatel=new Array();
        var imin_ysrtdl,imax_ysrtdl,imin_ylrtdl,imax_ylrtdl,imin_yvrtdl,imax_yvrtdl=0;
        var dmin_ysrtdl,dmax_ysrtdl,dmin_ylrtdl,dmax_ylrtdl,dmin_yvrtdl,dmax_yvrtdl=0;
        var min_ylrtdl,min_yvrtdl,min_ysrtdl,max_ylrtdl,max_yvrtdl,max_ysrtdl=0;
        var ave_sysl,ave_luzl,ave_visl=0;
        
        var no=0;
        if(downloading == 1)
            {
                return;
            }
            
            downloading = 1;

 
                $.getJSON('http://54.191.55.210/sysdemand/index.php/CSysDemand/get_ylwap', function(data) {
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
                      var y = bouncer(x);
                       var sum=0;
                                for(var i=0;i<y.length;i++){
                                    sum+=parseInt(y[i],10);
                                }
                        return sum/bouncer(x).length;
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
                      function secLowest(arr_num) {
                    arr_num.sort(function(x,y)
                            {
                            return x-y;
                            });
                    var uniqa = [arr_num[0]];
                    var result = [];
                    
                    for(var j=1; j < arr_num.length; j++)
                    {
                        if(arr_num[j-1] !== arr_num[j])
                        {
                        uniqa.push(arr_num[j]);
                        }
                    }
                        result.push(uniqa[1]);
                    return result.join(',');
                    }

                 data.forEach(function(arr) {
         
                                if(arr['lw_region'] == "LUZON") {
                                for(var i = 1; i <= 24; ++i) {      
                                ylrtdl.push(parseInt(arr['lw_rtd_'+pad(i,2)],10));
                                yldatel.push(arr['lw_date']);
                                                             }
                                min_ylrtdl=secLowest(bouncer(ylrtdl));
                                max_ylrtdl=Math.max(...bouncer(ylrtdl)); 
                               
                                
                                                                 }                                
                                if(arr['lw_region'] == "VISAYAS") {
                                for(var i = 1; i <= 24; ++i) {      
                                yvrtdl.push(parseInt(arr['lw_rtd_'+pad(i,2)],10));
                                yvdatel.push(arr['lw_date']);
                              
                                                             }
                                min_yvrtdl=secLowest(bouncer(yvrtdl));
                                max_yvrtdl=Math.max(...bouncer(yvrtdl)); 
                                
                                
                                                                 }
                                if(arr['lw_region'] == "SYSTEM") {
                                for(var i = 1; i <= 24; ++i) {      
                                ysrtdl.push(parseInt(arr['lw_rtd_'+pad(i,2)],10));
                                ysdatel.push(arr['lw_date']); 
                                                             }
                                min_ysrtdl=secLowest(bouncer(ysrtdl));
                                max_ysrtdl=Math.max(...bouncer(ysrtdl)); 
                                
                                                                 }
                 });
                 imin_ylrtdl=ylrtdl.indexOf(parseInt(min_ylrtdl));
                 dmin_ylrtdl=yldatel[imin_ylrtdl];
                 imax_ylrtdl=ylrtdl.indexOf(max_ylrtdl);
                 dmax_ylrtdl=yldatel[imax_ylrtdl];
                 

                 imin_yvrtdl=yvrtdl.indexOf(parseInt(min_yvrtdl));
                 dmin_yvrtdl=yvdatel[imin_yvrtdl];
                 imax_yvrtdl=yvrtdl.indexOf(max_yvrtdl);
                 dmax_yvrtdl=yvdatel[imax_yvrtdl];
                 
                 imin_ysrtdl=ysrtdl.indexOf(parseInt(min_ysrtdl));
                 dmin_ysrtdl=ysdatel[imin_ysrtdl];
                 imax_ysrtdl=ysrtdl.indexOf(max_ysrtdl);
                 dmax_ysrtdl=ysdatel[imax_ysrtdl];
                 ave_sysl=avg(ysrtdl);
                 ave_luzl=avg(ylrtdl);
                 ave_visl=avg(yvrtdl);
                //  console.log("ysrtd"+ysrtd);
                //  console.log("min_ysrtd"+min_ysrtd);
                //  console.log("imin"+imin_ysrtd);
                 console.log(ave_sysl);
                 $("#dysminrtdl").html((new Date(dmin_ysrtdl)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imin_ysrtdl),2)+"00H"+")");
                 $("#dylminrtdl").html((new Date(dmin_ylrtdl)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imin_ylrtdl),2)+"00H"+")");
                 $("#dyvminrtdl").html((new Date(dmin_yvrtdl)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imin_yvrtdl),2)+"00H"+")");
                 $("#dysmaxrtdl").html((new Date(dmax_ysrtdl)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imax_ysrtdl),2)+"00H"+")");
                 $("#dylmaxrtdl").html((new Date(dmax_ylrtdl)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imax_ylrtdl),2)+"00H"+")");
                 $("#dyvmaxrtdl").html((new Date(dmax_yvrtdl)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imax_yvrtdl),2)+"00H"+")");

                 $("#ysminrtdl").html("<strong>"+formatNumber(parseInt(min_ysrtdl))+"<br></strong>"+"<span style='font-size:70%;'>"+(new Date(dmin_ysrtdl)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imin_ysrtdl),2)+"00H"+")");
                 $("#ylminrtdl").html("<strong>"+formatNumber(parseInt(min_ylrtdl))+"<br></strong>"+"<span style='font-size:70%;'>"+(new Date(dmin_ylrtdl)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imin_ylrtdl),2)+"00H"+")");
                 $("#yvminrtdl").html("<strong>"+formatNumber(parseInt(min_yvrtdl))+"<br></strong>"+"<span style='font-size:70%;'>"+(new Date(dmin_yvrtdl)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imin_yvrtdl),2)+"00H"+")");
                 $("#ysmaxrtdl").html("<strong>"+formatNumber(parseInt(max_ysrtdl))+"<br></strong>"+"<span style='font-size:70%;'>"+(new Date(dmax_ysrtdl)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imax_ysrtdl),2)+"00H"+")");
                 $("#ylmaxrtdl").html("<strong>"+formatNumber(parseInt(max_ylrtdl))+"<br></strong>"+"<span style='font-size:70%;'>"+(new Date(dmax_ylrtdl)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imax_ylrtdl),2)+"00H"+")");
                 $("#yvmaxrtdl").html("<strong>"+formatNumber(parseInt(max_yvrtdl))+"<br></strong>"+"<span style='font-size:70%;'>"+(new Date(dmax_yvrtdl)).toString().split(' ').splice(1,2).join(' ')+"("+pad(getInterval(imax_yvrtdl),2)+"00H"+")");
                 
                 console.log(dmin_ylrtdl);
                $("#ysavertdl").html("<strong>"+formatNumber(parseInt(ave_sysl)));
                $("#ylavertdl").html("<strong>"+formatNumber(parseInt(ave_luzl)));
                $("#yvavertdl").html("<strong>"+formatNumber(parseInt(ave_visl)));
                 
                // $("#iysminrtd").html(getInterval(imin_ysrtd));
                // $("#iylminrtd").html(getInterval(imin_ylrtd));
                // $("#iyvminrtd").html(getInterval(imin_yvrtd));
                // $("#iysmaxrtd").html(getInterval(imax_ysrtd));
                // $("#iylmaxrtd").html(getInterval(imax_ylrtd));
                // $("#iyvmaxrtd").html(getInterval(imax_yvrtd));
                   
                 });
                  downloading = 0;
                 }); 
                 }

    function get_datal(){
       $(function () {
        var slwap=[];
        var llwap= new Array();
        var lrtdl= new Array();
        var lrtxl= new Array();
        var vlwap= new Array();
        var vrtdl= new Array();
        var vrtxl= new Array();
        var lwapel= new Array();
        var srtdl= new Array();
        var srtxl= new Array();
        var d = (new Date()).toString().split(' ').splice(1,3).join(' ');
        var min_srtdl,min_srtxl,min_lrtdl,min_lrtxl,min_vrtdl,min_vrtxl,max_srtdl,max_srtxl,max_lrtdl,max_lrtxl,max_vrtdl,max_vrtxl,ave_srtdl,ave_srtxl,ave_lrtdl,ave_lrtxl,ave_vrtdl,ave_vrtxl,min_llwap,min_vlwap,min_lwapel=0;
        var imin_srtdl,imin_srtxl,imin_lrtdl,imin_lrtxl,imin_vrtdl,imin_vrtxl,imax_srtdl,imax_srtxl,imax_lrtdl,imax_lrtxl,imax_vrtdl,imax_vrtxl=0;
        if(downloading == 1)
            {
                return;
            }
            
            downloading = 1;
   
                $.getJSON('http://54.191.55.210/sysdemand/index.php/CSysDemand/get_clwap', function(data) {
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
         
                                if(arr['lw_region'] == "LUZON") {
                                for(var i = 1; i <= 24; ++i) {      
                                llwap.push(parseInt(arr['lw_dapel_' + pad(i, 2)],10));      
                                lrtdl.push(parseInt(arr['lw_rtd_'+pad(i,2)],10));
                                lrtxl.push(parseInt(arr['lw_rtx_'+pad(i,2)],10));
                                
                                }
                                ave_lrtdl=avg(lrtdl);
                                ave_lrtxl=avg(lrtxl);
                                min_lrtdl=Math.min(...bouncer(lrtdl),...bouncer(llwap));
                                max_lrtdl=Math.max(...bouncer(lrtdl),...bouncer(llwap)); 
                                min_lrtxl=Math.min(...bouncer(lrtxl));
                                max_lrtxl=Math.max(...bouncer(lrtxl)); 
                                console.log("llwap"+llwap);
                                imin_lrtdl=getInterval(lrtdl,llwap,min_lrtdl)+1;
                                console.log(imin_lrtdl);
                                imax_lrtdl=getInterval(lrtdl,llwap,max_lrtdl)+1; 
                                imin_lrtxl=lrtxl.indexOf(min_lrtxl)+1; 
                                imax_lrtxl=lrtxl.indexOf(max_lrtxl)+1;  
                                
                                // $("#ilminrtx").html(formatNumber(parseInt(imin_lrtx)));                                
                                // $("#ilmaxrtx").html(formatNumber(parseInt(imax_lrtx)));
                                // $("#ilminrtd").html(formatNumber(parseInt(imin_lrtd)));
                                // $("#ilmaxrtd").html(formatNumber(parseInt(imax_lrtd))); 
                                $("#lminrtxl").html(formatNumber("<strong>"+parseInt(min_lrtxl))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imin_lrtxl,2)+"00H"+")");                                
                                $("#lmaxrtxl").html(formatNumber("<strong>"+parseInt(max_lrtxl))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imax_lrtxl,2)+"00H"+")");
                                $("#lavertxl").html(formatNumber("<strong>"+parseInt(ave_lrtxl)));
                                $("#lminrtdl").html(formatNumber("<strong>"+parseInt(min_lrtdl))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imin_lrtdl,2)+"00H"+")");
                                $("#lmaxrtdl").html(formatNumber("<strong>"+parseInt(max_lrtdl))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imax_lrtdl,2)+"00H"+")");                                
                                $("#lavertdl").html(formatNumber("<strong>"+parseInt(ave_lrtdl)));
                                
                                
                                }
                                if(arr['lw_region'] == "VISAYAS") {
                                for(var i = 1; i <= 24; ++i) {      
                                vlwap.push(parseInt(arr['lw_dapel_' + pad(i, 2)],10));      
                                vrtdl.push(parseInt(arr['lw_rtd_'+pad(i,2)],10));
                                vrtxl.push(parseInt(arr['lw_rtx_'+pad(i,2)],10));
                                
                               // console.log(vdapel);
                                }
                                ave_vrtdl=avg(vrtdl);
                                ave_vrtxl=avg(vrtxl);
                                min_vrtdl=Math.min(...bouncer(vrtdl),...bouncer(vlwap));
                                max_vrtdl=Math.max(...bouncer(vrtdl),...bouncer(vlwap)); 
                                min_vrtxl=Math.min(...bouncer(vrtxl));
                                max_vrtxl=Math.max(...bouncer(vrtxl)); 
                              //  console.log(vrtd);
                                imin_vrtdl=getInterval(vrtdl,vlwap,min_vrtdl)+1;
                                imax_vrtdl=getInterval(vrtdl,vlwap,max_vrtdl)+1;                                
                                imin_vrtxl=vrtxl.indexOf(min_vrtxl)+1; 
                                imax_vrtxl=vrtxl.indexOf(max_vrtxl)+1;  
                                // $("#ivminrtx").html(formatNumber(parseInt(imin_vrtx)));                                
                                // $("#ivmaxrtx").html(formatNumber(parseInt(imax_vrtx)));
                                // $("#ivminrtd").html(formatNumber(parseInt(imin_vrtd)));
                                // $("#ivmaxrtd").html(formatNumber(parseInt(imax_vrtd))); 
                                $("#vminrtxl").html(formatNumber("<strong>"+parseInt(min_vrtxl))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imin_vrtxl,2)+"00H"+")");                                
                                $("#vmaxrtxl").html(formatNumber("<strong>"+parseInt(max_vrtxl))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imax_vrtxl,2)+"00H"+")");
                                $("#vavertxl").html(formatNumber("<strong>"+parseInt(ave_vrtxl)));
                                $("#vminrtdl").html(formatNumber("<strong>"+parseInt(min_vrtdl))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imin_vrtdl,2)+"00H"+")");
                                $("#vmaxrtdl").html(formatNumber("<strong>"+parseInt(max_vrtdl))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imax_vrtdl,2)+"00H"+")");                                
                                $("#vavertdl").html(formatNumber("<strong>"+parseInt(ave_vrtdl)));
                                
                                }
                                if(arr['lw_region'] == "SYSTEM") {
                                for(var i = 1; i <= 24; ++i) {      
                                slwap.push(parseInt(arr['lw_dapel_' + pad(i, 2)],10));      
                                srtdl.push(parseInt(arr['lw_rtd_'+pad(i,2)],10));
                                srtxl.push(parseInt(arr['lw_rtx_'+pad(i,2)],10));
                                
                              //  console.log(vdapel);
                                }
                                ave_srtdl=avg(srtdl);
                                ave_srtxl=avg(srtxl);
                                console.log(ave_srtdl);
                                min_srtdl=Math.min(...bouncer(srtdl),...bouncer(slwap));
                                max_srtdl=Math.max(...bouncer(srtdl),...bouncer(slwap)); 
                                min_srtxl=Math.min(...bouncer(srtxl));
                                max_srtxl=Math.max(...bouncer(srtxl)); 

                               // console.log(srtd);
                                imin_srtdl=getInterval(srtdl,slwap,min_srtdl)+1;
                                imax_srtdl=getInterval(srtdl,slwap,max_srtdl)+1;                                
                                imin_srtxl=srtxl.indexOf(min_srtxl)+1; 
                                imax_srtxl=srtxl.indexOf(max_srtxl)+1;  
                                // $("#isminrtx").html(formatNumber(parseInt(imin_srtx)));                                
                                // $("#ismaxrtx").html(formatNumber(parseInt(imax_srtx)));
                                // $("#isminrtd").html(formatNumber(parseInt(imin_srtd)));
                                // $("#ismaxrtd").html(formatNumber(parseInt(imax_srtd))); 
                                $("#sminrtxl").html(formatNumber("<strong>"+parseInt(min_srtxl))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imin_srtxl,2)+"00H"+")");                                
                                $("#smaxrtxl").html(formatNumber("<strong>"+parseInt(max_srtxl))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imax_srtxl,2)+"00H"+")");
                                $("#savertxl").html(formatNumber("<strong>"+parseInt(ave_srtxl)));
                                $("#sminrtdl").html(formatNumber("<strong>"+parseInt(min_srtdl))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imin_srtdl,2)+"00H"+")");
                                $("#smaxrtdl").html(formatNumber("<strong>"+parseInt(max_srtdl))+"<br></strong><span style='font-size:75%;'>"+"("+pad(imax_srtdl,2)+"00H"+")");                                
                                $("#savertdl").html(formatNumber("<strong>"+parseInt(ave_srtdl)));
                                $("#datetodayl").html("<strong>"+d+"</strong>");
                                }
                                });
                                downloading =0;
                    // draw chart
                    $('#container2').highcharts({
    chart: {
        backgroundColor: '#FFFFFF',
        type: 'line'
    },
    credits:{
        enabled: false,
    },

     title: {
        text: 'LWAP'
    },

    legend: {
        align: 'center',
        verticalAlign: 'bottom',
        borderWidth: 0,
         itemStyle: {
                
                fontWeight: 'bold',
                fontSize: '7px'
            }
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
        showInLegend: false,   
        name: 'SYS LWAP',
        data: slwap,
        color: '#ffcdd2'
    },{ 
        showInLegend: false,   
        name: 'SYS RTD',
        data: srtdl,
        color: '#e53935'
    },{
        name: 'SYS',
        data: srtxl,
        color: '#b71c1c'
    },
        {
        showInLegend: false,   
        name: 'LUZ LWAP',
        data: llwap,
        color: '#BBDEFB'
    },  {
        showInLegend: false,   
        name: 'LUZ RTD',
        data: lrtdl,
        color: '#1E88E5'

    }, {
        name: 'LUZ',
        data: lrtxl,
        color: '#0D47A1'

    }, {
        showInLegend: false,   
        name: 'VIS LWAP',
        data: vlwap,
        color: '#A5D6A7'
    },{
        showInLegend: false,   
        name: 'VIS RTD',
        data: vrtdl,
        color: '#43A047'

        
    },{
        name: 'VIS',
        data: vrtxl,
        color: '#1B5E20'

    },],

    responsive: {
        rules: [{
            condition: {
                maxWidth: 1000
            } 
        }]
    }
                }); 
            });
             downloading = 0;
        });


    }
      


      function get_price(){
        var ldappr=new Array(); var vdappr= new Array(); var mdappr= new Array(); nldappr=new Array();
        var lrtdpr,lrtxpr,vdappr,vrtdpr,vrtxpr,mdappr,mrtdpr,mrtxpr=new Array();
        var dap_apri1,dap_apri2,dap_apri3,dap_apri4,dap_apri5;
        var min_srtd,min_srtx,min_lrtd,min_lrtx,min_vrtd,min_vrtx,max_srtd,max_srtx,max_lrtd,max_lrtx,max_vrtd,max_vrtx,ave_srtd,ave_srtx,ave_lrtd,ave_lrtx,ave_vrtd,ave_vrtx,min_ldapel,min_vdapel,min_sdapel=0;
        var imin_srtd,imin_srtx,imin_lrtd,imin_lrtx,imin_vrtd,imin_vrtx,imax_srtd,imax_srtx,imax_lrtd,imax_lrtx,imax_vrtd,imax_vrtx=0;
       
       $(function () {
        
        if(downloading == 1)
            {
                return;
            }
            
            downloading = 1;
   
                $.getJSON('http://54.191.55.210/web/index.php/controller/get_all_data', function(data) {
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
                              if(arr['dap_partid'] == "APRI" || arr['dap_partid'] == "TLI" ||arr['dap_partid'] == "TMO" ||arr['dap_partid'] == "PEC") {
                                for(var i = 1; i <= 24; ++i) {      
                                ldappr.push(parseInt(arr['dap_pr_' + pad(i, 2)],10));
                                }
                                
                                  
                                
                              }
                              while(ldappr.length){
                                    nldappr.push(ldappr.splice(0,24));
                                }
                               

                             if(arr['dap_partid'] == "EAUC" ) {
                                for(var i = 1; i <= 24; ++i) {      
                                vdappr.push(parseInt(arr['dap_pr_' + pad(i, 2)],10));
                                
                                
                              }
                              console.log("vispr: "+vdappr);
                             }
                             if(arr['dap_partid'] == "CPPC" ) {
                                for(var i = 1; i <= 24; ++i) {      
                                mdappr.push(parseInt(arr['dap_pr_' + pad(i, 2)],10));
                                
                                
                              }
                              console.log("minpr: "+mdappr);
                             }

                                
                                });
                                downloading =0;
                                 console.log(nldappr[0][0]);  
            });
             downloading = 0;
        });


    }
      


                            
		</script>
	</head>
	<body class="con" style="font-family:'Roboto',sans-serif;font-size:13px;">
    
    <div class="tl">
    <main style="display:flex;" >
    
    <section style="width:70vw;height:50vh;overflow:inherit;display:flex;" >
    
    <div id="container" style="width:30vw;height:50vh;"></div>

    <!-- <div class="div2" style="width:100%;height:100%;" >  -->

    </section>
    <section style="width:100%;height:50vh;overflow:inherit;display:inline-block">
         <div class="container">
        <table class="table-fill text-center " cellpadding="3px" style="width:100%;height:10vh;font-size:.9vw;">
             <br>
            <div id="datetoday" class="text-center" style="border:0px;"></div>
    <thead>       
            <tr class="text-center">
                <th class="text-center" colspan="2"></th>
                <th class="text-center" >SYSTEM</th>
                <!-- <th style="width:10%" class="">Int</th> -->
                <th class="text-center">LUZON</th>
                <!-- <th style="width:10%" class="text-center">Int</th> -->
                <th class="text-center">VISAYAS</th>
                <!-- <th style="width:10%" class="text-center">Int</th> -->
            </tr>
</thead>
<tbody class="table-hover">
            <tr>
                <th class="table-success text-center" rowspan="3" style="border-bottom:none;border-right:none;font-size:80%;">R<br>T<br>D<br>-<br>D</br>A<br>P</th>
                <th class="table-success text-center" style="border-bottom:none;border-right:4px solid #9ea7af;">MIN</th> 
                <td class="text-center" id="sminrtd"></td>
                <!-- <td id="isminrtd" style="width:10%" class="text-center"></td> -->
                <td class="text-center" id="lminrtd"></td>
                <!-- <td id="ilminrtd" style="width:10%" class="text-center"></td> -->
                <td class="text-center" id="vminrtd"></td>
                <!-- <td id="ivminrtd" style="width:10%" class="text-center"></td> -->
            </tr>
            <tr>
                <th class="table-success text-center" style="border-bottom:none;border-right:4px solid #9ea7af;">MAX</th>
                <td class="text-center" id="smaxrtd"></td>
                <!-- <td id="ismaxrtd"style="width:10%" class="text-center"></td> -->
                <td class="text-center" id="lmaxrtd"></td>
                <!-- <td id="ilmaxrtd"style="width:10%" class="text-center"></td> -->
                <td class="text-center" id="vmaxrtd"></td>
                <!-- <td id="ivmaxrtd"style="width:10%" class="text-center"></td> -->
            </tr>
            <tr>
                <th class="table-success text-center" style="border-bottom:none;border-right:4px solid #9ea7af;">AVE</th>
                <td class="text-center" id="savertd" colspan="1"></td>
                <td class="text-center" id="lavertd" colspan="1"></td>
                <td class="text-center" id="vavertd" colspan="1"></td>
            </tr>
            <tr>
                <th class="table-info text-center" rowspan="3" style="border-bottom:none;border-right:none;color:#37474F;">R<br>T<br>X<br></th>
                <th class="table-info text-center" style="border-bottom:none;border-right:4px solid #9ea7af;color:#37474F;">MIN</th>
                <td id="sminrtx" class="text-center"></td>
                <!-- <td id="isminrtx"style="width:10%" class="text-center"></td> -->
                <td id="lminrtx" class="text-center"></td>
                <!-- <td id="ilminrtx"style="width:10%" class="text-center"></td> -->
                <td id="vminrtx" class="text-center"></td>
                <!-- <td id="ivminrtx"style="width:10%" class="text-center"></td> -->
            </tr>
            <tr>
                <th class="table-info text-center" style="border-bottom:none;border-right:4px solid #9ea7af;color:#37474F;">MAX</th>
                <td id="smaxrtx" class="text-center"></td>
                <!-- <td id="ismaxrtx"style="width:10%" class="text-center"></td> -->
                <td id="lmaxrtx" class="text-center"></td>
                <!-- <td id="ilmaxrtx"style="width:10%" class="text-center"></td> -->
                <td id="vmaxrtx" class="text-center"></td>
                <!-- <td id="ivmaxrtx"style="width:10%" class="text-center"></td> -->
            </tr> 
            <tr>
                <th class="table-info text-center" style="border-bottom:none;border-right:4px solid #9ea7af;color:#37474F;">AVE</th>
                <td id="savertx" colspan="1" class="text-center"></td>
                <td id="lavertx" colspan="1" class="text-center"></td>
                <td id="vavertx" colspan="1" class="text-center"></td>
            </tr>
</tbody>

        </table>
       

     
        <table class="table-fill text-center" cellpadding="3px" style="width:100%;height:10vh;font-size:.9vw">
            <br>
               <div class="text-center"><strong>Year to Date</div>
            <thead>
            <tr class="text-center">
                <th></th>
                <th class="text-center" >SYSTEM</th>
                <!--th style="width:10%" class="text-center">Int</th-->
                <th class="text-center" >LUZON</th>
                <!--th style="width:10%" class="text-center">Int</th-->
                <th class="text-center" >VISAYAS</th>
                <!--th style="width:10%" class="text-center">Int</th-->
            </tr>
</thead>
<tbody class="table-hover">
            <tr>
                <th class="text-center table-success" rowspan="1" style="border-bottom:none;border-right:4px solid #9ea7af;">MIN</th>
                <td class="text-center" id="ysminrtd"></td>
                <!--td id="iysminrtd" style="width:10%" class="text-center"></td-->                
                <td class="text-center" id="ylminrtd"></td>
                <!--td id="iylminrtd" style="width:10%" class="text-center"></td-->
                <td class="text-center" id="yvminrtd"></td>
                <!--td id="iyvminrtd" style="width:10%" class="text-center"></td-->
            </tr>
            <tr>
                <th class="text-center table-success" rowspan="1" style="border-bottom:none;border-right:4px solid #9ea7af;">MAX</th>
                <td class="text-center" id="ysmaxrtd"></td>
                <!--td id="iysmaxrtd" style="width:10%" class="text-center"></td-->
                <td class="text-center" id="ylmaxrtd"></td>
                <!--td id="iylmaxrtd" style="width:10%" class="text-center"></td-->
                <td class="text-center" id="yvmaxrtd"></td>
                <!--td id="iyvmaxrtd" style="width:10%" class="text-center"></td-->
            </tr>
             
             <tr>
                <th class="text-center table-success"style="border-bottom:none;border-right:4px solid #9ea7af;">AVE</th>
                <td class="text-center" id="ysavertd" colspan="1"></td>
                <td class="text-center" id="ylavertd" colspan="1"></td>
                <td class="text-center" id="yvavertd" colspan="1"></td>
            </tr>
</tbody>
        </table>
</div>
    
      

</section>
</main>
</div>
<div class="tr">
     <main style="display:flex;" >
    
    <section style="width:70vw;height:50vh;overflow:inherit;display:flex;" >
    
    <div id="container2" style="width:30vw;height:50vh;"></div>

    <!-- <div class="div2" style="width:100%;height:100%;" >  -->

    </section>
    <section style="width:100%;height:50vh;overflow:inherit;display:inline-block">
         <div class="container">
        <table class="table-fill text-center " cellpadding="3px" style="width:100%;height:10vh;font-size:.9vw;">
             <br>
            <div id="datetodayl" class="text-center" style="border:0px;"></div>
    <thead>       
            <tr class="text-center">
                <th class="text-center" colspan="2"></th>
                <th class="text-center" >SYSTEM</th>
                <!-- <th style="width:10%" class="">Int</th> -->
                <th class="text-center">LUZON</th>
                <!-- <th style="width:10%" class="text-center">Int</th> -->
                <th class="text-center">VISAYAS</th>
                <!-- <th style="width:10%" class="text-center">Int</th> -->
            </tr>
</thead>
<tbody class="table-hover">
            <tr>
                <th class="table-success text-centerl" rowspan="3" style="border-bottom:none;border-right:none;font-size:80%;">R<br>T<br>D<br>-<br>D</br>A<br>P</th>
                <th class="table-success text-centerl" style="border-bottom:none;border-right:4px solid #9ea7af;">MIN</th> 
                <td class="text-center" id="sminrtdl"></td>
                <!-- <td id="isminrtd" style="width:10%" class="text-center"></td> -->
                <td class="text-center" id="lminrtdl"></td>
                <!-- <td id="ilminrtd" style="width:10%" class="text-center"></td> -->
                <td class="text-center" id="vminrtdl"></td>
                <!-- <td id="ivminrtd" style="width:10%" class="text-center"></td> -->
            </tr>
            <tr>
                <th class="table-success text-center" style="border-bottom:none;border-right:4px solid #9ea7af;">MAX</th>
                <td class="text-center" id="smaxrtdl"></td>
                <!-- <td id="ismaxrtd"style="width:10%" class="text-center"></td> -->
                <td class="text-center" id="lmaxrtdl"></td>
                <!-- <td id="ilmaxrtd"style="width:10%" class="text-center"></td> -->
                <td class="text-center" id="vmaxrtdl"></td>
                <!-- <td id="ivmaxrtd"style="width:10%" class="text-center"></td> -->
            </tr>
            <tr>
                <th class="table-success text-center" style="border-bottom:none;border-right:4px solid #9ea7af;">AVE</th>
                <td class="text-center" id="savertdl" colspan="1"></td>
                <td class="text-center" id="lavertdl" colspan="1"></td>
                <td class="text-center" id="vavertdl" colspan="1"></td>
            </tr>
            <tr>
                <th class="table-info text-center" rowspan="3" style="border-bottom:none;border-right:none;color:#37474F;">R<br>T<br>X<br></th>
                <th class="table-info text-center" style="border-bottom:none;border-right:4px solid #9ea7af;color:#37474F;">MIN</th>
                <td id="sminrtxl" class="text-center"></td>
                <!-- <td id="isminrtx"style="width:10%" class="text-center"></td> -->
                <td id="lminrtxl" class="text-center"></td>
                <!-- <td id="ilminrtx"style="width:10%" class="text-center"></td> -->
                <td id="vminrtxl" class="text-center"></td>
                <!-- <td id="ivminrtx"style="width:10%" class="text-center"></td> -->
            </tr>
            <tr>
                <th class="table-info text-center" style="border-bottom:none;border-right:4px solid #9ea7af;color:#37474F;">MAX</th>
                <td id="smaxrtxl" class="text-center"></td>
                <!-- <td id="ismaxrtx"style="width:10%" class="text-center"></td> -->
                <td id="lmaxrtxl" class="text-center"></td>
                <!-- <td id="ilmaxrtx"style="width:10%" class="text-center"></td> -->
                <td id="vmaxrtxl" class="text-center"></td>
                <!-- <td id="ivmaxrtx"style="width:10%" class="text-center"></td> -->
            </tr> 
            <tr>
                <th class="table-info text-center" style="border-bottom:none;border-right:4px solid #9ea7af;color:#37474F;">AVE</th>
                <td id="savertxl" colspan="1" class="text-center"></td>
                <td id="lavertxl" colspan="1" class="text-center"></td>
                <td id="vavertxl" colspan="1" class="text-center"></td>
            </tr>
</tbody>

        </table>
       
</div>
    
      

</section>
</main>
</div>
<div class="bl"></div>
<div class="br"></div>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
	</body>
    
</html>
