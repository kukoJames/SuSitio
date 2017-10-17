<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_control extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model("Menus_model", "m_md");
		$this->load->model("Productos_model", "pr_md");
		$this->load->model("Categorias_model", "cat_md");
	}

	public function scripts() {
		$this->load->view("structure/main");
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
		$this->load->view("Structure/footer_modal_edit");
	}

	public function deleteProducto($id){
		$data["title"]="Producto a eliminar";
		$this->load->view("Structure/header_modal", $data);
		$data["producto"] = $this->pr_md->get(['id_producto'=>$id])[0];
		$this->load->view("Admin/delete_producto", $data);
		$this->load->view("Structure/footer_modal_delete");
	}

	public function accion($param){
		$producto = array(
				'nombre'		=>	strtoupper($this->input->post('nombre')),
				'precio'		=>	$this->input->post('precio'),
				'descripcion'	=>	$this->input->post('descripcion'),
				'longitud'		=>	$this->input->post('longitud'),
				'latitud'		=>	$this->input->post('latitud'),
				'id_categoria'	=>	($this->input->post('id_categoria') !="-1") ? $this->input->post('id_categoria') : NULL
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
				$data ['id_producto'] = $this->pr_md->update($producto, $this->input->post('id_producto'));
				$mensaje = array(
					"id" 	=> 'Éxito',
					"desc"	=> 'Producto actualizado correctamente',
					"type"	=> 'success'
				);
				break;

			default:
				$data ['id_producto'] = $this->pr_md->update(["estatus" => 1], $this->input->post('id_producto'));
				$mensaje = array(
					"id" 	=> 'Éxito',
					"desc"	=> 'Producto eliminado correctamente',
					"type"	=> 'success'
				);
				break;
		}
		$this->jsonResponse($mensaje);
	}

	public function addFoto($id){
		$data["title"]="Cargar imagen";
		$this->load->view("Structure/header_modal", $data);
		$data["producto"] = $this->pr_md->get(['id_producto'=>$id])[0];
		$data['categoria'] = $this->cat_md->get(['id_categoria' => $data["producto"]->id_categoria])[0];
		$this->load->view("Admin/addFoto", $data);
		$this->load->view("Structure/footer_modal_close");
	}

	public function uploadFoto(){
		$this->load->library("upload");
   		$this->load->helper("path");
   		$id_producto = $this->input->post('id_producto');
   		$id_categoria = $this->input->post('id_categoria');
   		$categoria = $this->input->post('categoria');

		$ruta_folder = $this->createFolder($categoria); //Se crea el folder si no existe
		
		$explode = explode(".", $_FILES['file']['name']);
		$extension = array_pop($explode);
		
		$imagen = [
			"file_name"		=>	$id_producto.'_'.$explode[0],
			"upload_path"	=>	FCPATH.$ruta_folder,
			"allowed_types"	=>	'jpg|jpeg|gif|png|',
			"overwrite"		=>	TRUE,
			"remove_spaces"	=>	TRUE
		];

		$this->upload->initialize($imagen);
		
		if (! $this->upload->do_upload('file')){
			$data = ["id"	=>	"Error",
        			"desc"	=>	$this->upload->display_errors(),
        			"type"	=>	"error"];
        }else{
            $data["resultado"] = $this->upload->data();
            $data =["id" => "Éxito",
            		"desc"	=>	"Foto cargada correctamente",
            		"type"	=>	"success"];
            $update = [
            	"ruta_imagen" => $ruta_folder,
                "nombre_imagen" => $imagen["file_name"].".".$extension];

            $this->pr_md->update($update, $id_producto);
        }
        $this->jsonResponse($data);
	}

}

/* End of file Main_controller.php */
/* Location: ./application/controllers/Main_controller.php */
