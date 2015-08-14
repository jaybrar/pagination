<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		// $this->output->enable_profiler();
		$this->load->model('Model');
	}

	public function index()
	{
		$this->load->view('pages');
	}

	public function index_html(){
		$data['records'] = $this->Model->all();
		if($data['records'] != null){
		$count = $data['records'][0]['count'];
		$data['count'] = $count;
		}
		$this->load->view('partials/pages_partials', $data);
	}

	public function get_date(){
		$post = $this->input->post();
		$data['records']=$this->Model->get_by_date($post);
		if($data['records'] != null){
		$count = $data['records'][0]['count'];
		$data['count'] = $count;
		}
		$this->load->view('partials/pages_partials', $data);
	}
}

//end of main controller