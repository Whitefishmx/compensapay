<?php



function send_mail($mail, $data, $view, $cc = null, $subject = null, $date=null){
    if ($date === null){
        $date = date('Y-m-d');
    }
    $config = Array(
            'protocol'      => 'SMTP',
            'smtp_host'     => 'smtpout.secureserver.net',
            'smtp_auth'     => TRUE,
            'smtp_port'     => 465,
            'smtp_user'     => 'hola@compensapay.xyz',
            'smtp_pass'     => 'compensamail2023#',
            'smtp_timeout'  => '30',
            'mailtype'      => 'html',
            'crlf'          => "\r\n",
            'newline'       => "\r\n",
            'charset'       => 'UTF-8',
        );
	$CI =& get_instance();
	$CI->load->library('email', $config);
	$CI->email->set_newline("\r\n");
	$CI->email->from('hola@compensapay.xyz', 'Equipo Solve');
	$CI->email->set_newline("\r\n");
	$CI->email->to($mail);
	$CI->email->set_newline("\r\n");
	$html = '';

	if($view===1){
		$CI->email->subject('Prueba envio de correos');
		$CI->email->attach($data['registro']);
		$CI->email->attach(__DIR__ . '\/../../boveda/'. $data['uuid'] .'/'. $data['uuid'] .'-actaConstitutiva.pdf');
		$CI->email->attach(__DIR__ . '\/../../boveda/'. $data['uuid'] .'/'. $data['uuid'] .'-comprobanteDomicilio.pdf');
		$CI->email->attach(__DIR__ . '\/../../boveda/'. $data['uuid'] .'/'. $data['uuid'] .'-constanciaSituacionFiscal.pdf');
		$CI->email->attach(__DIR__ . '\/../../boveda/'. $data['uuid'] .'/'. $data['uuid'] .'-representanteLegal.pdf');
//            $CI->email->attach('SanPablo '.$date.'.xlsx');
		//$CI->email->attach('Rappi '.$date.'.xlsx');
		$html = $CI->load->view('email/mailSupplier', $data, true);
	}else if ($view===2){
		$CI->email->subject('Notificación: '.$subject);
		$html = $CI->load->view('email/notifications', $data, true);
		$CI->email->set_newline("\r\n");
	}
	else if($view===3){
		$CI->email->subject('Cambio de contraseña ');
		$html = $CI->load->view('email/resetpass', $data, true);
	}

	if($cc != null){
		$CI->email->cc($cc);
		$CI->email->set_newline("\r\n");
	}
	$CI->email->message($html);
	$CI->email->set_newline("\r\n");
	$CI->email->send();
	$debug = $CI->email->print_debugger();
}
