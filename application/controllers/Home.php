<?php 
/**
* 
*/
class Home extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Film_model', 'fm');
	}

	public function index()
	{
		$film = $this->fm->getData();
		$data = [
			'film' => $film,
		];
		$this->load->view('landing-page', $data);
	}

	public function insert()
	{
		$this->load->view('form-insert');
	}
	public function edit($id)
	{
		$film = $this->fm->getFilm($id);
		$data = array(
			'film' => $film,
		);
		$this->load->view('form-edit', $data);
	}
	public function delete($id)
	{
		$result = $this->fm->delFilm($id);
		redirect('home');
	}
	public function submit()
	{
		$title      = $this->input->post('title');
		$year       = $this->input->post('year');
		$view_count = $this->input->post('view_count');
		$film = array(
			'title'      => $title, 
			'year'       => $year, 
			'view_count' => $view_count, 
		);
		$result = $this->fm->add_data($film);
		if ($result) {
			redirect('home');
		}else{
			echo "error";
		}
	}
	public function update($id)
	{
		$title      = $this->input->post('title');
		$year       = $this->input->post('year');
		$view_count = $this->input->post('view_count');
		$film = array(
			'id'         => $id,
			'title'      => $title, 
			'year'       => $year, 
			'view_count' => $view_count, 
		);
		$result = $this->fm->editFilm($film);
		if ($result) {
			redirect('home');
		}else{
			echo "error";
		}
	}
}
 ?>

