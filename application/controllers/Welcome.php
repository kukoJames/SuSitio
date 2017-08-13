<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("Categorias_model", "cat_md");
		$this->load->model("Opciones_model", "opc_md");
		$this->load->model("Productos_model", "pr_md");

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
		$data["section"] = 'detalle';
		$data['title'] = "Inicio";
		$data['header'] = true;
		$data["categorias"] = $this->cat_md->get();
		$data["opciones"] = $this->opc_md->get();
		$data["productos"] = $this->pr_md->getProductos();
		$this->_loadStructure("Sitio", "container", $data);
	}

	public function showDetalle($id){
		$data["producto"] = $this->pr_md->getProductos(['id_producto'=>$id])[0];
		$this->load->view("Sitio/detalle_producto", $data, FALSE);
	}

	private function _loadStructure($folder, $view, $data=NULL){
		$this->load->view("Sitio/header", $data);
		$this->load->view("Sitio/navigation", $data);
		$this->load->view($folder.'/'.$view, $data);
		$this->load->view("Sitio/footer", $data);
	}


}
