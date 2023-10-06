<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once APPPATH . 'models/enties/Factura.php';
require_once APPPATH . 'helpers/factura_helper.php';

class Facturas extends MY_Loggedin {

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
	public function index(){

		//Se verifica si esta en la pantalla de cliente
		$isClient = $this->session->userdata('vista');
		$user = 6;

		//1 si es cliente o si es proveedor
		if($isClient == 1){
			$this->db->select('*');
			$this->db->from('operacion');
			$this->db->where('o_idPersona', $user);
			$queryFacturas = $this->db->get();
			$facturas = $queryFacturas->result();
			$data['facturas'] = $facturas;	

			$this->db->select('*');
			$this->db->from('tabla_ejemplo');
			$queryOperacion = $this->db->get();
			$operaciones = $queryOperacion->result();
			$data['operaciones'] = $operaciones;


			$data['main'] = $this->load->view('facturas/cliente', $data , true);
			$this->load->view('plantilla', $data);
		}else{
			$this->db->select('*');
			$this->db->from('operacion');
			$this->db->where('o_idPersona', $user);
			$queryFacturas = $this->db->get();
			$facturas = $queryFacturas->result();
			$data['facturas'] = $facturas;	

			$this->db->select('*');
			$this->db->from('tabla_ejemplo');
			$queryOperacion = $this->db->get();
			$operaciones = $queryOperacion->result();
			$data['operaciones'] = $operaciones;
				
			$data['main'] = $this->load->view('facturas/proveedor', $data , true);
			$this->load->view('plantilla', $data);
		}

	}	
	
	public function subida(){
		$dato = array();
		$user = "6";

		if ($_FILES['invoiceUpload']['error'] == UPLOAD_ERR_OK) {
			$xmlContent = file_get_contents($_FILES['invoiceUpload']['tmp_name']);
			// $dato['datos'] = $xmlContent;
			$xml = new DOMDocument();
			$xml->loadXML($xmlContent);
			$this->load->helper('factura_helper');
			$factura = procesar_xml($xml);
			$factura = array(
				"o_NumOperacion" => $factura->o_NumOperacion,
				"o_idPersona" =>  $user,
				"o_FechaEmision" => $factura->o_FechaEmision,
				"o_Total" => $factura->o_Total,
				"o_ArchivoXML" => $factura->o_ArchivoXML,
				"o_UUID" => $factura->o_UUID,
				"o_idTipoDocumento" => $factura->o_idTipoDocumento,
				"o_SubTotal" => $factura->o_SubTotal,
				"o_Impuesto" => $factura->o_Impuesto,
				"o_FechaUpload" => $factura->o_FechaUpload,
				"o_Activo" => $factura->o_Activo
			);
			$this->db->insert('operacion', $factura);
		}
		

		$dato['status'] = 'ok' ;
		// Configura la respuesta para que sea en formato JSON
		$this->output->set_content_type('application/json');
		// Envía los datos en formato JSON
		$this->output->set_output(json_encode($dato));		
	}	
	
	public function carga(){
		
		
		$factura = array(
			"Aprobacion" => "0",
			"ID_Operacion" =>  str_pad(rand(1, 99999999), 8, '0', STR_PAD_LEFT),
			"Proveedor" => "Frontier",
			"Fecha_Factura" => "2023-05-15",
			"Fecha_Alta" => "2023-10-05",
			"Factura" => "FAC002",
			"Nota_Debito_Factura_Proveedor" => "ND001",
			"Fecha_Nota_Debito_Fact_Proveedor" => "ND001",
			"Fecha_Transaccion" => "2023-10-05",
			"Estatus" => "Pendiente",
			"Monto_Ingreso" => "0.00",
			"Monto_Egreso" => "0.00",
		);

		$this->db->insert('tabla_ejemplo', $factura);

		redirect("facturas");
			
	}	

}