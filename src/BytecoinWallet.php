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

		# url = "http://user:password@127.0.0.1:8070/json_rpc"

		$url = "http://{$this->user}:{$this->password}@{$this->ip}:{$this->port}/json_rpc";

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
		else {
			$result = json_decode($result);
			$result->http_code = 200;
			$result = json_encode($result);
			return $result;
		}
	}

	/*************************************************************
	*
	* Address and key managements
	*
	**************************************************************/

    private function createAddresses() {
        return $this->makeRequest('create_addresses');
	}

	public function getAddresses() {
		return $this->makeRequest('get_addresses');
	}

	public function getViewKeyPair() {
		return $this->makeRequest('get_view_key_pair');
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
        return $this->makeRequest('get_unspents');
	}

	public function getTransfers() {
        return $this->makeRequest('get_transfers');
	}

	public function createSendProof(array $addresses, string $transaction_hash, string $message) {

	    return $this->makeRequest('create_send_proof', [
	        'addresses' => $addresses,
            'transaction_hash' => $transaction_hash,
            'message' => $message
        ]);
	}

	public function checkSendProof(string $address, float $amount, string $message, string $proof, string $transaction_hash) {
        return $this->makeRequest('check_send_proof', compact('address', 'amount', 'message', 'proof', 'transaction_hash'));
	}

	public function getTransations() {
        return $this->makeRequest('get_transactions');
	}

	/*
	*
	* Sending money
	*
	*/

	public function createTransaction($transaction, array $spend_addresses, bool $any_spend_address = false, string $change_address) {
		return $this->makeRequest('create_transaction', []);
	}

	public function sendTransaction() {

	}
}