<?php
    // Parent Class
    class BankAccount
    {
        # Properties
        private $accountName;
        private $accountNumber;
        private $accountBalance;   
        protected $conn = "Connected to DB";

        # Constructor
        public function __construct($accountName, $accountNumber)
        {
            $this->accountName = $accountName;
            $this->accountNumber = $accountNumber;
        }

        # Methods
        public function getAccountName(){
            return $this->accountName;
        }

        public function getAccountNumber(){
            return $this->accountNumber;
        }

        public function getBalance(){
            return $this->accountBalance;
        }

        // Setter
        public function depositAmount($amount){
            if($amount >0){
                $this->accountBalance += $amount;
                // $this->accountBalance = $this->accountBalance + $amount;
            }
            return $this->accountBalance;
        }
    }

?>