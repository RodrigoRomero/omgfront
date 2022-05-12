<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Lineup extends RR_Controller {
	public function __construct(){
		parent::__construct();
		$this->layout = 'layout/multi_page';
		$this->load->model('event_mod','Event');
	}

	public function index($security=null){
		die();
	}




	public function day($day){
		$this->load->helper('file');
		$file = json_decode(read_file('./assets/lineup/lineup.json'));
		$this->load->model('speaker_mod','Speaker');
		$day = ($day==nul) ? 1 : $day;
		$oradores = $this->Speaker->getOradoresByIds([74,75]);

		echo '<pre>';
                print_r($file);
                print_r($oradores);
		echo '</pre>';

		$data = [];
		$module = $this->view('lineup/day', $data);
		echo $this->show_main($module);
	}

	public function profile(){
		$data = ['customer' => $this->Account->getCustomerById()
			    ];

		$module = $this->view('accounts/profile', $data);
		echo $this->show_main($module);
	}

	public function create(){
		$data = $this->Account->create();
	 	echo json_encode($data);
	}

	public function restore($s=null){

		if($this->input->is_ajax_request()){
			$data = $this->Account->dorestore();
	 		echo json_encode($data);
		} else {
			if($s == null){
				redirect(base_url('/'));
			}


			$data = ['salt'=>$s];
			$module = $this->view('accounts/newpassword',$data);
			echo $this->show_main($module);
		}

	}

	public function changepassword(){
		if($this->input->is_ajax_request()){
			$data = $this->Account->doupdatepassword();
	 		echo json_encode($data);
		} else {

			redirect(base_url('/'));
		}

	}

	public function forgotpassword(){

		$module = $this->view('accounts/forgotpassword');
		echo $this->show_main($module);

	}

	public function update($id){
		$data = $this->Account->update($id);
	 	echo json_encode($data);
	}

	public function nominate($order_id){
		$data = ['tickets' => $this->Account->getTicketsByOrderId($order_id)
				];

		$module = $this->view('accounts/nominate', $data);
		echo $this->show_main($module);
	}

	public function nominar($id, $row){
		$data = $this->Account->nominar();
	 	echo json_encode($data);
	}

	public function invite(){
		$data = $this->Account->sendInvite();
	 	echo json_encode($data);
	}

	public function bc(){
		$this->Account->bc();
	}
}
