<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_control extends MY_Controller {

	function __construct(){
		parent::__construct();

	}

	public function show(){
		$data["menu"] = 'Principal';
		$this->estructura("Admin/login", $data);
	}

}

/* End of file Main_controller.php */
/* Location: ./application/controllers/Main_controller.php */
