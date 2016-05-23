<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function validasi($user, $pass)
	{
		$this->db->where('username', $user);
		$this->db->where('password', $pass);
		return $this->db->get('user')->result();
	}

}

/* End of file Film_model.php */
/* Location: ./application/models/Film_model.php */