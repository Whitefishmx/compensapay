<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Registro extends MY_Loggedout
{

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
	public function usuario(...$encodedParams)
	{
		$data = array();
		if (!empty($encodedParams)) {

			$decodedParams = array_map('urldecode', $encodedParams);

			$datos = array(
				'bussinesName' => $decodedParams[0],
				'nameComercial' => $decodedParams[1],
				'codigoPostal' => $decodedParams[2],
				'estado' => $decodedParams[3],
				'direccion' => $decodedParams[4],
				'telefono' => $decodedParams[5],
				'type' => $decodedParams[6],
				'rfc' => $decodedParams[7],
				'fiscal' => $decodedParams[8],
				'clabe' => $decodedParams[9],
				'bank' => $decodedParams[10],
				'uniqueString' => $decodedParams[11]
			);
			$datos = json_encode($datos);
			$data['datosEmpresa'] = $datos;
		}

		$data['main'] = $this->load->view('registro/usuario', $data, true);
		$this->load->view('plantilla', $data);
	}
	public function empresa()
	{
		//mostramos en pantalla welcome_message.php
		$data['main'] = $this->load->view('registro/empresa', '', true);
		$this->load->view('plantilla', $data);
	}
	public function finalizado(...$encodedParams)
	{
		$data = array();
		if (!empty($encodedParams)) {

			$decodedParams = array_map('urldecode', $encodedParams);

			$datos = array(
				'nombre' => $decodedParams[0],
				'correo' => $decodedParams[1],
				'enlace' => $decodedParams[2],
			);
		}
		//mostramos en pantalla welcome_message.php
		$data['main'] = $this->load->view('registro/finalizado', $datos, true);
		$this->load->view('plantilla', $data);
	}
	public function usuarioUnico()
	{
		$nombre = $this->uri->segment(3);
		$data = array(
			'nombre' => $nombre,
			'email' => 'johndoe@example.com'
		);
		// Configura la respuesta para que sea en formato JSON
		$this->output->set_content_type('application/json');
		// Envía los datos en formato JSON
		$this->output->set_output(json_encode($data));
	}
	public function registraEmpresa()
	{
		//faltaAgragar a la empresa provedora
		$this->form_validation->set_rules('bussinesName', 'BussinesName', 'required');
		$this->form_validation->set_rules('nameComercial', 'NameComercial', 'required');
		$this->form_validation->set_rules('type', 'Type', 'required');
		$this->form_validation->set_rules('rfc', 'RFC', 'trim|required|regex_match[/^[A-Z0-9]{12,13}$/]');
		$this->form_validation->set_rules('fiscal', 'Fiscal', 'required');
		$this->form_validation->set_rules('clabe', 'CLABE', 'trim|required|regex_match[/^[0-9]{18}$/]');
		$this->form_validation->set_rules('codigoPostal', 'CodigoPostal', 'required|regex_match[/^[0-9]{5}$/]');
		$this->form_validation->set_rules('estado', 'Estado', 'required');
		$this->form_validation->set_rules('direccion', 'Direccion', 'required');
		$this->form_validation->set_rules('telefono', 'Telefono', 'required|regex_match[/^[0-9]+$/]');
		$this->form_validation->set_rules('bank', 'Bank', 'required');
		$this->form_validation->set_rules('uniqueString', 'UniqueString', 'required');
		if ($this->form_validation->run() === FALSE) {
			// Si la validación falla, puedes mostrar errores o redirigir al formulario
			// redirect('controlador/metodo');
			$validation_errors = validation_errors();
			$registro['validation_errors'] = $validation_errors;
		} else {
			// Si la validación es exitosa, obtén los datos del formulario
			$bussinesName = $this->input->post('bussinesName');
			$codigoPostal = $this->input->post('codigoPostal');
			$estado = $this->input->post('estado');
			$direccion = $this->input->post('direccion');
			$telefono = $this->input->post('telefono');
			$nameComercial = $this->input->post('nameComercial');
			$type = $this->input->post('type');
			$rfc = $this->input->post('rfc');
			$fiscal = $this->input->post('fiscal');
			$clabe = $this->input->post('clabe');
			$bank = $this->input->post('bank');
			$uniqueString = $this->input->post('uniqueString');
		}
		//Movemos los archivos de la persona
		$sourcePath = './temporales/' . $uniqueString; // Ruta de origen de la carpeta
		$destinationPath =  './boveda/' . $uniqueString; // Ruta de destino de la carpeta

		$renombre = rename($sourcePath, $destinationPath);

		$agregarpersona = $this->Interaccionbd->AgregaPersona('{"Nombre": "' . $bussinesName . '",
			"Apellido": "",
			"Alias": "' . $nameComercial . '",
			"RFC": "' . $rfc . '",
			"TipoPersona": 2,
			"Rol": 1,
			"ActivoFintec": 0,
			"RegimenFical":' . $fiscal . ',
			"idCtaBanco":1,
			"Logo":"./boveda/' . $uniqueString . '/' . $uniqueString . '-logo.jpeg"}');
		//Rol indica si es proveedor o no
		$registro['id'] = $agregarpersona;

		$AgregaCuentaBancaria = $this->Interaccionbd->AgregaCuentaBancaria('{"idPersona":' . $registro['id'] . ',
			"idBanco":' . $bank . ',
			"CLABE": "' . $clabe . '"}');

		$update = $this->Interaccionbd->updatePersona('{
			"idpersona":"' . $registro['id'] . '",   
			"Nombre": "' . $bussinesName . '",
			"Apellido": "",
			"Alias": "' . $nameComercial . '",
			"RFC": "' . $rfc . '",
			"TipoPersona": "2",
			"Rol": "1",
			"ActivoFintec": "0",
			"RegimenFical":' . $fiscal . ',
			"idCtaBanco":2,
			"Logo":"./boveda/' . $uniqueString . '/' . $uniqueString . '-logo.jpeg"
			"Activo":"0"
		}');

		// Configura la respuesta para que sea en formato JSON
		$this->output->set_content_type('application/json');
		// Envía los datos en formato JSON
		$this->output->set_output(json_encode($registro));
	}
	public function registraUsuario()
	{
		$this->form_validation->set_rules('user', 'Usuario', 'required');
		$this->form_validation->set_rules('name', 'Nombre', 'required');
		$this->form_validation->set_rules('lastname', 'Apellidos', 'required');
		$this->form_validation->set_rules('email', 'Correo', 'required|valid_email');
		$this->form_validation->set_rules('validateEmail', 'Confirmar Correo', 'required');
		$this->form_validation->set_rules('number', 'Teléfono Móvil', 'required|exact_length[10]|numeric');
		$this->form_validation->set_rules('validateNumber', 'Confirmar Teléfono Móvil', 'required|exact_length[10]|numeric');
		$this->form_validation->set_rules('question', 'Pregunta Secreta', 'required');
		$this->form_validation->set_rules('answer', 'Respuesta', 'required');
		$this->form_validation->set_rules('idEmpresa', 'ID', 'required');
		$this->form_validation->set_rules('uniqueString', 'UniqueString', 'required');
		if ($this->form_validation->run() === FALSE) {
			// Si la validación falla, puedes mostrar errores o redirigir al formulario
			// redirect('controlador/metodo');
			$validation_errors = validation_errors();
			//echo $validation_errors;
		} else {

			// Si la validación es exitosa, obtén los datos del formulario
			$user = $this->input->post('user');
			$name = $this->input->post('name');
			$lastname = $this->input->post('lastname');
			$email = $this->input->post('email');
			$validateEmail = $this->input->post('validateEmail');
			$number = $this->input->post('number');
			$validateNumber = $this->input->post('validateNumber');
			$question = $this->input->post('question');
			$answer = $this->input->post('answer');
			$idEmpresa = $this->input->post('idEmpresa');
			$uniqueString = $this->input->post('uniqueString');
		}
		//Registramos usuario

		$agregausuario = $this->Interaccionbd->AgregaUsuario('{
			"NombreUsuario": "' . $user . '",
			"Nombre": "' . $name . '",
			"Apellidos": "' . $lastname . '",
			"idPersona": ' . $idEmpresa . ',
			"idPerfil": 1,
			"urlImagen":"./boveda/' . $uniqueString . '/' . $uniqueString . '-foto.jpeg"}');

		$agregarepresentante = $this->Interaccionbd->AgregaRepresentante('{"NombreRepresentante": "' . $name . ' ' . $lastname . '",
			"RFC":"",
			"idPersona": "' . $idEmpresa . '"}');

		$agregacontacto = $this->Interaccionbd->AgregaContacto('{"idTipoContacto": 2,
			"idPersona":' . $idEmpresa . ',
			"Contenido": "' . $number . '"}');
		$agregacontacto = $this->Interaccionbd->AgregaContacto('{"idTipoContacto": 3,
				"idPersona":' . $idEmpresa . ',
				"Contenido": "' . $email . '"}');



		$encodedParams = array();
		$encodedParams['nombre'] = urlencode($name . ' ' . $lastname);
		$encodedParams['correo'] = urlencode($email);

		$dato = array();
		$dato['url'] = 'registro/finalizado/' . implode('/', $encodedParams);
		// // Enviamos el correo

		// //asi es como
		$dato['enlace'] = $this->enviarCorreo($idEmpresa);
		// Configura la respuesta para que sea en formato JSON
		$this->output->set_content_type('application/json');
		// Envía los datos en formato JSON
		$this->output->set_output(json_encode($dato));
	}
	public function enviarCorreo($idEmpresa)
	{
		echo cifrarAES($idEmpresa);
		return cifrarAES($idEmpresa);
	}
	public function catalogoBancos()
	{
		$clabe = $this->input->get('clabe');


		//llamamos la funcion que trae el banco dependiendo los 3 digitos de la clabe
		$clabe = substr(strval($clabe), 0, 3);
		//Esta es la funcion de israel
		function clabe3($clabe3)
		{
			$data['nombre'] = $clabe3;
			return json_encode($data);
		}
	}
	public function regimenFiscal()
	{
		$dato = array();
		// Configura la respuesta para que sea en formato JSON
		$this->output->set_content_type('application/json');
		// Envía los datos en formato JSON
		$this->output->set_output(json_encode($dato));
	}
	//Nos permite ver las variables que queramos
	public function verVariables()
	{
		echo 'hola desde verVariable';
	}
}
