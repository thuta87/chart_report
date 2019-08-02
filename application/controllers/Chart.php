<?php

class Chart extends CI_Controller{
	function __construct(){
		parent::__construct();
	//load chart_model from model
	$this->load->model('Chart_model');	
	$this->load->helper('form');
	$this->load->library('session');
	}

	function index(){

		$sdate = html_escape($this->input->post('date1'));
		$edate = html_escape($this->input->post('date2'));	

		$sd = html_escape($this->input->post('ddate1'));
		$ed = html_escape($this->input->post('ddate2'));	

		$daterange=array(
						'sdate' => html_escape($this->input->post('date1')),
						'edate' => html_escape($this->input->post('date2'))
						);



		if (($sd == NULL AND $ed==NULL) AND ($sdate == NULL OR $edate == NULL)){
			$cmonth=date('m');
			$cyear=date('Y');

			//$cdate=$cyear.'-'.$cmonth.'-01';
			$cdate = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));

			$sdate=$cdate;
			$edate=date('Y-m-d');
		}

		if ($sd != NULL AND $ed !=NULL){
			$sdate=date('Y-m-d',$sd);
			$edate=date('Y-m-d',$ed);
		}
	

		$data = $this->Chart_model->get_article_by_date($sdate,$edate)->result();	  	

			$x['data'] = json_encode($data);		
			$x['type'] = json_encode('Daily');
			$x['d1'] = json_encode($sdate);
			$x['d2'] = json_encode($edate);

			$this->load->view('By_Date_View',$x);

	}

	function art_by_monthly(){

		$sdate = html_escape($this->input->post('date1'));
		$edate = html_escape($this->input->post('date2'));	

		$sd = html_escape($this->input->post('mdate1'));
		$ed = html_escape($this->input->post('mdate2'));	
		
		if (($sd == NULL AND $ed==NULL) AND ($sdate == NULL OR $edate == NULL)){
			$cmonth=date('m');
			$cyear=date('Y');

			//$cdate=$cyear.'-'.$cmonth.'-01';
			$cdate = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));

			$sdate=$cdate;
			$edate=date('Y-m-d');
		}

		if ($sd != NULL AND $ed !=NULL){
			$sdate=$sd;
			$edate=$ed;
		}


		$data = $this->Chart_model->get_article_by_month($sdate,$edate)->result();	  	

			$x['data'] = json_encode($data);		
			$x['type'] = json_encode('Monthly');
			$x['d1'] = json_encode($sdate);
			$x['d2'] = json_encode($edate);


			$this->load->view('By_Date_View',$x);

	}

	function art_by_yearly(){

		$sdate = html_escape($this->input->post('date1'));
		$edate = html_escape($this->input->post('date2'));	

		$sd = html_escape($this->input->post('ydate1'));
		$ed = html_escape($this->input->post('ydate2'));	
		
		if (($sd == NULL AND $ed==NULL) AND ($sdate == NULL OR $edate == NULL)){
			$cmonth=date('m');
			$cyear=date('Y');

			//$cdate=$cyear.'-'.$cmonth.'-01';
			$cdate = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));

			$sdate=$cdate;
			$edate=date('Y-m-d');
		}

		if ($sd != NULL AND $ed !=NULL){
			$sdate=$sd;
			$edate=$ed;
		}


		$data = $this->Chart_model->get_article_by_year($sdate,$edate)->result();	  	

			$x['data'] = json_encode($data);		
			$x['type'] = json_encode('Yearly');
			$x['d1'] = json_encode($sdate);
			$x['d2'] = json_encode($edate);

			$this->load->view('By_Date_View',$x);

	}

	function art_by_weekly(){

		$sdate = html_escape($this->input->post('date1'));
		$edate = html_escape($this->input->post('date2'));	

		$sd = html_escape($this->input->post('wdate1'));
		$ed = html_escape($this->input->post('wdate2'));	


		if (($sd == NULL AND $ed==NULL) AND ($sdate == NULL OR $edate == NULL)){
			$cmonth=date('m');
			$cyear=date('Y');

			//$cdate=$cyear.'-'.$cmonth.'-01';
			$cdate = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));

			$sdate=$cdate;
			$edate=date('Y-m-d');
		}

		if ($sd != NULL AND $ed !=NULL){
			$sdate=$sd;
			$edate=$ed;
		}
	

		$data = $this->Chart_model->get_article_by_week($sdate,$edate)->result();	  	

			$x['data'] = json_encode($data);		
			$x['type']=json_encode('Weekly');
			$x['d1'] = json_encode($sdate);
			$x['d2'] = json_encode($edate);

			$this->load->view('By_Date_View',$x);

	}

	function art_by_user(){
		$sdate = html_escape($this->input->post('date1'));
		$edate = html_escape($this->input->post('date2'));	

		$sd = html_escape($this->input->post('ddate1'));
		$ed = html_escape($this->input->post('ddate2'));			
		
		if (($sd == NULL AND $ed==NULL) AND ($sdate == NULL OR $edate == NULL)){
			/*
			$cmonth=date('m');
			$cyear=date('Y');

			$cdate=$cyear.'-'.$cmonth.'-01';
			*/
			$cdate = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));
			
			$sdate=$cdate;
			$edate=date('Y-m-d');
		}

		if ($sd != NULL AND $ed !=NULL){
			$sdate=$sd;
			$edate=$ed;
		}

		if ($sdate == NULL OR $edate == NULL){
			$cmonth=date('m');
			$cyear=date('Y');

			//$cdate=$cyear.'-'.$cmonth.'-01';
			$cdate = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));

			$sdate=$cdate;
			$edate=date('Y-m-d');
		}		

		$user_data = $this->Chart_model->get_article_produced_by_user($sdate,$edate)->result();
		$udata_group = $this->Chart_model->get_article_group_by_user($sdate,$edate)->result();
			$x['user_data']= json_encode($user_data);		
			$x['udata_group']= json_encode($udata_group);		
			$x['type']=json_encode('Daily');
			$x['d1'] = json_encode($sdate);
			$x['d2'] = json_encode($edate);

			$this->load->view('By_User_View',$x);
	}

	function art_by_user_weekly(){
		$sdate = html_escape($this->input->post('date1'));
		$edate = html_escape($this->input->post('date2'));	

		$sd = html_escape($this->input->post('wdate1'));
		$ed = html_escape($this->input->post('wdate2'));	
		
		if (($sd == NULL AND $ed==NULL) AND ($sdate == NULL OR $edate == NULL)){
			$cmonth=date('m');
			$cyear=date('Y');

			//$cdate=$cyear.'-'.$cmonth.'-01';
			$cdate = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));

			$sdate=$cdate;
			$edate=date('Y-m-d');
		}

		if ($sd != NULL AND $ed !=NULL){
			$sdate=$sd;
			$edate=$ed;
		}

		if ($sdate == NULL OR $edate == NULL){
			$cmonth=date('m');
			$cyear=date('Y');

			//$cdate=$cyear.'-'.$cmonth.'-01';
			$cdate = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));

			$sdate=$cdate;
			$edate=date('Y-m-d');
		}

		/*
		var_dump($sd);
		var_dump($ed);
		die();
		*/


		$user_data = $this->Chart_model->get_article_produced_by_user_by_week($sdate,$edate)->result();	
		$udata_group= $this->Chart_model->get_article_group_by_user_by_week($sdate,$edate)->result();	

			$x['user_data']= json_encode($user_data);		
			$x['udata_group']= json_encode($udata_group);
			$x['type']=json_encode('Weekly');
			$x['d1'] = json_encode($sdate);
			$x['d2'] = json_encode($edate);

			$this->load->view('By_User_View',$x);
	}

	function art_by_user_monthly(){
		$sdate = html_escape($this->input->post('date1'));
		$edate = html_escape($this->input->post('date2'));	

		$sd = html_escape($this->input->post('mdate1'));
		$ed = html_escape($this->input->post('mdate2'));	
		
		if (($sd == NULL AND $ed==NULL) AND ($sdate == NULL OR $edate == NULL)){
			$cmonth=date('m');
			$cyear=date('Y');

			//$cdate=$cyear.'-'.$cmonth.'-01';
			$cdate = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));

			$sdate=$cdate;
			$edate=date('Y-m-d');
		}

		if ($sd != NULL AND $ed !=NULL){
			$sdate=$sd;
			$edate=$ed;
		}

		if ($sdate == NULL OR $edate == NULL){
			$cmonth=date('m');
			$cyear=date('Y');

			//$cdate=$cyear.'-'.$cmonth.'-01';
			$cdate = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));

			$sdate=$cdate;
			$edate=date('Y-m-d');
		}

		$user_data = $this->Chart_model->get_article_produced_by_user_by_month($sdate,$edate)->result();
		$udata_group= $this->Chart_model->get_article_group_by_user_by_month($sdate,$edate)->result();	

			$x['user_data']= json_encode($user_data);		
			$x['udata_group']= json_encode($udata_group);
			$x['type']=json_encode('Monthly');
			$x['d1'] = json_encode($sdate);
			$x['d2'] = json_encode($edate);

			$this->load->view('By_User_View',$x);
	}

	function art_by_user_yearly(){
		$sdate = html_escape($this->input->post('date1'));
		$edate = html_escape($this->input->post('date2'));	

		$sd = html_escape($this->input->post('ydate1'));
		$ed = html_escape($this->input->post('ydate2'));	
		
		if (($sd == NULL AND $ed==NULL) AND ($sdate == NULL OR $edate == NULL)){
			$cmonth=date('m');
			$cyear=date('Y');

			//$cdate=$cyear.'-'.$cmonth.'-01';
			$cdate = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));

			$sdate=$cdate;
			$edate=date('Y-m-d');
		}

		if ($sd != NULL AND $ed !=NULL){
			$sdate=$sd;
			$edate=$ed;
		}

		if ($sdate == NULL OR $edate == NULL){
			$cmonth=date('m');
			$cyear=date('Y');

			//$cdate=$cyear.'-'.$cmonth.'-01';
			$cdate = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));

			$sdate=$cdate;
			$edate=date('Y-m-d');
		}

		$user_data = $this->Chart_model->get_article_produced_by_user_by_year($sdate,$edate)->result();
		$udata_group= $this->Chart_model->get_article_group_by_user_by_year($sdate,$edate)->result();	

			$x['user_data']= json_encode($user_data);		
			$x['udata_group']= json_encode($udata_group);
			$x['type']=json_encode('Yearly');
			$x['d1'] = json_encode($sdate);
			$x['d2'] = json_encode($edate);

			$this->load->view('By_User_View',$x);
	}

	function art_by_task(){		
		$sdate = html_escape($this->input->post('date1'));
		$edate = html_escape($this->input->post('date2'));	

		$sd = html_escape($this->input->post('ddate1'));
		$ed = html_escape($this->input->post('ddate2'));	

		if (($sd == NULL AND $ed==NULL) AND ($sdate == NULL OR $edate == NULL)){
			$cmonth=date('m');
			$cyear=date('Y');

			//$cdate=$cyear.'-'.$cmonth.'-01';
			$cdate = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));

			$sdate=$cdate;
			$edate=date('Y-m-d');
		}

		if ($sd != NULL AND $ed !=NULL){
			$sdate=$sd;
			$edate=$ed;
		}
		
		$task_data = $this->Chart_model->get_article_by_date_task($sdate,$edate)->result();
		//$group_data = $this->Chart_model->get_group_by_date_task($sdate,$edate)->result();

			$x['task_data']= json_encode($task_data);
			//$x['group_data']= json_encode($group_data);
			$x['type']=json_encode('Daily');
			$x['d1'] = json_encode($sdate);
			$x['d2'] = json_encode($edate);			

			$this->load->view('By_Task_View',$x);		
	}

	function art_by_task_weekly(){
		$sdate = html_escape($this->input->post('date1'));
		$edate = html_escape($this->input->post('date2'));	

		$sd = html_escape($this->input->post('wdate1'));
		$ed = html_escape($this->input->post('wdate2'));	

		if (($sd == NULL AND $ed==NULL) AND ($sdate == NULL OR $edate == NULL)){
			$cmonth=date('m');
			$cyear=date('Y');

			//$cdate=$cyear.'-'.$cmonth.'-01';
			$cdate = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));

			$sdate=$cdate;
			$edate=date('Y-m-d');
		}

		if ($sd != NULL AND $ed !=NULL){
			$sdate=$sd;
			$edate=$ed;
		}

		$task_data = $this->Chart_model->get_article_by_week_task($sdate,$edate)->result();
		$group_data = $this->Chart_model->get_group_by_week_task($sdate,$edate)->result();

			$x['task_data']= json_encode($task_data);		
			$x['group_data']= json_encode($group_data);
			$x['type']=json_encode('Weekly');
			$x['d1'] = json_encode($sdate);
			$x['d2'] = json_encode($edate);

			$this->load->view('By_Task_View',$x);		
	}	

	function art_by_task_monthly(){
		$sdate = html_escape($this->input->post('date1'));
		$edate = html_escape($this->input->post('date2'));	

		$sd = html_escape($this->input->post('mdate1'));
		$ed = html_escape($this->input->post('mdate2'));	

		if (($sd == NULL AND $ed==NULL) AND ($sdate == NULL OR $edate == NULL)){
			$cmonth=date('m');
			$cyear=date('Y');

			//$cdate=$cyear.'-'.$cmonth.'-01';
			$cdate = date('Y-m-d', strtotime('-7 days', strtotime(date('Y-m-d'))));

			$sdate=$cdate;
			$edate=date('Y-m-d');
		}

		if ($sd != NULL AND $ed !=NULL){
			$sdate=$sd;
			$edate=$ed;
		}

		$task_data = $this->Chart_model->get_article_by_month_task($sdate,$edate)->result();
		$group_data = $this->Chart_model->get_group_by_month_task($sdate,$edate)->result();

			$x['task_data']= json_encode($task_data);	
			$x['group_data']= json_encode($group_data);	
			$x['type']=json_encode('Monthly');
			$x['d1'] = json_encode($sdate);
			$x['d2'] = json_encode($edate);

			$this->load->view('By_Task_View',$x);		
	}		
}