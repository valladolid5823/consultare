<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms extends CI_Controller {

	protected $content = '';

	public function __construct() {

		$this->$queries = $this->load->model('Queries');
		parent::__construct();
	}
	
	public function Consultare($form, $extra = null) {
		$_SESSION['client_code'] = "Consultare";
		if ($this->session->userdata("client_code") == "Consultare") { 
			$data = array();
			$PK_id = (int)$this->input->get("id");

			try {
				switch (strtolower($form)) {
					case 'my_form':
						if ($this->input->server('REQUEST_METHOD') === 'POST') {
							if(isset($_POST['save_my_form'])) { 

								$this->form_validation->set_rules('company_name', 'Company Name', 'required');
								$this->form_validation->set_rules('performed_date', 'Performed Date', 'required');

								if ($this->form_validation->run()) {
									$records_data = array(
										'company_name' => $this->input->post("company_name"),
										'performed_date' => $this->input->post('performed_date'), 
									);
									
									$PK_id = $this->queries->insert($records_data, 'my_form_records', true); 
									if($PK_id) {
										echo '1'; 
										exit();
									}
								}
								
							}
						}
						$this->content = 'consultare/my_form';
					break;
					// end case
					default:
					redirect($this->agent->referrer());
					break;
					
				}
				
			} catch (\Exception $e) {
				redirect($this->agent->referrer());
			}

			$data['id'] = $PK_id;
			$this->load->view('template/header'); 
			$this->load->view($this->content, $data); 
			$this->load->view('template/footer');
		} else {
			echo 'Direct Access Denied';
		}
		
	}
}
