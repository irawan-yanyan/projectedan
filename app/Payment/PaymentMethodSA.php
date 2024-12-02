<?php 

namespace App\Payment;

class PaymentMethodSA implements PaymentMethod{
        public function inquiry()
        {

        }

        public function execute()
        {
                dd(
                    "this is payment SA."
                );
        }

        

}
?>