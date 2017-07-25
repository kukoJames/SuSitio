<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("Categorias_model", "cat_md");
		$this->load->model("Opciones_model", "opc_md");

	}


	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index(){
		$data["categorias"] = $this->cat_md->get();
		$data["opciones"] = $this->opc_md->get();

		$this->load->view("Sitio/header", $data);
		$this->load->view("Sitio/navigation", $data);
		$this->load->view("Sitio/container", $data);
		$this->load->view("Sitio/footer", $data);
		//$this->load->view('welcome_message');
	}
}
