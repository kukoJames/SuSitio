<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

class MY_Controller extends CI_Controller {

	protected $header = ""; //Archivo header
	protected $menu_notificatios = ""; //Menú notificaciones
	protected $menu_left = ""; //Menú izquierdo
	protected $opciones = "";
	protected $folder = ""; //Contenedor de las vistas del menú
	protected $footer = ""; //Archivo footer
	protected $the_user;
	protected $ASSETS;
   	protected $UPLOADS;

	function __construct() {
		parent::__construct();
		$this->load->model("Menus_model", "m_md");

		$data["menu"] = $this->m_md->get();

		$this->header = "Structure/header";
		$this->menu_notificatios  = "Structure/notifications_menu";
		$this->menu_left  = "Structure/left_menu";
		$this->footer = "Structure/footer";
		$this->folder = "Structure";
		$data = new stdClass();
		// $data->the_user = $this->ion_auth->user()->row();
		// $this->the_user = $data->the_user;
		$this->load->vars($data);

		//Asignamos el valor a las variables
		$this->ASSETS = "./assets/";
   		$this->UPLOADS = "uploads/";
	}

	protected function estructura($view, $data = NULL) {
		$this->load->view($this->header, $data);
		$this->load->view($this->menu_notificatios, $data);
		$this->load->view($this->menu_left, $data);
		$this->load->view($view, $data);
		$this->load->view($this->footer, $data);
	}

	public function jsonResponse( $response ) {
		header( "content-type: application/json; charset=utf8" );
		echo json_encode( $response );
	}


}
