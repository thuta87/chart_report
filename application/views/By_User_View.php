<?php $this->load->view('header'); ?>			
      <!-- Main Content -->
  <!--
      <h4 class="mt-4">Article Produced By Users</h4>
  -->
      <div class="container-fluid">
    	<?php 
    	$period= json_decode($type);
    	
    	switch ($period) {    		    		
    		case "Daily":    	
	    			$attributes = array('id'=>'search_form','method'=>'post',);
	    			echo form_open('Chart/art_by_user',$attributes); 
    			break;
			case "Weekly":
					$attributes = array('id'=>'weekly_form','method'=>'post',);
		    		echo form_open('Chart/art_by_user_weekly',$attributes); 
				break;    					
    		case "Monthly":    				
					$attributes = array('id'=>'monthly_form','method'=>'post',);
		    		echo form_open('Chart/art_by_user_monthly',$attributes); 
    			break;				
    		case "Yearly":    				
					$attributes = array('id'=>'yearly_form','method'=>'post',);
		    		echo form_open('Chart/art_by_user_yearly',$attributes); 
    			break;				    			
    		default:	
	    			$attributes = array('id'=>'search_form','method'=>'post',);
	    			echo form_open('Chart/art_by_user',$attributes); 
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
			<div class="col-md-3 ">
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
        		<!--<div class='col-md-3 id="search_btn"' >-->
        		<div class="col-md-8"></div>
            	<div class="col-md-4 d-inline-block">
            	<?php
		    		$attributes = array('id'=>'dailyrecord_form','method'=>'post',);
		    		echo form_open('Chart/art_by_user',$attributes); 
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
		    		echo form_open('Chart/art_by_user_weekly',$attributes);                 

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
		    		echo form_open('Chart/art_by_user_monthly',$attributes);                 

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
                <?php
					$attributes = array('id'=>'yearlyrecord_form','method'=>'post',);
		    		echo form_open('Chart/art_by_user_yearly',$attributes);                 

					$fdate = array(
					        'type'  => 'hidden',
					        'name'  => 'ydate1',
					        'id'    => 'ydate1',
					        'value' => '',
					);

					echo form_input($fdate);		    		

					$tdate = array(
					        'type'  => 'hidden',
					        'name'  => 'ydate2',
					        'id'    => 'ydate2',
					        'value' => '',
					);

					echo form_input($tdate);

                    $pdata = array('class'=>'btn btn-outline-info btn-rounded waves-effect margin  pull-right','type' => 'submit','name'=>'yearlyrecord','value'=>'true', 'content' => 'Yearly');
                    echo form_button($pdata);

                    echo form_close();
                 ?>                  
             </div>
		</div>                                	
		<!--
        </div>
    	</div>
    	-->
    	</div>
    	<div class="row" style="padding-top: 1%;">
	    	<div class="col-md-8">
				<div class="mini-container" >
				    <canvas id="art_by_user"></canvas>
				</div>	
			</div>	

			<div class="col-md-4" style="padding-top: 1rem"> 

	    	<div class="card">
				<div id="total_art_user" class="mini-container" >
					<span></span>
					<h4></h4>
				    <canvas id="total_art_by_user" width="400" height="400"></canvas>
				</div>
			</div>

			<!--
				<div class="card" style="width: 18rem;">
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item">
					    	<div class="card h-50 d-inline-block">
								<div id="total_art_user" class="mini-container" >
									<span></span>
									<h4></h4>
								    <canvas id="total_art_by_user" width="200" height="200"></canvas>
								</div>
							</div>
				    </li>
				    <li class="list-group-item">
							<div class="card h-25 d-inline-block">
								<div id="line_total_art" class="mini-container" >
									<span></span>
									<h4></h4>
									<p></p>
								    <canvas id="line_art_by_user" width="200" height="50"></canvas>
								</div>
							</div>    	
				    </li>				
				  </ul>
				</div>
			-->
			</div>			

	</div>
	<div class="row" style="padding-top: 1%;">
	    <div class="col-md-4" style="padding-left: 2rem;">
	    	<div class="card">
				<div id="bar_art" class="mini-container" >
					<span></span>
					<h4></h4>
					<p></p>
				    <canvas id="bar_art_by_user" width="400" height="300" style="padding-right: 1%;padding-left: 1%;"></canvas>
				</div>	    			    		
			</div>
		</div>    		
		<div class="col-md-8"> 
			<div class="mx-auto" style="width: 75%;">
				
				<table id="user-articles" class="hover row-border">
					<thead>
			            <tr>
			                <th>Name</th>
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
			                <th>Produced Articles</th>
			            </tr>
		        	</thead>
		        	<tbody>
		        	</tbody>
		        </table>		
		    	</div>
		    </div>

		</div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

</div>
	
</body>
</html>

<script>

var d1= new Date(<?php echo $d1; ?>);	
var d2= new Date(<?php echo $d2; ?>);	


//var ts = moment().subtract(7, 'days');	
//console.log(ts);
//console.log(moment(d1).format());
//console.log(moment(d2).format());

$(function() {

    //var start = moment().subtract(29, 'days');
	if (d1==null) {
		var start = moment().subtract(7, 'days');		
	}else{
		var start=moment(d1);
	}

	if (d2==null) {
		var end = moment();
	}else{
		var end=moment(d2);
	}


    //var start = moment().subtract(7, 'days');
    //var end = moment();

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        $('#reportrange #date1').val(start.format('MM/DD/YYYY'));
   		$('#reportrange #date2').val(end.format('MM/DD/YYYY'));

		if (d1==null) {
			var fdate=start.format('MM/DD/YYYY');
		}else{
			var fdate=moment(d1).format('MM/DD/YYYY');
		}

		$("#ddate1").val(fdate);
		$("#ydate1").val(fdate);
		$("#mdate1").val(fdate);
		$("#wdate1").val(fdate);

		if (d2==null) {
			var tdate=end.format('MM/DD/YYYY');
		}else{
			var tdate=moment(d2).format('MM/DD/YYYY');
		}

		$("#ddate2").val(tdate);
		$("#ydate2").val(tdate);
		$("#mdate2").val(tdate);
		$("#wdate2").val(tdate);

	console.log(fdate);
	console.log(tdate);


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


var user_data = <?php echo $user_data; ?>;
var itype= <?php echo $type; ?>;
var udata_group= <?php echo $udata_group; ?>;

var total_art_rec=alasql('SELECT name, SUM(CONVERT(INTEGER,produce_article)) as total_p_art FROM ? GROUP BY name',[user_data]);

var total_art=alasql('SELECT SUM(CONVERT(INTEGER,total_p_art)) as total_p_art FROM ? ',[total_art_rec]);

var max_art=alasql('SELECT Max(total_p_art) as max_a FROM ?',[total_art_rec]);


var total_max_rec=alasql('SELECT name,CONVERT(INTEGER,total_p_art) FROM ? WHERE total_p_art='+max_art[0].max_a,[total_art_rec]);

var total_max_data=alasql("SELECT name,aDate,CONVERT(INTEGER,produce_article) as produce_article FROM ? WHERE name LIKE '"+total_max_rec[0].name+"' ORDER BY aDate",[user_data]);


//max(prod) over (partition by userid) max_my_date
console.log(user_data);
console.log(udata_group);

//console.log(total_art_rec);
//console.log(max_art);
//console.log(total_max_rec);
//console.log(total_max_data);
console.log(total_art_rec);


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
	//$('#bar_art span').html('Maximum Articles By User');
	$('#bar_art h4').html('Highest Articles Produced By '+total_max_rec[0].name);
	$('#bar_art p').html('Total Articles : '+max_art[0].max_a);

    $('#user-articles').DataTable({
							    	"columns": [
							    				{ "width": "45%" },
							    				{ "width": "15%" },
							    				{ "width": "15%" }
							    			],
    								"pageLength": 5
    							});    
} );

$("tr:has(td)").remove();

$.each(user_data, function (index, usr_data) {	
    $("#user-articles")
    		.append($('<tr/>')
    		.append($('<td/>').html(usr_data.name))
            .append($('<td/>').html(usr_data.aDate))
            .append($('<td/>').html(usr_data.produce_article))
    ); 
});


$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
  $("i",this).toggleClass("fa fa-hand-o-left fa fa-hand-o-right");
});

//Chart.defaults.global.legend.display = false;

var ctx = document.getElementById('art_by_user');

var ux = ctx.getContext('2d');


//rgba(255,0,0,0)

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


var udate=[];
var ucount=[];
var varlabel=[];
var uusr=[];
var uname=[];
var ubgColor=[];
var ubColor=[];
var ulabelColor=[]
var tmpC3,tmpC4,tmpC5,tmpC6;
var uSet=[];
var y = 0;
var c = 0;
var i= 0;
var x=0;
var z=0;
var vdataset=[]

var jsonData={};
var tmp =[];

//Math.max.apply(Math, $.map(udata_group, function (el) { return el.length }));

	switch(itype){
		case 'Yearly':
			for(var c in user_data){
			    udate.push(moment(user_data[c].aDate).format('YYYY'));
			}	
		break;		
		case 'Monthly':			
			for(var c in user_data){
			    udate.push(moment(user_data[c].aDate).format('MMM'));
			}	

		break;
		case 'Weekly':
			for(var c in user_data){
			    udate.push('Wk '+user_data[c].aDate);
			}	
		break;
		default:
			for(var c in user_data){
			    udate.push(moment(user_data[c].aDate).format('DD MMM YY'));
			}	
		break;
	}

const cdate = udate;
const dcdate = [...new Set(cdate)];
	

for(i in udata_group){
	var obj = new Object();
	var oDate= new Object();
	uname.push(udata_group[i].name);

//var b = a.add(1, 'week'); 
//a.format();
//"2016-01-08T00:00:00-06:00"

	//Date split from comma and set in array	
	var str=udata_group[i].day_grp;
	var tarray=new Array();
	obj.label=udata_group[i].name;								

	//Separate value into array
	var tvalue=udata_group[i].cnt_grp;
	var varray=new Array();
	varray=tvalue.split(',').map(function(el){ return +el;});
	obj.data=varray;		

	tmpC5='#'+(0x1000000+(Math.random())*0xffffff).toString(16).substr(1,6);
	tmpC6=tmpC5;

	ubgColor.push(tmpC5);

	obj.backgroundColor = tmpC5;        
	obj.borderColor= tmpC6;
	obj.fill=false;
	obj.spanGaps= false;
	obj.borderJoinStyle='miter';
	jsonData = obj;
    tmp.push(jsonData);			
}

var xlabel,ylabel,titlelabel;

switch(itype) {
  case 'Yearly':
	    xlabel='Years';
	    ylabel='Yearly Produced Article';
	    titlelabel='Article Produced By Users(Yearly)';
    break;
  case 'Monthly':
	    xlabel='Months';
	    ylabel='Monthly Produced Article';
	    titlelabel='Article Produced By Users(Monthly)';
    break;
  case 'Weekly':
	    xlabel='Weeks';
	    ylabel='Weekly Produced Article';
	    titlelabel='Article Produced By Users(Weekly)';
    break;
  default:
	    xlabel='Date';
	    ylabel='Produced Article';
	    titlelabel='Article Produced By Users';
}

var byUser = new Chart(ux, {
    type: 'line',
    data: { 
    		labels: dcdate,	           
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

var tlabel=[];
var tvalue=[];
var percentdata=[];
var tmpC1,tmpC2;
var dSet=[];

for(var i in total_art_rec){
    tlabel.push(total_art_rec[i].name);
	tvalue.push(total_art_rec[i].total_p_art);
}	


		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: tvalue,
					backgroundColor: ubgColor,
					borderColor: "#fff"
				}],
				labels: tlabel
			},
			options: {
				responsive: true,
				tooltips: {
				 enabled: false
				},
				legend:{
					position:'top'
				},
				plugins: {
					datalabels:{						
						color:'#fff',
						
						anchor: 'end',
						align:'start',
						offset:-10,
						borderWidth:2,
						borderColor:'#fff',
						borderRadius:25,						
						backgroundColor: (context)=>{
							return context.dataset.backgroundColor;
						},						
						font:{
							weight:'bold',
							size: 10,							
						},
						
						formatter: (value)=>{
							var tot_per=Math.round((value/total_art[0].total_p_art)*100);
							return tot_per +'%';
						}
						
					},
				}
			}			
		};

		var pieC = document.getElementById('total_art_by_user').getContext('2d');
		var pChart_task = new Chart(pieC, config);

var bx = document.getElementById('bar_art_by_user').getContext('2d');

var blabel=[];
var bvalue=[];

	switch(itype){
		case 'Yearly':
			for(var m in total_max_data){
			    blabel.push(moment(total_max_data[m].aDate).format('YYYY'));
				bvalue.push(total_max_data[m].produce_article);
			}	
		break;		
		case 'Monthly':			
			for(var m in total_max_data){
			    blabel.push(moment(total_max_data[m].aDate).format('MMM'));
				bvalue.push(total_max_data[m].produce_article);
			}	
		break;
		case 'Weekly':
			for(var m in total_max_data){
			    blabel.push('Wk '+total_max_data[m].aDate);
				bvalue.push(total_max_data[m].produce_article);
			}	
		break;
		default:
			for(var m in total_max_data){
			    blabel.push(moment(total_max_data[m].aDate).format('MMM DD'));
				bvalue.push(total_max_data[m].produce_article);
			}	
		break;
	}


console.log(blabel);
var barx_art = new Chart(bx,{
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

