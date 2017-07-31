<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_control extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("Menus_model", "m_md");
		$this->load->model("Productos_model", "pr_md");

	}

	public function showMenu(){
		$data["productos"] = $this->pr_md->getProductos();
		//$data["menu"] = $this->m_md->menuLeve1();

		//$this->load->view("Admin/welcome", $data, FALSE);
		$this->estructura("Admin/welcome", $data);
	}

}

/* End of file Main_controller.php */
/* Location: ./application/controllers/Main_controller.php */
