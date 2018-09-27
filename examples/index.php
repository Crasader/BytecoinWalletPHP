<?php 

use BytecoinWallet\BytecoinWallet;

require_once '../src/BytecoinWallet.php';

$wallet = new BytecoinWallet('127.0.0.1', '8070', 'toto', 'toto');
$result = $wallet->getUnspents();
var_dump($result);