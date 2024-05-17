<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

    public function __construct() {
        parent::__construct();
		$this->load->model('Queries');
        $this->queries = new Queries();
    }

    public function register() {
		$this->load->view("template/header"); 
		$this->load->view('consultare/register');
		$this->load->view("template/footer");
    }

    public function register_user() {

		var_dump($_POST);

		return;
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = array('status' => 'error', 'message' => validation_errors());
        } else {
            $data = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT)
            );

            $this->db->insert('users', $data);
            $response = array('status' => 'success', 'message' => 'User registered successfully!');
        }

        echo json_encode($response);
    }
}
