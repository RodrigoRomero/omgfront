<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Evento extends RR_Controller {

	public function __construct(){
		parent::__construct();


	}

	public function runtest(){
die;
		$this->load->model('event_mod','Evento');
	   $a = $this->Evento->runtest();	
var_dump($a);
	}

	public function index(){
		$module = $this->view('evento/index',
										['agenda'   => $this->getAgenda(),
										 'oradores' => $this->getOradores(),
										 'sponsors' => $this->getSponsors(),
										 'lugar'    => $this->getLugar(),
										 'tickets'  => $this->getTickets(),
										]
							);

		echo $this->show_main($module);

	}

	public function evento(){
		$module = $this->view('evento/detail');

		echo $this->show_main($module);
	}

	public function getAgenda(){
		$module = $this->view('evento/agenda', ['agenda' => $this->Main->getAgenda()]);
		return $module;
	}

	public function getLugar(){

		$module = $this->view('evento/lugar',['lugar' => $this->Main->getLugar()]);
		return $module;
	}

	public function getSlider(){
		$module = $this->view('evento/slider', ['evento' => $this->evento]);
		return $module;
	}

	public function getOradores(){
		$module = $this->view('evento/oradores', ['oradores' => $this->Main->getOradores()]);
		return $module;

	}

	public function getSponsors(){
		$module = $this->view('evento/sponsors', ['sponsors' => $this->Main->getSponsors()]);
		return $module;
	}

	public function getTickets(){
		$module = $this->view('evento/tickets', ['tickets' => $this->Main->getTickets()]);
		return $module;
	}

	public function speaker($id){
		$speaker = $this->Main->getOradorById($id);
		$this->load->view('evento/speaker-detail', ['orador' => $speaker]);
	}

	public function reminder(){

		$this->load->model('event_mod','Evento');
	    $this->Evento->_doReminder();

	}

	public function runreminder(){
		$total_rows = $this->db->from('acreditados')->where(['reminder'=>0, 'status'=>1])->count_all_results();
		echo $total_rows;
	}

	public function covid(){
		$this->load->view('evento/covid');
	}
}
