<?php if (!defined("BASEPATH")) exit("No direct script access allowed");

class MY_Controller extends CI_Controller {

	protected $header = ""; //Archivo header
	protected $notifications_menu = ""; //Menú notificaciones
	protected $left_menu = ""; //Menú izquierdo
	protected $folder = ""; //Contenedor de las vistas del menú
	protected $footer = ""; //Archivo footer
	protected $USER;
	protected $ASSETS;
   	protected $UPLOADS;

	function __construct() {
		parent::__construct();
		$this->load->model("Menus_model", "m_md");
		$data["menu_left"] = $this->m_md->menuLeve1();
		$data["menu_level2"] = $this->m_md->menuLeve2();

		//Asignamos el valor a las variables"!
		$this->ASSETS = "./assets/";
   		$this->UPLOADS = "uploads/";
		$this->USER = $this->ion_auth->user()->row();

		$this->load->vars($data);
   		$this->header = "Structure/header";
		$this->left_menu  = "Structure/left_menu";
		$this->notifications_menu  = "Structure/notifications_menu";
		$this->footer = "Structure/footer";
		$this->folder = "Structure";

	}

	public function estructura($view, $data = NULL) {
		$this->load->view($this->header, $data);
		$this->load->view($this->left_menu, $data);
		$this->load->view($this->notifications_menu, $data);
		$this->load->view($view, $data);
		$this->load->view($this->footer, $data);
	}

	public function jsonResponse( $response ) {
		header( "content-type: application/json; charset=utf8" );
		echo json_encode( $response );
	}

    public function createFolder($folder){
    	$base = $this->ASSETS.$this->UPLOADS;
    	$ruta = $this->ASSETS.$this->UPLOADS.$folder."/";
    	if(!is_dir($ruta)){
        	mkdir($this->ASSETS, 0777);
        	mkdir($base, 0777);
           	mkdir($ruta, 0777);
        }
        return $ruta;
    }


}
