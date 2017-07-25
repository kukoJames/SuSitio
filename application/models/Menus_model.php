<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menus_model extends MY_Model {

	function __construct(){
		parent::__construct();
		$this->TABLE_NAME = "menus";
		$this->PRI_INDEX = "id_menu";
	}

}

/* End of file Menus_model.php */
/* Location: ./application/models/Menus_model.php */
