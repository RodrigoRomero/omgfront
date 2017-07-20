<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends RR_Controller {
	public function __construct(){
		parent::__construct();
		$this->layout = 'layout/multi_page';
		$this->load->model('account_mod','Account');
		$this->load->model('event_mod','Event');
	}

	public function index($security=null){
		$module = $this->view('accounts/index');
		echo $this->show_main($module);
	}

	public function summary(){

		if(!$this->auth->loggedin()){
			redirect(base_url('/account'));
		}

		$data = ['customer' => $this->Account->getCustomerById(),
				 'orders'	=> $this->Account->getOrdersByCustomerById(),
			    ];




		$module = $this->view('accounts/summary', $data);
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
}
