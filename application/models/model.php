<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Model extends CI_Model {

  public function all()
  {
    return $this->db->query("SELECT *, (SELECT count(leads_id) FROM leads) as count FROM leads limit 0,10")->result_array();
  }

  public function get_by_date($post)
  {
  // 	var_dump($post);
		// die();
  	$from = $post['from_date'];
  	$to = $post['to_date'];
  	$name = ucfirst($post['name']);
  	if($post['page_number']==0){
  		$number=$post['page_number'];
  	}else{
  		$number = ($post['page_number']-1)*10;
  	}
  	if($name == null){
    return $this->db->query("SELECT *, 
    	(SELECT count(leads_id) FROM leads where registered_datetime between '$from' and '$to') as count 
    	FROM leads where registered_datetime between '$from' and '$to' limit $number, 10")->result_array();
	}else{
		  return $this->db->query("SELECT *, 
    	(SELECT count(leads_id) FROM leads where first_name = '$name' and registered_datetime between '$from' and '$to') as count 
    	FROM leads where first_name = '$name' and registered_datetime between '$from' and '$to' limit $number, 10")->result_array();
	}
  }
}