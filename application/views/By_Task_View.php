<?php $this->load->view('header'); ?>			
      <!-- Main Content -->
  <!--
      <h4 class="mt-4">Article By Task</h4>
  -->
      <div class="container-fluid">
    	<?php 
    		
	    	$period= json_decode($type);
	    	
	    	switch ($period) {    		    		
	    		case "Daily":    	
		    			$attributes = array('id'=>'search_form','method'=>'post',);
    					echo form_open('Chart/art_by_task',$attributes); 
	    			break;
				case "Weekly":
						$attributes = array('id'=>'weekly_form','method'=>'post',);
			    		echo form_open('Chart/art_by_task_weekly',$attributes);                 			
					break;    					
	    		case "Monthly":    				
						$attributes = array('id'=>'monthly_form','method'=>'post',);
			    		echo form_open('Chart/art_by_task_monthly',$attributes);                 
	    			break;				
	    		default:	
		    			$attributes = array('id'=>'search_form','method'=>'post',);
    					echo form_open('Chart/art_by_task',$attributes); 
		    		break;
	    	}

    	?>
    	<div class="row" style="padding-top: 1%;"	>     	
			<div id="reportrange" style="background: transparent; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc; width: 20%; ">
			    <i class="fa fa-calendar"></i>&nbsp;
				<?php
							$Sdater = array(
							        'type'  => 'hidden',
							        'name'  => 'date1',
							        'id'    => 'date1',
							        'value' => '',
							);

							echo form_input($Sdater);		    		

							$Edater = array(
							        'type'  => 'hidden',
							        'name'  => 'date2',
							        'id'    => 'date2',
							        'value' => '',
							);

							echo form_input($Edater);		    		
				?>		    
			    <span></span> <i class="fa fa-caret-down"></i>
			</div>    					

           	<?php echo form_close(); ?>         
		<div class="w-100"></div>		
    	<!--	
			<div class="col-md-3">
                <div class="form-group margin ">
                    <label>Date From:</label> 
                        <div class="input-group date ">
                            <div class="input-group-addon   ">
                                <i class="fa fa-calendar "></i>
                            </div>
                            <?php
                                $pdata = array('class'=>'form-control  input-lg','type'=>'date','id'=>'datepicker','name'=>'date1','placeholder'=>'e.g 01-01-2019','reqiured'=>'');
                                echo form_input($pdata);
                            ?>                            
                        </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group margin">
                    <label>Date To:</label> 
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
							<?php
                                $pdata = array('class'=>'form-control  input-lg' ,'type'=>'date','id'=>'datepicker','name'=>'date2','placeholder'=>'e.g 01-01-2019','reqiured'=>'');
                                echo form_input($pdata);
                            ?>
                        </div>
                </div>
            </div>            
        -->
        <!--
        <div class="row justify-content-around">
        <div class="col-md-12"> 
            	<div class="col-md-6">
        -->
        <!--
        		<div class="col-md-3" style="display: flex;align-items:center; justify-content: center;">
        -->
        		<div class="col-md-8"></div>
            	<div class="col-md-4 d-inline-block">
            	<?php
		    		$attributes = array('id'=>'dailyrecord_form','method'=>'post',);
		    		echo form_open('Chart/art_by_task',$attributes); 
					$fdate = array(
					        'type'  => 'hidden',
					        'name'  => 'ddate1',
					        'id'    => 'ddate1',
					        'value' => '',
					);

					echo form_input($fdate);		    		

					$tdate = array(
					        'type'  => 'hidden',
					        'name'  => 'ddate2',
					        'id'    => 'ddate2',
					        'value' => '',
					);

					echo form_input($tdate);		    		

                    $pdata = array('class'=>'btn btn-outline-success btn-rounded waves-effect margin  pull-right','type' => 'submit','name'=>'dailyrecord','value'=>'true', 'content' => 'Daily');
                    echo form_button($pdata);

                    echo form_close();
                 ?>                                
                <?php
					$attributes = array('id'=>'weeklyrecord_form','method'=>'post',);
		    		echo form_open('Chart/art_by_task_weekly',$attributes);                 

					$fdate = array(
					        'type'  => 'hidden',
					        'name'  => 'wdate1',
					        'id'    => 'wdate1',
					        'value' => '',
					);

					echo form_input($fdate);		    		

					$tdate = array(
					        'type'  => 'hidden',
					        'name'  => 'wdate2',
					        'id'    => 'wdate2',
					        'value' => '',
					);

					echo form_input($tdate);

                    $pdata = array('class'=>'btn btn-outline-warning btn-rounded waves-effect margin  pull-right','type' => 'submit','name'=>'weeklyrecord','value'=>'true', 'content' => 'Weekly');
                    echo form_button($pdata);

                    echo form_close();
                 ?>
                <?php
					$attributes = array('id'=>'monthlyrecord_form','method'=>'post',);
		    		echo form_open('Chart/art_by_task_monthly',$attributes);                 

					$fdate = array(
					        'type'  => 'hidden',
					        'name'  => 'mdate1',
					        'id'    => 'mdate1',
					        'value' => '',
					);

					echo form_input($fdate);		    		

					$tdate = array(
					        'type'  => 'hidden',
					        'name'  => 'mdate2',
					        'id'    => 'mdate2',
					        'value' => '',
					);

					echo form_input($tdate);

                    $pdata = array('class'=>'btn btn-outline-danger btn-rounded waves-effect margin  pull-right','type' => 'submit','name'=>'monthlyrecord','value'=>'true', 'content' => 'Monthly');
                    echo form_button($pdata);

                    echo form_close();
                 ?>                  
             	</div>                                	
        </div>
    	</div>
    	<div class="row" style="padding-top: 1%;">
	    	<div class="col-md-8">
				<div class="mini-container" >
				    <canvas id="art_by_task"></canvas>
				</div>	
			</div>	
			<div class="col-md-4" style="padding-top: 1rem; padding-left: 10%;"> 
				<div class="card" style="width: 18rem;">
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item">
					    	<div class="card h-25 d-inline-block">
								<div id="total_task_art" class="mini-container" >
									<span></span>
									<h4></h4>
								    <canvas id="total_art_by_task" width="200" height="50"></canvas>
								</div>
							</div>
				    </li>
				    <li class="list-group-item">
							<div class="card h-25 d-inline-block">
								<div id="max_task_art" class="mini-container" >
									<span></span>
									<h4></h4>
									<p></p>
								    <canvas id="max_art_by_task" width="200" height="50"></canvas>
								</div>
							</div>    	
				    </li>
				  </ul>
				</div>
			</div>
		</div>

	<div class="row" style="padding-top: 1%;">
	    <div class="col-md-4" style="padding-left: 2rem;">
	    	<div class="card">
				<div id="bar_task_art" class="mini-container" >
					<span></span>
					<h4></h4>
					<p></p>
				    <canvas id="bar_art_by_task" width="400" height="300" style="padding-right: 1%;padding-left: 1%;"></canvas>
				</div>
			</div>
		</div>    		
		<div class="col-md-8"> 
		<div class="mx-auto" style="width: 75%;">
			
			<table id="task-articles" class="hover row-border">
				<thead>
		            <tr>
		                <th>User</th>
		                <?php 
		                switch ($period) {
		                	case 'Yearly':
		               	?>
		                		<th>Year</th>
		                <?php
		                		break;
		                	case 'Monthly':
		                ?>
		                		<th>Month</th>
		                <?php
		                		break;
		                	case 'Weekly':
		                ?>
		                		<th>Week No.</th>
		                <?php
		                		break;
		                	case 'Daily':
		                ?>
		                		<th>Date</th>
		                <?php 
		                		break;
		                	default:
		                ?>
		                		<th>Date</th>
		                <?php
		                		break;
		                }
		                ?>
		                <th>Articles</th>
		            </tr>
	        	</thead>
	        	<tbody>
	        	</tbody>
	        </table>		
	    	</div>
	    </div>    	

      </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
	
</body>
</html>

<script>


var d1= <?php echo $d1; ?>;	
var d2= <?php echo $d2; ?>;	


$(function() {

    //var start = moment().subtract(29, 'days');
    var start = moment().subtract(7, 'days');
    var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        $('#reportrange #date1').val(start.format('MM/DD/YYYY'));
   		$('#reportrange #date2').val(end.format('MM/DD/YYYY'));

		if (d1==null) {
			var fdate=start.format('MM/DD/YYYY');
		}else{
			var fdate=d1;
		}

		$("#ddate1").val(fdate);
		$("#ydate1").val(fdate);
		$("#mdate1").val(fdate);
		$("#wdate1").val(fdate);

		if (d2==null) {
			var tdate=end.format('MM/DD/YYYY');
		}else{
			var tdate=d2;
		}

		$("#ddate2").val(tdate);
		$("#ydate2").val(tdate);
		$("#mdate2").val(tdate);
		$("#wdate2").val(tdate);


   		//$('#search_form').submit();
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);
    cb(start, end);

    $('#reportrange').on('apply.daterangepicker',function(ev, picker) {
    	$('#search_form').submit();
  	});
});


var task_data = <?php echo $task_data; ?>;

//var group_data=alasql('SELECT title AS cnt FROM ?',[task_data]);
//var group_data=alasql('SELECT title AS title,GROUP_CONCAT(added_date) AS grp_date,GROUP_CONCAT(count_article) AS grp_article FROM ? GROUP BY title ORDER BY title,added_date',[task_data]);



var group_data=alasql('SELECT title AS title,GROUP_CONCAT(added_date) AS grp_date,GROUP_CONCAT(count_article) AS grp_article FROM ? GROUP BY title ORDER BY title,added_date',[task_data]);

var group_task_art=alasql('SELECT title AS title,SUM(CONVERT(INTEGER,count_article)) AS cnt_article FROM ? GROUP BY title ORDER BY title',[task_data]);

var max_data= alasql('SELECT MAX(CONVERT(INTEGER,cnt_article)) AS Max_Art FROM ?',[group_task_art]);
var tot_data= alasql('SELECT SUM(CONVERT(INTEGER,cnt_article)) AS tot_Art FROM ?',[group_task_art]);

var group_date_art=alasql('SELECT added_date AS add_date,SUM(CONVERT(INTEGER,count_article)) AS cnt_article FROM ? GROUP BY added_date ORDER BY added_date',[task_data]);

var total_max_rec=alasql('SELECT title,CONVERT(INTEGER,cnt_article) FROM ? WHERE cnt_article='+max_data[0].Max_Art,[group_task_art]);

var total_max_data=alasql("SELECT title,added_date,CONVERT(INTEGER,count_article) as produce_article FROM ? WHERE title LIKE '"+total_max_rec[0].title+"' ORDER BY added_date",[task_data]);

var date_string=alasql('SELECT DISTINCT(added_date) AS added_date FROM ? ORDER BY added_date',[task_data]);

var max_percent= Math.round((max_data[0].Max_Art/tot_data[0].tot_Art)*100,2);

var valuedata=[];
var labeldata=[];

for(var q in group_date_art){
	valuedata.push(group_date_art[q].cnt_article);
	labeldata.push(group_date_art[q].add_date);
}

var bt = document.getElementById('bar_art_by_task').getContext('2d');

var blabel=[];
var bvalue=[];

	switch(itype){
		case 'Yearly':
			for(var m in total_max_data){
			    blabel.push(moment(total_max_data[m].added_date).format('YYYY'));
				bvalue.push(total_max_data[m].produce_article);
			}	
		break;		
		case 'Monthly':			
			for(var m in total_max_data){
			    blabel.push(moment(total_max_data[m].added_date).format('MMM'));
				bvalue.push(total_max_data[m].produce_article);
			}	
		break;
		case 'Weekly':
			for(var m in total_max_data){
			    blabel.push('Wk '+total_max_data[m].added_date);
				bvalue.push(total_max_data[m].produce_article);
			}	
		break;
		default:
			for(var m in total_max_data){
			    blabel.push(moment(total_max_data[m].added_date).format('MMM DD'));
				bvalue.push(total_max_data[m].produce_article);
			}	
		break;
	}


console.log(task_data);
console.log(group_data);
//console.log(group_data);

var itype= <?php echo $type; ?>;

window.onload=function(e){
	switch(itype) {
	  case 'Yearly':
            document.getElementsByName('yearlyrecord')[0].style.backgroundColor="#17a2b8";
            document.getElementsByName('yearlyrecord')[0].style.color ="white";
	    break;		
	  case 'Monthly':
            document.getElementsByName('monthlyrecord')[0].style.backgroundColor="#17a2b8";
            document.getElementsByName('monthlyrecord')[0].style.color ="white";
	    break;
	  case 'Weekly':
			document.getElementsByName('weeklyrecord')[0].style.backgroundColor="#17a2b8";
			document.getElementsByName('weeklyrecord')[0].style.color ="white";
	    break;
	 case 'Daily':
			document.getElementsByName('dailyrecord')[0].style.backgroundColor="#17a2b8";
			document.getElementsByName('dailyrecord')[0].style.color ="white";
		break;
	  default:
	}    
}



$(document).ready( function () {
	$('#total_task_art span').html('Total Articles By Tasks');
	$('#total_task_art h4').html(tot_data[0].tot_Art);
	$('#max_task_art span').html('Highest Articles By Tasks');
	$('#max_task_art h4').html(max_data[0].Max_Art);
	$('#max_task_art p').html(max_percent+'% of Total');	
	$('#bar_task_art h4').html('Highest Articles Produced By Task '+total_max_rec[0].title);	
    $('#task-articles').DataTable({
							    	"columns": [
							    				{ "width": "35%" },
							    				{ "width": "25%" },
							    				{ "width": "15%" }
							    			],
    								"pageLength": 5
    							});
} );

$("tr:has(td)").remove();

$.each(task_data, function (index, tsk_data) {	
    $("#task-articles")
    		.append($('<tr/>')
    		.append($('<td/>').html(tsk_data.title))
            .append($('<td/>').html(tsk_data.added_date))
            .append($('<td/>').html(tsk_data.count_article))
    ); 
});



$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
  $("i",this).toggleClass("fa fa-hand-o-left fa fa-hand-o-right");
});

//Chart.defaults.global.legend.display = false;
Chart.defaults.global.animationSteps = 50;
Chart.defaults.global.tooltipYPadding = 16;
Chart.defaults.global.tooltipCornerRadius = 0;

var tx = document.getElementById('art_by_task');
var totx = document.getElementById('total_art_by_task');
var maxx = document.getElementById('max_art_by_task');

var task_data = <?php echo $task_data; ?>;

var itype= <?php echo $type; ?>;


function getRandomDColor() {
  var letters = '0123456789ABCDEF';
  var r,g,b,a;
  var color;

   r = [Math.floor(Math.random() * 255)];
   g = [Math.floor(Math.random() * 255)];
   b = [Math.floor(Math.random() * 255)];
   //a = [Math.floor(Math.random() * 255)];      

   //color='rgba('+r+','+g+','+b+','+a+')';
   color='rgb('+r+','+g+',255)';

  return color;
}

var tdate=[];
var tcount=[];
var ttask=[];
var tbgColor=[];
var tbColor=[];
var tlabelColor=[]
var tmpC3,tmpC4;
var dSet=[];
var x = 0;
var v=0

var jsonData={};
var tmp =[];

/*
for(v in task_data){
	var obj = new Object();

	obj.label=task_data[v].title;
	obj.data=[parseInt(task_data[v].count_article)];
	obj.backgroundColor=getRandomDColor();
	
	//var varray=new Array();		
	
	//varray=tvalue.split(',').map(function(el){ return +el;});
	//obj.data=varray;

	jsonData = obj;
    tmp.push(jsonData);
}

*/
var cnt=0;
var xdate=[];

for(cnt in date_string){
    xdate.push(date_string[cnt].added_date);
}	

//console.log(date_string);

const cdate = xdate;
const xldate = [...new Set(cdate)];

//console.log(xldate);

var darray=[];

var p=0;

for (p in xldate){
	darray.push([dateFormat(xldate[p],'dd mmm yy')]);
}

//console.log(darray);

var vdate=[];

for(v in group_data){
	var obj = new Object();

	obj.label=group_data[v].title;
	//obj.backgroundColor=getRandomDColor();
	obj.backgroundColor='#'+(0x1000000+(Math.random())*0xffffff).toString(16).substr(1,6);
	obj.borderColor= obj.backgroundColor;


	obj.fill=false;
	obj.spanGaps= false;
	obj.borderJoinStyle='miter';

	var gdate=group_data[v].grp_date;
	var gdarray=new Array();		
	gdarray=gdate.split(',').map(function(el){ return +moment(el,'YYYY-MM-DD');});	

	var s_gdate=gdate.split(',');

	var tvalue=group_data[v].grp_article;
	var varray=new Array();		
	varray=tvalue.split(',').map(function(el){ return +el;});	
	/*
	console.log(varray);
	console.log('data value');
	console.log(gdate.split(','));
	console.log(gdate.split(',').length);
	console.log('gdate');	
	console.log(xldate);
	console.log(xldate.length);
	console.log('xldate array');
	*/

	var r ={},i;

	for (i=0; i<s_gdate.length; i++) {
		r[s_gdate[i]]=varray[i];
	}

	console.log(r);

	var l ={},o;
	for (o=0; o<xldate.length;o++){
		l[xldate[o]]=0;
	}

	console.log(l);


	$.extend(l,r);

	console.log(l);

	var narray=new Array();		

	narray = Object.keys(l).map(function(key) {
	  return +l[key];
	});	

	

	/*
	gdarray.length === xldate.length && gdarray.every((value, index) => value === xldate[index]);
	array1.length === array2.length && array1.sort().every(function(value, index) { return value === array2.sort()[index]});		
	
	var tvalue=group_data[v].grp_article;
	var varray=new Array();		
	varray=tvalue.split(',').map(function(el){ return +el;});	
	obj.data=varray;
	*/
	obj.data=narray;
	jsonData = obj;
    tmp.push(jsonData);
}

//console.log(narray);

/*
for(v in group_data){
	var obj = new Object();

	obj.label=group_data[v].title;
	//obj.backgroundColor=getRandomDColor();
	obj.backgroundColor='#'+(0x1000000+(Math.random())*0xffffff).toString(16).substr(1,6);
	obj.borderColor= obj.backgroundColor;


	obj.fill=false;
	obj.spanGaps= false;
	obj.borderJoinStyle='miter';

		vdate.push(group_data[v].grp_date.split(','));	

	var tvalue=group_data[v].grp_article;
	var varray=new Array();		
	varray=tvalue.split(',').map(function(el){ return +el;});
	obj.data=varray;

	jsonData = obj;
    tmp.push(jsonData);
}
*/
//console.log(vdate);

var xlabel,ylabel,titlelabel;

switch(itype) {
  case 'Monthly':
	    xlabel='Month';
	    ylabel='Monthly Article Count';
	    titlelabel='Monthly Article By Task';
    break;
  case 'Weekly':
	    xlabel='Week';
	    ylabel='Weekly Article Count';
	    titlelabel='Weekly Article By Task';
    break;
  default:
	    xlabel='Date';
	    ylabel='Daily Article Count';
	    titlelabel='Article By Task';
}

/*
var byTask = new Chart(tx, {
    type: 'line',
    data: { 
    		labels: xldate,	           
            datasets:tmp,			
        },
	options: {
		legend:{
			position:'top'
		},		
		responsive: true,
		plugins: {
		      datalabels: {
		         display: false,
		      }
		   },		
		elements: {
				    line: {				    	
				            tension: 0
				        }
				    },
		title: {
			display: true,
			text: titlelabel
		},
		tooltips: {
			enable: false,
			mode: 'index',
			intersect: true,
		},
		hover: {
			mode: 'nearest',
			intersect: true
		},
		scales: {
			xAxes: [{
				display: true,				
				gridLines: {
				        display: false,
				        drawBorder: false,
				      },
				scaleLabel: {
					display: false,
					labelString: xlabel
				}
			}],
			yAxes: [{
				ticks: {
                    beginAtZero:false
                },				
				display: true,				
				gridLines: {
				        display: true,
				        drawBorder: false,
				      },
				scaleLabel: {
					display: false,
					labelString: ylabel
				}
			}]
		}
	}        
});
*/



var byTask= new Chart(tx, {
    type: 'bar',
    //type: 'horizontalBar',
    data: { 
    		labels: darray,               
            datasets: tmp,

            /*
            [{
			                label: 'Article Count By Task',
			                backgroundColor:tbgColor,
			                borderColor:tbColor,
			                data: tcount,
			                pointBackgroundColor:tbgColor,
			                pointBorderColor: tbColor,
			                fill: false
			          }],			
			*/

        },
	options: {
		responsive: true,
		title: {
			display: true,
			text: titlelabel
		},
		plugins: {
		      datalabels: {
		         display: false,
		         align: 'end',
		         anchor: 'end'
		      }
		   },		
		tooltips: {
			mode: 'index',
			intersect: true	,
		},
		hover: {
			mode: 'nearest',
			intersect: true
		},
		scales: {
			xAxes: [{
				gridLines: {
				        display: false,
				        drawBorder: false,
				      },				
				stacked: true,
				display: true,
				scaleLabel: {
					display: false,
					labelString: xlabel
				}
			}],
			yAxes: [{
				gridLines: {
				        display: false,	
				        drawBorder: true,			        
				      },				
				//ticks:{mirror:true},
				stacked: true,
				display: true,
				scaleLabel: {
					display: false,
					labelString: ylabel
				}
			}]
		}
	}			              
});


var t_art = new Chart(totx,{
    type: 'line',
    data: {            
            datasets:[{			                
			                data: valuedata,
			                lineTension: 0,
			                backgroundColor: 'rgb(5,141,199)',//backgroundColor: ["rgb(250,128,114)"],
							borderColor: 'rgb(5,141,199)',//borderColor: ["rgb(250,128,114)"],
							fill: false,
							pointRadius: 0,
      						borderWidth: 0,      						
			          }],
			labels: labeldata,	
        },
	options: {
		legend: {
	        display: false,
	    },			
		plugins: {
		      datalabels: {
		         display: false,
		      }
		   },	    
		title: {
			display: false,
			text: titlelabel
		},		
		tooltips: {
			enabled: false
		},
		scales: {
			xAxes: [{
				gridLines: {
            		display: false,
          		},
				display: false,
				scaleLabel: {
					display: false,
					labelString: xlabel
				}
			}],
			yAxes: [{
				gridLines: {
				        drawBorder: false,
				      },				
	            ticks: {
	                //stepSize: 5000
	            },
				display: false,
				scaleLabel: {
					display: false,
					labelString: ylabel
				}
			}]
		}
	}        
});


var m_art = new Chart(maxx,{
    type: 'line',
    data: {            
            datasets:[{			                
			                data: bvalue,
			                lineTension: 0,
			                backgroundColor: 'rgb(5,141,199)',//backgroundColor: ["rgb(250,128,114)"],
							borderColor: 'rgb(5,141,199)',//borderColor: ["rgb(250,128,114)"],
							fill: false,
							pointRadius: 0,
      						borderWidth: 0,      						
			          }],
			labels: blabel,	
        },
	options: {
		legend: {
	        display: false,
	    },			
		plugins: {
		      datalabels: {
		         display: false,
		      }
		   },	    
		title: {
			display: false,
			text: titlelabel
		},		
		tooltips: {
			enabled: false
		},
		scales: {
			xAxes: [{
				gridLines: {
            		display: false,
          		},
				display: false,
				scaleLabel: {
					display: false,
					labelString: xlabel
				}
			}],
			yAxes: [{
				gridLines: {
				        drawBorder: false,
				      },				
	            ticks: {
	                //stepSize: 5000
	            },
				display: false,
				scaleLabel: {
					display: false,
					labelString: ylabel
				}
			}]
		}
	}        
});

var bar_task = new Chart(bt,{
    type: 'bar',
    data: {            
            datasets:[{			                
			                data: bvalue,
			                backgroundColor: 'rgb(5,141,199)',//backgroundColor: ["rgb(250,128,114)"],
							borderColor: 'rgb(5,141,199)',//borderColor: ["rgb(250,128,114)"],
			          }],
			labels: blabel,	
        },
	options: {
		legend: {
	        display: false,
	    },	    
		plugins: {
		      datalabels: {
		         display: false,
		         align: 'end',
		         anchor: 'end'
		      }
		   },		
		showTooltips: false,
		responsive: true,
		title: {
			display: false,
			text: titlelabel
		},
		tooltips: {
			mode: 'index',
			intersect: false,
		},
		hover: {
			mode: 'nearest',
			intersect: true
		},
		scales: {
			xAxes: [{
				gridLines: {
            		display: false,
            		drawBorder: false,
          		},
				display: true,
				scaleLabel: {
					display: false,
					labelString: xlabel
				}
			}],
			yAxes: [{
				gridLines: {
				        drawBorder: false,
				      },				
	            ticks: {
	                //stepSize: 5000
	            },
				display: true,
				scaleLabel: {
					display: false,
					labelString: ylabel
				}
			}]
		}
	}        
});

</script>
