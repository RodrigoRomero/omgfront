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

	public function restore(){
		$this->load->model('PHPMailer_mod','PHPMailer');

		$html     = $this->view("email/restore");
		$mailtest = $this->PHPMailer->send('email_info', 'rodrigo.thepulg@gmail.com', 'TEST', $html);


		echo '<pre>';
		print_r($mailtest);
		echo '</pre>';

		die;

/*
		$email = new \PHPMailer\PHPMailer\PHPMailer();



		//Set who the message is to be sent from
		$email->setFrom('rodrigo.romero@vnstudios.com', 'First Last');
		//Set an alternative reply-to address
		$email->addReplyTo('replyto@example.com', 'First Last');
		//Set who the message is to be sent to
		$email->addAddress('webmaster@orsonia.com.ar', 'John Doe');
		//Set the subject line
		$email->Subject = 'PHPMailer sendmail test';
		//Read an HTML message body from an external file, convert referenced images to embedded,
		//convert HTML into a basic plain-text alternative body
		$html      = $this->view("email/template", array("body"=>$body, "extra"=>$extra));
		$email->msgHTML($html);
		//Replace the plain text body with one created manually
		$email->AltBody = 'This is a plain-text message body';
		//Attach an image file
		//$mail->addAttachment('images/phpmailer_mini.png');
		//send the message, check for errors
		if (!$email->send()) {
		    echo "Mailer Error: " . $email->ErrorInfo;
		} else {
		    echo "Message sent!";
		}



		print_r($email);
		die;
	*/	//$data = $this->Account->restore();

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
