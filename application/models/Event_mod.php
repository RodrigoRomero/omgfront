<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');



class event_mod extends RR_Model {

	public function __construct() {
		parent::__construct();
	}



	public function getEventoById($id){
		$evento = $this->get_where('eventos',['id'=>$id])->row();
		return $evento;
	}

}
