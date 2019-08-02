<?php $this->load->view('header'); ?>			

      <!-- Main Content -->
    <!--
      <h4 class="mt-4">Article By <?php echo str_replace('"', '', $type); ?></h4>
  	-->

      <div class="container-fluid">

    	<?php 
    	$period= json_decode($type);
    	
    	switch ($period) {    		    		
    		case "Daily":    	
	    			$attributes = array('id'=>'search_form','method'=>'post',);
	    			echo form_open('Chart/index',$attributes); 
    			break;
			case "Weekly":
					$attributes = array('id'=>'weekly_form','method'=>'post',);
		    		echo form_open('Chart/art_by_weekly',$attributes);                 			
				break;    					
    		case "Monthly":    				
					$attributes = array('id'=>'monthly_form','method'=>'post',);
		    		echo form_open('Chart/art_by_monthly',$attributes);                 
    			break;				
    		default:	
	    			$attributes = array('id'=>'search_form','method'=>'post',);
	    			echo form_open('Chart/index',$attributes); 
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
            	<div class="col-md-4" style="display: flex;align-items:right; justify-content: right;"> 
			-->
				<div class="col-md-8"></div>
            	<div class="col-md-4 d-inline-block">
            	<?php
		    		$attributes = array('id'=>'dailyrecord_form','method'=>'post',);
		    		echo form_open('Chart/index',$attributes); 
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
		    		echo form_open('Chart/art_by_weekly',$attributes);                 

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
		    		echo form_open('Chart/art_by_monthly',$attributes);                 

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
		    		echo form_open('Chart/art_by_yearly',$attributes);                 

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
        <!--</div>-->
    	<!--</div>-->
    </div>            
    <div class="row" style="padding-top: 1%;">
    	<div class="col-md-8">
			<div class="mini-container" >
			    <canvas id="art_by_date"></canvas>
			</div>	
		</div>	
		<div class="col-md-4" style="padding-top: 1rem; padding-left: 10%;"> 
			<div class="card" style="width: 18rem;">
			  <ul class="list-group list-group-flush">
			    <li class="list-group-item">
				    	<div class="card h-25 d-inline-block">
							<div id="total_art" class="mini-container" >
								<span></span>
								<h4></h4>
							    <canvas id="total_art_by_date" width="200" height="50"></canvas>
							</div>
						</div>
			    </li>
			    <li class="list-group-item">
						<div class="card h-25 d-inline-block">
							<div id="max_art" class="mini-container" >
								<span></span>
								<h4></h4>
								<p></p>
							    <canvas id="max_art_by_date" width="200" height="50"></canvas>
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
				<div id="bar_percent" class="mini-container" >
					<span></span>
					<h4></h4>
				    <canvas id="bar_percent_by_date" width="450" height="450" style="padding-right: 1%;padding-left: 1%;"></canvas>
				</div>
			</div>
		</div>    		
		<div class="col-md-8"> 
			<div class="mx-auto" style="width:  75%;">
			<!--
			<table id="added-articles" class="table table-sm table-hover table-bordered">
			-->
			<!--
			<table id="added-articles" class="ui celled table table-hover">
			-->
			<table id="added-articles" class="hover row-border">
				<thead>
		            <tr>
		                <!--<th>SR</th>-->
		            <?php switch ($period){ 
		            	case 'Daily': ?>
		                <th>Date</th>
		            <?php break; 
		            	case 'Weekly': ?>
						<th>Week No.</th>
		            <?php break; 
		            	case 'Monthly': ?>
		            	<th>Month</th>
		            <?php break; 
		            	case 'Yearly': ?>
		            	<th>Year</th>
		            <?php break; 
		            	default: ?>			            				            				<<th>Date</th>			
		            <?php break; 
		            	}
		            ?>
		                <th>Articles</th>
		                <th>% Articles</th>
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

<script type="text/javascript">

//Chart.defaults.global.legend.display = false;

var d1= new Date(<?php echo $d1; ?>);	
var d2= new Date(<?php echo $d2; ?>);	


//var ts = moment().subtract(7, 'days');	
//console.log(ts);
console.log(moment(d1).format());
console.log(moment(d2).format());

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

var dx = document.getElementById('art_by_date');
var tx = document.getElementById('total_art_by_date');
var mx = document.getElementById('max_art_by_date');


var data= <?php echo $data; ?>;
var itype= <?php echo $type; ?>;

console.log(data);

var articles=data;

var total_art=alasql('SELECT SUM(CONVERT(INTEGER,article_count)) as total_articles FROM ? GROUP BY title',[data]);

var m_art=alasql('SELECT MAX(CONVERT(INTEGER,article_count)) as max_articles FROM ? GROUP BY title',[data]);

var mn_art=alasql('SELECT MIN(CONVERT(INTEGER,article_count)) as min_articles FROM ? GROUP BY title',[data]);

var m_percent= Math.round((m_art[0].max_articles/total_art[0].total_articles)*100,2);

console.log(total_art);
console.log(m_art);
console.log(mn_art);
console.log(m_percent);

/*
document.getElementById("ddate1").value = d1;
document.getElementById("ydate1").value = d1;
document.getElementById("mdate1").value = d1;
document.getElementById("wdate1").value = d1;

document.getElementById("ddate2").value = d2;
document.getElementById("ydate2").value = d2;
document.getElementById("mdate2").value = d2;
document.getElementById("wdate2").value = d2;
*/

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


function monthlyButtonStyle(_this) {
  _this.style.backgroundColor = "red";
}

function weeklyButtonStyle(_this) {
  _this.style.backgroundColor = "yellow";
}

function dailyButtonStyle(_this) {
  _this.style.backgroundColor = "green";
}



$("#menu-toggle").click(function(e) {
  e.preventDefault();
  $("#wrapper").toggleClass("toggled");
  //$("i",this).toggleClass("fa fa-hand-o-left fa fa-hand-o-right");
  $("i",this).toggleClass("fa fa-arrow-circle-o-left fa fa-arrow-circle-o-right");
  
});

/*
Chart.defaults.global.legend.display = false;
Chart.defaults.global.animationSteps = 50;
Chart.defaults.global.tooltipYPadding = 16;
Chart.defaults.global.tooltipCornerRadius = 0;
*/

// 1. remove all existing rows
$("tr:has(td)").remove();

// 2. get each article
$.each(articles, function (index, article) {
	/*
    // 2.2 Create table column for categories
    var td_date = $("<td/>");

    // 2.3 get each category of this article
 
    $.each(article.adate, function (i, adate) {
        var span = $("<span/>");
        span.text(adate);
        td_date.append(span);
    });

    // 2.4 Create table column for tags
   var td_articles = $("<td/>");

    // 2.5 get each tag of this article    
    $.each(article.article_count, function (i, article_count) {
        var span = $("<span/>");
        span.text(article_count);
        td_articles.append(span);
    });
	*/
    // 2.6 Create a new row and append 3 columns (title+url, categories, tags)
    $("#added-articles")    		
    		.append($('<tr/>')
            //.append($('<td/>')
            //.html("<a href='"+article.url+"'>"+article.title+"</a>")
            //	)
            .append($('<td/>').html(article.adate))
            .append($('<td/>').html(article.article_count))            
            .append($('<td/>').html(Math.round((parseInt(article.article_count)/total_art[0].total_articles)*100,2)+'%'))
    );     
    		
});


//var dateFormat = require('dateformat');

console.log(data);
console.log(articles);
console.log(d1);
console.log(d2);

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


var datapart;

var labeldata=[];
var valuedata=[];
var percentdata=[];
var bgColor=[];
var bColor=[];
var labelColor=[]
var tmpC1,tmpC2;
var dSet=[];

for(var i in data){
	switch(itype){
		case 'Yearly':
			labeldata.push(dateFormat(data[i].adate, "yyyy"));
		break;		
		case 'Monthly':
			labeldata.push(dateFormat(data[i].adate, "mmm"));
		break;
		case 'Weekly':
			labeldata.push('Wk '+data[i].adate);
			//labeldata.push('Wk '+data[i].adate+'('+dateFormat(data[i].sDate,"mmm dd")+' ~ '+dateFormat(data[i].eDate,"mmm dd")+')');
		break;
		default:
			labeldata.push(dateFormat(data[i].adate, "dd mmm yy"));
		break;

	}
    
	valuedata.push(data[i].article_count);
	percentdata.push(Math.round((data[i].article_count/total_art[0].total_articles)*100));
	tmpC1=getRandomDColor();
	tmpC2=getRandomDColor();
	//bgColor.push(tmpC1);
	bgColor.push('#'+(0x1000000+(Math.random())*0xffffff).toString(16).substr(1,6));
	bColor.push(tmpC2);
	labelColor.push(tmpC1,data[i].adate);
}	

console.log(labeldata);

var xlabel,ylabel,titlelabel;

switch(itype) {
  case 'Yearly':
	    xlabel='Year';
	    ylabel='Yearly Article Count';
	    titlelabel='Article By Year';
    break;	
  case 'Monthly':
	    xlabel='Month';
	    ylabel='Monthly Article Count';
	    titlelabel='Article By Month';
    break;
  case 'Weekly':
	    xlabel='Week';
	    ylabel='Weekly Article Count';
	    titlelabel='Article By Week';
    break;
  default:
	    xlabel='Date';
	    ylabel='Daily Article Count';
	    titlelabel='Article By Date';
}
var tot_art = new Chart(tx,{
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


var max_art = new Chart(mx,{
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


$(document).ready( function () {
	console.log(mn_art);
	$('#total_art span').html('Total Articles');
	$('#total_art h4').html(total_art[0].total_articles);
	$('#max_art span').html('Highest Articles');
	$('#max_art h4').html(m_art[0].max_articles);
	$('#max_art p').html(m_percent+'% of Total');
    $('#added-articles').DataTable({
							    	"columns": [
							    				{ "width": "45%" },
							    				{ "width": "15%" },
							    				{ "width": "15%" }
							    			],
    								"pageLength": 5
    							});    
} );

var byDate = new Chart(dx, {
    type: 'bar',
    //type: 'horizontalBar',
    //type: 'line',
    data: {            
            datasets:[{
			                data: valuedata,
			                lineTension: 0,
			                backgroundColor:bgColor,
			                borderColor:bColor,
			                //backgroundColor: 'rgb(5,141,199)',//backgroundColor: ["rgb(250,128,114)"],
							//borderColor: 'rgb(5,141,199)',//borderColor: ["rgb(250,128,114)"],
							fill: false,
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
		         align: 'end',
		         anchor: 'end'
		      }
		   },		
		showTooltips: false,
		responsive: true,
		title: {
			display: true,
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
/*
var data = [{
    data: valuedata,
    labels: labeldata,
    backgroundColor: bgColor,
    borderColor: "#fff"
}];

var options = {
    tooltips: {
        enabled: false
    },
    plugins: {
        datalabels: {
            formatter: (value, barx) => {
                let sum = 0;
                let dataArr = barx.chart.data.datasets[0].data;
                dataArr.map(data => {
                    sum += data;
                });
                let percentage = (value*100 / sum).toFixed(2)+"%";
                return percentage;
            },
            color: '#fff',
        }
    }
};

var barx = document.getElementById('bar_percent_by_date').getContext('2d');


var bChart = new Chart(barx, {
    type: 'pie',
    data: {
        datasets: data
    },
    options: options
});
*/

		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data: percentdata,
					backgroundColor: bgColor,
					label: '% by Date',
					borderColor: "#fff"
				}],
				labels: labeldata
			},
			options: {
				responsive: true,
				tooltips: {
				 enabled: false
				},
				legend:{
					position:'left'
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
							return value +'%';
						}
					},
				}
			}			
		};

		var piex = document.getElementById('bar_percent_by_date').getContext('2d');
		var pChart = new Chart(piex, config);

</script>
