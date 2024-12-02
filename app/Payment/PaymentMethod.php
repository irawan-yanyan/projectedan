<?php   
    namespace App\Payment;

    // class PaymentMethod
    // {
    //     private $paymentMethod;

    //     public function __construct($paymentMethod)
    //     {
    //         $this->paymentMethod = $paymentMethod;
    //     }

    //     public function setMethod($method)
    //     {
    //         $this->paymentMethod = $method;
    //     }
        
    //     public function execute()
    //     {
    //         dd('execute untuk '.$this->paymentMethod);
    //     }
    // }

    /**
     *  example fors change to interface
     */

     interface PaymentMethod{
        public function inquiry();
        public function execute();

     }