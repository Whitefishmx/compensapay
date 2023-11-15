<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Proveedor extends MY_Loggedin
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model'); // Carga el modelo
		$this->load->model('company_model'); // Carga el modelo
		$this->load->library('email');

	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function index()
	{
		//mostramos en pantalla welcome_message.php
		$this->load->view('welcome_message');
	}

	public function registrarProveedor()
	{
		$this->load->model('Proveedor_model', 'prov');

		//var_dump($this->input->post('bussinesName'));

		$bussinesName = $this->input->post('bussinesName');
        $nationality= $this->input->post('nationality');
        $folio= $this->input->post('folio');
        $efirma= $this->input->post('efirma');
        $phoneForm= $this->input->post('phoneForm');
       	$web= $this->input->post('web');
        $bank= $this->input->post('bank');
        $nameComercial= $this->input->post('nameComercial');
        $dateConst= $this->input->post('dateConst');

        $rfc= $this->input->post('rfc');
        $dom= $this->input->post('dom');
        $emailForm= $this->input->post('emailForm');
        $clabe= $this->input->post('clabe');
        $socialobj= $this->input->post('socialobj');
        $descOperation= $this->input->post('descOperation');
        $transactMonth= $this->input->post('transactMonth');
        $amount= $this->input->post('amount');
        $charge= $this->input->post('charge');
        $curp= $this->input->post('curp');

        $idNumber= $this->input->post('idNumber');
        $emailForm2= $this->input->post('emailForm2');
        $nameForm2= $this->input->post('nameForm2');
        $rfcForm2= $this->input->post('rfcForm2');
        $domForm2= $this->input->post('domForm2');
        $phoneForm2= $this->input->post('phoneForm2');
        $fisica= $this->input->post('fisica');
        $moral= $this->input->post('moral');
        $license= $this->input->post('license');
        $supervisor= $this->input->post('supervisor');

        $dateAward= $this->input->post('dateAward');
        $typeLicense= $this->input->post('typeLicense');
        $audited= $this->input->post('audited');
        $anticorruption= $this->input->post('anticorruption');
        $dataProtection= $this->input->post('dataProtection');
        $vulnerable= $this->input->post('vulnerable');
        $servTrib= $this->input->post('servTrib');
        $obligations= $this->input->post('obligations');

        $firma= $this->input->post('firma');
        $formato= $this->input->post('formato');

		$companie = $this->session->userdata('datosEmpresa')['id'];
		$companieName = $this->session->userdata('datosEmpresa')['legal_name'];
		$unique_key = $this->session->userdata('datosEmpresa')['unique_key'];

		$args = [
			'bussinesName' => $bussinesName,
			'nationality' => $nationality,
			'folio' => $folio,
			'efirma' => $efirma,
			'phoneForm' => $phoneForm,
			'web' => $web,
			'bank' => $bank,
			'nameComercial' => $nameComercial,
			'dateConst' => strtotime($dateConst),
			'dateConstPdf' => $dateConst,

			'rfc' => $rfc,
			'dom' => $dom,
			'emailForm' => $emailForm,
			'clabe' => $clabe,
			'socialobj' => $socialobj,
			'descOperation' => $descOperation,
			'transactMonth' => $transactMonth,
			'amount' => $amount,
			'charge' => $charge,
			'curp' => $curp,

			'idNumber' => $idNumber,
			'emailForm2' => $emailForm2,
			'nameForm2' => $nameForm2,
			'rfcForm2' => $rfcForm2,
			'domForm2' => $domForm2,
			'phoneForm2' => $phoneForm2,
			'fisica' => $fisica,
			'moral' => $moral,
			'license' => $license,
			'supervisor' => $supervisor,

			'dateAward' => strtotime($dateAward),
			'dateAwardPdf' => $dateAward,
			'typeLicense' => $typeLicense,
			'audited' => $audited,
			'anticorruption' => $anticorruption,
			'dataProtection' => $dataProtection,
			'vulnerable' => $vulnerable,
			'servTrib' => $servTrib,
			'obligations' => $obligations,
			'companie' => $companie,
			'companieName' => $companieName,
			'firma' => $firma,
			'formato' => $formato,
		];
		/*$res = $this->prov->registrarProveedor($args);
		$this->session->set_userdata('legal_name', $bussinesName);
		$this->session->set_userdata('short_name', $nameComercial);
		$this->session->set_userdata('rfc', $rfc);
		$this->session->set_userdata('address', $dom);
		$this->session->set_userdata('telephone', $phoneForm);
		$this->session->set_userdata('account_clabe', $clabe);*/
		$pdf = $this->prov->createPDF($args);

		$data = [
            'registro'    => $pdf,
            'uuid'       => $unique_key
        ];

		$this->load->helper('sendMail');

		send_mail('mega.megaman@hotmail.com', $data, 1, date('Y-m-d'));

		/*$config = Array(
            'protocol'  => 'smtp',
            'smtp_host' => 'compensapay.xyz',
            'smtp_port' => '465',
            'smtp_user' => 'hola@compensapay.xyz',
            'smtp_pass' => 'compensamail2023#',
            'mailtype'  => 'html',
            'starttls'  => true,
            'newline'   => "\r\n"
        );

		$this->email->initialize($config);

		$this->email->to('mega.megaman@hotmail.com');
		$this->email->from('hola@compensapay.xyz', 'Compensapay');
		$this->email->subject('Test Email (TEXT)');
		$this->email->message('<p>Mensaje Funciona</p>');
		$this->email->attach(__DIR__ . '/../../assets/proveedores/RegistroProveedor_'.$companieName.'.pdf');
		if($this->email->send())
         {
          $resp = 'Email send.';
         }
         else
        {
         $resp = $this->email->print_debugger();
        }*/
        
		echo json_encode($resp);
	}
}

