<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Film_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}
	public function getData(){
		$sql = $this->db->get('film');
		return $sql->result();
	}
	public function add_data($data){
		$query = $this->db->insert('film', $data);
		return $query;
	}
	public function getFilm($id){
		$where_id = array('id'=>$id);
		$query = $this->db->get_where('film', $where_id);
		return $query->result_array();
	}
	public function editFilm($data){
		$this->db->where('id', $data['id']);
		$query = $this->db->update('film', $data);
		return $query;
	}
	public function delFilm($id){
		$this->db->where('id', $id);
		$query = $this->db->delete('film');
		return $query;
	}
}

/* End of file Film_model.php */
/* Location: ./application/models/Film_model.php */