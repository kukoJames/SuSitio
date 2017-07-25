<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Opciones_model extends MY_Model {

	function __construct(){
		parent::__construct();
		$this->TABLE_NAME = "opciones";
		$this->PRI_INDEX = "id_opcion";
	}

}

/* End of file Opciones_model.php */
/* Location: ./application/models/Opciones_model.php */
