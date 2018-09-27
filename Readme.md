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



