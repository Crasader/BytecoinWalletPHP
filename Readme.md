# Bytecoin Wallet PHP

This is a test. Do not use in production.

## Get started

``
walletd --create-wallet --wallet-file=testWallet
``

`composer install netwarp/Bytecoinwallet`

```php
$wallet = new BytecoinWallet('127.0.0.1', '8070', '$myUserName', '$Password');
```

### Methods

#### Address and key management

##### createAdress

```php
$wallet = new BytecoinWallet('127.0.0.1', '8070', '$myUserName', '$Password');
$wallet->createAdress();
```

##### getAddresses

```php
$wallet = new BytecoinWallet('127.0.0.1', '8070', '$myUserName', '$Password');
$wallet->getAddresses();
```

```json
{
   "id":"0",
   "jsonrpc":"2.0",
   "result":{
      "total_address_count":1,
      "addresses":[
         "24iiKm5jscV8ZaP4vE8LtqfpKByVxbNTnANcDYkvPJW8f922Ddt6oaXQhjCs8z1WAtbS7qJPPY6quQYGtjB4u4pyNv2dNnn"
      ]
   },
   "http_code":200
}
```

##### getViewKeyPair

```php
$wallet = new BytecoinWallet('127.0.0.1', '8070', '$myUserName', '$Password');
$wallet->getViewKeyPair();
```

```json
{
   "id":"0",
   "jsonrpc":"2.0",
   "result":{
      "secret_view_key":"97fcd806a479eb5eb02935c4fa6683824a3e94cadea072a78ec3a5a90faf840e",
      "public_view_key":"037bb54d2e8a088db4c9a2550a8141cddca21eff160d008cbb522cd8ef50dac2",
      "import_keys":"5caac1b2c269622d35483d80415732e810709212a876453808e4c6c26da45de4037bb54d2e8a088db4c9a2550a8141cddca21eff160d008cbb522cd8ef50dac2575c94b81e75495153d163a00f9132a2f5de13ae961f751f41a8b746a121c50797fcd806a479eb5eb02935c4fa6683824a3e94cadea072a78ec3a5a90faf840e"
   },
   "http_code":200
}
```

#### Balance and history of transfers

##### getStatus

```php
$wallet = new BytecoinWallet('127.0.0.1', '8070', '$myUserName', '$Password');
$wallet->getStatus();
```

```json
{
   "id":"0",
   "jsonrpc":"2.0",
   "result":{
      "top_block_hash":"381593939f9d16d25d67a7777d7f25656409ac6e795cbcea87135a85d4a4a100",
      "transaction_pool_version":3,
      "outgoing_peer_count":8,
      "incoming_peer_count":0,
      "lower_level_error":"",
      "top_block_height":1626111,
      "top_block_difficulty":63525367839,
      "top_block_cumulative_difficulty":4176630563916309,
      "top_block_timestamp":1538078503,
      "top_block_timestamp_median":1538075121,
      "recommended_fee_per_byte":100,
      "next_block_effective_median_size":100000,
      "top_known_block_height":1626111
   }
}
```

##### getBalance

```php
$wallet = new BytecoinWallet('127.0.0.1', '8070', '$myUserName', '$Password');
$wallet->getBalance();
```

```json
{
   "id":"0",
   "jsonrpc":"2.0",
   "result":{
      "spendable":0,
      "spendable_dust":0,
      "locked_or_unconfirmed":0,
      "spendable_outputs":0,
      "spendable_dust_outputs":0,
      "locked_or_unconfirmed_outputs":0
   },
   "http_code":200
}
```

##### getUnspents

```php
$wallet = new BytecoinWallet('127.0.0.1', '8070', '$myUserName', '$Password');
$wallet->getBalance();
```

```json 
{
   "id":"dd3e9c7d05597c6453dd8f96c637fd9b",
   "jsonrpc":"2.0",
   "result":{
      "spendable":[

      ],
      "locked_or_unconfirmed":[

      ]
   },
   "http_code":200
}
```