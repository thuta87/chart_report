<?php
class Chart_model extends CI_Model{

	function get_article_by_date($start_date,$end_date){
		$this->db->cache_on();

		$this->db->select('date(added_date) as adate, count(id) as article_count');
		$this->db->group_by('date(added_date)');		
		$this->db->where('date(added_date) BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		$this->db->order_by('date(added_date)','asc');

	$result = $this->db->get('article');

	$this->db->cache_off();
	return $result;
	}

	function get_article_by_month($start_date,$end_date){
		$this->db->cache_on();

		$this->db->select('Month(date(added_date)) AS adate, count(id) as article_count');
		$this->db->group_by('Month(date(added_date))');		
		$this->db->where('date(added_date) BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		$this->db->order_by('Month(date(added_date))','asc');

	$result = $this->db->get('article');

	$this->db->cache_off();
	return $result;
	}	

	function get_article_by_year($start_date,$end_date){
		$this->db->cache_on();

		$this->db->select('Year(date(added_date)) AS adate, count(id) as article_count');
		$this->db->group_by('Year(date(added_date))');		
		$this->db->where('date(added_date) BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		$this->db->order_by('Year(date(added_date))','asc');

	$result = $this->db->get('article');
	$this->db->cache_off();
	return $result;
	}	

	function get_article_by_week($start_date,$end_date){
	$this->db->cache_on();
		$this->db->select('(Week(date(added_date))+1)-Week("'. date('Y-m-d', strtotime($start_date)).'") AS adate, count(id) as article_count,min(date(added_date)) as sDate,max(date(added_date)) as eDate');
		$this->db->group_by('(Week(date(added_date))+1)-Week("'. date('Y-m-d', strtotime($start_date)).'")');		
		$this->db->where('date(added_date) BETWEEN "'. date('Y-m-d', strtotime($start_date)). '" and "'. date('Y-m-d', strtotime($end_date)).'"');
		$this->db->order_by('(Week(date(added_date))+1)-Week("'. date('Y-m-d', strtotime($start_date)).'")','asc');

	$result = $this->db->get('article');
	$this->db->cache_off();
	return $result;
	}	

	function get_article_produced_by_user($start_date,$end_date){
	$this->db->cache_on();
	/*
		$art_by_usr= $this->db->query("SELECT u.name,date(a.added_date) aDate,count(a.id) produce_article 
								FROM user_task ut 
								inner join user u 
									on ut.user_id=u.id
								inner join source s
									on  ut.sources like concat('%',s.url,'%')
								inner join article a
									on date(a.added_date) between date(ut.start_date) and date(ut.end_date)
								and s.id=a.source_id
								and a.link like concat('%',s.url,'%')
								And date(a.added_date) between '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'
								Group by u.name,date(a.added_date)");
	*/

		$art_by_usr= $this->db->query("SELECT u.name,date(a.added_date) aDate,count(distinct(a.id)) produce_article 
								FROM user_task ut 
								inner join user u 
									on ut.user_id=u.id
								inner join source s
									on  ut.sources like concat('%',s.url,'%')
								inner join article a
									on date(a.added_date) between date(ut.start_date) and date(ut.end_date)
								and s.id=a.source_id
								and a.link like concat('%',s.url,'%')
								And date(a.added_date) between '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'
								Group by u.name,date(a.added_date)");
	$this->db->cache_off();
		return $art_by_usr;
	}

	function get_article_group_by_user($start_date,$end_date){
	$this->db->cache_on();
		$art_by_usr= $this->db->query("SELECT name,group_concat(aDate order by aDate) day_grp,group_concat(produce_article order by aDate) cnt_grp FROM (SELECT u.name,date(a.added_date) aDate,count(distinct(a.id)) produce_article 
								FROM user_task ut 
								inner join user u 
									on ut.user_id=u.id
								inner join source s
									on  ut.sources like concat('%',s.url,'%')
								inner join article a
									on date(a.added_date) between date(ut.start_date) and date(ut.end_date)
								and s.id=a.source_id
								and a.link like concat('%',s.url,'%')
								And date(a.added_date) between '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'
								Group by u.name,date(a.added_date)) Temp
								Group by name");
	$this->db->cache_off();
		return $art_by_usr;
	}

	function get_article_produced_by_user_by_week($start_date,$end_date){
	$this->db->cache_on();
		$art_by_usr= $this->db->query("SELECT u.name,(Week(added_date)+1)-Week('".date('Y-m-d', strtotime($start_date))."') aDate,count(a.id) produce_article 
								FROM user_task ut 
								inner join user u 
									on ut.user_id=u.id
								inner join source s
									on  ut.sources like concat('%',s.url,'%')
								inner join article a
									on date(a.added_date) between date(ut.start_date) and date(ut.end_date)
								and s.id=a.source_id
								and a.link like concat('%',s.url,'%')
								And date(a.added_date) between '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'
								Group by u.name,(Week(added_date)+1)-Week('".date('Y-m-d', strtotime($start_date))."')");
	$this->db->cache_off();
		return $art_by_usr;
	}


	function get_article_group_by_user_by_week($start_date,$end_date){
	$this->db->cache_on();
		$art_by_usr= $this->db->query("SELECT name,group_concat(aDate order by aDate) day_grp,group_concat(produce_article order by aDate) cnt_grp FROM (SELECT u.name,(Week(added_date)+1)-Week('".date('Y-m-d', strtotime($start_date))."') aDate,count(a.id) produce_article 
								FROM user_task ut 
								inner join user u 
									on ut.user_id=u.id
								inner join source s
									on  ut.sources like concat('%',s.url,'%')
								inner join article a
									on date(a.added_date) between date(ut.start_date) and date(ut.end_date)
								and s.id=a.source_id
								and a.link like concat('%',s.url,'%')
								And date(a.added_date) between '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'
								Group by u.name,(Week(added_date)+1)-Week('".date('Y-m-d', strtotime($start_date))."')) Temp
								Group by name");
	$this->db->cache_off();
		return $art_by_usr;
	}	

	function get_article_produced_by_user_by_month($start_date,$end_date){
	$this->db->cache_on();
		$art_by_usr= $this->db->query("SELECT u.name,month(a.added_date) aDate,count(a.id) produce_article 
								FROM user_task ut 
								inner join user u 
									on ut.user_id=u.id
								inner join source s
									on  ut.sources like concat('%',s.url,'%')
								inner join article a
									on date(a.added_date) between date(ut.start_date) and date(ut.end_date)
								and s.id=a.source_id
								and a.link like concat('%',s.url,'%')
								And date(a.added_date) between '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'
								Group by u.name,month(a.added_date)");
	$this->db->cache_off();
		return $art_by_usr;
	}

	function get_article_group_by_user_by_month($start_date,$end_date){
	$this->db->cache_on();
		$art_by_usr= $this->db->query("SELECT name,group_concat(aDate order by aDate) day_grp,group_concat(produce_article order by aDate) cnt_grp FROM (SELECT u.name,month(a.added_date) aDate,count(a.id) produce_article 
								FROM user_task ut 
								inner join user u 
									on ut.user_id=u.id
								inner join source s
									on  ut.sources like concat('%',s.url,'%')
								inner join article a
									on date(a.added_date) between date(ut.start_date) and date(ut.end_date)
								and s.id=a.source_id
								and a.link like concat('%',s.url,'%')
								And date(a.added_date) between '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'
								Group by u.name,month(a.added_date)) Temp
								Group by name");
	$this->db->cache_off();
		return $art_by_usr;
	}

	function get_article_produced_by_user_by_year($start_date,$end_date){
	$this->db->cache_on();
		$art_by_usr= $this->db->query("SELECT u.name,year(a.added_date) aDate,count(a.id) produce_article 
								FROM user_task ut 
								inner join user u 
									on ut.user_id=u.id
								inner join source s
									on  ut.sources like concat('%',s.url,'%')
								inner join article a
									on date(a.added_date) between date(ut.start_date) and date(ut.end_date)
								and s.id=a.source_id
								and a.link like concat('%',s.url,'%')
								And date(a.added_date) between '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'
								Group by u.name,year(a.added_date)");
	$this->db->cache_off();
		return $art_by_usr;
	}

	function get_article_group_by_user_by_year($start_date,$end_date){
	$this->db->cache_on();
		$art_by_usr= $this->db->query("SELECT name,group_concat(aDate order by aDate) day_grp,group_concat(produce_article order by aDate) cnt_grp FROM (SELECT u.name,year(a.added_date) aDate,count(a.id) produce_article 
								FROM user_task ut 
								inner join user u 
									on ut.user_id=u.id
								inner join source s
									on  ut.sources like concat('%',s.url,'%')
								inner join article a
									on date(a.added_date) between date(ut.start_date) and date(ut.end_date)
								and s.id=a.source_id
								and a.link like concat('%',s.url,'%')
								And date(a.added_date) between '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'
								Group by u.name,year(a.added_date)) Temp
								Group by name");
	$this->db->cache_off();
		return $art_by_usr;
	}

	function get_article_by_date_task($start_date,$end_date){
	$this->db->cache_on();
		$query=$this->db->query("SELECT tmp.title,date(added) as added_date,count(av.id) count_article 
								FROM article_view av
								inner join (select id,title,
									sources as source_urls,
									start_date,end_date
									from user_task) tmp 
								    on  source_urls like concat('%',source_url,'%')
								    AND date(added) between date(tmp.start_date) and date(tmp.end_date)
								    Where date(added) between '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'
								Group by tmp.title,date(added)
								Order by tmp.title,date(added)");	
	$this->db->cache_off();
		return $query;	
	}

	function get_group_by_date_task($start_date,$end_date){
	$this->db->cache_on();
		$query=$this->db->query("SELECT title,group_concat(t_date order by t_date) as grp_date,group_concat(cnt_article order by t_date) grp_article 
								FROM (SELECT tmp.title,date(added) as t_date,count(av.id) cnt_article 
																FROM article_view av
																inner join (select id,title,
																	sources as source_urls,
																	start_date,end_date
																	from user_task) tmp 
																    on  source_urls like concat('%',source_url,'%')
																    AND date(added) between date(tmp.start_date) and date(tmp.end_date)
																    Where date(added) between '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'
																Group by tmp.title,date(added)) as Temp
								Group by title");	
	$this->db->cache_off();
		return $query;	
	}

	function get_article_by_week_task($start_date,$end_date){
	$this->db->cache_on();
		$query=$this->db->query("SELECT title, (Week(added_date)+1)-Week('".date('Y-m-d', strtotime($start_date))."') AS added_date, SUM(article) count_article FROM 
								(SELECT tmp.title,date(added) as added_date,count(av.id) article 
								FROM article_view av
								inner join (select id,title,
									sources as source_urls,
									start_date,end_date
									from user_task) tmp 
								    on  source_urls like concat('%',source_url,'%')
								    AND date(added) between date(tmp.start_date) and date(tmp.end_date)
								    Where date(added) between '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'
								Group by tmp.title,date(added)) as Tmp_Week
								Group by title,(Week(added_date)+1)-Week('".date('Y-m-d', strtotime($start_date))."')
								Order by title,(Week(added_date)+1)-Week('".date('Y-m-d', strtotime($start_date))."')");	

		/*		
		$query=$this->db->query("SELECT title,added_date,Count(article) count_article FROM (SELECT tmp.title, (Week(date(added_date))+1)-Week('".date('Y-m-d', strtotime($start_date))."') AS added_date,a.id article FROM article a
			inner join (select id,title,
						sources as source_urls,
						start_date,end_date
						from user_task) tmp 
			on  source_urls like concat('%',link,'%')
			AND date(added_date) between date(tmp.start_date) and date(tmp.end_date)
		    Where date(added_date) between '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."') task_week	
		    group by title,added_date
		    order by title,added_date");	
		*/
	$this->db->cache_off();
		return $query;	
	}

	function get_group_by_week_task($start_date,$end_date){
	$this->db->cache_on();
		$query=$this->db->query("SELECT title,group_concat(added_date order by added_date) as grp_date,group_concat(count_article order by added_date) grp_article 
								FROM (SELECT title, (Week(added_date)+1)-Week('".date('Y-m-d', strtotime($start_date))."') AS added_date, SUM(article) count_article FROM 
								(SELECT tmp.title,date(added) as added_date,count(av.id) article 
								FROM article_view av
								inner join (select id,title,
									sources as source_urls,
									start_date,end_date
									from user_task) tmp 
								    on  source_urls like concat('%',source_url,'%')
								    AND date(added) between date(tmp.start_date) and date(tmp.end_date)
								    Where date(added) between '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'
								Group by tmp.title,date(added)) as Tmp_Week
								Group by title,(Week(added_date)+1)-Week('".date('Y-m-d', strtotime($start_date))."')) as Temp
								Group by title");	

		/*		
		$query=$this->db->query("SELECT title,added_date,Count(article) count_article FROM (SELECT tmp.title, (Week(date(added_date))+1)-Week('".date('Y-m-d', strtotime($start_date))."') AS added_date,a.id article FROM article a
			inner join (select id,title,
						sources as source_urls,
						start_date,end_date
						from user_task) tmp 
			on  source_urls like concat('%',link,'%')
			AND date(added_date) between date(tmp.start_date) and date(tmp.end_date)
		    Where date(added_date) between '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."') task_week	
		    group by title,added_date
		    order by title,added_date");	
		*/
	$this->db->cache_off();
		return $query;	
	}

	function get_article_by_month_task($start_date,$end_date){
		$this->db->cache_on();
		$query=$this->db->query("SELECT tmp.title,month(added) as added_date,count(av.id) count_article 
								FROM article_view av
								inner join (select id,title,
									sources as source_urls,
									start_date,end_date
									from user_task) tmp 
								    on  source_urls like concat('%',source_url,'%')
								    AND date(added) between date(tmp.start_date) and date(tmp.end_date)
								    Where date(added) between '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'
								Group by tmp.title,month(added)
								Order by tmp.title,month(added)");	
	/*
		$query=$this->db->query("SELECT title,added_date,Count(article) count_article FROM (SELECT tmp.title, Month(date(added_date)) AS added_date,a.id article FROM article a
			inner join (select id,title,
						sources as source_urls,
						start_date,end_date
						from user_task) tmp 
			on  source_urls like concat('%',link,'%')
			AND date(added_date) between date(tmp.start_date) and date(tmp.end_date)
		    Where date(added_date) between '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."') task_week	
		    group by title,added_date
		    order by title,added_date");	
	*/
		$this->db->cache_off();
		return $query;	
	}		

	function get_group_by_month_task($start_date,$end_date){
		$this->db->cache_on();
		$query=$this->db->query("SELECT title,group_concat(added_date order by added_date) as grp_date,group_concat(count_article order by added_date) grp_article 
								FROM (SELECT tmp.title,month(added) as added_date,count(av.id) count_article 
								FROM article_view av
								inner join (select id,title,
									sources as source_urls,
									start_date,end_date
									from user_task) tmp 
								    on  source_urls like concat('%',source_url,'%')
								    AND date(added) between date(tmp.start_date) and date(tmp.end_date)
								    Where date(added) between '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."'
								Group by tmp.title,month(added)) as Temp
								Group by title");	
	/*
		$query=$this->db->query("SELECT title,added_date,Count(article) count_article FROM (SELECT tmp.title, Month(date(added_date)) AS added_date,a.id article FROM article a
			inner join (select id,title,
						sources as source_urls,
						start_date,end_date
						from user_task) tmp 
			on  source_urls like concat('%',link,'%')
			AND date(added_date) between date(tmp.start_date) and date(tmp.end_date)
		    Where date(added_date) between '".date('Y-m-d', strtotime($start_date))."' and '".date('Y-m-d', strtotime($end_date))."') task_week	
		    group by title,added_date
		    order by title,added_date");	
	*/
		$this->db->cache_off();
		return $query;	
	}			
}