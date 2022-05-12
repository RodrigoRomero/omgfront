<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(E_ALL ^ E_NOTICE);

/**
 * @author Rodrigo Romero
 * @version 1.0.1
 */

class RR_Model extends CI_Model
{
	var $Clang;
	var $today;
	var $i;
	var $u;
	var $params;
	var $evento;

	public function __construct() {
		parent::__construct();
		$this->Clang  = config_item("language");
		$this->today  = date('Y-m-d H:i:s');
		$this->i      = array("fa"  => date('Y-m-d H:i:s'), "status"=>1);
		$this->u      = array("fum"  => date('Y-m-d H:i:s'));
		$this->params = $this->uri->uri_to_assoc(1);
		$this->evento = $this->_getEventoActivo();
	}

	public function view($view, $vars = array(), $return = true){
		$vars["Clang"] = $this->Clang;
		return $this->load->view($view, $vars, $return) . "\n";
	}


	public function get($top_id=0) {
		if (!empty($top_id))
		{
			$parent = $this->get_one($top_id);
			if (!empty($parent))
			{
				$this->db->like('lineage', $parent['lineage'], 'after');
			}
		}

		$query = $this->db->order_by('lineage')->get('atributos');
		return $query;
	}

	public function get_one($id) {
		$row = $this->db->where('id', $id)
						->get('atributos')
						->row_array();
		return $row;
	}

	public function get_children($parent_id){
		$query = $this->db->order_by('lineage')->where('parent_id', $parent_id)->get('atributos');
		return $query;
	}

	private function _getEventoActivo(){
		$result = $this->db->select('eventos.id, eventos.status, eventos.nombre, eventos.bajada, eventos.descripcion, eventos.fecha_inicio, eventos.fecha_baja, eventos.telefono, eventos.capacidad, eventos.costo,
								    eventos.newsletter, eventos.json_socials, eventos.reminder_one, eventos.reminder_two, eventos.payments_enabled, eventos.show_register, eventos.cupons_enabled, eventos.show_full_bio, lugares.lugar, lugares.direccion, lugares.json_direccion')->join('lugares', 'lugares.evento_id = eventos.id')->get_where('eventos',array('eventos.status'=>1))->row();
		
return $result;
	}


	public function get_atributos($table, $row=false, $id=NULL){
		$this->db->select("*");
		if(!empty($id) && $id!=NULL){
			$this->db->where('id',$id);
		}
		$query = $this->db->get_where($table,array('activo'=>1));
		if($row){
			$return = $query->row();
		} else {
			$return = $query->result();
		}
		return $return;
	}

	public function check_deletea(){
		if(isset($this->params['id']) && !empty($this->params['id'])){
			$id = $this->params['id'];
			$success      = 1;
			$responseType = 'function';
			$data = array('title'   => 'Eliminar Registo',
						  'texto'   => 'Estas seguro que deseas eliminar este registro ?',
						  'link'    => set_url(array($this->atributo=>'deletea', 'c'=>$this->params['c'], 'id'=>$id)),
					);
			$html         = $this->view('alerts/modal_dialog', $data);
			$function     = 'open_modal';
			$data = array('success' => $success, 'responseType'=>$responseType, 'html'=>$html, 'value'=>$function);
		}
		return $data;
	}

	public function getTotalImages($id,$folder){
		$imgArr = get_filenames("uploads/$folder");
		$i = 0;
		foreach($imgArr as $images){
			$tmpArr = explode("_",$images);
			if($tmpArr[0]==$id){
				$i++;
			}
		}

		$totalImages = $i;
		return $totalImages;
	}

}
