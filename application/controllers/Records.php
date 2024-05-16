<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Records extends CI_Controller {

	protected $queries;

	public function __construct() {

		parent::__construct(); 
        $this->load->model('Queries');
        $this->queries = new Queries();
	}
	
	public function Consultare($form, $extra = null) {
		$data = array();
		switch (strtolower($form)) {
				case 'my_form':
					if (!$extra) {
						$data['records'] = $this->queries->select_no_where('*', 'my_form_records'); 
						$this->content = 'consultare/my_form_record';
					}

					if ($extra && strtolower($extra) == 'details') { 
						$PK_id = $this->input->get("id"); 
						$data['record_details'] = $this->queries->select_where('*', 'my_form_records', ['id' => $PK_id], false, true);
						$this->content = 'consultare/my_form_details';
					}
				break; 
			default:
			redirect($this->agent->referrer());
			break;
		}
		$this->load->view("template/header"); 
		$this->load->view($this->content, $data);
		$this->load->view("template/footer");
	}
}
