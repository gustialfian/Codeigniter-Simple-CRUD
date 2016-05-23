<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Login_model', 'lm');
	}
	public function index()
	{
		$this->load->view('login/login');
	}
	public function validasi()
	{
		$user = $this->input->post('username');
		$pass = $this->input->post('password');

		$test = $this->lm->validasi($user, $pass);

		if ($test[0]->username === $user && $test[0]->password === $pass) {
			redirect('home');
		} else {
			redirect('login');
		}
	}
}
// http://localhost/aadc/index.php/login