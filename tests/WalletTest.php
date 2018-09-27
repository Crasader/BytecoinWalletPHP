<?php 

use PHPUnit\Framework\TestCase;
use BytecoinWallet\BytecoinWallet;

class WalletTest extends TestCase {

    public $ip = '127.0.0.1';

    public $port = '8070';

    public $user = 'toto';

    public $password = 'toto';

	public function test_getStatus() {

        $wallet = new BytecoinWallet($this->ip, $this->port, $this->user, $this->password);

        $this->assertJson(200, $wallet->getStatus());
	}

	public function test_getBalance() {

        $wallet = new BytecoinWallet($this->ip, $this->port, $this->user, $this->password);

        $this->assertJson(200, $wallet->getBalance());
    }

    public function test_getUnspents() {

        $wallet = new BytecoinWallet($this->ip, $this->port, $this->user, $this->password);

        $this->assertJson(200, $wallet->getUnspents());
    }
} 