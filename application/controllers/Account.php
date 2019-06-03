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
			set_session("comesFrom", 'account/summary', false);
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
}
