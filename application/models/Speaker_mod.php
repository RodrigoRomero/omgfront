<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');



class speaker_mod extends RR_Model {

	public function __construct() {
		parent::__construct();
	}



	public function getOradoresByIds($ids){

        $speaker_groups = $this->db->order_by('order','ASC')->get_where('oradores_grupo',array('status'=>1))->result();
        $oradores_by_categoria = array();

        foreach($speaker_groups as $group){
            $oradores = $this->db->select('o.id, o.nombre, o.brief, o.cargo, o.json_socials', FALSE)
                           ->from('oradores o')
                           ->order_by('o.order', 'asc')
                           ->where( array('o.status'=>1, 'o.evento_id'=>$this->evento->id, 'o.orador_grupo_id'=>$group->id))
		           ->where_in('o.id',$ids)		
                           ->get()->result();

            $oradores_by_categoria[] = array('categoria'=>$group, 'oradores'=>$oradores);
        }
        return $oradores_by_categoria;

    }	
}
