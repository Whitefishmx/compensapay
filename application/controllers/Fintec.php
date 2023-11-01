<?php

class Fintec extends MY_Loggedout
{
	public function ping(){
	}
	public function createLog ($logname, $message){
		$logDir = '/var/www/logs/';
		$this->logFile = fopen($logDir . $logname.'.log', 'a+');
		if ($this->logFile !== FALSE) {
			fwrite($this->logFile, '|'.date('Y-m-d H:i:s').'|   '.$message. "\r\n");
			fclose($this->logFile);
		}
	}
	public function getEvents() {
		$this->load->model('response');
		$error = 0;
		$resp = ["response" => 'ok'];
		if (Request::getStaticMethod() == 'POST' && ($body = Request::getBody())) {
			$this->load->model('Arteria_model','dataArt');
			$data = $body ?? NULL;
			if ($data['object_type'] === 'transaction' && $data['data']['type']  === 'deposit') {
				$args = [
					'trakingKey' => $data['data']['tracking_key'],
					'arteriaId' => $data['_id'],
					'amount' => $data['data']['amount'],
					'descriptor' => $data['data']['descriptor'],
					'sourceBank' => $data['data']['source']['bank_code'],
					'receiverBank' => $data['data']['destination']['bank_code'],
					'sourceRfc' => $data['data']['source']['rfc'],
					'receiverRfc' => $data['data']['destination']['rfc'],
					'sourceClabe' => $data['data']['source']['account_number'],
					'receiverClabe' => $data['data']['destination']['account_number'],
					'transactionDate' => $data['data']['created_at'],
				];
				$res = $this->dataArt->AddMovement($args, 'SANDBOX');
				var_dump($res);
			}
		}
		return $this->response->sendResponse($resp, $error);
	}
}
