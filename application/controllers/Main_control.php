<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_control extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("Menus_model", "m_md");
		$this->load->model("Productos_model", "pr_md");
		$this->load->model("Categorias_model", "cat_md");
	}

	public function showMenu(){
		$data["productos"] = $this->pr_md->getProductos();
		//$data["menu"] = $this->m_md->menuLeve1();
		//$this->load->view("Admin/welcome", $data, FALSE);
		$this->estructura("Admin/welcome", $data);
	}

	public function newProducto(){
		$data["title"]="Registrar nuevos productos";
		$this->load->view("Structure/header_modal", $data);
		$data['categorias'] = $this->cat_md->get();
		$this->load->view("Admin/new_producto", $data);
		$this->load->view("Structure/footer_modal_save");
	}

	public function updateProducto($id){
		$data["title"]="Actualizar datos del producto";
		$this->load->view("Structure/header_modal", $data);
		$data["producto"] = $this->pr_md->get(['id_producto'=>$id])[0];
		$data['categorias'] = $this->cat_md->get();
		$this->load->view("Admin/edit_producto", $data);
		$this->load->view("Structure/footer_modal_save");
	}

	public function deleteProducto($id){
		$data["title"]="Producto a eliminar";
		$this->load->view("Structure/header_modal", $data);
		$data["producto"] = $this->pr_md->get(['id_producto'=>$id])[0];
		$this->load->view("Admin/delete_producto", $data);
		$this->load->view("Structure/footer_modal_save");
	}

	public function accion($param){
		$producto = array(
				'nombre'		=>	strtoupper($this->input->post('nombre')),
				'precio'		=>	$this->input->post('precio'),
				'descripcion'	=>	$this->input->post('descripcion'),
			);
		switch ($param) {
			case (substr($param, 0, 1) === 'I'):
				$data ['id_producto']=$this->pr_md->insert($producto);
				$mensaje = array(
					"id" 	=> 'Éxito',
					"desc"	=> 'Producto registrado correctamente',
					"type"	=> 'success'
				);
				break;

			case (substr($param, 0, 1) === 'U'):
				$data ['id_producto'] = $this->pr_md->update($producto, $this->input->post('id_alumno'));
				$mensaje = array(
					"id" 	=> 'Éxito',
					"desc"	=> 'Producto actualizado correctamente',
					"type"	=> 'success'
				);
				break;

			default:
				$data ['id_producto'] = $this->pr_md->update(["estatus" => 0], $this->input->post('id_alumno'));
				$mensaje = array(
					"id" 	=> 'Éxito',
					"desc"	=> 'Producto eliminado correctamente',
					"type"	=> 'success'
				);
		}
		$this->jsonResponse($mensaje);
	}


}

/* End of file Main_controller.php */
/* Location: ./application/controllers/Main_controller.php */
