<!DOCTYPE html>
<html>
<head>
	<title>Smart Trace Dashboard</title>
	<!-- Bootstrap -->
    <link  rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.min.css');?>">
    <link  rel="stylesheet" href="<?php echo base_url('bootstrap/css/bootstrap.css');?>">
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url('bootstrap/js/bootstrap.min.js');?>"></script>	
    <script src="<?php echo base_url('bootstrap/datepicker/bootstrap-datepicker.js');?>"></script>
    <link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/datepicker/datepicker3.css">	
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/fontawesome/css/fontawesome.css">    
	<!--<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/fontawesome/css/fontawesome.css"> -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>bootstrap/fonts/fontawesome/css/font-awesome.css">    
</head>
<body>
<div class="wrapper">
<div class="container-fluid">	
	
	<div class="row"> <h1>Smart Trace Dashboard</h1> </div>

    <div class="row">
    	<?php 
    		$attributes = array('id'=>'search_form','method'=>'post',);
    		echo form_open('Chart/index',$attributes); 
    	?>
    	<div class="col-md-12">
			<div class="col-md-12 ">
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
            <div class="col-md-12">
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
            <div class="col-md-12">
                <?php
                    $pdata = array('class'=>'btn btn-info btn-lg btn-flat margin  pull-right','type' => 'submit','name'=>'searchrecord','value'=>'true', 'content' => '<i class="fa fa-search" aria-hidden="true"></i> Search');
                    echo form_button($pdata);
                 ?>
            </div>            
            <?php echo form_close(); ?>    
        </div>

    	<div class="col-md-6 offset-md-3">
			<div class="mini-container" >
			    <canvas id="art_by_user"></canvas>
			</div>	
		</div>	

    </div>
    <div class="container-fluid">
    <div class="row">
    	<div class="col-md-6">
			<div class="mini-container" >
			    <canvas id="art_by_task"></canvas>
			</div>	
		</div>	
		<div class="col-md-6">	
			<div class="chart-container" >
				<canvas id="art_by_date"></canvas>
			</div>
		</div>
	</div>
	</div>
</div>
</div>
</body>
</html>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<script>

Chart.defaults.global.legend.display = false;


var dx = document.getElementById('art_by_date');

var tx = document.getElementById('art_by_task');

var ux = document.getElementById('art_by_user');

var data= <?php echo $data; ?>;

console.log(data[0].adate);

var task_data = <?php echo $task_data; ?>;

var user_data = <?php echo $user_data; ?>;

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
   color='rgb(255,'+g+','+b+')';

  return color;
}

console.log(data[0].adate);

var datapart;

var labeldata=[];
var valuedata=[];
var bgColor=[];
var bColor=[];
var labelColor=[]
var tmpC1,tmpC2;
var dSet=[];

for(var i in data){
    labeldata.push(data[i].adate);
	valuedata.push(data[i].article_count);
	tmpC1=getRandomDColor();
	tmpC2=getRandomDColor();
	bgColor.push(tmpC1);
	bColor.push(tmpC2);
	labelColor.push(tmpC1,data[i].adate);
}	


function getRandomHexColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++) {
    color += letters[Math.floor(Math.random() * 16)];
  }
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

/*
datasets:[{
			                label: 'Daily Articles',
			                backgroundColor:bColor,
			                data: valuedata,
			                borderColor: "#8e5ea2",
			                fill: false
			          }],
*/
for(x in task_data){
    tdate.push(task_data[x].added_date);
	tcount.push(task_data[x].count_article);
	ttask.push(task_data[x].title+' ('+ task_data[x].added_date+')');
	if (x!=0){
		if (task_data[x-1].title==task_data[x].title) {
			tmpC3=tmpC3;
			tmpC4=tmpC4;
		}
		else{
			tmpC3=getRandomDColor();
			tmpC4=getRandomDColor();
		}
	}
	else{
		tmpC3=getRandomDColor();
		tmpC4=getRandomDColor();
	}


	tbgColor.push(tmpC3);
	tbColor.push(tmpC4);
	labelColor.push(tmpC3,task_data[x].title);
	var tmpStr='{label: "'+ttask+'",backgroundColor:"'+tbgColor+'",data:"'+ tcount+'",borderColor: "#8e5ea2",fill: false}';
	dSet.push(tmpStr);
}	


var udate=[];
var ucount=[];
var uusr=[];
var ubgColor=[];
var ubColor=[];
var ulabelColor=[]
var tmpC5,tmpC6;
var uSet=[];
var y = 0;

/*
datasets:[{
			                label: 'Daily Articles',
			                backgroundColor:bColor,
			                data: valuedata,
			                borderColor: "#8e5ea2",
			                fill: false
			          }],
*/
for(y in user_data){
    udate.push(user_data[y].aDate);
	ucount.push(user_data[y].produce_article);
	uusr.push(user_data[y].name+' ('+ user_data[y].aDate+')');
	tmpC5=getRandomDColor();
	tmpC6=getRandomDColor();


	ubgColor.push(tmpC3);
	ubColor.push(tmpC4);
	labelColor.push(tmpC3,task_data[x].title);

}	



console.log(labelColor);
console.log(labeldata);
console.log(valuedata);
console.log(dSet);

var byUser = new Chart(ux, {
    type: 'line',
    data: {            
            datasets:[{
			                label: 'Produce Article ',
			                data: ucount,			                
			                backgroundColor: ubgColor,//backgroundColor: ["rgb(250,128,114)"],
							borderColor: ubColor,//borderColor: ["rgb(250,128,114)"],
			                fill:false,
			          }],
			labels: uusr,	
        },
	options: {
		responsive: true,		
		elements: {
				    line: {				    	
				            tension: 0
				        }
				    },
		title: {
			display: true,
			text: 'Article Produce By User'
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
				display: false,
				scaleLabel: {
					display: true,
					labelString: 'Date'
				}
			}],
			yAxes: [{
				display: true,
				scaleLabel: {
					display: false,
					labelString: 'Produce Article'
				}
			}]
		}
	}        
});



var byTask= new Chart(tx, {
    type: 'bar',
    data: {            
            datasets:[{
			                label: 'Article Count By Task',
			                backgroundColor:tbgColor,
			                borderColor:tbColor,
			                data: tcount,
			                pointBackgroundColor:tbgColor,
			                pointBorderColor: tbColor,
			                fill: false
			          }],
			labels: ttask,    
        },
	options: {
		responsive: true,
		title: {
			display: true,
			text: 'Article By Task'
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
				display: false,
				scaleLabel: {
					display: true,
					labelString: 'Date'
				}
			}],
			yAxes: [{
				display: true,
				scaleLabel: {
					display: true,
					labelString: 'Article Count By Task'
				}
			}]
		}
	}			              
});



var byDate = new Chart(dx, {
    type: 'bar',
    data: {            
            datasets:[{
			                label: 'Daily Article ',
			                data: valuedata,			                
			                backgroundColor: bgColor,//backgroundColor: ["rgb(250,128,114)"],
							borderColor: bColor,//borderColor: ["rgb(250,128,114)"],
			                fill:false
			          }],
			labels: labeldata,	
        },
	options: {
		responsive: true,
		title: {
			display: true,
			text: 'Article By Date'
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
				display: true,
				scaleLabel: {
					display: true,
					labelString: 'Date'
				}
			}],
			yAxes: [{
				display: true,
				scaleLabel: {
					display: true,
					labelString: 'Daily Article Count'
				}
			}]
		}
	}        
});

</script>
