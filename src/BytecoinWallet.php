<?php

namespace BytecoinWallet;

class BytecoinWallet {

	public $ip = '127.0.0.1';

	public $port = '8070';

	private $user = '';

	private $password = '';

	public function __construct(string $ip = '127.0.0.1', string $port = '8070', string $user, string $password) {
		$this->ip = $ip;
		$this->port = $port;
		$this->user = $user;
		$this->password = $password;
	}

	/**
	* Make request
	*
	* @param $method string
	* @param $params array
	* @return string 
	*
	*/
	public function makeRequest(string $method, $params = []) : string {

		$url = "http://toto:toto@{$this->ip}:{$this->port}/json_rpc";

		$data = [
			'jsonrpc' => '2.0',
			'id' => '0',
			'method' => $method,
			'params' => $params
		];

		$options = [
			'http' => [
				'header' => 'Content-Type: application/json-rpc',
				'method' => 'POST',
				'content'=> json_encode($data, JSON_FORCE_OBJECT)
			]
		];

		$context = stream_context_create($options);
		$result = file_get_contents($url, false, $context);

		if ($result === FALSE) { 

		}

		return $result;
	}

	/*************************************************************
	*
	* Address and key managements
	*
	**************************************************************/
	private function createAdrdess() {

	}

	public function getAddresses() {
		return $this->makeRequest('get_addresses');
	}

	private function getViewPair() {

	}

	/*
	*
	* Balance and history of transfers
	*
	*/

	public function getStatus() {
		return $this->makeRequest('get_status');
	}

	public function getBalance() {
		return $this->makeRequest('get_balance');
	}

	public function getUnspents() {

	}

	public function getTransfers() {

	}

	public function createSendProof() {

	}

	public function checkSendProof() {

	}

	public function getTransations() {

	}

	/*
	*
	* Sending money
	*
	*/

	public function createTransaction() {

	}

	public function sendTransaction() {
		return 'toto';
	}
}

$wallet = new BytecoinWallet('127.0.0.1', '8070', 'toto', 'toto');
$result = $wallet->getAddresses();
var_dump($result);
