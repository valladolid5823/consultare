<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forms extends CI_Controller {

	protected $content = '';

	public function __construct() {

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
							if(isset($_POST['save_header_title'])) { 
								$records_data = array(
									'title' => $this->input->post("header_title"),
									'form_code' -> $this->input->post('form_code'), 
									'owner_id' => '464',
								);

								$PK_id = $this->queries->insert($records_data, 'checklist_form_header', true); 
								if($PK_id) {
									echo '1'; 
									exit();
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
