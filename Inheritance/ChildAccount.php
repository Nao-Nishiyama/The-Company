<?php
    include 'BankAccount.php';

    // Child or sub Class
    class Account extends BankAccount
    {
        public function connection(){
            return $this->conn;
        }
    }

    $accnt_obj = new Account('John Doe', '0122-3254-10000');

    echo 'Account Name: ' . $accnt_obj->getAccountName() . '<br>';
    echo 'Account Number: ' . $accnt_obj->getAccountNumber() . '<br>';

    $accnt_obj->depositAmount(500);
    $accnt_obj->depositAmount(500);
    $accnt_obj->depositAmount(200);

    echo 'Balance: ' . $accnt_obj->getBalance() . '<br>';

    echo $accnt_obj->connection();

?>